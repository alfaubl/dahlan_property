@extends('layouts.app')

@section('title', 'Tambah Properti - Dahlan Property')

@section('styles')
    @include('partials.css.property-create-css')
@endsection

@section('content')
<div class="create-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="create-card">
                    <!-- Header -->
                    <div class="create-header">
                        <h1>Tambah Properti Baru</h1>
                        <p>Lengkapi data properti Anda dengan lengkap dan akurat</p>
                    </div>

                    <!-- Body -->
                    <div class="create-body">
                        <form id="propertyForm" action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Informasi Dasar -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Dasar
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Judul Properti <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                        <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="house" {{ old('type') == 'house' ? 'selected' : '' }}>Rumah</option>
                                            <option value="apartment" {{ old('type') == 'apartment' ? 'selected' : '' }}>Apartemen</option>
                                            <option value="land" {{ old('type') == 'land' ? 'selected' : '' }}>Tanah</option>
                                            <option value="commercial" {{ old('type') == 'commercial' ? 'selected' : '' }}>Komersial</option>
                                            <option value="villa" {{ old('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                   id="price" name="price" value="{{ old('price') }}" required min="0">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                               name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Lokasi
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="province" value="{{ old('province') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Properti -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-home"></i>
                                    Detail Properti
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Tidur</label>
                                        <input type="number" class="form-control" name="bedrooms" value="{{ old('bedrooms', 0) }}" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Mandi</label>
                                        <input type="number" class="form-control" name="bathrooms" value="{{ old('bathrooms', 0) }}" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Luas (m²)</label>
                                        <input type="number" class="form-control" name="area" value="{{ old('area', 0) }}" min="0">
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Jelaskan detail properti Anda...">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-tag"></i>
                                    Status
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Terjual</option>
                                            <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Disewa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tujuan</label>
                                        <select class="form-select" name="purpose">
                                            <option value="sale" {{ old('purpose') == 'sale' ? 'selected' : '' }}>Dijual</option>
                                            <option value="rent" {{ old('purpose') == 'rent' ? 'selected' : '' }}>Disewa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex gap-3 justify-content-end mt-4">
                                <a href="{{ route('properties.index') }}" class="btn-cancel">Batal</a>
                                <button type="submit" class="btn-save" id="saveBtn">
                                    <i class="fas fa-save"></i> Simpan Properti
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.property-create-js')
@endsection