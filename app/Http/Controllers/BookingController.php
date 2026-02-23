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

class BookingController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
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

        // Buat booking code unik
        $bookingCode = 'BOOK-' . strtoupper(Str::random(8));

        // Hitung booking fee (10% dari harga)
        $bookingFee = $property->price * 0.1;

        // Simpan booking
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $request->property_id,
            'booking_code' => $bookingCode,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        // Buat order ID untuk Midtrans
        $orderId = 'BOOK-' . $booking->id . '-' . time();

        // Simpan payment record
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'order_id' => $orderId,
            'amount' => $bookingFee,
            'payment_type' => 'booking_fee',
            'status' => 'pending'
        ]);

        // Siapkan parameter untuk Midtrans Snap
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
            // Dapatkan Snap token
            $snapToken = Snap::getSnapToken($params);
            
            // Update payment dengan snap token
            $payment->update(['midtrans_response' => ['snap_token' => $snapToken]]);

            // Redirect ke halaman payment process
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
        // Pastikan booking milik user yang login atau user adalah admin
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        // Load relasi
        $booking->load(['property', 'payment', 'user']);

        return view('bookings.show', compact('booking'));
    }

    /**
     * Cancel booking.
     */
    public function cancel(Booking $booking)
    {
        // Pastikan booking milik user yang login
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        // Hanya booking dengan status pending yang bisa dibatalkan
        if ($booking->status !== 'pending') {
            return back()->with('error', 'Booking tidak dapat dibatalkan karena sudah ' . $booking->status);
        }

        $booking->update(['status' => 'cancelled']);

        // Update payment status juga
        if ($booking->payment) {
            $booking->payment->update(['status' => 'failed']);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Booking berhasil dibatalkan.');
    }

    /**
     * Get user's bookings (untuk dashboard)
     */
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('property')
            ->latest()
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }
}