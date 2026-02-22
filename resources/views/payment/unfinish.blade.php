@extends('layouts.app')

@section('title', 'Pembayaran Tertunda - Dahlan Property')

@section('styles')
    @include('partials.css.payment-css')
    @include('partials.css.payment-unfinish-css')
@endsection

@section('content')
<div class="payment-status-container">
    <div class="status-card">
        <!-- Header -->
        <div class="status-header-warning">
            <div class="status-icon">
                <i class="fas fa-clock"></i>
            </div>
            <h1 class="status-title">Pembayaran Tertunda</h1>
            <p class="status-subtitle">Kami menunggu konfirmasi pembayaran Anda</p>
        </div>

        <!-- Body -->
        <div class="status-body">
            <!-- Pending Status Badge -->
            <div class="pending-status-badge">
                <i class="fas fa-hourglass-half"></i>
                <span>Status: PENDING</span>
            </div>

            <!-- Charts Section -->
            <div class="unfinish-charts-section">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="unfinish-chart-card">
                            <div class="unfinish-chart-title">
                                <i class="fas fa-chart-pie"></i>
                                Waktu Tunggu Transaksi
                            </div>
                            <div class="unfinish-chart-wrapper">
                                <canvas id="waitingTimeChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="unfinish-chart-card">
                            <div class="unfinish-chart-title">
                                <i class="fas fa-chart-bar"></i>
                                Status Pembayaran Hari Ini
                            </div>
                            <div class="unfinish-chart-wrapper">
                                <canvas id="paymentStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="info-box warning">
                <i class="fas fa-info-circle"></i>
                <div>
                    <strong>Pembayaran Anda sedang diproses.</strong>
                    <p class="mb-0 mt-1">Status ini muncul karena pembayaran belum selesai atau masih menunggu konfirmasi dari bank/e-wallet.</p>
                </div>
            </div>

            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-step completed">
                    <span class="step-number">1</span>
                    <span class="step-label">Booking</span>
                </div>
                <div class="progress-line active"></div>
                <div class="progress-step active">
                    <span class="step-number">2</span>
                    <span class="step-label">Pembayaran</span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <span class="step-number">3</span>
                    <span class="step-label">Konfirmasi</span>
                </div>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h5>
                    <i class="fas fa-receipt"></i>
                    Detail Transaksi
                </h5>

                @if(isset($result))
                <div class="detail-row">
                    <span class="detail-label">Order ID</span>
                    <span class="detail-value">{{ $result['order_id'] ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value"><span class="badge bg-warning text-dark">Pending</span></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Waktu Transaksi</span>
                    <span class="detail-value">{{ now()->format('d M Y H:i') }}</span>
                </div>
                @else
                <div class="detail-row">
                    <span class="detail-label">Order ID</span>
                    <span class="detail-value">{{ request()->order_id ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value"><span class="badge bg-warning text-dark">Pending</span></span>
                </div>
                @endif
            </div>

            <!-- Pending Tips -->
            <div class="pending-tips">
                <h6>
                    <i class="fas fa-lightbulb"></i>
                    Tips Menunggu Pembayaran
                </h6>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Pastikan saldo mencukupi</li>
                    <li><i class="fas fa-check-circle"></i> Transfer sebelum batas waktu</li>
                    <li><i class="fas fa-check-circle"></i> Simpan bukti transfer</li>
                    <li><i class="fas fa-check-circle"></i> Cek email secara berkala</li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <a href="#" class="btn-retry" onclick="window.location.reload()">
                <i class="fas fa-sync-alt"></i>
                Cek Status Lagi
            </a>

            <div class="d-flex gap-2 mt-3 flex-wrap">
                <a href="{{ route('dashboard') }}" class="btn-dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    Ke Dashboard
                </a>
                <a href="{{ route('properties.index') }}" class="btn-dashboard">
                    <i class="fas fa-search"></i>
                    Jelajahi Properti Lain
                </a>
            </div>

            <!-- Warning Note -->
            <div class="warning-note">
                <i class="fas fa-exclamation-triangle"></i>
                <span>Jika pembayaran sudah dipotong namun status masih pending, hubungi customer service kami.</span>
            </div>

            <!-- Contact Support -->
            <div class="contact-support">
                <p>Butuh bantuan? Hubungi customer service kami</p>
                <a href="https://wa.me/6281234567890" class="btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp Support
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.payment-unfinish-js')
@endsection