@extends('layouts.app')

@section('title', 'Upload Properti - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/property-create.css') }}">
@endsection

@section('content')
<div class="property-create-wrapper">
    <div class="property-create-container">
        
        <!-- ===== HEADER ===== -->
        <div class="create-header">
            <h1>
                <i class="fas fa-plus-circle"></i>
                Upload Properti
            </h1>
            <p>Tampilkan properti Anda kepada ribuan pencari properti</p>
        </div>

        <!-- ===== FORM ===== -->
        <div class="create-form-card">
            <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" id="propertyForm">
                @csrf

                <!-- Basic Info -->
                <div class="form-section">
                    <h3>📋 Informasi Dasar</h3>
                    
                    <div class="form-group">
                        <label for="title">Judul Properti <span class="required">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" 
                               value="{{ old('title') }}" required 
                               placeholder="Contoh: Villa Mewah dengan Kolam Renang">
                        @error('title')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi <span class="required">*</span></label>
                        <textarea id="description" name="description" class="form-control" 
                                  rows="6" required 
                                  placeholder="Jelaskan detail properti Anda...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="address">Alamat <span class="required">*</span></label>
                            <input type="text" id="address" name="address" class="form-control" 
                                   value="{{ old('address') }}" required 
                                   placeholder="Contoh: Jl. Raya Uluwatu No. 123">
                            @error('address')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">Kota <span class="required">*</span></label>
                            <input type="text" id="city" name="city" class="form-control" 
                                   value="{{ old('city') }}" required 
                                   placeholder="Contoh: Badung">
                            @error('city')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="province">Provinsi <span class="required">*</span></label>
                            <input type="text" id="province" name="province" class="form-control" 
                                   value="{{ old('province') }}" required 
                                   placeholder="Contoh: Bali">
                            @error('province')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Harga (Rp) <span class="required">*</span></label>
                            <input type="number" id="price" name="price" class="form-control" 
                                   value="{{ old('price') }}" required 
                                   placeholder="Contoh: 2500000000">
                            @error('price')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="type">Tipe Properti <span class="required">*</span></label>
                            <select id="type" name="type" class="form-control" required>
                                <option value="">Pilih Tipe</option>
                                <option value="rumah" {{ old('type') == 'rumah' ? 'selected' : '' }}>Rumah</option>
                                <option value="apartemen" {{ old('type') == 'apartemen' ? 'selected' : '' }}>Apartemen</option>
                                <option value="ruko" {{ old('type') == 'ruko' ? 'selected' : '' }}>Ruko</option>
                                <option value="kantor" {{ old('type') == 'kantor' ? 'selected' : '' }}>Kantor</option>
                                <option value="villa" {{ old('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                            </select>
                            @error('type')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Tujuan <span class="required">*</span></label>
                            <select id="purpose" name="purpose" class="form-control" required>
                                <option value="">Pilih Tujuan</option>
                                <option value="sale" {{ old('purpose') == 'sale' ? 'selected' : '' }}>Dijual</option>
                                <option value="rent" {{ old('purpose') == 'rent' ? 'selected' : '' }}>Disewakan</option>
                                <option value="both" {{ old('purpose') == 'both' ? 'selected' : '' }}>Dijual/Disewakan</option>
                            </select>
                            @error('purpose')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div class="form-section">
                    <h3>🏠 Detail Properti</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bedrooms">Kamar Tidur <span class="required">*</span></label>
                            <input type="number" id="bedrooms" name="bedrooms" class="form-control" 
                                   value="{{ old('bedrooms', 0) }}" required min="0">
                            @error('bedrooms')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bathrooms">Kamar Mandi <span class="required">*</span></label>
                            <input type="number" id="bathrooms" name="bathrooms" class="form-control" 
                                   value="{{ old('bathrooms', 0) }}" required min="0">
                            @error('bathrooms')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="area">Luas (m²) <span class="required">*</span></label>
                            <input type="number" id="area" name="area" class="form-control" 
                                   value="{{ old('area', 0) }}" required min="0">
                            @error('area')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="garages">Garasi</label>
                            <input type="number" id="garages" name="garages" class="form-control" 
                                   value="{{ old('garages', 0) }}" min="0">
                            @error('garages')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year_built">Tahun Dibangun</label>
                            <input type="number" id="year_built" name="year_built" class="form-control" 
                                   value="{{ old('year_built') }}" min="1900" max="{{ date('Y') }}">
                            @error('year_built')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="form-section">
                    <h3>📸 Foto Properti</h3>
                    
                    <div class="form-group">
                        <label for="images">Upload Foto <span class="required">*</span></label>
                        <input type="file" id="images" name="images[]" class="form-control" 
                               accept="image/*" multiple required onchange="previewImages(this)">
                        <small class="text-muted">Upload minimal 1 foto (max 2MB per foto)</small>
                        <div id="imagePreview" style="margin-top: 12px;"></div>
                        @error('images')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                        @error('images.*')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Info Box -->
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>Proses Approval:</strong>
                        <p>Properti Anda akan direview oleh admin dalam 1-2 hari kerja. Anda akan menerima notifikasi setelah properti disetujui.</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="{{ route('properties.my') }}" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fas fa-upload"></i> Upload Properti
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/property-create.js') }}"></script>
@endsection