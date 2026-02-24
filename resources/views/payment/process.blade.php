@extends('layouts.app')

@section('title', 'Pembayaran Booking')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Payment Card -->
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">
                        <i class="fas fa-credit-card me-2"></i>
                        Pembayaran Booking
                    </h4>
                </div>
                <div class="card-body p-4">
                    <!-- Booking Info -->
                    <div class="booking-info mb-4 p-3 bg-light rounded">
                        <h5 class="mb-3"><i class="fas fa-info-circle me-2"></i>Detail Booking</h5>
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
                    <div class="payment-amount text-center mb-4 p-4 bg-gradient-primary rounded text-white" 
                         style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <h5 class="mb-2 opacity-75">Total Pembayaran</h5>
                        <h1 class="mb-0 fw-bold">Rp {{ number_format($payment->amount, 0, ',', '.') }}</h1>
                        <small class="opacity-75">Booking Fee (10% dari harga properti)</small>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="payment-instructions mb-4">
                        <h6 class="mb-3"><i class="fas fa-lightbulb text-warning me-2"></i>Cara Pembayaran:</h6>
                        <ol class="mb-0">
                            <li>Klik tombol <strong>"Bayar Sekarang"</strong> di bawah</li>
                            <li>Pilih metode pembayaran yang tersedia</li>
                            <li>Ikuti instruksi pembayaran</li>
                            <li>Setelah berhasil, status booking akan otomatis <strong>diupdate</strong></li>
                        </ol>
                    </div>

                    <!-- Midtrans Snap Button -->
                    <div class="text-center mb-4">
                        {{-- ✅ PERBAIKAN: Pastikan variable $snapToken tersedia dari controller --}}
                        <button id="pay-button" class="btn btn-primary btn-lg px-5 py-3">
                            <i class="fas fa-lock me-2"></i>
                            Bayar Sekarang
                        </button>
                    </div>

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

<!-- Midtrans Snap JS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function() {
        // Disable button saat proses
        this.disabled = true;
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        
        // ✅ PERBAIKAN: Pastikan variable $snapToken tersedia
        snap.pay('{{ $snapToken ?? $token ?? "" }}', {
            onSuccess: function(result) {
                // Pembayaran berhasil
                window.location.href = "{{ route('payment.success', $payment->id) }}";
            },
            onPending: function(result) {
                // Pembayaran pending (menunggu)
                window.location.href = "{{ route('payment.success', $payment->id) }}";
            },
            onError: function(result) {
                // Pembayaran error
                window.location.href = "{{ route('payment.failed', $payment->id) }}";
            },
            onClose: function() {
                // User menutup popup tanpa bayar
                alert('Anda menutup popup pembayaran. Silakan klik tombol bayar untuk melanjutkan.');
                document.getElementById('pay-button').disabled = false;
                document.getElementById('pay-button').innerHTML = '<i class="fas fa-lock me-2"></i>Bayar Sekarang';
            }
        });
    });
</script>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>
@endsection