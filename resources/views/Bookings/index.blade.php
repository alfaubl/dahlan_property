@extends('layouts.app')

@section('title', 'Booking Saya - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/bookings.css') }}">
@endsection

@section('content')
<div class="bookings-container">
    
    <!-- HEADER SECTION -->
    <div class="header-section">
        <div class="header-left">
            <h1>
                <i class="fas fa-calendar-check"></i>
                Daftar Booking Saya
            </h1>
            <p>
                <span class="status-dot"></span>
                Kelola status booking properti Anda
            </p>
        </div>
        <a href="{{ route('properties.index') }}" class="btn-booking">
            <i class="fas fa-plus-circle"></i>
            <span>Booking Baru</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Total Booking</span>
                <span class="stat-value">{{ $totalBookings ?? 0 }}</span>
                <span class="stat-trend">
                    <i class="fas fa-arrow-up"></i> All time
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Menunggu</span>
                <span class="stat-value">{{ $pendingBookings ?? 0 }}</span>
                <span class="stat-trend">
                    <i class="fas fa-hourglass-half"></i> Perlu tindakan
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Selesai</span>
                <span class="stat-value">{{ $successBookings ?? 0 }}</span>
                <span class="stat-trend">
                    <i class="fas fa-check"></i> Berhasil
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cancelled">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Dibatalkan</span>
                <span class="stat-value">{{ $cancelledBookings ?? 0 }}</span>
                <span class="stat-trend">
                    <i class="fas fa-ban"></i> Batal
                </span>
            </div>
        </div>
    </div>

    <!-- CHART SECTION -->
    <div class="chart-card">
        <div class="chart-header">
            <div class="chart-title">
                <div class="chart-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <h3>Statistik 7 Hari Terakhir</h3>
                    <p>Perkembangan booking properti Anda</p>
                </div>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-dot success"></span>
                    <span>Sukses</span>
                </div>
                <div class="legend-item">
                    <span class="legend-dot pending"></span>
                    <span>Pending</span>
                </div>
                <div class="legend-item">
                    <span class="legend-dot cancelled"></span>
                    <span>Batal</span>
                </div>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="bookingsChart"></canvas>
        </div>
    </div>

    <!-- FILTER SECTION -->
    <div class="filter-section">
        <div class="filter-tabs">
            <button class="filter-btn active" data-filter="all">
                <i class="fas fa-list"></i> Semua
            </button>
            <button class="filter-btn" data-filter="pending">
                <i class="fas fa-clock"></i> Menunggu
            </button>
            <button class="filter-btn" data-filter="success">
                <i class="fas fa-check-circle"></i> Selesai
            </button>
            <button class="filter-btn" data-filter="cancelled">
                <i class="fas fa-times-circle"></i> Batal
            </button>
        </div>
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Cari ID atau properti...">
        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="table-card">
        <div class="table-header">
            <h3>
                <i class="fas fa-history"></i>
                Riwayat Booking
            </h3>
            <span class="table-count">{{ $bookings->total() ?? 0 }} total</span>
        </div>

        <div class="table-responsive">
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Properti</th>
                        <th>Tanggal</th>
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
                        <td>
                            <span class="booking-id">#{{ substr($booking->booking_code ?? $booking->id, -4) }}</span>
                        </td>
                        <td>
                            <div class="property-info">
                                <strong>{{ $booking->property->title ?? '-' }}</strong>
                                <small>{{ $booking->property->location ?? '-' }}</small>
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->addDays(7)->format('d/m') }}</td>
                        <td>
                            <span class="booking-price">Rp{{ number_format($booking->total_price ?? 0,0,',','.') }}</span>
                        </td>
                        <td>
                            @php
                            $status = $booking->status ?? 'pending';
                            $badgeClass = 'badge-pending';
                            $badgeIcon = 'fa-clock';
                            if($status === 'success') {
                                $badgeClass = 'badge-success';
                                $badgeIcon = 'fa-check-circle';
                            } elseif($status === 'cancelled') {
                                $badgeClass = 'badge-cancelled';
                                $badgeIcon = 'fa-times-circle';
                            }
                            @endphp
                            <span class="status-badge {{ $badgeClass }}">
                                <i class="fas {{ $badgeIcon }}"></i>
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('booking.show', $booking->id) }}" class="action-btn btn-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($booking->status == 'pending')
                                    <a href="#" class="action-btn btn-pay" title="Bayar" onclick="bayar({{ $booking->id }}); return false;">
                                        <i class="fas fa-credit-card"></i>
                                    </a>
                                    <button class="action-btn btn-cancel" title="Batalkan" onclick="batal({{ $booking->id }}); return false;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <i class="fas fa-calendar-times"></i>
                                <h3>Belum Ada Booking</h3>
                                <p>Mulai booking properti impian Anda sekarang</p>
                                <a href="{{ route('properties.index') }}" class="empty-btn">
                                    <i class="fas fa-search"></i> Cari Properti
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($bookings) && method_exists($bookings, 'links'))
        <div class="pagination">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@push('charts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('scripts')
<script src="{{ asset('assets/js/bookings.js') }}"></script>
<script>
window.bookingData = {
success: {!! json_encode($chartSuccess ?? [0,0,0,0,0,0,0]) !!},
pending: {!! json_encode($chartPending ?? [0,0,0,0,0,0,0]) !!},
cancelled: {!! json_encode($chartCancelled ?? [0,0,0,0,0,0,0]) !!},
categories: {!! json_encode($chartCategories ?? ['20 Feb','21 Feb','22 Feb','23 Feb','24 Feb','25 Feb','26 Feb']) !!}
};
</script>
@endsection