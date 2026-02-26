@extends('layouts.app')

@section('title', 'Booking Properti - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/booking-create.css') }}">
@endsection

@section('content')
<div class="booking-create-container">
    
    <!-- HEADER -->
    <div class="create-header">
        <h1 class="create-title">
            <i class="fas fa-calendar-plus"></i>
            Booking Properti
        </h1>
        <p class="create-subtitle">Isi form di bawah untuk melakukan booking properti</p>
    </div>

    <div class="create-grid">
        <!-- LEFT COLUMN - FORM -->
        <div class="form-column">
            <div class="form-card">
                <h2 class="form-title">
                    <i class="fas fa-file-alt"></i>
                    Form Pemesanan
                </h2>
                
                <form action="{{ route('booking.store') }}" method="POST" class="booking-form" id="bookingForm">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-building"></i>
                            Nama Properti
                        </label>
                        <input type="text" value="{{ $property->title }}" class="form-control" readonly>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar"></i>
                                Tanggal Booking
                            </label>
                            <input type="date" name="booking_date" class="form-control" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-clock"></i>
                                Jam
                            </label>
                            <input type="time" name="booking_time" class="form-control" required value="10:00">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-sticky-note"></i>
                            Catatan (opsional)
                        </label>
                        <textarea name="notes" rows="4" class="form-control" placeholder="Tambahkan catatan untuk pemilik properti..."></textarea>
                    </div>

                    <div class="price-summary">
                        <div class="price-row">
                            <span>Harga Properti</span>
                            <span class="price-value">Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="price-row">
                            <span>Booking Fee (10%)</span>
                            <span class="price-value fee">Rp {{ number_format($property->price * 0.1, 0, ',', '.') }}</span>
                        </div>
                        <div class="price-row total">
                            <span>Total Dibayar</span>
                            <span class="total-value">Rp {{ number_format($property->price * 0.1, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-credit-card"></i>
                        Lanjutkan ke Pembayaran
                    </button>
                </form>
            </div>
        </div>

        <!-- RIGHT COLUMN - HIGHCHARTS -->
        <div class="chart-column">
            <!-- Property Stats -->
            <div class="stats-card">
                <h3 class="stats-title">
                    <i class="fas fa-chart-pie"></i>
                    Statistik Properti
                </h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-label">Total Dilihat</span>
                        <span class="stat-number">1,234</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Diminati</span>
                        <span class="stat-number">89</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Booking Bulan Ini</span>
                        <span class="stat-number">12</span>
                    </div>
                </div>
            </div>

            <!-- Highcharts Section -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3 class="chart-title">
                        <i class="fas fa-chart-line"></i>
                        Tren Booking 7 Hari
                    </h3>
                    <span class="chart-badge">Properti Ini</span>
                </div>
                <div id="bookingTrendChart" class="chart-container"></div>
            </div>

            <!-- Similar Properties -->
            <div class="similar-card">
                <h3 class="similar-title">
                    <i class="fas fa-building"></i>
                    Properti Serupa
                </h3>
                <div class="similar-list">
                    <div class="similar-item">
                        <i class="fas fa-home"></i>
                        <div>
                            <strong>Villa Eksklusif</strong>
                            <small>Rp 2.5 M</small>
                        </div>
                    </div>
                    <div class="similar-item">
                        <i class="fas fa-building"></i>
                        <div>
                            <strong>Apartemen SCBD</strong>
                            <small>Rp 1.8 M</small>
                        </div>
                    </div>
                    <div class="similar-item">
                        <i class="fas fa-store"></i>
                        <div>
                            <strong>Ruko Modern</strong>
                            <small>Rp 950 Jt</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('charts')
<script src="https://code.highcharts.com/highcharts.js"></script>
@endpush

@section('scripts')
<script src="{{ asset('assets/js/booking-create.js') }}"></script>
<script>
    window.propertyStats = {
        views: 1234,
        interests: 89,
        bookings: 12,
        chartData: {
            categories: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kemarin', 'Hari Ini'],
            views: [45, 52, 38, 45, 39, 42, 28],
            interests: [12, 19, 15, 17, 14, 23, 8]
        }
    };
</script>
@endsection