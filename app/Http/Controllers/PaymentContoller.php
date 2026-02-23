<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class PaymentController extends Controller
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
     * Process payment page (dipanggil dari BookingController)
     */
    public function process(Request $request)
    {
        $payment = Payment::with('booking.property', 'user')
            ->where('id', $request->payment)
            ->firstOrFail();
        
        // Pastikan payment milik user yang login
        if ($payment->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        // Ambil snap token dari midtrans_response atau dari request
        $snapToken = $request->token ?? ($payment->midtrans_response['snap_token'] ?? null);

        if (!$snapToken) {
            // Jika token tidak ada, generate ulang
            $params = [
                'transaction_details' => [
                    'order_id' => $payment->order_id,
                    'gross_amount' => (int) $payment->amount,
                ],
                'customer_details' => [
                    'first_name' => $payment->user->name,
                    'email' => $payment->user->email,
                    'phone' => $payment->user->phone ?? '',
                ],
            ];
            
            $snapToken = Snap::getSnapToken($params);
            
            // Simpan token baru
            $payment->update(['midtrans_response' => ['snap_token' => $snapToken]]);
        }

        return view('payments.process', [
            'payment' => $payment,
            'snapToken' => $snapToken
        ]);



    }

    /**
     * Handle payment notification from Midtrans.
     */
    public function notification(Request $request)
    {
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;

        // Cari payment berdasarkan order_id
        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Update status payment berdasarkan notifikasi
        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $payment->status = 'pending';
                } else {
                    $payment->status = 'paid';
                }
            }
        } elseif ($transaction == 'settlement') {
            $payment->status = 'paid';
        } elseif ($transaction == 'pending') {
            $payment->status = 'pending';
        } elseif ($transaction == 'deny') {
            $payment->status = 'failed';
        } elseif ($transaction == 'expire') {
            $payment->status = 'expired';
        } elseif ($transaction == 'cancel') {
            $payment->status = 'failed';
        }

        $payment->transaction_id = $notif->transaction_id;
        $payment->payment_method = $type;
        $payment->midtrans_response = $notif->getResponse();
        $payment->save();

        // Update status booking jika payment sukses
        if ($payment->status === 'paid' && $payment->booking_id) {
            $payment->booking->update(['status' => 'confirmed']);
        }

        return response()->json(['message' => 'Notification processed']);
    }

    /**
     * Finish payment page (redirect dari Midtrans)
     */
    public function finish(Request $request)
    {
        $orderId = $request->order_id;
        
        // Cari payment berdasarkan order_id
        $payment = Payment::where('order_id', $orderId)->first();
        
        if ($payment && $payment->booking_id) {
            // Redirect ke halaman detail booking
            return redirect()->route('bookings.show', $payment->booking_id)
                ->with('success', 'Pembayaran berhasil! Booking Anda telah dikonfirmasi.');
        }

        // Fallback ke halaman finish biasa
        return view('payments.finish', ['result' => $request->all()]);
    }

    /**
     * Unfinish payment page (redirect dari Midtrans)
     */
    public function unfinish(Request $request)
    {
        return view('payments.unfinish', ['result' => $request->all()]);
    }

    /**
     * Error payment page (redirect dari Midtrans)
     */
    public function error(Request $request)
    {
        return view('payments.error', ['result' => $request->all()]);
    }

    /**
     * Check payment status (untuk AJAX)
     */
    public function checkStatus($id)
    {
        $payment = Payment::findOrFail($id);
        
        if ($payment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json([
            'status' => $payment->status,
            'booking_id' => $payment->booking_id
        ]);
    }

    
}