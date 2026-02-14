@extends('layouts.app')

@section('title', 'Dahlan Property - Marketplace Properti Terbaik Indonesia')

@section('styles')
    @include('partials.css.welcome-css')
@endsection

@section('content')
<!-- ========== HERO SECTION ========== -->
<section class="hero-section">
    <div class="container hero-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-3 fw-bold">Temukan Properti <span class="text-primary">Impian</span> Anda</h1>
                <p class="lead">Kami menghubungkan Anda dengan properti terbaik di Indonesia. Lebih dari <span class="fw-bold">1,250+</span> properti tersedia untuk dijual dan disewa.</p>

                <!-- Search Form -->
                <form action="{{ route('properties.index') }}" method="GET" class="search-form">
                    <div class="row g-3 justify-content-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control form-control-lg" name="search" placeholder="📍 Cari lokasi atau nama properti...">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select form-select-lg" name="type">
                                <option value="">🏠 Semua Tipe</option>
                                <option value="house">🏡 Rumah</option>
                                <option value="apartment">🏢 Apartemen</option>
                                <option value="commercial">🏬 Komersial</option>
                                <option value="villa">🏖️ Villa</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select form-select-lg" name="city">
                                <option value="">📍 Semua Kota</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Bali">Bali</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-light btn-lg w-100 btn-glow">
                                <i class="fas fa-search me-2"></i>Cari
                            </button>
                        </div>
                    </div>
                </form>

                <div class="mt-4">
                    <small class="text-white-50"><i class="fas fa-info-circle me-2"></i>Tekan Enter untuk mencari properti di seluruh Indonesia</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS SECTION ========== -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <div class="stats-counter mb-2">1,250+</div>
                    <h5 class="text-muted">Properti Tersedia</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <div class="stats-counter mb-2">500+</div>
                    <h5 class="text-muted">Klien Puas</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <div class="stats-counter mb-2">85+</div>
                    <h5 class="text-muted">Partner Agen</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <div class="stats-counter mb-2">24/7</div>
                    <h5 class="text-muted">Dukungan</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== FEATURED PROPERTIES ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Properti <span class="text-primary">Unggulan</span></h2>
                <p class="section-subtitle">Rekomendasi properti terbaik pilihan kami</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Property 1 -->
            <div class="col-md-4">
                <div class="property-card card">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Modern House">
                        <span class="category-badge bg-success">Rumah</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Rumah Modern di Pondok Indah</h5>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt"></i> Jakarta Selatan
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 3,5 M</span>
                            <span class="badge bg-primary">4 Kamar</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <!-- Property 2 -->
            <div class="col-md-4">
                <div class="property-card card">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Apartment">
                        <span class="category-badge bg-info">Apartemen</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Apartemen Mewah SCBD</h5>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt"></i> Jakarta Pusat
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 1,2 M</span>
                            <span class="badge bg-primary">2 Kamar</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <!-- Property 3 -->
            <div class="col-md-4">
                <div class="property-card card">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Villa">
                        <span class="category-badge bg-warning text-dark">Villa</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Villa Eksklusif Bali</h5>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt"></i> Badung, Bali
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">Rp 8,5 M</span>
                            <span class="badge bg-primary">6 Kamar</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('properties.index') }}" class="btn btn-primary btn-glow px-5 py-3">
                <i class="fas fa-search me-2"></i>Lihat Semua Properti
            </a>
        </div>
    </div>
</section>

<!-- ========== FEATURES SECTION ========== -->
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Mengapa Memilih <span class="text-primary">Kami</span>?</h2>
                <p class="section-subtitle">Kami memberikan pengalaman terbaik dalam mencari properti</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Aman & Terpercaya</h4>
                    <p>Semua properti terverifikasi dengan sistem keamanan berlapis untuk transaksi yang aman.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Pencarian Cerdas</h4>
                    <p>Fitur pencarian canggih dengan filter lengkap untuk menemukan properti sesuai kebutuhan.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>Dukungan 24/7</h4>
                    <p>Tim customer service siap membantu Anda kapan saja melalui berbagai channel komunikasi.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    @include('partials.js.welcome-js')
@endsection