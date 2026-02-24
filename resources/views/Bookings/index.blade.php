@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
@include('partials.css.dashboard-css')
<link rel="stylesheet" href="{{ asset('css/dashboard-bookings.css') }}">
@endsection

@section('content')
<div class="dashboard-container">
    <div class="container-fluid px-lg-4">
        <!-- GREETING SECTION -->
        <div class="greeting-premium">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center">
                        <div class="greeting-avatar me-3">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <h1 class="greeting-title">Selamat Datang, {{ $user->name }}! 👋</h1>
                            <div class="d-flex gap-2 align-items-center flex-wrap mt-2">
                                <span class="property-badge">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ now()->format('l, d F Y') }}
                                </span>
                                <span class="property-badge">
                                    <i class="fas fa-building"></i>
                                    {{ $totalProperties ?? 0 }} Total Properti
                                </span>
                                <span class="property-badge">
                                    <i class="fas fa-map-marker-alt"></i>
                                    15 Kota
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                    <div class="d-inline-flex align-items-center gap-2">
                        <span class="property-badge">
                            <i class="fas fa-shield-alt"></i>
                            Akun Premium
                        </span>
                        <span class="property-badge">
                            <i class="fas fa-star text-warning"></i>
                            Member since {{ $user->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="stats-grid">
            <!-- Total Properti -->
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-primary-light">
                    <i class="fas fa-building text-primary"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">Total Properti</span>
                    <span class="stat-value">{{ $totalProperties ?? 0 }}</span>
                    <span class="stat-trend">
                        <i class="fas fa-arrow-up text-success"></i> Terdaftar
                    </span>
                </div>
            </div>

            <!-- Tersedia -->
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-success-light">
                    <i class="fas fa-check-circle text-success"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">Tersedia</span>
                    <span class="stat-value">0</span>
                    <span class="stat-trend">
                        <i class="fas fa-clock text-warning"></i> Siap disewa/jual
                    </span>
                </div>
            </div>

            <!-- Disewa -->
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-warning-light">
                    <i class="fas fa-clock text-warning"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">Disewa</span>
                    <span class="stat-value">0</span>
                    <span class="stat-trend">
                        <i class="fas fa-calendar text-info"></i> Dalam masa sewa
                    </span>
                </div>
            </div>

            <!-- Pendapatan -->
            <div class="stat-card">
                <div class="stat-icon-wrapper bg-info-light">
                    <i class="fas fa-dollar-sign text-info"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">Pendapatan</span>
                    <span class="stat-value">Rp 0</span>
                    <span class="stat-trend">
                        <i class="fas fa-chart-line text-primary"></i> Bulan ini
                    </span>
                </div>
            </div>
        </div>

        <!-- PROPERTY CHARTS -->
        <div class="charts-grid">
            <!-- Bar Chart - Distribusi Properti -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-bar"></i>
                        Distribusi Properti
                    </h3>
                    <span class="chart-badge">5 Tipe Bangunan</span>
                </div>
                <div class="chart-container">
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>

            <!-- Doughnut Chart - Status Properti -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-pie"></i>
                        Status Properti
                    </h3>
                    <span class="chart-badge">Real-time</span>
                </div>
                <div class="chart-container small-chart">
                    <canvas id="statusChart"></canvas>
                </div>
                <div class="status-legend">
                    <div class="legend-item">
                        <span class="dot" style="background: #28a745;"></span>
                        <span class="label">Tersedia</span>
                        <span class="value">0</span>
                    </div>
                    <div class="legend-item">
                        <span class="dot" style="background: #ffc107;"></span>
                        <span class="label">Disewa</span>
                        <span class="value">0</span>
                    </div>
                    <div class="legend-item">
                        <span class="dot" style="background: #6c757d;"></span>
                        <span class="label">Terjual</span>
                        <span class="value">0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- PROPERTY TYPES -->
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-tags"></i>
                Portfolio Bangunan Premium
            </h2>
            <span class="section-badge">
                <i class="fas fa-star text-warning"></i> 5 Tipe
            </span>
        </div>

        <div class="property-types-grid">
            <!-- Rumah -->
            <div class="property-type-card">
                <div class="property-icon" style="color: #4a6fa5;">
                    <i class="fas fa-home"></i>
                </div>
                <h4 class="property-name">Rumah</h4>
                <div class="property-count">0</div>
                <div class="property-unit">UNIT</div>
            </div>

            <!-- Apartemen -->
            <div class="property-type-card">
                <div class="property-icon" style="color: #17a2b8;">
                    <i class="fas fa-building"></i>
                </div>
                <h4 class="property-name">Apartemen</h4>
                <div class="property-count">0</div>
                <div class="property-unit">UNIT</div>
            </div>

            <!-- Ruko -->
            <div class="property-type-card">
                <div class="property-icon" style="color: #28a745;">
                    <i class="fas fa-store"></i>
                </div>
                <h4 class="property-name">Ruko</h4>
                <div class="property-count">0</div>
                <div class="property-unit">UNIT</div>
            </div>

            <!-- Kantor -->
            <div class="property-type-card">
                <div class="property-icon" style="color: #ffc107;">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h4 class="property-name">Kantor</h4>
                <div class="property-count">0</div>
                <div class="property-unit">UNIT</div>
            </div>

            <!-- Villa -->
            <div class="property-type-card">
                <div class="property-icon" style="color: #fd7e14;">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <h4 class="property-name">Villa</h4>
                <div class="property-count">0</div>
                <div class="property-unit">UNIT</div>
            </div>
        </div>

        <!-- ========== BOOKINGS SECTION ========== -->
        <div class="bookings-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-calendar-check"></i>
                    Riwayat Booking Saya
                </h2>
                <div class="section-actions">
                    <span class="section-badge">
                        <i class="fas fa-clock"></i> {{ $totalBookings ?? 0 }} Total Booking
                    </span>
                    <a href="{{ route('properties.index') }}" class="btn-booking-new">
                        <i class="fas fa-plus"></i>
                        Booking Baru
                    </a>
                </div>
            </div>

            <!-- Booking Stats Cards -->
            <div class="booking-stats-grid">
                <!-- Total Booking -->
                <div class="stat-card small">
                    <div class="stat-icon-wrapper bg-purple-light">
                        <i class="fas fa-calendar-check text-purple"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-label">Total Booking</span>
                        <span class="stat-value">{{ $totalBookings ?? 0 }}</span>
                    </div>
                </div>

                <!-- Menunggu -->
                <div class="stat-card small">
                    <div class="stat-icon-wrapper bg-orange-light">
                        <i class="fas fa-clock text-orange"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-label">Menunggu</span>
                        <span class="stat-value">{{ $pendingBookings ?? 0 }}</span>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="stat-card small">
                    <div class="stat-icon-wrapper bg-green-light">
                        <i class="fas fa-check-circle text-green"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-label">Selesai</span>
                        <span class="stat-value">{{ $successBookings ?? 0 }}</span>
                    </div>
                </div>

                <!-- Total Spending -->
                <div class="stat-card small">
                    <div class="stat-icon-wrapper bg-blue-light">
                        <i class="fas fa-money-bill-wave text-blue"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-label">Total Spending</span>
                        <span class="stat-value">Rp {{ number_format($totalSpending ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Booking Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-bar"></i>
                        Statistik Booking 7 Hari Terakhir
                    </h3>
                    <span class="chart-badge">Real-time</span>
                </div>
                <div class="chart-container" style="height: 250px;">
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="filter-container">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pending">Menunggu</button>
                <button class="filter-btn" data-filter="success">Selesai</button>
                <button class="filter-btn" data-filter="expired">Kadaluarsa</button>
                <button class="filter-btn" data-filter="cancelled">Dibatalkan</button>
            </div>

            <!-- Bookings Table -->
            <div class="table-container">
                <table class="bookings-table">
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
                    <tbody id="bookingTableBody">
                        @forelse($recentBookings ?? [] as $booking)
                        <tr class="booking-row" data-status="{{ $booking->status ?? 'pending' }}">
                            <td class="booking-id">#{{ $booking->id }}</td>
                            <td>
                                <div class="property-info">
                                    <strong>{{ $booking->property->title ?? 'Property' }}</strong>
                                    <small>{{ $booking->property->location ?? '-' }}</small>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td class="booking-price">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</td>
                            <td>
                                @php
                                $statusClass = '';
                                $statusText = '';

                                if($booking->status == 'pending') {
                                $statusClass = 'badge-pending';
                                $statusText = 'Menunggu';
                                } elseif($booking->status == 'success') {
                                $statusClass = 'badge-success';
                                $statusText = 'Selesai';
                                } elseif($booking->status == 'expired') {
                                $statusClass = 'badge-expired';
                                $statusText = 'Kadaluarsa';
                                } elseif($booking->status == 'cancelled') {
                                $statusClass = 'badge-cancelled';
                                $statusText = 'Dibatalkan';
                                } else {
                                $statusClass = 'badge-pending';
                                $statusText = 'Menunggu';
                                }
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                            </td>
                            <td>
                                @if($booking->payment)
                                @php
                                $paymentClass = $booking->payment->status == 'success' ? 'badge-success' : 'badge-pending';
                                $paymentText = $booking->payment->status == 'success' ? 'Lunas' : 'Belum Lunas';
                                @endphp
                                <span class="status-badge {{ $paymentClass }}">{{ $paymentText }}</span>
                                @else
                                <span class="status-badge badge-pending">Belum Bayar</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('booking.show', $booking->id) }}" class="btn-detail">
                                    <i class="fas fa-eye"></i>
                                    <span>Detail</span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="fas fa-calendar-times"></i>
                                    <p>Belum ada booking</p>
                                    <a href="{{ route('properties.index') }}" class="btn-booking-new">
                                        Booking Sekarang
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="quick-actions">
            <div class="quick-actions-content">
                <div class="quick-actions-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="quick-actions-text">
                    <h6>Akses Cepat</h6>
                    <p>Kelola portofolio properti Anda dengan cepat dan mudah</p>
                </div>
            </div>
            <div class="quick-actions-buttons">
                <a href="{{ route('properties.index') }}" class="btn-quick btn-primary">
                    <i class="fas fa-list"></i>
                    Semua Properti
                </a>
                <a href="{{ route('properties.create') }}" class="btn-quick btn-success">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Properti
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{-- 1. Load dashboard JS dependencies --}}
    @include('partials.js.dashboard-js')

    {{-- 2. Data container untuk JavaScript --}}
    <div id="chartDataContainer"
         data-bookings='@json($bookings ?? [])'
         data-total-price='{{ $totalPrice ?? 0 }}'
         data-chart='@json($chartData ?? [])'
         style="display: none;">
    </div>

    {{-- 3. Load config FIRST (untuk parse data) --}}
    <script src="{{ asset('js/dashboard-config.js') }}"></script>
    
    {{-- 4. Load bookings JS SECOND (untuk render chart) --}}
    <script src="{{ asset('js/dashboard-bookings.js') }}"></script>
@endsection