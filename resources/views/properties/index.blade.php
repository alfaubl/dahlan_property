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
                <input type="text" id="heroSearchInput" placeholder="Cari properti berdasarkan lokasi, nama, atau tipe...">
                <button class="search-btn" onclick="searchProperty()">Cari</button>
            </div>
            
            <!-- Stats -->
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-value">{{ $totalProperties ?? 1500 }}+</span>
                    <span class="hero-stat-label">Properti</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">{{ $totalCities ?? 500 }}+</span>
                    <span class="hero-stat-label">Kota</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value">{{ $satisfactionRate ?? 98 }}%</span>
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
            <form id="filterForm" action="{{ route('properties.index') }}" method="GET">
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
                            <option value="100000000">Rp 100 Jt</option>
                            <option value="500000000">Rp 500 Jt</option>
                            <option value="1000000000">Rp 1 M</option>
                            <option value="2000000000">Rp 2 M</option>
                            <option value="5000000000">Rp 5 M</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Harga Maksimal</label>
                        <select class="filter-select" name="max_price">
                            <option value="">Maksimal</option>
                            <option value="500000000">Rp 500 Jt</option>
                            <option value="1000000000">Rp 1 M</option>
                            <option value="2000000000">Rp 2 M</option>
                            <option value="5000000000">Rp 5 M</option>
                            <option value="10000000000">Rp 10 M</option>
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
            <!-- Status Badge -->
            <div class="property-badge {{ $property->status ?? 'available' }}">
                {{ $property->status == 'available' ? 'Tersedia' : ($property->status == 'sold' ? 'Terjual' : 'Disewa') }}
            </div>
            
            <!-- ✅ FAVORITE BUTTON (WISHLIST) -->
            @auth
                <button class="btn-favorite {{ in_array($property->id, $favoriteIds ?? []) ? 'active' : '' }}" 
                        data-property-id="{{ $property->id }}" 
                        onclick="toggleFavorite({{ $property->id }})" 
                        title="{{ in_array($property->id, $favoriteIds ?? []) ? 'Hapus dari favorit' : 'Tambah ke favorit' }}">
                    <i class="fas fa-heart"></i>
                </button>
            @else
                <a href="{{ route('login') }}" class="btn-favorite" title="Login untuk favorite">
                    <i class="fas fa-heart"></i>
                </a>
            @endauth
            
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
                    {{ $property->location ?? $property->city ?? 'JL. Raya Uluwatu, Badung' }}
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
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($property->agent ?? $property->user->name ?? 'Dahlan') }}&background=3b82f6&color=fff" alt="Agent">
                        <span>{{ $property->agent ?? $property->user->name ?? 'Ahmad Dahlan' }}</span>
                    </div>
                    <div class="property-actions">
                        <a href="{{ route('properties.show', $property->id) }}" class="btn-detail" title="Lihat Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('booking.create', $property->id) }}" class="btn-booking">
                            <i class="fas fa-calendar-check"></i>
                            Booking
                        </a>
                    </div>
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
{{-- ✅ FIX: Hapus spasi di URL CDN --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('assets/js/properties.js') }}"></script>
<script>
// ===== TOGGLE FAVORITE FUNCTION =====
function toggleFavorite(propertyId) {
    fetch(`/wishlist/toggle/${propertyId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const btn = document.querySelector(`.btn-favorite[data-property-id="${propertyId}"]`);
            if (data.action === 'added') {
                btn.classList.add('active');
                showToast('✅ Ditambahkan ke favorit');
            } else {
                btn.classList.remove('active');
                showToast('❌ Dihapus dari favorit');
            }
        } else {
            showToast('⚠️ ' + (data.message || 'Terjadi kesalahan'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('⚠️ Terjadi kesalahan');
    });
}

// ===== SHOW TOAST NOTIFICATION =====
function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = message;
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #1f2937;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
        font-size: 14px;
        font-weight: 500;
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

// Add animation keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);

// ===== SEARCH FUNCTION =====
function searchProperty() {
    const query = document.getElementById('heroSearchInput').value;
    if (query) {
        window.location.href = `{{ route('properties.index') }}?search=${encodeURIComponent(query)}`;
    }
}

// ===== ENTER KEY SEARCH =====
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('heroSearchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchProperty();
            }
        });
    }
});
</script>
@endsection