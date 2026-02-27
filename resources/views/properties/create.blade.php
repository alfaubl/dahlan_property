@extends('layouts.app')

@section('title', 'Booking Properti - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/booking-create.css') }}">
@endsection

@section('content')
<div class="booking-wrapper">
    <div class="booking-container">
        
        <!-- Header -->
        <div class="booking-header">
            <h1 class="booking-title">
                <i class="fas fa-calendar-check"></i>
                Booking Properti
            </h1>
            <p class="booking-subtitle">Isi form di bawah untuk melakukan booking properti</p>
        </div>

        <!-- Main Card -->
        <div class="booking-card">
            
            <!-- Property Info -->
            <div class="property-info-card">
                <div class="property-info-header">
                    <i class="fas fa-building"></i>
                    <h3>Informasi Properti</h3>
                </div>
                <div class="property-info-body">
                    <div class="property-info-row">
                        <span class="info-label">Nama Properti</span>
                        <span class="info-value">{{ $property->title }}</span>
                    </div>
                    <div class="property-info-row">
                        <span class="info-label">Lokasi</span>
                        <span class="info-value">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $property->location }}
                        </span>
                    </div>
                    <div class="property-info-row">
                        <span class="info-label">Harga</span>
                        <span class="info-value price">Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="property-info-row fee">
                        <span class="info-label">Booking Fee (10%)</span>
                        <span class="info-value">Rp {{ number_format($property->price * 0.1, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Booking -->
            <form action="{{ route('booking.store') }}" method="POST" class="booking-form" id="bookingForm">
                @csrf
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar"></i>
                            Tanggal Booking <span class="text-danger">*</span>
                        </label>
                        <input type="date" name="booking_date" class="form-control" 
                               min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-clock"></i>
                            Waktu <span class="text-danger">*</span>
                        </label>
                        <input type="time" name="booking_time" class="form-control" value="10:00" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-sticky-note"></i>
                        Catatan (opsional)
                    </label>
                    <textarea name="notes" class="form-control" rows="4" placeholder="Tambahkan catatan untuk pemilik properti..."></textarea>
                </div>

                <!-- Ringkasan -->
                <div class="summary-card">
                    <h4 class="summary-title">Ringkasan Booking</h4>
                    <div class="summary-row">
                        <span>Harga Properti</span>
                        <span>Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Booking Fee (10%)</span>
                        <span class="fee-amount">Rp {{ number_format($property->price * 0.1, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-total">
                        <span>Total Dibayar</span>
                        <span class="total-amount">Rp {{ number_format($property->price * 0.1, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="form-actions">
                    <a href="{{ route('properties.show', $property->id) }}" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fas fa-credit-card"></i>
                        Lanjutkan ke Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection