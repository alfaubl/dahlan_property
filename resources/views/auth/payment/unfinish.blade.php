@extends('layouts.app')

@section('title', 'Pembayaran Tertunda - Dahlan Property')

@section('styles')
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
            <!-- Info Box -->
            <div class="info-box">
                <i class="fas fa-info-circle"></i>
                <strong>Pembayaran Anda sedang diproses.</strong> Status ini muncul karena pembayaran belum selesai atau masih menunggu konfirmasi dari bank/e-wallet.
            </div>
            
            <!-- Order Details -->
            <div class="order-details">
                <h5>Detail Transaksi</h5>
                
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
            
            <!-- Countdown Timer -->
            <div class="countdown-timer">
                <div class="timer-label">
                    <i class="fas fa-hourglass-half me-2"></i>
                    Batas waktu pembayaran
                </div>
                <div class="timer-display" id="countdown">23:59</div>
            </div>
            
            <!-- Action Buttons -->
            <a href="#" class="btn-retry" onclick="window.location.reload()">
                <i class="fas fa-sync-alt"></i>
                Cek Status Lagi
            </a>
            
            <div class="d-flex gap-2 justify-content-center flex-wrap mt-3">
                <a href="{{ route('dashboard') }}" class="btn-dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    Ke Dashboard
                </a>
                <a href="{{ route('properties.index') }}" class="btn-dashboard">
                    <i class="fas fa-search"></i>
                    Jelajahi Properti
                </a>
            </div>
            
            <!-- Warning Note -->
            <div class="warning-note">
                <i class="fas fa-exclamation-triangle"></i>
                <span>Jika pembayaran sudah dipotong namun status masih pending, hubungi customer service kami.</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.payment-unfinish-js')
@endsection