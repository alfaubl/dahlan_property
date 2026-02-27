@extends('layouts.app')

@section('title', 'Jelajahi Properti - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/properties.css') }}">
@endsection

@section('content')
<div class="properties-wrapper">
    
    <!-- ===== HERO SECTION ===== -->
    <div class="hero-section">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-crown"></i> Premium Properties
            </span>
            <h1 class="hero-title">Jelajahi Properti <span class="hero-highlight">Impian</span> Anda</h1>
            <p class="hero-subtitle">Temukan ribuan properti berkualitas dengan harga terbaik di Indonesia</p>
            
            <!-- Search Bar -->
            <div class="hero-search">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Cari properti berdasarkan lokasi, nama, atau tipe...">
                <button class="search-btn">Cari</button>
            </div>
            
            <!-- Stats -->
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-value">1500+</span>
                    <span class="hero-stat-label">Properti</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">500+</span>
                    <span class="hero-stat-label">Kota</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">98%</span>
                    <span class="hero-stat-label">Kepuasan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FILTER SECTION ===== -->
    <div class="filter-section" id="filterSection">
        <div class="filter-header">
            <h3><i class="fas fa-sliders-h"></i> Filter Pencarian</h3>
            <button class="filter-toggle" id="filterToggle">
                <i class="fas fa-chevron-up"></i>
            </button>
        </div>
        <div class="filter-body" id="filterBody">
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
                            <option value="medan">Medan</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Kamar Tidur</label>
                        <select class="filter-select" name="bedrooms">
                            <option value="">Semua</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Harga Minimal</label>
                        <select class="filter-select" name="min_price">
                            <option value="">Minimal</option>
                            <option value="100">Rp 100 Jt</option>
                            <option value="500">Rp 500 Jt</option>
                            <option value="1000">Rp 1 M</option>
                            <option value="2000">Rp 2 M</option>
                            <option value="5000">Rp 5 M</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Harga Maksimal</label>
                        <select class="filter-select" name="max_price">
                            <option value="">Maksimal</option>
                            <option value="500">Rp 500 Jt</option>
                            <option value="1000">Rp 1 M</option>
                            <option value="2000">Rp 2 M</option>
                            <option value="5000">Rp 5 M</option>
                            <option value="10000">Rp 10 M</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Status</label>
                        <select class="filter-select" name="status">
                            <option value="">Semua</option>
                            <option value="available">Tersedia</option>
                            <option value="sold">Terjual</option>
                            <option value="rented">Disewa</option>
                        </select>
                    </div>
                </div>
                <div class="filter-actions">
                    <button type="button" class="btn-reset" id="resetFilters">
                        <i class="fas fa-redo-alt"></i> Reset
                    </button>
                    <button type="submit" class="btn-apply">
                        <i class="fas fa-search"></i> Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalProperties ?? 1500 }}+</span>
                <span class="stat-label">Total Properti</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon available">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $availableProperties ?? 1200 }}+</span>
                <span class="stat-label">Tersedia</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cities">
                <i class="fas fa-city"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $totalCities ?? 500 }}+</span>
                <span class="stat-label">Kota</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon satisfaction">
                <i class="fas fa-smile"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value">{{ $satisfactionRate ?? 98 }}%</span>
                <span class="stat-label">Kepuasan</span>
            </div>
        </div>
    </div>

    <!-- ===== APEXCHARTS SECTION ===== -->
    <div class="chart-section">
        <div class="chart-header">
            <div class="chart-title-wrapper">
                <div class="chart-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div>
                    <h3 class="chart-title">Distribusi Properti</h3>
                    <p class="chart-subtitle">Berdasarkan tipe bangunan • Update real-time</p>
                </div>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-color" style="background: #3b82f6;"></span>
                    <span>Rumah</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #10b981;"></span>
                    <span>Apartemen</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #f59e0b;"></span>
                    <span>Ruko</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #ef4444;"></span>
                    <span>Kantor</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #8b5cf6;"></span>
                    <span>Villa</span>
                </div>
            </div>
        </div>
        <div id="propertiesChart" class="chart-container"></div>
    </div>

    <!-- ===== PROPERTIES GRID ===== -->
    <div class="section-header">
        <h2 class="section-title">
            <i class="fas fa-building"></i>
            Properti Pilihan
        </h2>
        <span class="section-badge">{{ $properties->total() ?? 0 }} Properti</span>
    </div>

    <div class="properties-grid" id="propertiesGrid">
        @forelse($properties ?? [] as $property)
        <div class="property-card" data-id="{{ $property->id }}">
            <div class="property-badge {{ $property->status }}">
                {{ $property->status == 'available' ? 'Tersedia' : ($property->status == 'sold' ? 'Terjual' : 'Disewa') }}
            </div>
            <div class="property-image">
                <img src="{{ $property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="{{ $property->title }}">
                <div class="property-price">
                    Rp {{ number_format($property->price ?? 2500000000, 0, ',', '.') }}
                </div>
            </div>
            <div class="property-details">
                <h3 class="property-title">{{ $property->title ?? 'Villa Eksklusif Bali' }}</h3>
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $property->location ?? 'JL. Raya Uluwatu, Badung' }}
                </div>
                <div class="property-features">
                    <div class="feature">
                        <i class="fas fa-bed"></i>
                        <span>{{ $property->bedrooms ?? 4 }} KT</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-bath"></i>
                        <span>{{ $property->bathrooms ?? 3 }} KM</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-vector-square"></i>
                        <span>{{ $property->area ?? 250 }} m²</span>
                    </div>
                </div>
                <div class="property-footer">
                    <div class="property-agent">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($property->agent ?? 'Dahlan') }}&background=3b82f6&color=fff" alt="Agent">
                        <span>{{ $property->agent ?? 'Ahmad Dahlan' }}</span>
                    </div>
                    <a href="{{ route('booking.create', $property->id) }}" class="btn-booking">
                        <i class="fas fa-calendar-check"></i>
                        Booking
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-building empty-icon"></i>
            <h3>Belum Ada Properti</h3>
            <p>Properti akan segera ditambahkan. Silakan cek kembali nanti.</p>
            <a href="{{ route('dashboard') }}" class="empty-btn">Kembali ke Dashboard</a>
        </div>
        @endforelse
    </div>

    <!-- ===== PAGINATION ===== -->
    @if(isset($properties) && method_exists($properties, 'links'))
    <div class="pagination-wrapper">
        {{ $properties->links() }}
    </div>
    @endif

    <!-- ===== CTA SECTION ===== -->
    <div class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Tidak Menemukan Properti yang Dicari?</h2>
            <p class="cta-text">Tim kami siap membantu Anda menemukan properti impian</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="cta-btn-primary">
                    <i class="fas fa-headset"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('properties.create') }}" class="cta-btn-secondary">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Properti
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/js/properties.js') }}"></script>
@endsection