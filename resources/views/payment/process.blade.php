@extends('layouts.app')

@section('title', 'Proses Pembayaran - Dahlan Property')

@section('styles')
    @include('partials.css.payment-css')
    @include('partials.css.payment-process-css')
@endsection

@section('content')
<div class="payment-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="payment-card">
                    <!-- Header -->
                    <div class="payment-header-process">
                        <div class="payment-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h1 class="payment-title">Proses Pembayaran</h1>
                        <p class="payment-subtitle">Selesaikan pembayaran untuk mengkonfirmasi booking Anda</p>
                    </div>

                    <!-- Body -->
                    <div class="payment-body">
                        <!-- Hidden Inputs -->
                        <input type="hidden" id="snapToken" value="{{ $snapToken ?? '' }}">
                        <input type="hidden" id="finishUrl" value="{{ route('payment.finish') }}">
                        <input type="hidden" id="unfinishUrl" value="{{ route('payment.unfinish') }}">
                        <input type="hidden" id="errorUrl" value="{{ route('payment.error') }}">

                        <!-- Timer & Booking Info -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="timer-box">
                                    <div class="timer-icon">
                                        <i class="fas fa-hourglass-half"></i>
                                    </div>
                                    <div class="timer-content">
                                        <div class="timer-label">Selesaikan dalam</div>
                                        <div class="timer-display" id="paymentTimer">10:00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="booking-code-box">
                                    <div class="booking-code-label">Kode Booking</div>
                                    <div class="booking-code-value" id="bookingCode">{{ $payment->booking->booking_code ?? 'BOOK-' . strtoupper(uniqid()) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="charts-section">
                            <div class="row g-4">
                                <div class="col-md-4">
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
                                <div class="col-md-4">
                                    <div class="chart-card">
                                        <div class="chart-title">
                                            <i class="fas fa-chart-line"></i>
                                            Status Pembayaran
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="paymentStatusChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="chart-card">
                                        <div class="chart-title">
                                            <i class="fas fa-chart-bar"></i>
                                            Metode Pembayaran
                                        </div>
                                        <div class="chart-wrapper">
                                            <canvas id="paymentMethodChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Info -->
                        @if(isset($payment->booking->property))
                        <div class="property-info-card">
                            <div class="property-image">
                                <img src="{{ $payment->booking->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="Property">
                            </div>
                            <div class="property-details">
                                <h3>{{ $payment->booking->property->title }}</h3>
                                <p class="location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $payment->booking->property->city }}, {{ $payment->booking->property->province }}
                                </p>
                                <p class="price">Rp {{ number_format($payment->booking->property->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Booking Details -->
                        <div class="booking-details-card">
                            <h5 class="section-title">
                                <i class="fas fa-calendar-alt"></i>
                                Detail Booking
                            </h5>
                            <div class="details-grid">
                                <div class="detail-item">
                                    <span class="detail-label">Tanggal Kunjungan</span>
                                    <span class="detail-value">{{ isset($payment->booking->booking_date) ? \Carbon\Carbon::parse($payment->booking->booking_date)->format('d F Y') : '-' }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Jam Kunjungan</span>
                                    <span class="detail-value">{{ $payment->booking->booking_time ?? '-' }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Nama Pemesan</span>
                                    <span class="detail-value">{{ $payment->user->name ?? Auth::user()->name }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Email</span>
                                    <span class="detail-value">{{ $payment->user->email ?? Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Summary -->
                        <div class="payment-summary-card">
                            <h5 class="section-title">
                                <i class="fas fa-file-invoice"></i>
                                Ringkasan Pembayaran
                            </h5>
                            
                            <div class="summary-row">
                                <span>Booking Fee (10%)</span>
                                <span>Rp {{ number_format($payment->amount ?? 0, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span>PPN (11%)</span>
                                <span>Rp {{ number_format(($payment->amount ?? 0) * 0.11, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="summary-row">
                                <span>Biaya Layanan</span>
                                <span>Rp 5,000</span>
                            </div>
                            
                            <div class="summary-row total">
                                <span>Total</span>
                                <span>Rp {{ number_format(($payment->amount ?? 0) * 1.11 + 5000, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Payment Methods -->
                        <div class="payment-methods-card">
                            <h5 class="section-title">
                                <i class="fas fa-credit-card"></i>
                                Metode Pembayaran
                            </h5>
                            <div class="method-icons">
                                <img src="https://midtrans.com/assets/images/payment-method/visa.svg" alt="Visa">
                                <img src="https://midtrans.com/assets/images/payment-method/mastercard.svg" alt="Mastercard">
                                <img src="https://midtrans.com/assets/images/payment-method/bca.svg" alt="BCA">
                                <img src="https://midtrans.com/assets/images/payment-method/mandiri.svg" alt="Mandiri">
                                <img src="https://midtrans.com/assets/images/payment-method/bni.svg" alt="BNI">
                                <img src="https://midtrans.com/assets/images/payment-method/bri.svg" alt="BRI">
                                <img src="https://midtrans.com/assets/images/payment-method/gopay.svg" alt="GoPay">
                                <img src="https://midtrans.com/assets/images/payment-method/ovo.svg" alt="OVO">
                            </div>
                        </div>

                        <!-- Pay Button -->
                        <button id="payButton" class="payment-btn-primary">
                            <i class="fas fa-credit-card"></i>
                            Lanjutkan Pembayaran
                        </button>

                        <!-- Cancel Link -->
                        <div class="text-center mt-4">
                            <a href="{{ route('dashboard') }}" class="cancel-link">
                                <i class="fas fa-arrow-left"></i>
                                Kembali ke Dashboard
                            </a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Override redirect ke halaman bookings.show setelah sukses
            const payButton = document.getElementById('payButton');
            const snapToken = document.getElementById('snapToken').value;
            const bookingId = '{{ $payment->booking->id ?? 0 }}';

            if (payButton && snapToken) {
                payButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    window.snap.pay(snapToken, {
                        onSuccess: function(result) {
                            // Redirect ke halaman detail booking setelah sukses
                            window.location.href = '/bookings/' + bookingId;
                        },
                        onPending: function(result) {
                            window.location.href = '{{ route("payment.unfinish") }}' + '?order_id=' + result.order_id;
                        },
                        onError: function(result) {
                            window.location.href = '{{ route("payment.error") }}' + '?order_id=' + result.order_id;
                        }
                    });
                });
            }
        });
    </script>
@endsection