@extends('layouts.app')

@section('title', 'Jelajahi Properti - Dahlan Property')

@section('styles')
    @include('partials.css.properties-index-css')
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-properties">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="fw-bold">Jelajahi Properti Premium</h1>
                <p class="lead">Temukan rumah impian, apartemen mewah, atau properti komersial strategis di lokasi terbaik Indonesia.</p>
                
                <!-- Search Box -->
                <div class="search-box">
                    <input type="text" class="form-control flex-grow-1" placeholder="Cari lokasi atau nama properti...">
                    <select class="form-select w-auto">
                        <option selected>Semua Tipe</option>
                        <option>Rumah</option>
                        <option>Apartemen</option>
                        <option>Ruko</option>
                        <option>Kantor</option>
                        <option>Villa</option>
                    </select>
                    <button class="btn-search px-4">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Properties Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Filter Sidebar -->
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h5 class="filter-title">
                        <i class="fas fa-filter"></i>Filter Pencarian
                    </h5>
                    
                    <!-- Price Range -->
                    <div class="filter-group">
                        <label class="filter-label">Rentang Harga</label>
                        <select class="form-select">
                            <option selected>Semua Harga</option>
                            <option>< Rp 500 Juta</option>
                            <option>Rp 500 Jt - Rp 1 M</option>
                            <option>Rp 1 M - Rp 2 M</option>
                            <option>Rp 2 M - Rp 5 M</option>
                            <option>> Rp 5 Miliar</option>
                        </select>
                    </div>
                    
                    <!-- Bedrooms -->
                    <div class="filter-group">
                        <label class="filter-label">Kamar Tidur</label>
                        <select class="form-select">
                            <option selected>Semua</option>
                            <option>1+ Kamar</option>
                            <option>2+ Kamar</option>
                            <option>3+ Kamar</option>
                            <option>4+ Kamar</option>
                        </select>
                    </div>
                    
                    <!-- Bathrooms -->
                    <div class="filter-group">
                        <label class="filter-label">Kamar Mandi</label>
                        <select class="form-select">
                            <option selected>Semua</option>
                            <option>1+ Kamar Mandi</option>
                            <option>2+ Kamar Mandi</option>
                            <option>3+ Kamar Mandi</option>
                        </select>
                    </div>
                    
                    <!-- Status -->
                    <div class="filter-group">
                        <label class="filter-label">Status</label>
                        <select class="form-select">
                            <option selected>Semua</option>
                            <option>Dijual</option>
                            <option>Disewa</option>
                        </select>
                    </div>
                    
                    <!-- Sort -->
                    <div class="filter-group">
                        <label class="filter-label">Urutkan</label>
                        <select class="form-select">
                            <option>Terbaru</option>
                            <option>Harga Tertinggi</option>
                            <option>Harga Terendah</option>
                            <option>Terpopuler</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-outline-primary w-100 mt-3">
                        <i class="fas fa-redo-alt me-2"></i>Reset Filter
                    </button>
                </div>
            </div>
            
            <!-- Properties Grid -->
            <div class="col-lg-9">
                <div class="results-header">
                    <h5 class="fw-bold mb-0">
                        <span id="propertyCount">0</span> Properti Ditemukan
                    </h5>
                    <span class="text-muted">
                        <i class="fas fa-map-marker-alt me-1 text-primary"></i> 15 Kota
                    </span>
                </div>
                
                <!-- Empty State -->
                <div class="empty-state">
                    <i class="fas fa-building"></i>
                    <h3>Belum Ada Properti</h3>
                    <p>Saat ini belum ada properti yang terdaftar. Silakan tambahkan properti baru.</p>
                    
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('properties.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Tambah Properti Pertama
                            </a>
                        @else
                            <p class="text-muted">Hubungi admin untuk menambahkan properti.</p>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Login untuk Melihat
                        </a>
                    @endauth
                </div>
                
                <!-- Property Cards (Commented out - will be shown when data exists) -->
                <!-- 
                <div class="row g-4">
                    @forelse($properties as $property)
                    <div class="col-md-6 col-xl-4">
                        <div class="property-card card">
                            <div class="property-image">
                                <span class="property-badge">{{ $property->status }}</span>
                                <span class="property-type">{{ $property->type }}</span>
                                <img src="{{ $property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" alt="Property">
                            </div>
                            <div class="card-body">
                                <div class="property-price">
                                    Rp {{ number_format($property->price, 0, ',', '.') }}
                                    <small>/{{ $property->purpose == 'sale' ? 'jual' : 'bulan' }}</small>
                                </div>
                                <h5 class="property-title">{{ $property->title }}</h5>
                                <div class="property-address">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $property->address }}, {{ $property->city }}
                                </div>
                                <div class="property-features">
                                    <span class="property-feature">
                                        <i class="fas fa-bed"></i> {{ $property->bedrooms ?? '-' }} KT
                                    </span>
                                    <span class="property-feature">
                                        <i class="fas fa-bath"></i> {{ $property->bathrooms ?? '-' }} KM
                                    </span>
                                    <span class="property-feature">
                                        <i class="fas fa-vector-square"></i> {{ $property->area ?? '-' }} m²
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="fas fa-building"></i>
                            <h3>Belum Ada Properti</h3>
                            <p>Saat ini belum ada properti yang terdaftar.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <nav aria-label="Page navigation" class="mt-5">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
                -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    @include('partials.js.properties-index-js')
@endsection