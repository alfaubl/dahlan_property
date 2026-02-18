@extends('layouts.app')

@section('title', 'Tambah Properti - Dahlan Property')

@section('styles')
    @include('partials.css.property-create-css')
@endsection

@section('content')
<div class="create-property-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="create-card card">
                    <!-- Header -->
                    <div class="create-header">
                        <h1>Tambah Properti Baru</h1>
                        <p>Lengkapi data properti Anda dengan lengkap dan akurat</p>
                    </div>

                    <!-- Body -->
                    <div class="create-body">
                        <!-- Charts Section -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <div class="chart-title">
                                        <i class="fas fa-chart-pie"></i>
                                        Distribusi Tipe Properti
                                    </div>
                                    <div class="chart-wrapper">
                                        <canvas id="typeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <div class="chart-title">
                                        <i class="fas fa-chart-line"></i>
                                        Trend Harga Properti
                                    </div>
                                    <div class="chart-wrapper">
                                        <canvas id="priceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="propertyForm" action="{{ route('properties.store') }}" method="POST">
                            @csrf
                            
                            <!-- Basic Info Section -->
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Dasar
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Judul Properti <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Slug (URL)</label>
                                        <input type="text" class="form-control" id="slug" name="slug" readonly>
                                        <small class="text-muted">Akan terisi otomatis dari judul</small>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                        <select class="form-select" name="type" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="house">🏡 Rumah</option>
                                            <option value="apartment">🏢 Apartemen</option>
                                            <option value="land">🌳 Tanah</option>
                                            <option value="commercial">🏬 Komersial</option>
                                            <option value="villa">🏖️ Villa</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">Rp</span>
                                            <input type="number" class="form-control" id="price" name="price" required min="0">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Luas (m²)</label>
                                        <input type="number" class="form-control" name="area" min="0">
                                    </div>
                                </div>
                            </div>

                            <!-- Location Section -->
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Lokasi
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="province">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control" name="postal_code">
                                    </div>
                                </div>
                            </div>

                            <!-- Details Section -->
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-home"></i>
                                    Detail Properti
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Tidur</label>
                                        <input type="number" class="form-control" name="bedrooms" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Mandi</label>
                                        <input type="number" class="form-control" name="bathrooms" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Garasi</label>
                                        <input type="number" class="form-control" name="garages" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Tahun Dibangun</label>
                                        <input type="number" class="form-control" name="year_built" min="1900" max="{{ date('Y') }}">
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Jelaskan detail properti Anda..."></textarea>
                                </div>
                            </div>

                            <!-- Status Section -->
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-tag"></i>
                                    Status & Tujuan
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="available">Tersedia</option>
                                            <option value="sold">Terjual</option>
                                            <option value="rented">Disewa</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tujuan</label>
                                        <select class="form-select" name="purpose">
                                            <option value="sale">Dijual</option>
                                            <option value="rent">Disewa</option>
                                            <option value="both">Jual/Sewa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3 justify-content-end mt-4">
                                <a href="{{ route('properties.index') }}" class="btn-cancel">
                                    <i class="fas fa-times"></i>
                                    Batal
                                </a>
                                <button type="submit" class="btn-save" id="saveBtn">
                                    <i class="fas fa-save"></i>
                                    Simpan Properti
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