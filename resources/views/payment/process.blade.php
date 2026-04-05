@extends('layouts.app')

@section('title', 'Pembayaran Booking')

@section('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .payment-amount {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .btn-pay {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s;
    }
    
    .btn-pay:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }
    
    .btn-pay:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Back Button -->
            <a href="{{ route('booking.show', $payment->booking_id) }}" class="btn btn-outline-secondary mb-3">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali ke Detail Booking
            </a>
            
            <!-- Payment Card -->
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">
                        <i class="fas fa-credit-card me-2"></i>
                        Pembayaran Booking
                    </h4>
                </div>
                <div class="card-body p-4">
                    
                    <!-- Alert jika ada error -->
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <!-- Booking Info -->
                    <div class="booking-info mb-4 p-3 bg-light rounded">
                        <h5 class="mb-3">
                            <i class="fas fa-info-circle me-2"></i>Detail Booking
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <strong>Property:</strong><br>
                                    <span class="text-primary">{{ $payment->booking->property->title ?? '-' }}</span>
                                </p>
                                <p class="mb-2">
                                    <strong>Lokasi:</strong><br>
                                    {{ $payment->booking->property->location ?? '-' }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <strong>Kode Booking:</strong><br>
                                    <code>{{ $payment->booking->booking_code ?? '-' }}</code>
                                </p>
                                <p class="mb-2">
                                    <strong>Tanggal Booking:</strong><br>
                                    {{ \Carbon\Carbon::parse($payment->booking->booking_date ?? now())->format('d M Y') }}
                                </p>
                                <p class="mb-0">
                                    <strong>Jam:</strong><br>
                                    {{ $payment->booking->booking_time ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Amount -->
                    <div class="payment-amount text-center mb-4 p-4 rounded text-white">
                        <h5 class="mb-2 opacity-75">Total Pembayaran</h5>
                        <h1 class="mb-0 fw-bold">Rp {{ number_format($payment->amount, 0, ',', '.') }}</h1>
                        <small class="opacity-75">Booking Fee (10% dari harga properti)</small>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="payment-instructions mb-4">
                        <h6 class="mb-3">
                            <i class="fas fa-lightbulb text-warning me-2"></i>Cara Pembayaran:
                        </h6>
                        <ol class="mb-0">
                            <li>Klik tombol <strong>"Bayar Sekarang"</strong> di bawah</li>
                            <li>Pilih metode pembayaran yang tersedia (BCA, Mandiri, GoPay, dll)</li>
                            <li>Ikuti instruksi pembayaran</li>
                            <li>Setelah berhasil, status booking akan otomatis <strong>diupdate</strong></li>
                        </ol>
                    </div>

                    {{-- ✅ FIX: CEK SNAP TOKEN --}}
                    @if(isset($snapToken) && $snapToken)
                        <!-- Midtrans Snap Button -->
                        <div class="text-center mb-4">
                            <button id="pay-button" class="btn btn-pay btn-primary btn-lg px-5 py-3">
                                <i class="fas fa-lock me-2"></i>
                                Bayar Sekarang
                            </button>
                        </div>
                    @else
                        <!-- Error: No Snap Token -->
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Payment Token Tidak Ditemukan!</strong>
                            <br>
                            <small>Silakan hubungi admin atau coba lagi nanti.</small>
                        </div>
                        
                        <div class="text-center">
                            <a href="{{ route('booking.show', $payment->booking_id) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali
                            </a>
                        </div>
                    @endif

                    <!-- Payment Methods -->
                    <div class="payment-methods mt-4 pt-4 border-top">
                        <h6 class="text-center text-muted mb-3">
                            <i class="fas fa-wallet me-2"></i>Metode Pembayaran Tersedia
                        </h6>
                        <div class="row text-center">
                            <div class="col-3 mb-3">
                                <div class="p-2">
                                    <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                                    <br><small>Kartu Kredit</small>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="p-2">
                                    <i class="fas fa-university fa-2x text-success mb-2"></i>
                                    <br><small>Transfer Bank</small>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="p-2">
                                    <i class="fas fa-wallet fa-2x text-warning mb-2"></i>
                                    <br><small>E-Wallet</small>
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="p-2">
                                    <i class="fas fa-store fa-2x text-danger mb-2"></i>
                                    <br><small>Retail</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Notice -->
                    <div class="security-notice text-center mt-4 pt-3 border-top">
                        <p class="text-muted mb-0">
                            <i class="fas fa-shield-alt text-success me-2"></i>
                            <small>Pembayaran aman dengan enkripsi SSL oleh Midtrans</small>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Help Card -->
            <div class="card shadow-sm border-0 mt-4">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <i class="fas fa-headset fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Butuh Bantuan?</h6>
                            <p class="text-muted mb-0 small">
                                Jika mengalami kendala pembayaran, silakan hubungi support kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ✅ FIX: Midtrans Snap JS dengan URL yang benar --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    // ✅ FIX: Check if snap is loaded
    @if(isset($snapToken) && $snapToken)
    document.getElementById('pay-button').addEventListener('click', function() {
        // Disable button saat proses
        const btn = this;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        
        // ✅ FIX: Pass snap_token dengan benar
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                // Pembayaran berhasil
                console.log('Success:', result);
                window.location.href = "{{ route('payment.success', $payment->id) }}";
            },
            onPending: function(result) {
                // Pembayaran pending (menunggu)
                console.log('Pending:', result);
                window.location.href = "{{ route('payment.pending', $payment->id) }}";
            },
            onError: function(result) {
                // Pembayaran error
                console.log('Error:', result);
                window.location.href = "{{ route('payment.failed', $payment->id) }}";
            },
            onClose: function() {
                // User menutup popup tanpa bayar
                alert('Anda menutup popup pembayaran. Silakan klik tombol bayar untuk melanjutkan.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-lock me-2"></i>Bayar Sekarang';
            }
        });
    });
    @endif
</script>
@endsection