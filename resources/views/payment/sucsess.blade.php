@extends('layouts.app')

@section('title', 'Pembayaran Berhasil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow border-0 text-center">
                <div class="card-body p-5">
                    <!-- Success Icon -->
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 6rem;"></i>
                    </div>
                    
                    <h2 class="mb-3 fw-bold text-success">Pembayaran Berhasil!</h2>
                    <p class="text-muted mb-4">
                        Terima kasih, pembayaran booking Anda telah berhasil diproses.
                    </p>
                    
                    <!-- Booking Summary -->
                    <div class="booking-summary bg-light rounded p-4 mb-4 text-start">
                        <h5 class="mb-3 border-bottom pb-2">
                            <i class="fas fa-receipt me-2"></i>Ringkasan Pembayaran
                        </h5>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-2 text-muted small">Kode Booking</p>
                                <p class="mb-3 fw-bold">{{ $payment->booking->booking_code ?? '-' }}</p>
                                
                                <p class="mb-2 text-muted small">Property</p>
                                <p class="mb-3 fw-bold">{{ $payment->booking->property->title ?? '-' }}</p>
                            </div>
                            <div class="col-6">
                                <p class="mb-2 text-muted small">Tanggal Booking</p>
                                <p class="mb-3 fw-bold">{{ \Carbon\Carbon::parse($payment->booking->booking_date ?? now())->format('d M Y') }}</p>
                                
                                <p class="mb-2 text-muted small">Total Bayar</p>
                                <p class="mb-3 fw-bold text-success">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        
                        <div class="alert alert-success mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            <small>Konfirmasi booking telah dikirim ke email Anda.</small>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        {{-- ✅ PERBAIKAN: Route harus konsisten dengan web.php --}}
                        <a href="{{ route('booking.show', $payment->booking_id) }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-eye me-2"></i>Lihat Detail Booking
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home me-2"></i>Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection