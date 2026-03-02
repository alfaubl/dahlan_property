<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class PaymentController extends Controller
{
    /**
     * Constructor - Setup Midtrans Configuration
     */
    public function __construct()
    {
        // Load konfigurasi Midtrans dari config
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized', true);
        Config::$is3ds = config('midtrans.is_3ds', true);
        
        // ✅ FIX: Set connection timeout untuk prevent timeout 60s
        Config::$curlOptions = [
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 60,
        ];
    }

    /**
     * ✅ Process Payment - Show Payment Page
     */
    public function process($paymentId, $token = null)
    {
        try {
            // Load payment dengan relasi
            $payment = Payment::with(['booking', 'booking.property', 'user'])->findOrFail($paymentId);
            
            // Validasi ownership
            if ($payment->booking->user_id !== Auth::id()) {
                abort(403, 'Unauthorized');
            }

            // Cek apakah sudah ada snap_token
            if (!$payment->snap_token) {
                // Generate snap token jika belum ada
                $snapToken = $this->generateSnapTokenFromPayment($payment);
                
                if (isset($snapToken['error'])) {
                    return redirect()->route('booking.show', $payment->booking_id)
                        ->with('error', 'Gagal memproses pembayaran: ' . ($snapToken['error'] ?? 'Unknown error'));
                }
                
                $payment->update(['snap_token' => $snapToken['snap_token']]);
            }

            // Return view payment process
            return view('payment.process', [
                'payment' => $payment,
                'booking' => $payment->booking,
                'snapToken' => $payment->snap_token
            ]);
            
        } catch (Exception $e) {
            Log::error('Payment Process Error: ' . $e->getMessage());
            
            return redirect()->route('booking.show', $payment->booking_id ?? 1)
                ->with('error', 'Terjadi kesalahan: ' . substr($e->getMessage(), 0, 100));
        }
    }

    /**
     * ✅ Generate Snap Token untuk frontend Snap.js
     */
    public function generateSnapToken(Booking $booking)
    {
        // Validasi ownership
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Check payment_status atau status
        $paymentStatus = $booking->payment_status ?? $booking->status ?? '';
        if ($paymentStatus === 'paid' || $paymentStatus === 'success') {
            return response()->json(['error' => 'Booking already paid'], 400);
        }

        // Cek apakah sudah ada payment record
        $payment = Payment::where('booking_id', $booking->id)->first();
        
        if (!$payment) {
            return response()->json(['error' => 'Payment record not found'], 404);
        }

        $params = [
            'transaction_details' => [
                'order_id' => $payment->order_id ?? $booking->order_id ?? 'BOOK-' . $booking->id . '-' . time(),
                'gross_amount' => (int) ($booking->total_amount ?? $payment->amount ?? $booking->total_price ?? 0),
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
            'enabled_payments' => [
                'credit_card',
                'bca_va',
                'bni_va',
                'bri_va',
                'mandiri_va',
                'gopay',
                'shopeepay',
                'qris',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            
            // Update payment dengan snap_token
            $payment->update(['snap_token' => $snapToken]);
            
            return response()->json(['snap_token' => $snapToken]);
            
        } catch (Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage(), [
                'order_id' => $payment->order_id ?? $booking->order_id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'error' => 'Failed to generate payment token',
                'message' => substr($e->getMessage(), 0, 200)
            ], 500);
        }
    }

    /**
     * ✅ HELPER: Generate Snap Token dari Payment (untuk method process)
     */
    private function generateSnapTokenFromPayment(Payment $payment)
    {
        try {
            $booking = $payment->booking;
            
            $params = [
                'transaction_details' => [
                    'order_id' => $payment->order_id ?? 'BOOK-' . $payment->id . '-' . time(),
                    'gross_amount' => (int) $payment->amount,
                ],
                'customer_details' => [
                    'first_name' => $payment->user->name ?? 'Customer',
                    'email' => $payment->user->email ?? '',
                    'phone' => $payment->user->phone ?? '',
                ],
                'item_details' => [
                    [
                        'id' => 'BOOKING-FEE',
                        'price' => (int) $payment->amount,
                        'quantity' => 1,
                        'name' => 'Booking Fee - ' . substr($booking->property->title ?? 'Property', 0, 50),
                    ],
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
                'enabled_payments' => [
                    'credit_card',
                    'bca_va',
                    'bni_va',
                    'bri_va',
                    'mandiri_va',
                    'gopay',
                    'shopeepay',
                    'qris',
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            
            return ['snap_token' => $snapToken];
            
        } catch (Exception $e) {
            Log::error('Generate Snap Token From Payment Error: ' . $e->getMessage());
            
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * ✅ Handle Midtrans Server Notification (Webhook)
     */
    public function notification(Request $request)
    {
        try {
            /** @var \Midtrans\Notification $notification */
            $notification = new Notification();
            
            // ✅ FIX: Akses property langsung (bukan toArray) untuk fix Intelephense error
            $notificationData = [
                'order_id' => $notification->order_id,
                'transaction_status' => $notification->transaction_status,
                'fraud_status' => $notification->fraud_status,
                'payment_type' => $notification->payment_type,
                'gross_amount' => $notification->gross_amount,
            ];
            
            Log::info('Midtrans Notification Received', $notificationData);

            $orderId = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status;

            $payment = Payment::where('order_id', $orderId)->first();
            
            if (!$payment) {
                Log::warning('Payment not found for order_id: ' . $orderId);
                return response()->json(['error' => 'Payment not found'], 404);
            }

            DB::beginTransaction();
            try {
                switch ($transactionStatus) {
                    case 'capture':
                    case 'settlement':
                        $newStatus = ($fraudStatus === 'challenge') ? 'challenge' : 'paid';
                        $payment->update([
                            'status' => $newStatus,
                            'paid_at' => $newStatus === 'paid' ? now() : null,
                            'midtrans_response' => json_encode($notificationData)
                        ]);
                        
                        if ($newStatus === 'paid') {
                            if (isset($payment->booking->payment_status)) {
                                $payment->booking->update(['payment_status' => 'paid']);
                            }
                            if (isset($payment->booking->status)) {
                                $payment->booking->update(['status' => 'success']);
                            }
                        }
                        break;
                        
                    case 'cancel':
                    case 'deny':
                    case 'expire':
                        $payment->update([
                            'status' => 'cancelled',
                            'midtrans_response' => json_encode($notificationData)
                        ]);
                        
                        if (isset($payment->booking->payment_status)) {
                            $payment->booking->update(['payment_status' => 'cancelled']);
                        }
                        if (isset($payment->booking->status)) {
                            $payment->booking->update(['status' => 'cancelled']);
                        }
                        break;
                        
                    case 'pending':
                        $payment->update([
                            'status' => 'pending',
                            'midtrans_response' => json_encode($notificationData)
                        ]);
                        break;
                }

                DB::commit();
                Log::info('Payment updated: ' . $orderId);
                return response()->json(['status' => 'success']);
                
            } catch (Exception $e) {
                DB::rollBack();
                Log::error('Payment Update Error: ' . $e->getMessage());
                return response()->json(['error' => 'Failed to update payment'], 500);
            }
            
        } catch (Exception $e) {
            Log::error('Notification Error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid notification'], 400);
        }
    }

    /**
     * ✅ Handle redirect setelah pembayaran selesai (Finish)
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

    /**
     * ✅ Handle unpaid transaction
     */
    public function unfinish(Request $request)
    {
        return redirect()->route('dashboard')
            ->with('info', 'Payment is pending. Please complete your payment.');
    }

    /**
     * ✅ Handle payment error
     */
    public function error(Request $request)
    {
        return redirect()->route('dashboard')
            ->with('error', 'Payment failed. Please try again.');
    }

    /**
     * ✅ Payment success page
     */
    public function success(Payment $payment)
    {
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return redirect()->route('booking.show', $payment->booking_id)
            ->with('success', 'Payment successful!');
    }

    /**
     * ✅ Payment failed page
     */
    public function failed(Payment $payment)
    {
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return redirect()->route('booking.show', $payment->booking_id)
            ->with('error', 'Payment failed. Please try again.');
    }

    /**
     * ✅ Retry payment
     */
    public function retry(Payment $payment)
    {
        if ($payment->booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        return redirect()->route('booking.show', $payment->booking_id)
            ->with('info', 'Please retry your payment.');
    }

    /**
     * ✅ Check payment status
     */
    public function checkStatus($id)
    {
        $payment = Payment::where('id', $id)
            ->whereHas('booking', fn($q) => $q->where('user_id', auth()->id()))
            ->firstOrFail();

        return response()->json([
            'status' => $payment->status,
            'payment_status' => $payment->booking->payment_status ?? $payment->booking->status,
            'snap_token' => $payment->snap_token,
        ]);
    }

    /**
     * ✅ Pending payment page (untuk route payment.pending)
     */
    public function pending(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        return view('payment.pending', compact('booking'));
    }
}