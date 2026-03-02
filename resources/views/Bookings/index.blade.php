@extends('layouts.app')

@section('title', 'Daftar Booking Saya - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/bookings.css') }}">
@endsection

<meta name="viewport" content="width=device-width, initial-scale=1.0">
@section('content')
<div class="bookings-wrapper">
    
    <!-- ===== HEADER ===== -->
    <div class="bookings-header">
        <div class="header-left">
            <h1 class="header-title">
                <i class="fas fa-calendar-check"></i>
                Daftar Booking Saya
            </h1>
            <p class="header-subtitle">Kelola dan lihat status booking properti Anda</p>
        </div>
        <a href="{{ route('properties.index') }}" class="btn-booking-new">
            <i class="fas fa-plus-circle"></i>
            <span>Booking Baru</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalBookings ?? 0 }}</span>
                <span class="stat-label">Total Booking</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $pendingBookings ?? 0 }}</span>
                <span class="stat-label">Menunggu</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $successBookings ?? 0 }}</span>
                <span class="stat-label">Selesai</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cancelled">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $cancelledBookings ?? 0 }}</span>
                <span class="stat-label">Dibatalkan</span>
            </div>
        </div>
    </div>

    <!-- ===== CHART SECTION ===== -->
    <div class="chart-section">
        <div class="chart-header">
            <div class="chart-title-wrapper">
                <div class="chart-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <h3 class="chart-title">Statistik Booking</h3>
                    <p class="chart-subtitle">7 hari terakhir</p>
                </div>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-color success"></span>
                    <span>Sukses</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color pending"></span>
                    <span>Pending</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color cancelled"></span>
                    <span>Batal</span>
                </div>
            </div>
        </div>
        <div id="bookingsChart" class="chart-container"></div>
    </div>

    <!-- ===== FILTER SECTION ===== -->
    <div class="filter-section">
        <div class="filter-tabs">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="pending">Menunggu</button>
            <button class="filter-btn" data-filter="success">Selesai</button>
            <button class="filter-btn" data-filter="cancelled">Dibatalkan</button>
        </div>
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Cari booking...">
        </div>
    </div>

    <!-- ===== BOOKINGS TABLE ===== -->
    <div class="table-section">
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
                <tr data-status="{{ $booking->status }}" data-id="{{ $booking->id }}">
                    <td>
                        <span class="booking-id">#{{ $booking->booking_code ?? $booking->id }}</span>
                    </td>
                    <td>
                        <div class="property-info">
                            <strong>{{ $booking->property->title ?? '-' }}</strong>
                            <small>{{ $booking->property->location ?? '-' }}</small>
                        </div>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->addDays(7)->format('d/m/Y') }}</td>
                    <td class="booking-price">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</td>
                    <td>
                        @php
                            $badgeClass = match($booking->status) {
                                'pending' => 'badge-pending',
                                'success' => 'badge-success',
                                'cancelled' => 'badge-cancelled',
                                default => 'badge-pending'
                            };
                            $badgeIcon = match($booking->status) {
                                'pending' => 'fa-clock',
                                'success' => 'fa-check-circle',
                                'cancelled' => 'fa-times-circle',
                                default => 'fa-clock'
                            };
                        @endphp
                        <span class="status-badge {{ $badgeClass }}">
                            <i class="fas {{ $badgeIcon }}"></i>
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('booking.show', $booking->id) }}" class="action-btn btn-view" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($booking->status == 'pending')
                                <a href="{{ route('payment.process', $booking->id) }}" class="action-btn btn-pay" title="Bayar">
                                    <i class="fas fa-credit-card"></i>
                                </a>
                                <button class="action-btn btn-cancel" onclick="cancelBooking({{ $booking->id }})" title="Batalkan">
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

    <!-- ===== PAGINATION ===== -->
    @if(isset($bookings) && method_exists($bookings, 'links'))
    <div class="pagination">
        {{ $bookings->links() }}
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/js/bookings.js') }}"></script>
<script>
    window.bookingData = {
        success: {!! json_encode($chartSuccess ?? [0,0,0,0,0,0,0]) !!},
        pending: {!! json_encode($chartPending ?? [0,0,0,0,0,0,0]) !!},
        cancelled: {!! json_encode($chartCancelled ?? [0,0,0,0,0,0,0]) !!},
        categories: {!! json_encode($chartCategories ?? ['21 Feb','22 Feb','23 Feb','24 Feb','25 Feb','26 Feb','27 Feb']) !!}
    };
    window.csrfToken = '{{ csrf_token() }}';
</script>
@endsection