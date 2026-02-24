@extends('layouts.app')

@section('title', 'Pembayaran Gagal')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow border-0 text-center">
                <div class="card-body p-5">
                    <!-- Failed Icon -->
                    <div class="mb-4">
                        <i class="fas fa-times-circle text-danger" style="font-size: 6rem;"></i>
                    </div>
                    
                    <h2 class="mb-3 fw-bold text-danger">Pembayaran Gagal</h2>
                    <p class="text-muted mb-4">
                        Maaf, pembayaran Anda tidak berhasil diproses. Silakan coba lagi atau hubungi support.
                    </p>
                    
                    <!-- Payment Info -->
                    <div class="payment-info bg-light rounded p-4 mb-4 text-start">
                        <h5 class="mb-3 border-bottom pb-2">
                            <i class="fas fa-info-circle me-2"></i>Informasi Pembayaran
                        </h5>
                        <p class="mb-2">
                            <strong>Kode Booking:</strong> {{ $payment->booking->booking_code ?? '-' }}
                        </p>
                        <p class="mb-2">
                            <strong>Property:</strong> {{ $payment->booking->property->title ?? '-' }}
                        </p>
                        <p class="mb-0">
                            <strong>Total:</strong> Rp {{ number_format($payment->amount, 0, ',', '.') }}
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <form action="{{ route('payment.retry', $payment->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-2">
                                <i class="fas fa-redo me-2"></i>Coba Bayar Lagi
                            </button>
                        </form>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home me-2"></i>Kembali ke Dashboard
                        </a>
                        {{-- ✅ PERBAIKAN: Ganti dengan nomor WhatsApp asli Anda --}}
                        <a href="https://wa.me/6281234567890" class="btn btn-outline-success">
                            <i class="fab fa-whatsapp me-2"></i>Hubungi Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection