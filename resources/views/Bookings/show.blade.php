@extends('layouts.app')

@section('title', 'Detail Booking')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/booking-show.css') }}">
@endsection

@section('content')
<div class="detail-container">
    
    <!-- Back Button -->
    <a href="{{ route('booking.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Daftar Booking
    </a>

    <!-- Main Card -->
    <div class="detail-card">
        
        <!-- Header -->
        <div class="detail-header">
            <div class="header-content">
                <div>
                    <h2><i class="fas fa-receipt"></i>Detail Booking</h2>
                    <p class="header-subtitle">Informasi lengkap booking properti Anda</p>
                </div>
                <span class="booking-code">
                    {{ $booking->booking_code }}
                </span>
            </div>
        </div>

        <!-- Status Banner -->
        @php
            $status = $booking->payment->status ?? 'pending';
            $statusClass = match($status) {
                'paid' => 'success',
                'pending' => 'pending',
                'cancelled', 'failed' => 'cancelled',
                default => 'pending'
            };
            $statusText = match($status) {
                'paid' => 'Lunas',
                'pending' => 'Menunggu Pembayaran',
                'cancelled' => 'Dibatalkan',
                'failed' => 'Gagal',
                default => 'Menunggu Pembayaran'
            };
            $statusIcon = match($status) {
                'paid' => 'fa-check-circle',
                'pending' => 'fa-clock',
                default => 'fa-times-circle'
            };
        @endphp

        <div class="status-banner status-{{ $statusClass }}">
            <div class="status-info">
                <h5>Status Pembayaran</h5>
                <small>Status transaksi pembayaran Anda</small>
            </div>
            <span class="status-badge status-{{ $statusClass }}">
                <i class="fas {{ $statusIcon }}"></i>
                {{ $statusText }}
            </span>
        </div>

        <!-- Info Grid -->
        <div class="info-grid">
            <!-- Property Info -->
            <div class="info-card">
                <h6 class="info-title">
                    <i class="fas fa-building"></i>
                    Informasi Properti
                </h6>
                <div class="info-row">
                    <span class="info-label">Nama Properti</span>
                    <span class="info-value">{{ $booking->property->title ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Lokasi</span>
                    <span class="info-value">{{ $booking->property->location ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Harga</span>
                    <span class="info-value price">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="info-card">
                <h6 class="info-title">
                    <i class="fas fa-calendar-alt"></i>
                    Detail Booking
                </h6>
                <div class="info-row">
                    <span class="info-label">Tanggal Booking</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Waktu</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Dibuat Pada</span>
                    <span class="info-value">{{ $booking->created_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Customer Info -->
        @if($booking->user)
        <div class="info-section">
            <div class="info-card">
                <h6 class="info-title">
                    <i class="fas fa-user"></i>
                    Informasi Pemesan
                </h6>
                <div class="customer-grid">
                    <div class="customer-item">
                        <span class="customer-label">Nama</span>
                        <span class="customer-value">{{ $booking->user->name ?? '-' }}</span>
                    </div>
                    <div class="customer-item">
                        <span class="customer-label">Email</span>
                        <span class="customer-value">{{ $booking->user->email ?? '-' }}</span>
                    </div>
                    <div class="customer-item">
                        <span class="customer-label">Telepon</span>
                        <span class="customer-value">{{ $booking->user->phone ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Notes -->
        @if($booking->notes)
        <div class="info-section">
            <div class="info-card">
                <h6 class="info-title">
                    <i class="fas fa-sticky-note"></i>
                    Catatan
                </h6>
                <p class="notes-text">{{ $booking->notes }}</p>
            </div>
        </div>
        @endif

        <!-- Payment Info -->
        @if($booking->payment)
        <div class="info-section">
            <div class="info-card">
                <h6 class="info-title">
                    <i class="fas fa-credit-card"></i>
                    Informasi Pembayaran
                </h6>
                <div class="payment-grid">
                    <div class="payment-item">
                        <span class="payment-label">Order ID</span>
                        <span class="payment-value order-id">{{ $booking->payment->order_id ?? '-' }}</span>
                    </div>
                    <div class="payment-item">
                        <span class="payment-label">Metode</span>
                        <span class="payment-value">{{ $booking->payment->payment_method ?? '-' }}</span>
                    </div>
                    <div class="payment-item">
                        <span class="payment-label">Dibayar Pada</span>
                        <span class="payment-value">{{ $booking->paid_at ? \Carbon\Carbon::parse($booking->paid_at)->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Action Buttons -->
        <div class="action-buttons">
            @if($status === 'pending')
                <button type="button" class="btn-pay" onclick="bayar({{ $booking->id }})">
                    <i class="fas fa-credit-card"></i>
                    Bayar Sekarang
                </button>
            @endif

            @if($status === 'paid')
                <a href="#" class="btn-invoice">
                    <i class="fas fa-download"></i>
                    Download Invoice
                </a>
            @endif

            @if($status === 'pending')
                <button type="button" class="btn-cancel" onclick="batal({{ $booking->id }})">
                    <i class="fas fa-times-circle"></i>
                    Batalkan Booking
                </button>
            @endif

            <a href="{{ route('booking.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/booking-show.js') }}"></script>
<script>
    window.bookingConfig = {
        id: {{ $booking->id }},
        csrf: '{{ csrf_token() }}'
    };
</script>
@endsection