@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
    @include('partials.css.dashboard-css')
@endsection

@section('content')
<div class="dashboard-container">
    <div class="container-fluid px-lg-4">
        <!-- Greeting Card Premium -->
        <div class="greeting-premium">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center">
                        <div class="greeting-avatar me-3">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <h1 class="greeting-title">Selamat Datang, {{ $user->name }}! 👋</h1>
                            <div class="d-flex gap-2 align-items-center flex-wrap mt-2">
                                <span class="property-badge">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ now()->format('l, d F Y') }}
                                </span>
                                <span class="property-badge">
                                    <i class="fas fa-building"></i>
                                    {{ $totalProperties ?? 0 }} Total Properti
                                </span>
                                <span class="property-badge">
                                    <i class="fas fa-map-marker-alt"></i>
                                    15 Kota
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                    <div class="d-inline-flex align-items-center gap-2">
                        <span class="property-badge">
                            <i class="fas fa-shield-alt"></i>
                            Akun Premium
                        </span>
                        <span class="property-badge">
                            <i class="fas fa-star text-warning"></i>
                            Member since {{ $user->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards Premium -->
        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card-premium d-flex align-items-center">
                    <div class="stat-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Properti</div>
                        <div class="stat-value">{{ $totalProperties ?? 0 }}</div>
                        <div class="stat-trend">
                            <i class="fas fa-arrow-up"></i> Terdaftar
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card-premium d-flex align-items-center">
                    <div class="stat-icon-wrapper">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="stat-label">Tersedia</div>
                        <div class="stat-value">0</div>
                        <div class="stat-trend">
                            <i class="fas fa-clock"></i> Siap disewa/jual
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card-premium d-flex align-items-center">
                    <div class="stat-icon-wrapper">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div class="stat-label">Disewa</div>
                        <div class="stat-value">0</div>
                        <div class="stat-trend">
                            <i class="fas fa-calendar"></i> Dalam masa sewa
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card-premium d-flex align-items-center">
                    <div class="stat-icon-wrapper">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                        <div class="stat-label">Pendapatan</div>
                        <div class="stat-value">Rp 0</div>
                        <div class="stat-trend">
                            <i class="fas fa-chart-line"></i> Bulan ini
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row Premium -->
        <div class="row g-4 mb-5">
            <!-- Bar Chart - Distribusi -->
            <div class="col-lg-7">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">
                            <i class="fas fa-chart-bar"></i>
                            Distribusi Properti
                        </div>
                        <span class="chart-badge">
                            <i class="fas fa-building me-1"></i> 5 Tipe Bangunan
                        </span>
                    </div>
                    <div class="chart-container">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Doughnut Chart - Status -->
            <div class="col-lg-5">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">
                            <i class="fas fa-chart-pie"></i>
                            Status Properti
                        </div>
                        <span class="chart-badge">
                            <i class="fas fa-tag me-1"></i> Real-time
                        </span>
                    </div>
                    <div class="chart-container" style="height: 200px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <div class="status-indicator">
                        <div class="status-item">
                            <span class="status-dot" style="background: #28a745;"></span>
                            <span class="status-label">Tersedia</span>
                            <span class="status-value">0</span>
                        </div>
                        <div class="status-item">
                            <span class="status-dot" style="background: #ffc107;"></span>
                            <span class="status-label">Disewa</span>
                            <span class="status-value">0</span>
                        </div>
                        <div class="status-item">
                            <span class="status-dot" style="background: #6c757d;"></span>
                            <span class="status-label">Terjual</span>
                            <span class="status-value">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="section-title">
                    <i class="fas fa-tags"></i>
                    Portfolio Bangunan Premium
                    <span class="chart-badge ms-3">
                        <i class="fas fa-star me-1 text-warning"></i> 5 Tipe
                    </span>
                </div>
            </div>
        </div>

        <!-- Property Types Premium -->
        <div class="row g-4 mb-5">
            <div class="col-md-2 col-6">
                <div class="property-card">
                    <div class="property-icon">
                        <i class="fas fa-home" style="color: #4a6fa5;"></i>
                    </div>
                    <div class="property-name">Rumah</div>
                    <div class="property-count">0</div>
                    <div class="property-unit">UNIT</div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="property-card">
                    <div class="property-icon">
                        <i class="fas fa-building" style="color: #17a2b8;"></i>
                    </div>
                    <div class="property-name">Apartemen</div>
                    <div class="property-count">0</div>
                    <div class="property-unit">UNIT</div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="property-card">
                    <div class="property-icon">
                        <i class="fas fa-store" style="color: #28a745;"></i>
                    </div>
                    <div class="property-name">Ruko</div>
                    <div class="property-count">0</div>
                    <div class="property-unit">UNIT</div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="property-card">
                    <div class="property-icon">
                        <i class="fas fa-briefcase" style="color: #ffc107;"></i>
                    </div>
                    <div class="property-name">Kantor</div>
                    <div class="property-count">0</div>
                    <div class="property-unit">UNIT</div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="property-card">
                    <div class="property-icon">
                        <i class="fas fa-umbrella-beach" style="color: #fd7e14;"></i>
                    </div>
                    <div class="property-name">Villa</div>
                    <div class="property-count">0</div>
                    <div class="property-unit">UNIT</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions Premium -->
        <div class="row">
            <div class="col-12">
                <div class="quick-actions-card">
                    <div class="quick-actions-left">
                        <div class="quick-actions-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="quick-actions-text">
                            <h6>Akses Cepat</h6>
                            <p>Kelola portofolio properti Anda dengan cepat dan mudah</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('properties.index') }}" class="btn-premium btn-premium-primary">
                            <i class="fas fa-list me-2"></i>
                            Semua Properti
                        </a>
                        <a href="{{ route('properties.create') }}" class="btn-premium btn-premium-success">
                            <i class="fas fa-plus-circle me-2"></i>
                            Tambah Properti
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.dashboard-js')
@endsection