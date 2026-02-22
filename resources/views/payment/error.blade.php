@extends('layouts.app')

@section('title', 'Pembayaran Gagal - Dahlan Property')

@section('styles')
    @include('partials.css.payment-css')
    @include('partials.css.payment-error-css')
@endsection

@section('content')
<div class="payment-global-container">
    <div class="payment-global-card">
        <!-- Header -->
        <div class="payment-header-danger">
            <div class="payment-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1 class="payment-title">Pembayaran Gagal</h1>
            <p class="payment-subtitle">Maaf, transaksi Anda tidak dapat diproses</p>
        </div>

        <!-- Body -->
        <div class="payment-body">
            <!-- Error Badge -->
            <div class="payment-badge payment-badge-danger">
                <i class="fas fa-exclamation-circle"></i>
                <span>Status: GAGAL</span>
            </div>

            <!-- Charts Section -->
            <div class="payment-charts-section">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="payment-chart-card">
                            <div class="payment-chart-title">
                                <i class="fas fa-chart-pie"></i>
                                Penyebab Kegagalan
                            </div>
                            <div class="payment-chart-wrapper">
                                <canvas id="failureChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-chart-card">
                            <div class="payment-chart-title">
                                <i class="fas fa-chart-bar"></i>
                                Transaksi Gagal Hari Ini
                            </div>
                            <div class="payment-chart-wrapper">
                                <canvas id="dailyFailureChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Info Box -->
            <div class="payment-info-box danger">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    <strong>Transaksi gagal diproses.</strong>
                    <p class="mb-0 mt-1">Silakan coba kembali dengan metode pembayaran lain.</p>
                </div>
            </div>

            <!-- Order Details -->
            <div class="payment-order-details">
                <h5>
                    <i class="fas fa-receipt"></i>
                    Detail Transaksi
                </h5>

                @if(isset($result))
                <div class="payment-detail-row">
                    <span class="payment-detail-label">Order ID</span>
                    <span class="payment-detail-value">{{ $result['order_id'] ?? '-' }}</span>
                </div>
                <div class="payment-detail-row">
                    <span class="payment-detail-label">Status</span>
                    <span class="payment-detail-value"><span class="badge bg-danger">Failed</span></span>
                </div>
                <div class="payment-detail-row">
                    <span class="payment-detail-label">Waktu Transaksi</span>
                    <span class="payment-detail-value">{{ now()->format('d M Y H:i') }}</span>
                </div>
                @else
                <div class="payment-detail-row">
                    <span class="payment-detail-label">Order ID</span>
                    <span class="payment-detail-value">{{ request()->order_id ?? '-' }}</span>
                </div>
                <div class="payment-detail-row">
                    <span class="payment-detail-label">Status</span>
                    <span class="payment-detail-value"><span class="badge bg-danger">Failed</span></span>
                </div>
                @endif
            </div>

            <!-- Error Message -->
            <div class="payment-error-message">
                <i class="fas fa-info-circle"></i>
                <span>{{ session('error') ?? 'Pembayaran gagal diproses oleh sistem.' }}</span>
            </div>

            <!-- Possible Reasons -->
            <div class="payment-reasons-list">
                <h6>
                    <i class="fas fa-search"></i>
                    Kemungkinan Penyebab:
                </h6>
                <ul>
                    <li><i class="fas fa-times-circle"></i> Saldo tidak mencukupi</li>
                    <li><i class="fas fa-times-circle"></i> Batas waktu pembayaran habis</li>
                    <li><i class="fas fa-times-circle"></i> Data kartu/kode tidak valid</li>
                    <li><i class="fas fa-times-circle"></i> Gangguan koneksi jaringan</li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <button class="payment-btn-retry" onclick="window.history.back()">
                <i class="fas fa-redo-alt"></i>
                Coba Lagi
            </button>

            <div class="d-flex gap-2 mt-3 flex-wrap">
                <a href="{{ route('dashboard') }}" class="payment-btn-dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    Ke Dashboard
                </a>
                <a href="{{ route('properties.index') }}" class="payment-btn-dashboard">
                    <i class="fas fa-search"></i>
                    Jelajahi Properti Lain
                </a>
            </div>

            <!-- Contact Support -->
            <div class="payment-contact-support">
                <p>Butuh bantuan? Hubungi customer service kami</p>
                <a href="https://wa.me/6281234567890" class="payment-btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp Support
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.payment-error-js')
@endsection