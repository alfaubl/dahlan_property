@extends('layouts.app')

@section('title', $property->title . ' - Dahlan Property')

@section('styles')
    @include('partials.css.property-show-css')
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Kolom Kiri: Detail Properti -->
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('properties.index') }}">Jelajahi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $property->title }}</li>
                </ol>
            </nav>
            
            <h1 class="fw-bold mb-3">{{ $property->title }}</h1>
            
            <div class="d-flex align-items-center text-muted mb-4">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <span>{{ $property->address }}, {{ $property->city }}, {{ $property->province }}</span>
            </div>
            
            <div class="property-price mb-4">
                <span class="h2 fw-bold text-primary">Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                <span class="text-muted">/{{ $property->purpose == 'sale' ? 'Jual' : 'Sewa' }}</span>
            </div>
            
            @if($property->images)
            <div class="property-gallery mb-4">
                <img src="{{ $property->images[0] ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994' }}" 
                     alt="{{ $property->title }}" class="img-fluid rounded-4 w-100" style="height: 400px; object-fit: cover;">
            </div>
            @endif
            
            <div class="property-description mb-5">
                <h5 class="fw-bold mb-3">Deskripsi</h5>
                <p class="text-muted">{{ $property->description }}</p>
            </div>
            
            <div class="property-features mb-5">
                <h5 class="fw-bold mb-3">Fasilitas</h5>
                <div class="row g-3">
                    @if($property->bedrooms)
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-bed fa-2x text-primary mb-2"></i>
                            <span class="d-block">{{ $property->bedrooms }} Kamar Tidur</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($property->bathrooms)
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-bath fa-2x text-primary mb-2"></i>
                            <span class="d-block">{{ $property->bathrooms }} Kamar Mandi</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($property->area)
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-vector-square fa-2x text-primary mb-2"></i>
                            <span class="d-block">{{ $property->area }} m²</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($property->year_built)
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-calendar fa-2x text-primary mb-2"></i>
                            <span class="d-block">Tahun {{ $property->year_built }}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Kolom Kanan: Booking Form -->
        <div class="col-lg-4">
            {{-- ========== FORM BOOKING ========== --}}
            <div class="booking-section">
                <h3 class="fw-bold mb-4">Booking Kunjungan</h3>
                
                @auth
                    <form action="{{ route('bookings.store') }}" method="POST" class="card p-4 shadow-sm border-0">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        
                        <div class="mb-3">
                            <label for="booking_date" class="form-label fw-semibold">Tanggal Kunjungan</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" 
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="booking_time" class="form-label fw-semibold">Jam Kunjungan</label>
                            <select class="form-select" id="booking_time" name="booking_time" required>
                                <option value="">Pilih Jam</option>
                                <option value="09:00">09:00 WIB</option>
                                <option value="10:00">10:00 WIB</option>
                                <option value="11:00">11:00 WIB</option>
                                <option value="13:00">13:00 WIB</option>
                                <option value="14:00">14:00 WIB</option>
                                <option value="15:00">15:00 WIB</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="notes" class="form-label fw-semibold">Catatan (Opsional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2" 
                                      placeholder="Contoh: Ingin survey dengan keluarga..."></textarea>
                        </div>
                        
                        <div class="alert alert-info d-flex align-items-center mb-4">
                            <i class="fas fa-info-circle fa-2x me-3"></i>
                            <div>
                                <strong>Booking Fee: Rp {{ number_format($property->price * 0.1, 0, ',', '.') }}</strong>
                                <p class="mb-0 small">(10% dari harga properti)</p>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-calendar-check me-2"></i>
                            Booking Sekarang
                        </button>
                    </form>
                @else
                    <div class="card p-4 text-center border-0 shadow-sm">
                        <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                        <h5>Silakan login untuk booking</h5>
                        <p class="text-muted small mb-3">Anda perlu login untuk melakukan booking properti ini</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login Sekarang</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection