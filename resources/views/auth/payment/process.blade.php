@extends('layouts.app')

@section('title', 'Proses Pembayaran - Dahlan Property')

@section('styles')
    @include('partials.css.payment-css')
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Header -->
                <div class="card-header bg-gradient-primary text-white py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="fw-bold mb-1">
                                <i class="fas fa-credit-card me-2"></i>
                                Proses Pembayaran
                            </h4>
                            <p class="mb-0 opacity-75">Selesaikan pembayaran booking properti Anda</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-3 p-3">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- ===== INPUT HIDDEN UNTUK JS ===== -->
                    <input type="hidden" id="finish-url" value="{{ route('payment.finish') }}">
                    <input type="hidden" id="unfinish-url" value="{{ route('payment.unfinish') }}">
                    <input type="hidden" id="error-url" value="{{ route('payment.error') }}">
                    <input type="hidden" id="snap-token" value="{{ $snapToken }}">
                    
                    <!-- Timer & Status -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="fas fa-clock text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Selesaikan dalam:</h6>
                                <span class="h3 fw-bold text-warning" id="payment-timer">10:00</span>
                            </div>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Order ID</small>
                            <p class="fw-bold mb-0" id="order-id">{{ $payment->order_id }}</p>
                        </div>
                    </div>

                    <!-- Booking Info -->
                    <div class="alert alert-info bg-light border-0 rounded-4 p-4 mb-4">
                        <div class="d-flex">
                            <i class="fas fa-info-circle text-info fa-2x me-3"></i>
                            <div>
                                <h6 class="fw-bold">Informasi Booking</h6>
                                <p class="mb-2">
                                    <strong>Kode Booking:</strong> {{ $payment->booking->booking_code }}<br>
                                    <strong>Tanggal:</strong> {{ $payment->booking->booking_date->format('d M Y') }}<br>
                                    <strong>Waktu:</strong> {{ $payment->booking->booking_time->format('H:i') }} WIB
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Property Info -->
                    @if($payment->booking && $payment->booking->property)
                    <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-4">
                        <img src="{{ $payment->booking->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" 
                             alt="{{ $payment->booking->property->title }}"
                             style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px;"
                             class="me-3">
                        <div>
                            <h6 class="fw-bold mb-1">{{ $payment->booking->property->title }}</h6>
                            <p class="text-muted mb-0">
                                <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                {{ $payment->booking->property->city }}
                            </p>
                        </div>
                    </div>
                    @endif

                    <!-- Payment Details -->
                    <div class="card bg-light border-0 rounded-4 mb-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Detail Pembayaran</h6>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Booking Fee (10%)</span>
                                <span class="fw-bold">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                            </div>
                            
                            <hr class="my-3">
                            
                            <div class="d-flex justify-content-between">
                                <span class="h6 fw-bold">Total Pembayaran</span>
                                <span class="h4 fw-bold text-primary">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods Info -->
                    <div class="mb-4">
                        <small class="text-muted d-block mb-2">
                            <i class="fas fa-shield-alt me-1 text-primary"></i>
                            Pembayaran diproses oleh Midtrans (aman & terenkripsi)
                        </small>
                        <div class="d-flex gap-2">
                            <img src="https://midtrans.com/assets/images/payment-method/visa.svg" height="30" alt="Visa">
                            <img src="https://midtrans.com/assets/images/payment-method/mastercard.svg" height="30" alt="Mastercard">
                            <img src="https://midtrans.com/assets/images/payment-method/bca.svg" height="30" alt="BCA">
                            <img src="https://midtrans.com/assets/images/payment-method/mandiri.svg" height="30" alt="Mandiri">
                            <img src="https://midtrans.com/assets/images/payment-method/bni.svg" height="30" alt="BNI">
                            <img src="https://midtrans.com/assets/images/payment-method/bri.svg" height="30" alt="BRI">
                        </div>
                    </div>

                    <!-- Pay Button -->
                    <button id="pay-button" class="btn btn-primary btn-lg w-100 py-3 rounded-4 shadow-sm">
                        <i class="fas fa-credit-card me-2"></i>
                        Lanjutkan Pembayaran
                    </button>

                    <!-- Cancel Link -->
                    <div class="text-center mt-4">
                        <a href="{{ route('dashboard') }}" class="text-muted text-decoration-none">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Security Badge -->
            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="fas fa-lock me-1"></i>
                    Transaksi aman dengan enkripsi SSL
                </small>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.payment-js')
@endsection