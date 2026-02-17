@extends('layouts.app')

@section('title', 'Pembayaran Gagal - Dahlan Property')

@section('styles')
    @include('partials.css.payment-error-css')
@endsection

@section('content')
<div class="payment-status-container">
    <div class="status-card">
        <!-- Header -->
        <div class="status-header-danger">
            <div class="status-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1 class="status-title">Pembayaran Gagal</h1>
            <p class="status-subtitle">Maaf, transaksi Anda tidak dapat diproses</p>
        </div>
        
        <!-- Body -->
        <div class="status-body">
            <!-- Error Box -->
            <div class="error-box">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Transaksi gagal diproses.</strong> Silakan coba kembali dengan metode pembayaran lain.
            </div>
            
            <!-- Order Details -->
            <div class="error-details">
                <h5>Detail Transaksi</h5>
                
                @if(isset($result))
                <div class="detail-row">
                    <span class="detail-label">Order ID</span>
                    <span class="detail-value">{{ $result['order_id'] ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value"><span class="badge bg-danger">Failed</span></span>
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
                    <span class="detail-value"><span class="badge bg-danger">Failed</span></span>
                </div>
                @endif
            </div>
            
            <!-- Error Message -->
            <div class="error-message">
                <i class="fas fa-info-circle"></i>
                <span>{{ session('error') ?? 'Pembayaran gagal diproses oleh sistem.' }}</span>
            </div>
            
            <!-- Possible Reasons -->
            <div class="reasons-list">
                <h6><i class="fas fa-search me-2"></i> Kemungkinan Penyebab:</h6>
                <ul>
                    <li><i class="fas fa-times-circle"></i> Saldo tidak mencukupi</li>
                    <li><i class="fas fa-times-circle"></i> Batas waktu pembayaran habis</li>
                    <li><i class="fas fa-times-circle"></i> Data kartu/kode tidak valid</li>
                    <li><i class="fas fa-times-circle"></i> Gangguan koneksi jaringan</li>
                </ul>
            </div>
            
            <!-- Action Buttons -->
            <a href="#" class="btn-retry" onclick="window.history.back()">
                <i class="fas fa-redo-alt"></i>
                Coba Lagi
            </a>
            
            <div class="d-flex gap-2 justify-content-center flex-wrap mt-3">
                <a href="{{ route('dashboard') }}" class="btn-dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    Ke Dashboard
                </a>
                <a href="{{ route('properties.index') }}" class="btn-dashboard">
                    <i class="fas fa-search"></i>
                    Jelajahi Properti Lain
                </a>
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
    @include('partials.js.payment-error-js')
@endsection