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

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        $user = Auth::user();

        $bookings = Booking::with(['property', 'payment'])
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        $totalBookings = Booking::where('user_id', $user->id)->count();
        $pendingBookings = Booking::where('user_id', $user->id)->where('status', 'pending')->count();
        $successBookings = Booking::where('user_id', $user->id)->where('status', 'success')->count();
        $cancelledBookings = Booking::where('user_id', $user->id)->where('status', 'cancelled')->count();

        // Chart data
        $chartSuccess = [];
        $chartPending = [];
        $chartCancelled = [];
        $chartCategories = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartCategories[] = $date->format('d M');

            $dayQuery = Booking::where('user_id', $user->id)->whereDate('created_at', $date);

            $chartSuccess[] = (clone $dayQuery)->where('status', 'success')->count();
            $chartPending[] = (clone $dayQuery)->where('status', 'pending')->count();
            $chartCancelled[] = (clone $dayQuery)->where('status', 'cancelled')->count();
        }

        return view('bookings.index', compact(
            'bookings',
            'totalBookings',
            'pendingBookings',
            'successBookings',
            'cancelledBookings',
            'chartSuccess',
            'chartPending',
            'chartCancelled',
            'chartCategories'
        ));
    }
    
    // ✅ FIX: Ganti parameter dari Request jadi $property (dari route)
    public function create(Property $property)
    {
        // ✅ Tetap pakai logic Anda, hanya ganti cara ambil property

        if ($property->status !== 'available') {
            return redirect()
                ->route('properties.show', $property->id)
                ->with('error', 'Properti tidak tersedia untuk booking.');
        }

        return view('bookings.create', compact('property'));
    }

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

        $bookingCode = 'BOOK-' . strtoupper(Str::random(8));
        $bookingFee = $property->price * 0.1;

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

        $orderId = 'BOOK-' . $booking->id . '-' . time();

        $payment = Payment::create([
            'user_id' => $user->id,
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
                'first_name' => $user->name ?? '',
                'email' => $user->email ?? '',
                'phone' => $user->phone ?? '',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $payment->update([
                'snap_token' => $snapToken,
                'midtrans_response' => json_encode(['snap_token' => $snapToken])
            ]);

            return redirect()->route('payment.process', $payment->id);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal memproses pembayaran.');
        }
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        $booking->load(['property', 'payment', 'user']);

        $stats = [
            'paid' => Booking::where('user_id', Auth::id())->where('status', 'success')->count(),
            'pending' => Booking::where('user_id', Auth::id())->where('status', 'pending')->count(),
            'failed' => Booking::where('user_id', Auth::id())->where('status', 'cancelled')->count(),
            'cancelled' => Booking::where('user_id', Auth::id())->where('status', 'cancelled')->count(),
            'total' => Booking::where('user_id', Auth::id())->count()
        ];

        return view('bookings.show', compact('booking', 'stats'));
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        if ($booking->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak dapat dibatalkan'
            ]);
        }

        $booking->update(['status' => 'cancelled']);

        if ($booking->payment) {
            $booking->payment->update(['status' => 'failed']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dibatalkan'
        ]);
    }
}