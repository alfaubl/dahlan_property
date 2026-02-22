@extends('layouts.app')

@section('title', 'Proses Pembayaran - Dahlan Property')

@section('styles')
    @include('partials.css.payment-process-css')
@endsection

@section('content')
<div class="payment-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="payment-card">
                    <!-- Header -->
                    <div class="payment-header">
                        <h1>Proses Pembayaran</h1>
                        <p>Selesaikan pembayaran Anda untuk mengkonfirmasi booking properti</p>
                    </div>

                    <!-- Body -->
                    <div class="payment-body">
                        <!-- Hidden Inputs for JS -->
                        <input type="hidden" id="snapToken" value="{{ $snapToken ?? '' }}">
                        <input type="hidden" id="finishUrl" value="{{ route('payment.finish') }}">
                        <input type="hidden" id="unfinishUrl" value="{{ route('payment.unfinish') }}">
                        <input type="hidden" id="errorUrl" value="{{ route('payment.error') }}">
                        <input type="hidden" id="paymentAmount" value="{{ $payment->amount ?? 0 }}">

                        <!-- Timer & Order ID -->
                        <div class="timer-section">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="timer-wrapper">
                                        <div class="timer-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="timer-content">
                                            <div class="timer-label">Selesaikan dalam</div>
                                            <div class="timer-display" id="paymentTimer">10:00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="order-id-box">
                                        <div class="label">Order ID</div>
                                        <div class="value" id="orderId">{{ $payment->order_id ?? 'BOOK-' . time() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="charts-section">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="chart-card">
                                        <div class="chart-title">
                                            <i class="fas fa-chart-pie"></i>
                                            Rincian Pembayaran
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="paymentBreakdownChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart-card">
                                        <div class="chart-title">
                                            <i class="fas fa-chart-line"></i>
                                            Tren Pembayaran
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="paymentTrendChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Info -->
                        @if(isset($payment->booking))
                        <div class="booking-info">
                            <div class="booking-code">
                                <i class="fas fa-ticket-alt me-2"></i>
                                Kode Booking: {{ $payment->booking->booking_code }}
                            </div>
                            <div class="booking-details">
                                <div class="booking-detail-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($payment->booking->booking_date)->format('d F Y') }}</span>
                                </div>
                                <div class="booking-detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $payment->booking->booking_time }}</span>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Property Info -->
                        @if(isset($payment->booking->property))
                        <div class="property-info">
                            <div class="property-image">
                                <img src="{{ $payment->booking->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="Property">
                            </div>
                            <div class="property-details">
                                <div class="property-title">{{ $payment->booking->property->title }}</div>
                                <div class="property-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $payment->booking->property->city }}, {{ $payment->booking->property->province }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Payment Details -->
                        <div class="payment-details">
                            <h5 class="fw-bold mb-3">Detail Pembayaran</h5>
                            
                            <div class="detail-row">
                                <span class="detail-label">Booking Fee (10%)</span>
                                <span class="detail-value">Rp {{ number_format($payment->amount ?? 0, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="detail-row">
                                <span class="detail-label">PPN (11%)</span>
                                <span class="detail-value">Rp {{ number_format(($payment->amount ?? 0) * 0.11, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="detail-row">
                                <span class="detail-label">Biaya Layanan</span>
                                <span class="detail-value">Rp {{ number_format(5000, 0, ',', '.') }}</span>
                            </div>
                            
                            <hr>
                            
                            <div class="detail-row total-row">
                                <span class="detail-label fw-bold">Total Pembayaran</span>
                                <span class="total-value fw-bold">Rp {{ number_format(($payment->amount ?? 0) * 1.11 + 5000, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Payment Methods -->
                        <div class="payment-methods">
                            <div class="methods-title">Metode Pembayaran Tersedia</div>
                            <div class="method-icons">
                                <img src="https://midtrans.com/assets/images/payment-method/visa.svg" alt="Visa">
                                <img src="https://midtrans.com/assets/images/payment-method/mastercard.svg" alt="Mastercard">
                                <img src="https://midtrans.com/assets/images/payment-method/bca.svg" alt="BCA">
                                <img src="https://midtrans.com/assets/images/payment-method/mandiri.svg" alt="Mandiri">
                                <img src="https://midtrans.com/assets/images/payment-method/bni.svg" alt="BNI">
                                <img src="https://midtrans.com/assets/images/payment-method/bri.svg" alt="BRI">
                                <img src="https://midtrans.com/assets/images/payment-method/permata.svg" alt="Permata">
                                <img src="https://midtrans.com/assets/images/payment-method/gopay.svg" alt="GoPay">
                                <img src="https://midtrans.com/assets/images/payment-method/ovo.svg" alt="OVO">
                            </div>
                        </div>

                        <!-- Pay Button -->
                        <button id="payButton" class="pay-button">
                            <i class="fas fa-credit-card"></i>
                            Lanjutkan Pembayaran
                        </button>

                        <!-- Security Badge -->
                        <div class="security-badge">
                            <i class="fas fa-lock"></i>
                            Transaksi aman dengan enkripsi SSL
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.payment-process-js')
@endsection