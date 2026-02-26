<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Midtrans Configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * ==============================
     * LIST BOOKINGS (INDEX)
     * ==============================
     */
    public function index()
    {
        $user = Auth::user();

        $baseQuery = Booking::with(['property'])
            ->where('user_id', $user->id);

        $bookings = (clone $baseQuery)
            ->latest()
            ->paginate(10);

        $totalBookings = (clone $baseQuery)->count();
        $pendingBookings = (clone $baseQuery)->where('status', 'pending')->count();
        $successBookings = (clone $baseQuery)->where('status', 'success')->count();
        $cancelledBookings = (clone $baseQuery)->where('status', 'cancelled')->count();

        $chartCategories = [];
        $chartSuccess = [];
        $chartPending = [];
        $chartCancelled = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $chartCategories[] = Carbon::parse($date)->format('d M');

            $dailyQuery = Booking::where('user_id', $user->id)
                ->whereDate('created_at', $date);

            $chartSuccess[] = (clone $dailyQuery)->where('status', 'success')->count();
            $chartPending[] = (clone $dailyQuery)->where('status', 'pending')->count();
            $chartCancelled[] = (clone $dailyQuery)->where('status', 'cancelled')->count();
        }

        return view('bookings.index', compact(
            'bookings',
            'totalBookings',
            'pendingBookings',
            'successBookings',
            'cancelledBookings',
            'chartCategories',
            'chartSuccess',
            'chartPending',
            'chartCancelled'
        ));
    }

    /**
     * ==============================
     * FORM BOOKING (CREATE)
     * ==============================
     */
    public function create(Request $request)
    {
        $property = Property::findOrFail($request->property_id);

        if ($property->status !== 'available') {
            return redirect()
                ->route('properties.show', $property->id)
                ->with('error', 'Properti tidak tersedia untuk booking.');
        }

        return view('bookings.create', compact('property'));
    }

    /**
     * ==============================
     * SIMPAN BOOKING (STORE)
     * ==============================
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required',
            'notes' => 'nullable|string|max:500'
        ]);

        $user = Auth::user();
        $property = Property::findOrFail($request->property_id);

        if ($property->status !== 'available') {
            return back()->with('error', 'Properti tidak tersedia.');
        }

        // Generate kode booking
        $bookingCode = 'BOOK-' . strtoupper(Str::random(8));
        $bookingFee = $property->price * 0.1; // 10% dari harga

        // Simpan booking
        $booking = Booking::create([
            'user_id' => $user->id,
            'property_id' => $property->id,
            'booking_code' => $bookingCode,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
            'notes' => $request->notes,
            'total_price' => $property->price,
        ]);

        // Buat order ID untuk Midtrans
        $orderId = 'BOOK-' . $booking->id . '-' . time();

        // Simpan payment
        $payment = Payment::create([
            'user_id' => $user->id,
            'booking_id' => $booking->id,
            'order_id' => $orderId,
            'amount' => $bookingFee,
            'payment_type' => 'booking_fee',
            'status' => 'pending'
        ]);

        // Parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $bookingFee,
            ],
            'customer_details' => [
                'first_name' => $user->name ?? '',
                'email' => $user->email ?? '',
                'phone' => $user->phone ?? '',
            ],
        ];

        try {
            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // Update payment dengan snap token
            $payment->update([
                'snap_token' => $snapToken,
                'midtrans_response' => json_encode(['snap_token' => $snapToken])
            ]);

            // Redirect ke halaman payment process
            return redirect()->route('payment.process', $payment->id);

        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal memproses pembayaran.');
        }
    }

    /**
     * ==============================
     * DETAIL BOOKING (SHOW)
     * ==============================
     */
    public function show(Booking $booking)
    {
        // Cek kepemilikan
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        // Load relasi
        $booking->load(['property', 'payment', 'user']);

        return view('bookings.show', compact('booking'));
    }

    /**
     * ==============================
     * CANCEL BOOKING (CANCEL)
     * ==============================
     */
    public function cancel(Booking $booking)
    {
        // Cek kepemilikan
        if ($booking->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Cek status
        if ($booking->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak dapat dibatalkan'
            ]);
        }

        // Update status booking
        $booking->update(['status' => 'cancelled']);

        // Update status payment jika ada
        if ($booking->payment) {
            $booking->payment->update(['status' => 'failed']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dibatalkan'
        ]);
    }
}