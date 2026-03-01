@extends('layouts.app')

@section('title', 'Detail Booking - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/bookings-show.css') }}">
@endsection

@section('content')
<div class="booking-show-wrapper">
    <div class="booking-show-container">
        
        <!-- BACK BUTTON -->
        <a href="{{ route('booking.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Booking
        </a>

        <!-- STATUS BANNER -->
        @php
            $status = $booking->payment->status ?? $booking->status ?? 'pending';
            $statusConfig = match($status) {
                'paid', 'success' => ['class' => 'success', 'icon' => 'fa-check-circle', 'text' => 'Pembayaran Lunas'],
                'pending' => ['class' => 'pending', 'icon' => 'fa-clock', 'text' => 'Menunggu Pembayaran'],
                'cancelled' => ['class' => 'cancelled', 'icon' => 'fa-times-circle', 'text' => 'Dibatalkan'],
                'failed' => ['class' => 'failed', 'icon' => 'fa-exclamation-circle', 'text' => 'Pembayaran Gagal'],
                default => ['class' => 'pending', 'icon' => 'fa-clock', 'text' => 'Menunggu Pembayaran']
            };
        @endphp

        <div class="status-banner status-{{ $statusConfig['class'] }}">
            <div class="status-info">
                <i class="fas {{ $statusConfig['icon'] }}"></i>
                <div>
                    <h3>Status Pembayaran</h3>
                    <p>{{ $statusConfig['text'] }}</p>
                </div>
            </div>
            <div class="booking-code">
                <span>Kode Booking</span>
                <strong>{{ $booking->booking_code }}</strong>
            </div>
        </div>

        <!-- MAIN GRID -->
        <div class="booking-detail-grid">
            
            <!-- LEFT COLUMN -->
            <div class="detail-column">
                
                <!-- Property Info -->
                <div class="detail-card">
                    <h3 class="card-title">
                        <i class="fas fa-building"></i>
                        Informasi Properti
                    </h3>
                    <div class="property-detail">
                        <div class="property-image">
                            <img src="{{ $booking->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="{{ $booking->property->title }}">
                        </div>
                        <div class="property-info">
                            <h4>{{ $booking->property->title }}</h4>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $booking->property->location }}
                            </p>
                            <div class="price-row">
                                <span>Harga Properti</span>
                                <strong>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Details -->
                <div class="detail-card">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i>
                        Detail Booking
                    </h3>
                    <table class="detail-table">
                        <tr>
                            <td>Tanggal Booking</td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB</td>
                        </tr>
                        <tr>
                            <td>Dibuat Pada</td>
                            <td>{{ $booking->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        @if($booking->notes)
                        <tr>
                            <td>Catatan</td>
                            <td>{{ $booking->notes }}</td>
                        </tr>
                        @endif
                    </table>
                </div>

                <!-- Customer Info -->
                @if($booking->user)
                <div class="detail-card">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Informasi Pemesan
                    </h3>
                    <table class="detail-table">
                        <tr>
                            <td>Nama</td>
                            <td>{{ $booking->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $booking->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>{{ $booking->user->phone ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                @endif
            </div>

            <!-- RIGHT COLUMN - PAYMENT -->
            <div class="payment-column">
                <div class="payment-card">
                    <h3 class="card-title">
                        <i class="fas fa-credit-card"></i>
                        Informasi Pembayaran
                    </h3>

                    @if($booking->payment)
                    <div class="payment-details">
                        <div class="payment-row">
                            <span>Order ID</span>
                            <span class="order-id">{{ $booking->payment->order_id }}</span>
                        </div>
                        <div class="payment-row">
                            <span>Metode</span>
                            <span>{{ $booking->payment->payment_method ?? '-' }}</span>
                        </div>
                        <div class="payment-row">
                            <span>Status</span>
                            <span class="payment-status status-{{ $statusConfig['class'] }}">
                                {{ $statusConfig['text'] }}
                            </span>
                        </div>
                        @if($booking->paid_at)
                        <div class="payment-row">
                            <span>Dibayar Pada</span>
                            <span>{{ \Carbon\Carbon::parse($booking->paid_at)->format('d M Y, H:i') }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="price-summary">
                        <div class="price-row">
                            <span>Harga Properti</span>
                            <span>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="price-row">
                            <span>Booking Fee (10%)</span>
                            <span class="fee-amount">Rp {{ number_format($booking->payment->amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="price-row total">
                            <span>Total Dibayar</span>
                            <span class="total-amount">Rp {{ number_format($booking->payment->amount, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        @if($status == 'pending')
                            <a href="{{ route('payment.process', $booking->id) }}" class="btn-pay">
                                <i class="fas fa-credit-card"></i>
                                Bayar Sekarang
                            </a>
                            <button class="btn-cancel" onclick="cancelBooking({{ $booking->id }})">
                                <i class="fas fa-times-circle"></i>
                                Batalkan
                            </button>
                        @endif

                        @if($status == 'paid' || $status == 'success')
                            <a href="#" class="btn-invoice">
                                <i class="fas fa-download"></i>
                                Download Invoice
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- APEXCHARTS 3D SECTION -->
        <div class="apexcharts-3d-section">
            <div class="section-header">
                <div class="header-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="header-text">
                    <h2>Analisis Pembayaran 3D</h2>
                    <p>Visualisasi interaktif komposisi biaya booking</p>
                </div>
                <div class="header-badge">
                    <span class="badge-3d">3D</span>
                </div>
            </div>

            <div class="charts-grid">
                <!-- 3D Pie Chart -->
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Komposisi Biaya</h3>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #3b82f6;"></span>
                                <span>Harga Properti ({{ round(($booking->total_price / ($booking->total_price + ($booking->payment->amount ?? $booking->total_price * 0.1)) * 100)) }}%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #f59e0b;"></span>
                                <span>Booking Fee ({{ round((($booking->payment->amount ?? $booking->total_price * 0.1) / ($booking->total_price + ($booking->payment->amount ?? $booking->total_price * 0.1)) * 100)) }}%)</span>
                            </div>
                        </div>
                    </div>
                    <div id="pieChart3D" class="chart-container"></div>
                </div>

                <!-- 3D Bar Chart - Perbandingan -->
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Perbandingan Nilai</h3>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #3b82f6;"></span>
                                <span>Harga Properti</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #f59e0b;"></span>
                                <span>Booking Fee</span>
                            </div>
                        </div>
                    </div>
                    <div id="barChart3D" class="chart-container"></div>
                </div>
            </div>

            <!-- 3D Donut Chart with Total -->
            <div class="chart-card donut-card">
                <div class="chart-header">
                    <h3>Total Pembayaran</h3>
                    <div class="total-display">
                        <span class="total-label">Total Dibayar:</span>
                        <span class="total-value">Rp {{ number_format(($booking->payment->amount ?? $booking->total_price * 0.1), 0, ',', '.') }}</span>
                    </div>
                </div>
                <div id="donutChart3D" class="chart-container donut-container"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/js/bookings-show.js') }}"></script>
<script>
    window.bookingId = {{ $booking->id }};
    window.csrfToken = '{{ csrf_token() }}';
    window.paymentData = {
        propertyPrice: {{ $booking->total_price ?? 8500000000 }},
        bookingFee: {{ $booking->payment->amount ?? ($booking->total_price * 0.1) ?? 850000000 }},
        total: {{ ($booking->payment->amount ?? ($booking->total_price * 0.1)) ?? 850000000 }}
    };
</script>
@endsection