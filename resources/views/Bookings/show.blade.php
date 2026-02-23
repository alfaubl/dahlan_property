@extends('layouts.app')

@section('title', 'Detail Booking - Dahlan Property')

@section('styles')
@include('partials.css.booking-show-css')
@endsection

@section('content')
<div class="booking-show-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="booking-show-card">
                    <!-- Header -->
                    <div class="booking-show-header">
                        <h1>Detail Booking</h1>
                        <p>Informasi lengkap booking properti Anda</p>
                    </div>




                    <!-- Body -->
                    <div class="booking-show-body">
                        <!-- Status Badge -->
                        @php
                        $badge = match($status) {
                        'paid' => 'bg-success',
                        'pending' => 'bg-warning',
                        'failed', 'expired', 'cancelled' => 'bg-danger',
                        default => 'bg-secondary'
                        };

                        <h4>
                            Status:
                            $status = $booking->payment->status ?? 'pending';

                            $badge = match($status) {
                            'paid' => 'bg-success',
                            'pending' => 'bg-warning',
                            'failed', 'expired', 'cancelled' => 'bg-danger',
                            default => 'bg-secondary'
                            };
                            @endphp

                            <span id="payment-status" class="badge {{ $badge }}">
                                {{ ucfirst($status) }}
                            </span>

                        </h4>

                        if($status == 'confirmed') {
                        $statusClass = 'confirmed';
                        $statusIcon = 'fa-check-circle';
                        } elseif($status == 'pending') {
                        $statusClass = 'pending';
                        $statusIcon = 'fa-clock';
                        } elseif($status == 'cancelled') {
                        $statusClass = 'cancelled';
                        $statusIcon = 'fa-times-circle';
                        } elseif($status == 'completed') {
                        $statusClass = 'completed';
                        $statusIcon = 'fa-check-double';
                        }
                        @endphp

                        <div class="booking-status-badge {{ $statusClass }}">
                            <i class="fas {{ $statusIcon }}"></i>
                            <span>Status: {{ ucfirst($status) }}</span>
                        </div>

                        <!-- Booking Code -->
                        <div class="booking-code-box">
                            <div class="booking-code-label">Kode Booking</div>
                            <div class="booking-code-value" id="bookingCode">{{ $booking->booking_code ?? 'BOOK-' . strtoupper(uniqid()) }}</div>
                        </div>

                        <!-- Charts Section -->
                        <div class="booking-charts-section">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="booking-chart-card">
                                        <div class="booking-chart-title">
                                            <i class="fas fa-chart-pie"></i>
                                            Status Booking
                                        </div>
                                        <div class="booking-chart-wrapper">
                                            <canvas id="statusDistributionChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="booking-chart-card">
                                        <div class="booking-chart-title">
                                            <i class="fas fa-chart-line"></i>
                                            Tren Booking
                                        </div>
                                        <div class="booking-chart-wrapper">
                                            <canvas id="monthlyBookingsChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="booking-chart-card">
                                        <div class="booking-chart-title">
                                            <i class="fas fa-chart-bar"></i>
                                            Rincian Biaya
                                        </div>
                                        <div class="booking-chart-wrapper">
                                            <canvas id="paymentBreakdownChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Info -->
                        @if(isset($booking->property))
                        <div class="booking-property-card">
                            <div class="booking-property-image">
                                <img src="{{ $booking->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="Property">
                            </div>
                            <div class="booking-property-details">
                                <div class="booking-property-title">{{ $booking->property->title }}</div>
                                <div class="booking-property-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $booking->property->address }}, {{ $booking->property->city }}
                                </div>
                                <div class="booking-property-price">
                                    Rp {{ number_format($booking->property->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Booking Details -->
                        <div class="booking-info-section">
                            <div class="booking-info-title">
                                <i class="fas fa-calendar-alt"></i>
                                Detail Booking
                            </div>
                            <div class="booking-info-grid">
                                <div class="booking-info-item">
                                    <div class="booking-info-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="booking-info-content">
                                        <div class="booking-info-label">Nama Pemesan</div>
                                        <div class="booking-info-value">{{ $booking->user->name ?? 'User' }}</div>
                                    </div>
                                </div>

                                <div class="booking-info-item">
                                    <div class="booking-info-icon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div class="booking-info-content">
                                        <div class="booking-info-label">Tanggal Booking</div>
                                        <div class="booking-info-value">
                                            {{ isset($booking->booking_date) ? \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') : '-' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-info-item">
                                    <div class="booking-info-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="booking-info-content">
                                        <div class="booking-info-label">Jam Booking</div>
                                        <div class="booking-info-value">{{ $booking->booking_time ?? '-' }}</div>
                                    </div>
                                </div>

                                <div class="booking-info-item">
                                    <div class="booking-info-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="booking-info-content">
                                        <div class="booking-info-label">Total Pembayaran</div>
                                        <div class="booking-info-value">Rp {{ number_format($booking->payment->amount ?? 0, 0, ',', '.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notes -->
                        @if(!empty($booking->notes))
                        <div class="booking-info-section">
                            <div class="booking-info-title">
                                <i class="fas fa-sticky-note"></i>
                                Catatan
                            </div>
                            <div class="p-3 bg-white rounded-3 border">
                                {{ $booking->notes }}
                            </div>
                        </div>
                        @endif

                        <!-- Timeline -->
                        <div class="booking-info-section">
                            <div class="booking-info-title">
                                <i class="fas fa-history"></i>
                                Timeline Booking
                            </div>
                            <div class="booking-timeline">
                                <div class="booking-timeline-item">
                                    <div class="booking-timeline-icon completed">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="booking-timeline-content">
                                        <div class="booking-timeline-title">Booking Dibuat</div>
                                        <div class="booking-timeline-time">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ isset($booking->created_at) ? $booking->created_at->format('d F Y H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-timeline-item">
                                    <div class="booking-timeline-icon {{ $status == 'confirmed' || $status == 'completed' ? 'completed' : ($status == 'pending' ? 'active' : '') }}">
                                        <i class="fas {{ $status == 'confirmed' || $status == 'completed' ? 'fa-check' : 'fa-clock' }}"></i>
                                    </div>
                                    <div class="booking-timeline-content">
                                        <div class="booking-timeline-title">Konfirmasi Booking</div>
                                        <div class="booking-timeline-time">
                                            <i class="fas fa-hourglass-half"></i>
                                            {{ $status == 'confirmed' ? 'Terkonfirmasi' : ($status == 'completed' ? 'Selesai' : 'Menunggu konfirmasi') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="booking-timeline-item">
                                    <div class="booking-timeline-icon {{ $status == 'completed' ? 'completed' : '' }}">
                                        <i class="fas {{ $status == 'completed' ? 'fa-check-double' : 'fa-hourglass' }}"></i>
                                    </div>
                                    <div class="booking-timeline-content">
                                        <div class="booking-timeline-title">Selesai</div>
                                        <div class="booking-timeline-time">
                                            <i class="fas fa-calendar-check"></i>
                                            {{ $status == 'completed' ? 'Booking selesai' : 'Belum selesai' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="booking-action-buttons">
                            @if($status == 'pending')
                            <button class="booking-btn booking-btn-warning" onclick="window.location.reload()">
                                <i class="fas fa-sync-alt"></i>
                                Refresh Status
                            </button>
                            <a href="{{ route('payment.process', ['payment' => $booking->payment->id ?? 0, 'token' => '']) }}" class="booking-btn booking-btn-primary">
                                <i class="fas fa-credit-card"></i>
                                Lanjutkan Pembayaran
                            </a>
                            <button class="booking-btn booking-btn-danger" onclick="cancelBooking()">
                                <i class="fas fa-times"></i>
                                Batalkan Booking
                            </button>
                            @elseif($status == 'confirmed')
                            <a href="{{ route('payment.finish') }}" class="booking-btn booking-btn-success">
                                <i class="fas fa-check-circle"></i>
                                Lihat Status Pembayaran
                            </a>
                            <a href="{{ route('properties.index') }}" class="booking-btn booking-btn-outline">
                                <i class="fas fa-search"></i>
                                Cari Properti Lain
                            </a>
                            @elseif($status == 'completed')
                            <a href="{{ route('properties.index') }}" class="booking-btn booking-btn-primary">
                                <i class="fas fa-search"></i>
                                Booking Lagi
                            </a>
                            <a href="{{ route('dashboard') }}" class="booking-btn booking-btn-outline">
                                <i class="fas fa-tachometer-alt"></i>
                                Ke Dashboard
                            </a>
                            @elseif($status == 'cancelled')
                            <a href="{{ route('properties.index') }}" class="booking-btn booking-btn-primary">
                                <i class="fas fa-search"></i>
                                Cari Properti Lain
                            </a>
                            <a href="{{ route('dashboard') }}" class="booking-btn booking-btn-outline">
                                <i class="fas fa-tachometer-alt"></i>
                                Ke Dashboard
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('partials.js.booking-show-js')
<script>
    function cancelBooking() {
        if (confirm('Apakah Anda yakin ingin membatalkan booking ini?')) {
            alert('Fitur pembatalan akan segera diimplementasikan');
            // window.location.href = '{{ route("bookings.cancel", $booking->id ?? 0) }}';
        }
    }
</script>
{-- AUTO CHECK PAYMENT STATUS --}}
@if(($booking->payment->status ?? 'pending') === 'pending')
<script>
    function checkPaymentStatus() {
        fetch("{{ route('payment.checkStatus', $booking->payment->id ?? 0) }}")
            .then(res => res.json())
            .then(data => {
                if (data.status === 'paid') {
                    location.reload();
                }
            });
    }

    setInterval(checkPaymentStatus, 5000);
</script>
@endif

@endsection