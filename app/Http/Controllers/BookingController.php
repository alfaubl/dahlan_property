<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Display user's bookings dashboard
     */
    public function index()
    {
        $user = Auth::user();
        
        // Ambil semua booking user
        $bookings = Booking::where('user_id', $user->id)
            ->with(['property', 'payment'])
            ->latest()
            ->get();
        
        // Booking untuk tabel (5 terakhir)
        $recentBookings = $bookings->take(5);
        
        // Statistik
        $totalBookings = $bookings->count();
        $pendingBookings = $bookings->where('status', 'pending')->count();
        $successBookings = $bookings->where('status', 'success')->count();
        $totalSpending = $bookings->where('status', 'success')->sum('total_price');
        
        // Data properti (untuk card statistik atas)
        $totalProperties = Property::where('user_id', $user->id)->count();
        
        // Data chart booking 7 hari terakhir
        $chartData = $this->getBookingChartData($user->id);
        
        // ✅ PERBAIKAN: Definisikan variabel $totalPrice yang sebelumnya hilang
        $totalPrice = $totalSpending;
        
        return view('bookings.index', compact(
            'user',
            'bookings',
            'recentBookings',
            'totalBookings',
            'pendingBookings',
            'successBookings',
            'totalSpending',
            'totalProperties',
            'chartData',
            'totalPrice'
        ));
    }

    /**
     * Get booking data for chart (7 days)
     */
    private function getBookingChartData($userId)
    {
        $today = Carbon::today();
        $successData = [];
        $pendingData = [];
        $labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = $today->copy()->subDays($i);
            $dateStr = $date->format('Y-m-d');
            
            $successCount = Booking::where('user_id', $userId)
                ->where('status', 'success')
                ->whereDate('created_at', $dateStr)
                ->count();
            
            $pendingCount = Booking::where('user_id', $userId)
                ->where('status', 'pending')
                ->whereDate('created_at', $dateStr)
                ->count();
            
            $successData[] = $successCount;
            $pendingData[] = $pendingCount;
            $labels[] = $date->format('d M');
        }
        
        return [
            'success' => $successData,
            'pending' => $pendingData,
            'labels' => $labels
        ];
    }

    /**
     * Store a newly created booking.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required',
            'notes' => 'nullable|string|max:500'
        ]);

        $property = Property::findOrFail($request->property_id);
        $bookingCode = 'BOOK-' . strtoupper(Str::random(8));
        $bookingFee = $property->price * 0.1;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $request->property_id,
            'booking_code' => $bookingCode,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
            'notes' => $request->notes,
            'total_price' => $bookingFee
        ]);

        $orderId = 'BOOK-' . $booking->id . '-' . time();

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'order_id' => $orderId,
            'amount' => $bookingFee,
            'payment_type' => 'booking_fee',
            'status' => 'pending'
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $bookingFee,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone ?? '',
            ],
            'item_details' => [
                [
                    'id' => $property->id,
                    'price' => (int) $bookingFee,
                    'quantity' => 1,
                    'name' => 'Booking Fee - ' . $property->title
                ]
            ],
            'custom_field1' => 'booking_id: ' . $booking->id
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $payment->update(['midtrans_response' => ['snap_token' => $snapToken]]);
            return redirect()->route('payment.process', ['payment' => $payment->id, 'token' => $snapToken]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        $booking->load(['property', 'payment', 'user']);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Cancel booking.
     */
    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        if ($booking->status !== 'pending') {
            return back()->with('error', 'Booking tidak dapat dibatalkan karena sudah ' . $booking->status);
        }

        $booking->update(['status' => 'cancelled']);

        if ($booking->payment) {
            $booking->payment->update(['status' => 'failed']);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
}