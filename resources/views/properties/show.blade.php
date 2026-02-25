@extends('layouts.app')

@section('title', $property->title ?? 'Detail Properti')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/property-show.css') }}">
@endsection

@section('content')
<div class="property-show-container">
    
    <!-- Back Button -->
    <a href="{{ route('properties.index') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Daftar Properti</span>
    </a>

    <!-- Property Gallery -->
    <div class="property-gallery">
        <!-- Badges -->
        <div class="gallery-badge">
            @if($property->is_featured ?? false)
            <span class="badge-featured">
                <i class="fas fa-star mr-1"></i> FEATURED
            </span>
            @endif
        </div>

        <!-- Main Image -->
        <div class="gallery-main">
            <img src="{{ $property->image_url ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" 
                 alt="{{ $property->title }}">
        </div>

        <!-- Thumbnails -->
        <div class="gallery-thumb">
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Thumbnail 1">
        </div>
        <div class="gallery-thumb">
            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00" alt="Thumbnail 2">
        </div>
    </div>

    <!-- Property Info Grid -->
    <div class="property-info-grid">
        <!-- Left Column -->
        <div class="left-column">
            <!-- Title Section -->
            <div class="title-section">
                <h1 class="property-title">{{ $property->title ?? 'Villa Eksklusif dengan Pemandangan Laut' }}</h1>
                
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $property->location ?? 'Jl. Raya Uluwatu, Bali' }}</span>
                </div>

                <div class="property-meta">
                    <div class="meta-item">
                        <div class="meta-label">Luas Bangunan</div>
                        <div class="meta-value">{{ $property->building_area ?? '250' }} m²</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Luas Tanah</div>
                        <div class="meta-value">{{ $property->land_area ?? '300' }} m²</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Tahun</div>
                        <div class="meta-value">{{ $property->year_built ?? '2024' }}</div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="section-card">
                <h2 class="section-title">
                    <i class="fas fa-align-left"></i>
                    Deskripsi
                </h2>
                <div class="description-text">
                    {{ $property->description ?? 'Villa mewah dengan pemandangan laut yang menakjubkan. Dilengkapi dengan kolam renang pribadi, taman tropis, dan akses langsung ke pantai. Cocok untuk investasi atau tempat liburan keluarga. Lokasi strategis dekat dengan berbagai fasilitas umum seperti restoran, supermarket, dan tempat wisata.' }}
                </div>
            </div>

            <!-- Specifications -->
            <div class="section-card">
                <h2 class="section-title">
                    <i class="fas fa-cog"></i>
                    Spesifikasi Bangunan
                </h2>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-icon primary">
                            <i class="fas fa-bed"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Kamar Tidur</div>
                            <div class="spec-value">{{ $property->bedrooms ?? '4' }} Kamar</div>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon success">
                            <i class="fas fa-bath"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Kamar Mandi</div>
                            <div class="spec-value">{{ $property->bathrooms ?? '3' }} Kamar</div>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon warning">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Garasi</div>
                            <div class="spec-value">{{ $property->garage ?? '2' }} Mobil</div>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon info">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Listrik</div>
                            <div class="spec-value">{{ $property->electricity ?? '5500' }} Watt</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facilities -->
            <div class="section-card">
                <h2 class="section-title">
                    <i class="fas fa-check-circle"></i>
                    Fasilitas
                </h2>
                <div class="facilities-grid">
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>AC Central</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Kolam Renang</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Keamanan 24 Jam</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Taman</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Internet</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Furnished</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Booking Card -->
        <div class="right-column">
            <div class="booking-card">
                <div class="booking-price-wrapper">
                    <div class="booking-price">
                        Rp {{ number_format($property->price ?? 2500000000, 0, ',', '.') }}
                    </div>
                    <div class="booking-period">/ {{ $property->price_unit ?? 'tahun' }}</div>
                </div>

                <div class="booking-features">
                    <div class="booking-feature">
                        <i class="fas fa-ruler-combined"></i>
                        <span>Luas: {{ $property->building_area ?? '250' }} m²</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-bed"></i>
                        <span>{{ $property->bedrooms ?? '4' }} Kamar Tidur</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-bath"></i>
                        <span>{{ $property->bathrooms ?? '3' }} Kamar Mandi</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Min. Sewa 1 Tahun</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-shield-alt"></i>
                        <span>Keamanan 24 Jam</span>
                    </div>
                </div>

                <a href="{{ route('bookings.create', $property->id) }}" class="btn-booking">
                    <i class="fas fa-calendar-check"></i>
                    Booking Sekarang
                </a>

                <!-- Agent Info -->
                <div class="agent-card" data-phone="{{ $property->agent_phone ?? '081234567890' }}">
                    <div class="agent-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="agent-info">
                        <div class="agent-label">Agent</div>
                        <div class="agent-name">{{ $property->agent_name ?? 'Budi Santoso' }}</div>
                        <div class="agent-phone">
                            <i class="fas fa-phone-alt"></i>
                            <span>{{ $property->agent_phone ?? '0812-3456-7890' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/property-show.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Additional initialization if needed
        console.log('Property show page loaded');
    });
</script>
@endsection