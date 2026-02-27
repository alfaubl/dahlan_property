@extends('layouts.app')

@section('title', 'Daftar Properti - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/properties.css') }}">
@endsection

@section('content')
<div class="properties-wrapper">
    
    <!-- HEADER -->
    <div class="properties-header">
        <div>
            <h1 class="header-title">Jelajahi Properti</h1>
            <p class="header-subtitle">Temukan properti impian Anda dari ribuan pilihan terbaik</p>
        </div>
        <button class="filter-toggle" id="filterToggle">
            <i class="fas fa-sliders-h"></i>
            <span>Filter</span>
        </button>
    </div>

    <!-- FILTER SECTION -->
    <div class="filter-section" id="filterSection">
        <form id="filterForm">
            <div class="filter-grid">
                <div class="filter-item">
                    <label class="filter-label">Tipe Properti</label>
                    <select class="filter-select" name="type">
                        <option value="">Semua Tipe</option>
                        <option value="rumah">Rumah</option>
                        <option value="apartemen">Apartemen</option>
                        <option value="ruko">Ruko</option>
                        <option value="kantor">Kantor</option>
                        <option value="villa">Villa</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Lokasi</label>
                    <select class="filter-select" name="location">
                        <option value="">Semua Lokasi</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="bali">Bali</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Harga</label>
                    <select class="filter-select" name="price">
                        <option value="">Semua Harga</option>
                        <option value="<500">< Rp 500 Jt</option>
                        <option value="500-1000">Rp 500 Jt - 1 M</option>
                        <option value=">1000">> Rp 1 M</option>
                    </select>
                </div>
            </div>
            <div class="filter-actions">
                <button type="button" class="btn-reset" id="resetFilters">Reset</button>
                <button type="submit" class="btn-apply">Terapkan Filter</button>
            </div>
        </form>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: #3b82f6;">
                <i class="fas fa-building"></i>
            </div>
            <div>
                <div class="stat-value">1.500+</div>
                <div class="stat-label">Total Properti</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #10b981;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <div class="stat-value">1.200+</div>
                <div class="stat-label">Tersedia</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #f59e0b;">
                <i class="fas fa-clock"></i>
            </div>
            <div>
                <div class="stat-value">24/7</div>
                <div class="stat-label">Layanan</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #ef4444;">
                <i class="fas fa-smile"></i>
            </div>
            <div>
                <div class="stat-value">98%</div>
                <div class="stat-label">Kepuasan</div>
            </div>
        </div>
    </div>

    <!-- CHART SECTION -->
    <div class="chart-section">
        <div class="chart-header">
            <div>
                <h3 class="chart-title">Distribusi Properti</h3>
                <p class="chart-subtitle">Berdasarkan tipe bangunan</p>
            </div>
            <span class="chart-badge">2024</span>
        </div>
        <div id="propertiesChart" class="chart-container"></div>
    </div>

    <!-- PROPERTIES GRID -->
    <div class="properties-grid" id="propertiesGrid">
        @forelse($properties ?? [] as $property)
        <div class="property-card" data-id="{{ $property->id }}">
            <div class="property-image">
                <img src="{{ $property->main_image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="Property">
                <div class="property-price">Rp {{ number_format($property->price ?? 2500000000,0,',','.') }}</div>
                <a href="{{ route('booking.create', $property->id) }}" class="btn-booking-card">
                    <i class="fas fa-calendar-check"></i> Booking Sekarang
                </a>
            </div>
            <div class="property-details">
                <h3 class="property-title">{{ $property->title ?? 'Villa Eksklusif Bali' }}</h3>
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i> {{ $property->location ?? 'JL. Raya Uluwatu, Badung' }}
                </div>
                <div class="property-features">
                    <span><i class="fas fa-bed"></i> {{ $property->bedrooms ?? 4 }} KT</span>
                    <span><i class="fas fa-bath"></i> {{ $property->bathrooms ?? 3 }} KM</span>
                    <span><i class="fas fa-vector-square"></i> {{ $property->area ?? 250 }} m²</span>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-properties">
            <p>Belum ada properti</p>
        </div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    @if(isset($properties) && method_exists($properties, 'links'))
    <div class="pagination">
        {{ $properties->links() }}
    </div>
    @endif

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/js/properties.js') }}"></script>
@endsection