<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Load konfigurasi Midtrans dari config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized', true);
        Config::$is3ds = config('midtrans.is_3ds', true);
    }

    /**
     * Generate Snap Token untuk frontend Snap.js
     */
    public function generateSnapToken(Booking $booking)
    {
        // Validasi ownership
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($booking->payment_status === 'paid') {
            return response()->json(['error' => 'Booking already paid'], 400);
        }

        $params = [
            'transaction_details' => [
                'order_id' => $booking->order_id,
                'gross_amount' => (int) $booking->total_amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name ?? 'Customer',
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone ?? '',
            ],
            'callbacks' => [
                'finish' => route('payment.finish'),
                'unfinish' => route('payment.unfinish'),
                'error' => route('payment.error'),
            ],
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'minutes',
                'duration' => 60,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage(), [
                'order_id' => $booking->order_id,
                'error' => $e->getMessage()
            ]);
            return response()->json(['error' => 'Failed to generate payment token'], 500);
        }
    }

    /**
     * Handle Midtrans Server Notification (Webhook)
     */
    public function notification(Request $request)
    {
        $notification = $request->all();
        Log::info('Midtrans Notification Received', $notification);

        $orderId = $notification['order_id'] ?? null;
        $transactionStatus = $notification['transaction_status'] ?? null;
        $fraudStatus = $notification['fraud_status'] ?? null;

        $payment = Payment::where('order_id', $orderId)->first();
        
        if (!$payment) {
            Log::warning('Payment not found for order_id: ' . $orderId);
            return response()->json(['error' => 'Payment not found'], 404);
        }

        switch ($transactionStatus) {
            case 'capture':
            case 'settlement':
                $newStatus = ($fraudStatus === 'challenge') ? 'challenge' : 'paid';
                $payment->update(['status' => $newStatus]);
                if ($newStatus === 'paid') {
                    $payment->booking->update(['payment_status' => 'paid']);
                }
                break;
            case 'cancel':
            case 'deny':
            case 'expire':
                $payment->update(['status' => 'cancelled']);
                break;
            case 'pending':
                $payment->update(['status' => 'pending']);
                break;
        }

        Log::info('Payment updated: ' . $orderId);
        return response()->json(['status' => 'success']);
    }

    /**
     * Handle redirect setelah pembayaran selesai (Finish)
     */
    public function finish(Request $request)
    {
        $orderId = $request->query('order_id') ?? $request->segment(3);
        
        $payment = Payment::where('order_id', $orderId)
            ->whereHas('booking', fn($q) => $q->where('user_id', auth()->id()))
            ->first();

        if (!$payment) {
            return redirect()->route('dashboard')->with('error', 'Payment not found');
        }

        return redirect()->route('booking.show', $payment->booking_id)
            ->with('success', 'Payment process completed. Please check your booking status.');
    }

    public function unfinish(Request $request)
    {
        return redirect()->route('dashboard')
            ->with('info', 'Payment is pending. Please complete your payment.');
    }

    public function error(Request $request)
    {
        return redirect()->route('dashboard')
            ->with('error', 'Payment failed. Please try again.');
    }

    public function success(Payment $payment)
    {
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return redirect()->route('booking.show', $payment->booking_id)
            ->with('success', 'Payment successful!');
    }

    public function failed(Payment $payment)
    {
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return redirect()->route('booking.show', $payment->booking_id)
            ->with('error', 'Payment failed. Please try again.');
    }

    public function retry(Payment $payment)
    {
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return redirect()->route('booking.show', $payment->booking_id)
            ->with('info', 'Please retry your payment.');
    }

    public function checkStatus($id)
    {
        $payment = Payment::where('id', $id)
            ->whereHas('booking', fn($q) => $q->where('user_id', auth()->id()))
            ->firstOrFail();

        return response()->json([
            'status' => $payment->status,
            'payment_status' => $payment->booking->payment_status,
        ]);
    }

    public function process($paymentId, $token = null)
    {
        $payment = Payment::findOrFail($paymentId);
        
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return redirect()->route('booking.show', $payment->booking_id);
    }
}