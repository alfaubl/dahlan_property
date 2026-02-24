@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
@include('partials.css.dashboard-css')
<link rel="stylesheet" href="{{ asset('css/dashboard-apex.css') }}">
@endsection

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid">
        <!-- GREETING CARD -->
        <div class="greeting-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="ms-3">
                            <h1 class="greeting-title">Selamat Datang, {{ $user->name }}! 👋</h1>
                            <div class="badge-container">
                                <span class="info-badge"><i class="far fa-calendar"></i> {{ now()->format('l, d F Y') }}</span>
                                <span class="info-badge"><i class="fas fa-building"></i> {{ $totalProperties ?? 0 }} Properti</span>
                                <span class="info-badge"><i class="fas fa-star"></i> Member since {{ $user->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <span class="premium-tag"><i class="fas fa-crown"></i> Akun Premium</span>
                </div>
            </div>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="stats-row">
            <!-- Total Properti -->
            <div class="stat-card">
                <div class="stat-icon stat-blue">
                    <i class="fas fa-building"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-label">Total Properti</span>
                    <span class="stat-value">{{ $totalProperties ?? 0 }}</span>
                    <span class="stat-trend"><i class="fas fa-arrow-up"></i> Terdaftar</span>
                </div>
            </div>

            <!-- Tersedia -->
            <div class="stat-card">
                <div class="stat-icon stat-green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-label">Tersedia</span>
                    <span class="stat-value">0</span>
                    <span class="stat-trend"><i class="fas fa-clock"></i> Siap disewa</span>
                </div>
            </div>

            <!-- Disewa -->
            <div class="stat-card">
                <div class="stat-icon stat-yellow">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-label">Disewa</span>
                    <span class="stat-value">0</span>
                    <span class="stat-trend"><i class="fas fa-calendar"></i> Dalam masa sewa</span>
                </div>
            </div>

            <!-- Pendapatan -->
            <div class="stat-card">
                <div class="stat-icon stat-purple">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-details">
                    <span class="stat-label">Pendapatan</span>
                    <span class="stat-value">Rp {{ number_format($totalSpending ?? 0, 0, ',', '.') }}</span>
                    <span class="stat-trend"><i class="fas fa-chart-line"></i> Bulan ini</span>
                </div>
            </div>
        </div>

        <!-- CHARTS SECTION -->
        <div class="charts-row">
            <!-- Bar Chart - Distribusi Properti -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="fas fa-chart-bar"></i> Distribusi Properti</h3>
                    <span class="chart-badge">5 Tipe Bangunan</span>
                </div>
                <div class="chart-container">
                    <div id="distributionChart"></div>
                </div>
            </div>

            <!-- Pie Chart - Status Properti -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3><i class="fas fa-chart-pie"></i> Status Properti</h3>
                    <span class="chart-badge">Real-time</span>
                </div>
                <div class="chart-container">
                    <div id="statusChart"></div>
                </div>
                <div class="status-legend">
                    <div class="legend-item">
                        <span class="color-dot" style="background: #28a745;"></span>
                        <span>Tersedia</span>
                        <span class="legend-value">0</span>
                    </div>
                    <div class="legend-item">
                        <span class="color-dot" style="background: #ffc107;"></span>
                        <span>Disewa</span>
                        <span class="legend-value">0</span>
                    </div>
                    <div class="legend-item">
                        <span class="color-dot" style="background: #6c757d;"></span>
                        <span>Terjual</span>
                        <span class="legend-value">0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- PROPERTY TYPES -->
        <div class="section-header">
            <h2><i class="fas fa-tags"></i> Portfolio Bangunan Premium</h2>
            <span class="section-badge"><i class="fas fa-star text-warning"></i> 5 Tipe</span>
        </div>

        <div class="property-grid">
            <div class="property-type">
                <i class="fas fa-home" style="color: #4a6fa5;"></i>
                <h4>Rumah</h4>
                <div class="type-count">0</div>
                <div class="type-unit">UNIT</div>
            </div>
            <div class="property-type">
                <i class="fas fa-building" style="color: #17a2b8;"></i>
                <h4>Apartemen</h4>
                <div class="type-count">0</div>
                <div class="type-unit">UNIT</div>
            </div>
            <div class="property-type">
                <i class="fas fa-store" style="color: #28a745;"></i>
                <h4>Ruko</h4>
                <div class="type-count">0</div>
                <div class="type-unit">UNIT</div>
            </div>
            <div class="property-type">
                <i class="fas fa-briefcase" style="color: #ffc107;"></i>
                <h4>Kantor</h4>
                <div class="type-count">0</div>
                <div class="type-unit">UNIT</div>
            </div>
            <div class="property-type">
                <i class="fas fa-umbrella-beach" style="color: #fd7e14;"></i>
                <h4>Villa</h4>
                <div class="type-count">0</div>
                <div class="type-unit">UNIT</div>
            </div>
        </div>

        <!-- BOOKINGS SECTION -->
        <div class="section-header">
            <h2><i class="fas fa-calendar-check"></i> Riwayat Booking Saya</h2>
            <div class="header-actions">
                <span class="section-badge me-2"><i class="fas fa-clock"></i> {{ $totalBookings ?? 0 }} Total</span>
                <a href="{{ route('properties.index') }}" class="btn-booking">
                    <i class="fas fa-plus"></i> Booking Baru
                </a>
            </div>
        </div>

        <!-- BOOKING STATS -->
        <div class="booking-stats">
            <div class="stat-mini">
                <div class="mini-icon bg-purple">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <span class="mini-label">Total Booking</span>
                    <span class="mini-value">{{ $totalBookings ?? 0 }}</span>
                </div>
            </div>
            <div class="stat-mini">
                <div class="mini-icon bg-orange">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <span class="mini-label">Menunggu</span>
                    <span class="mini-value">{{ $pendingBookings ?? 0 }}</span>
                </div>
            </div>
            <div class="stat-mini">
                <div class="mini-icon bg-green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <span class="mini-label">Selesai</span>
                    <span class="mini-value">{{ $successBookings ?? 0 }}</span>
                </div>
            </div>
            <div class="stat-mini">
                <div class="mini-icon bg-blue">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div>
                    <span class="mini-label">Total Spending</span>
                    <span class="mini-value">Rp {{ number_format($totalSpending ?? 0, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- BOOKING CHART -->
        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-chart-line"></i> Statistik Booking 7 Hari Terakhir</h3>
                <span class="chart-badge">Real-time</span>
            </div>
            <div class="chart-container" style="height: 300px;">
                <div id="bookingChart"></div>
            </div>
        </div>

        <!-- BOOKING TABLE -->
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Property</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings ?? [] as $booking)
                    <tr>
                        <td><span class="booking-id">#{{ $booking->id }}</span></td>
                        <td>
                            <div class="property-info">
                                <strong>{{ $booking->property->title ?? 'Property' }}</strong>
                                <small>{{ $booking->property->location ?? '-' }}</small>
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                        <td>{{ $booking->booking_time ?? '-' }}</td>
                        <td><span class="booking-price">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</span></td>
                        <td>
                            @php
                            $statusClass = '';
                            $statusText = '';
                            if($booking->status == 'pending') {
                            $statusClass = 'status-pending';
                            $statusText = 'Menunggu';
                            } elseif($booking->status == 'success') {
                            $statusClass = 'status-success';
                            $statusText = 'Selesai';
                            } elseif($booking->status == 'expired') {
                            $statusClass = 'status-expired';
                            $statusText = 'Kadaluarsa';
                            } elseif($booking->status == 'cancelled') {
                            $statusClass = 'status-cancelled';
                            $statusText = 'Dibatalkan';
                            } else {
                            $statusClass = 'status-pending';
                            $statusText = 'Menunggu';
                            }
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                        </td>
                        <td>
                            @if($booking->payment)
                            @if($booking->payment->status == 'success')
                            <span class="status-badge status-success">Lunas</span>
                            @else
                            <span class="status-badge status-pending">Belum Lunas</span>
                            @endif
                            @else
                            <span class="status-badge status-pending">Belum Bayar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('booking.show', $booking->id) }}" class="btn-action">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <p>Belum ada booking</p>
                            <a href="{{ route('properties.index') }}" class="btn-booking">Booking Sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="quick-actions">
            <div class="quick-left">
                <div class="quick-icon"><i class="fas fa-bolt"></i></div>
                <div class="quick-text">
                    <h6>Akses Cepat</h6>
                    <p>Kelola portofolio properti Anda dengan cepat dan mudah</p>
                </div>
            </div>
            <div class="quick-right">
                <a href="{{ route('properties.index') }}" class="btn-outline">
                    <i class="fas fa-list"></i> Semua Properti
                </a>
                <a href="{{ route('properties.create') }}" class="btn-primary">
                    <i class="fas fa-plus-circle"></i> Tambah Properti
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('partials.js.dashboard-js')
<!-- ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/dashboard-apex.js') }}"></script>
<script>
    window.dashboardData = {
        chartSuccess: @json($chartSuccess),
        chartPending: @json($chartPending)
    };
</script>
@endsection