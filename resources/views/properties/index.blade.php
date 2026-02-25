@extends('layouts.app')

@section('title', 'Daftar Properti - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/properties.css') }}">
@endsection

@section('content')
<div class="space-y-6 animate-slideIn">
    
    <!-- Header -->
    <div class="properties-header">
        <h1 class="properties-title">Jelajahi Properti</h1>
        <p class="properties-subtitle">Temukan properti impian Anda dari ribuan pilihan terbaik</p>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <form id="filterForm" method="GET" action="{{ route('properties.index') }}">
            <div class="filter-grid">
                <div class="filter-item">
                    <label class="filter-label">Tipe Properti</label>
                    <select name="type" class="filter-select">
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
                    <select name="location" class="filter-select">
                        <option value="">Semua Lokasi</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bogor">Bogor</option>
                        <option value="depok">Depok</option>
                        <option value="tangerang">Tangerang</option>
                        <option value="bekasi">Bekasi</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="bali">Bali</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label class="filter-label">Harga Minimal</label>
                    <select name="min_price" class="filter-select">
                        <option value="">Minimal</option>
                        <option value="100000000">Rp 100 Jt</option>
                        <option value="250000000">Rp 250 Jt</option>
                        <option value="500000000">Rp 500 Jt</option>
                        <option value="1000000000">Rp 1 M</option>
                        <option value="2000000000">Rp 2 M</option>
                        <option value="5000000000">Rp 5 M</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label class="filter-label">Harga Maksimal</label>
                    <select name="max_price" class="filter-select">
                        <option value="">Maksimal</option>
                        <option value="250000000">Rp 250 Jt</option>
                        <option value="500000000">Rp 500 Jt</option>
                        <option value="1000000000">Rp 1 M</option>
                        <option value="2000000000">Rp 2 M</option>
                        <option value="5000000000">Rp 5 M</option>
                        <option value="10000000000">Rp 10 M</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label class="filter-label">Kamar Tidur</label>
                    <select name="bedrooms" class="filter-select">
                        <option value="">Semua</option>
                        <option value="1">1+ KT</option>
                        <option value="2">2+ KT</option>
                        <option value="3">3+ KT</option>
                        <option value="4">4+ KT</option>
                        <option value="5">5+ KT</option>
                    </select>
                </div>
            </div>

            <div class="filter-actions">
                <button type="button" id="resetFilters" class="btn-filter btn-filter-secondary">
                    <i class="fas fa-redo-alt"></i>
                    Reset Filter
                </button>
                <button type="submit" class="btn-filter btn-filter-primary">
                    <i class="fas fa-search"></i>
                    Terapkan Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Properties Grid -->
    <div class="properties-grid">
        @forelse($properties ?? [] as $property)
        <div class="property-card" data-property-id="{{ $property->id }}">
            <!-- Badges -->
            <div class="property-badge">
                @if($property->is_featured ?? false)
                <span class="badge badge-primary">
                    <i class="fas fa-star mr-1"></i> Featured
                </span>
                @endif
                @if(($property->status ?? '') === 'available')
                <span class="badge badge-success">Tersedia</span>
                @endif
            </div>

            <!-- Image -->
            <div class="property-image">
                <img src="{{ $property->image_url ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" 
                     alt="{{ $property->title }}">
                <div class="property-price-tag">
                    Rp {{ number_format($property->price ?? 0, 0, ',', '.') }}
                </div>
            </div>

            <!-- Details -->
            <div class="property-details">
                <h3 class="property-title">{{ $property->title ?? 'Property Title' }}</h3>
                
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->location ?? 'Jakarta' }}</span>
                </div>

                <div class="property-features">
                    <div class="feature-item">
                        <i class="fas fa-bed"></i>
                        <span>{{ $property->bedrooms ?? 3 }} KT</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-bath"></i>
                        <span>{{ $property->bathrooms ?? 2 }} KM</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-vector-square"></i>
                        <span>{{ $property->area ?? 150 }} m²</span>
                    </div>
                </div>

                <div class="property-footer">
                    <div class="property-agent">
                        <div class="agent-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="agent-name">{{ $property->agent_name ?? 'John Doe' }}</span>
                    </div>
                    
                    <button class="btn-wishlist" data-property-id="{{ $property->id }}">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="empty-state" style="grid-column: 1/-1;">
            <div class="empty-state-icon">
                <i class="fas fa-building"></i>
            </div>
            <h3 class="empty-state-title">Belum Ada Properti</h3>
            <p class="empty-state-text">Belum ada properti yang tersedia saat ini.</p>
            <a href="{{ route('home') }}" class="btn-primary" style="display: inline-flex;">
                <i class="fas fa-home mr-2"></i>
                Kembali ke Beranda
            </a>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if(isset($properties) && method_exists($properties, 'links'))
    <div class="pagination">
        {{ $properties->links() }}
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/properties.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize wishlist state from server if needed
        @auth
        // Load user's wishlist
        @endauth
    });
</script>
@endsection