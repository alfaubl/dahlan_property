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
     * Process payment page.
     */
    public function process(Request $request)
    {
        $payment = Payment::with('booking.property')->findOrFail($request->payment);
        
        // Pastikan payment milik user yang login
        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('payments.process', [
            'payment' => $payment,
            'snapToken' => $request->token
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
     * Finish payment page.
     */
    public function finish(Request $request)
    {
        return view('payments.finish', ['result' => $request->all()]);
    }

    /**
     * Unfinish payment page.
     */
    public function unfinish(Request $request)
    {
        return view('payments.unfinish', ['result' => $request->all()]);
    }

    /**
     * Error payment page.
     */
    public function error(Request $request)
    {
        return view('payments.error', ['result' => $request->all()]);
    }
}