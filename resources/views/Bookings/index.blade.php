@extends('layouts.app')

@section('title', 'Booking Saya - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/bookings.css') }}">
@endsection

@section('content')
<div class="bookings-wrapper" data-animate="true">
    
    <!-- HEADER -->
    <div class="bookings-header">
        <div class="header-title">
            <h1>📋 Daftar Booking Saya</h1>
            <p>Kelola status booking properti Anda</p>
        </div>
        <a href="{{ route('properties.index') }}" class="btn-booking">
            <i class="fas fa-plus"></i>
            <span>Booking Baru</span>
        </a>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <h3>Total Booking</h3>
                <p class="stat-value">{{ $totalBookings ?? 0 }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3>Menunggu</h3>
                <p class="stat-value">{{ $pendingBookings ?? 0 }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>Selesai</h3>
                <p class="stat-value">{{ $successBookings ?? 0 }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cancelled">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-info">
                <h3>Dibatalkan</h3>
                <p class="stat-value">{{ $cancelledBookings ?? 0 }}</p>
            </div>
        </div>
    </div>

    <!-- CHART SECTION -->
    <div class="chart-card">
        <div class="chart-header">
            <div class="chart-title">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>Statistik 7 Hari Terakhir</h3>
                    <p>Perkembangan booking properti</p>
                </div>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-color success"></span>
                    <span class="legend-text">Sukses</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color pending"></span>
                    <span class="legend-text">Pending</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color cancelled"></span>
                    <span class="legend-text">Batal</span>
                </div>
            </div>
        </div>
        <div id="bookingsChart" class="chart-container"></div>
    </div>

    <!-- FILTER SECTION -->
    <div class="filter-section">
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">Semua</button>
            <button class="filter-tab" data-filter="pending">Menunggu</button>
            <button class="filter-tab" data-filter="success">Selesai</button>
            <button class="filter-tab" data-filter="cancelled">Batal</button>
            <button class="filter-tab" data-filter="expired">Kadaluarsa</button>
        </div>
        <div class="filter-search">
            <input type="text" id="searchInput" placeholder="Cari ID atau properti...">
            <button id="searchBtn"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="table-section">
        <table class="bookings-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Properti</th>
                    <th>Tgl</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @forelse($bookings ?? [] as $booking)
                <tr data-status="{{ $booking->status ?? 'pending' }}" data-id="{{ $booking->id }}">
                    <td><span class="booking-id">#{{ substr($booking->booking_code ?? $booking->id, -4) }}</span></td>
                    <td>
                        <div class="property-name">{{ Str::limit($booking->property->title ?? 'Property', 15) }}</div>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ Str::limit($booking->property->location ?? 'Jakarta', 10) }}
                        </div>
                    </td>
                    <td class="date-text">{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m') }}</td>
                    <td class="date-text">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m') }}</td>
                    <td class="date-text">{{ \Carbon\Carbon::parse($booking->booking_date)->addDays(7)->format('d/m') }}</td>
                    <td class="booking-price">Rp{{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</td>
                    <td>
                        @php
                            $statusClass = '';
                            $statusIcon = '';
                            $statusText = '';
                            
                            switch($booking->status) {
                                case 'pending':
                                    $statusClass = 'status-pending';
                                    $statusIcon = 'fa-clock';
                                    $statusText = 'Pending';
                                    break;
                                case 'success':
                                    $statusClass = 'status-success';
                                    $statusIcon = 'fa-check-circle';
                                    $statusText = 'Sukses';
                                    break;
                                case 'cancelled':
                                    $statusClass = 'status-cancelled';
                                    $statusIcon = 'fa-times-circle';
                                    $statusText = 'Batal';
                                    break;
                                case 'expired':
                                    $statusClass = 'status-expired';
                                    $statusIcon = 'fa-hourglass-end';
                                    $statusText = 'Expired';
                                    break;
                                default:
                                    $statusClass = 'status-pending';
                                    $statusIcon = 'fa-clock';
                                    $statusText = 'Pending';
                            }
                        @endphp
                        <span class="status-badge {{ $statusClass }}">
                            <i class="fas {{ $statusIcon }}"></i>
                            {{ $statusText }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('booking.show', $booking->id) }}" class="action-btn btn-view" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($booking->status == 'pending')
                                <a href="#" class="action-btn btn-pay" title="Bayar">
                                    <i class="fas fa-credit-card"></i>
                                </a>
                                <button class="action-btn btn-cancel" title="Batal">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="empty-state">
                        <i class="fas fa-calendar-times empty-icon"></i>
                        <p>Belum ada booking</p>
                        <a href="{{ route('properties.index') }}" class="empty-btn">
                            <i class="fas fa-search"></i> Cari Properti
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('charts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endpush

@section('scripts')
<script src="{{ asset('assets/js/bookings.js') }}"></script>
<script>
    window.bookingData = {
        success: @json($chartSuccess ?? [12, 19, 15, 17, 14, 23, 8]),
        pending: @json($chartPending ?? [5, 7, 4, 6, 8, 5, 3]),
        cancelled: @json($chartCancelled ?? [2, 1, 3, 2, 1, 2, 1]),
        categories: @json($chartCategories ?? ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kmr', 'H Ini'])
    };
</script>
@endsection         