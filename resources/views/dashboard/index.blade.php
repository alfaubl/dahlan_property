@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
<style>
    :root {
        --primary: #4a6fa5;
        --success: #28a745;
        --warning: #ffc107;
        --danger: #dc3545;
        --info: #17a2b8;
        --purple: #6f42c1;
        --orange: #fd7e14;
        --pink: #e83e8c;
        --teal: #20c997;
    }

    .stat-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 20px;
        background: white;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px rgba(74,111,165,0.1) !important;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chart-container {
        position: relative;
        height: 350px;
        width: 100%;
        padding: 20px;
    }

    .greeting-card {
        background: linear-gradient(135deg, #4a6fa5 0%, #6b8cae 100%);
        border-radius: 25px;
        padding: 30px;
        color: white;
    }

    .badge-premium {
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.85rem;
    }

    .property-type-card {
        border-radius: 15px;
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        padding: 20px 10px;
        text-align: center;
        background: white;
    }
    
    .property-type-card:hover {
        background: linear-gradient(135deg, #f8f9fa 0%, white 100%);
        border-color: var(--primary);
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(74,111,165,0.1);
    }

    .property-type-card i {
        transition: all 0.3s ease;
    }

    .property-type-card:hover i {
        transform: scale(1.1);
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <!-- Greeting Card Premium -->
    <div class="greeting-card mb-5 shadow-lg">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-3 me-3">
                        <i class="fas fa-chart-pie fa-3x text-white"></i>
                    </div>
                    <div>
                        <h1 class="display-5 fw-bold mb-2">Dashboard Properti</h1>
                        <div class="d-flex gap-3 align-items-center flex-wrap">
                            <span class="badge-premium">
                                <i class="fas fa-calendar-alt me-2"></i>{{ now()->format('l, d F Y') }}
                            </span>
                            <span class="badge-premium">
                                <i class="fas fa-building me-2"></i>Total {{ $totalProperties ?? 0 }} Properti
                            </span>
                            <span class="badge-premium">
                                <i class="fas fa-user me-2"></i>{{ $user->name }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="bg-white bg-opacity-15 d-inline-block rounded-3 p-3">
                    <i class="fas fa-home fa-3x"></i>
                    <p class="mb-0 mt-2 fw-semibold">Dahlan Property</p>
                    <small>Real Estate Management</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 me-3">
                            <i class="fas fa-building text-primary fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Total Properti</span>
                            <h2 class="display-6 fw-bold mb-0">{{ $totalProperties ?? 0 }}</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +{{ $totalProperties ?? 0 }} terdaftar
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success bg-opacity-10 me-3">
                            <i class="fas fa-check-circle text-success fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Tersedia</span>
                            <h2 class="display-6 fw-bold mb-0">0</h2>
                            <small class="text-muted">Siap disewa/dijual</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 me-3">
                            <i class="fas fa-clock text-warning fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Disewa</span>
                            <h2 class="display-6 fw-bold mb-0">0</h2>
                            <small class="text-muted">Dalam masa sewa</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-info bg-opacity-10 me-3">
                            <i class="fas fa-dollar-sign text-info fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Pendapatan</span>
                            <h2 class="display-6 fw-bold mb-0">Rp 0</h2>
                            <small class="text-muted">Bulan ini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-5">
        <!-- Chart Distribusi Properti -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-chart-bar me-2" style="color: var(--primary);"></i>
                            Distribusi Properti
                        </h5>
                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            <i class="fas fa-building me-1"></i> 5 Tipe Bangunan
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Chart Status Properti -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-chart-pie me-2" style="color: var(--success);"></i>
                        Status Properti
                    </h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="height: 250px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2 p-2 bg-light rounded">
                            <span><i class="fas fa-circle text-success me-2"></i> Tersedia</span>
                            <span class="fw-bold">0 unit</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 p-2 bg-light rounded">
                            <span><i class="fas fa-circle text-warning me-2"></i> Disewa</span>
                            <span class="fw-bold">0 unit</span>
                        </div>
                        <div class="d-flex justify-content-between p-2 bg-light rounded">
                            <span><i class="fas fa-circle text-secondary me-2"></i> Terjual</span>
                            <span class="fw-bold">0 unit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Property Types Distribution - 5 TIPE BANGUNAN (TANPA GUDANG & TANPA TANAH) -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-tags me-2" style="color: var(--warning);"></i>
                            Portfolio Properti
                        </h5>
                        <span class="badge bg-primary text-white rounded-pill px-3 py-2">
                            <i class="fas fa-star me-1"></i> Bangunan Premium
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4 justify-content-center">
                        <!-- Rumah -->
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="property-type-card">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-block p-3 mb-2">
                                    <i class="fas fa-home fa-2x text-primary"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Rumah</h6>
                                <h4 class="fw-bold mb-0 text-primary">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <!-- Apartemen -->
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="property-type-card">
                                <div class="bg-info bg-opacity-10 rounded-circle d-inline-block p-3 mb-2">
                                    <i class="fas fa-building fa-2x text-info"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Apartemen</h6>
                                <h4 class="fw-bold mb-0 text-info">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <!-- Ruko -->
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="property-type-card">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-block p-3 mb-2">
                                    <i class="fas fa-store fa-2x text-success"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Ruko</h6>
                                <h4 class="fw-bold mb-0 text-success">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <!-- Kantor -->
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="property-type-card">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-block p-3 mb-2">
                                    <i class="fas fa-briefcase fa-2x text-warning"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Kantor</h6>
                                <h4 class="fw-bold mb-0 text-warning">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <!-- Villa -->
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="property-type-card">
                                <div class="bg-orange bg-opacity-10 rounded-circle d-inline-block p-3 mb-2" style="background: rgba(253, 126, 20, 0.1);">
                                    <i class="fas fa-umbrella-beach fa-2x" style="color: #fd7e14;"></i>
                                </div>
                                <h6 class="fw-bold mb-1">Villa</h6>
                                <h4 class="fw-bold mb-0" style="color: #fd7e14;">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Premium -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="fas fa-bolt fa-2x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">Akses Cepat</h5>
                                <p class="text-muted mb-0">Kelola portofolio properti Anda</p>
                            </div>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <a href="{{ route('properties.index') }}" class="btn btn-primary me-2 px-4 py-2 rounded-pill">
                                <i class="fas fa-list me-2"></i> Semua Properti
                            </a>
                            <a href="{{ route('properties.create') }}" class="btn btn-success px-4 py-2 rounded-pill">
                                <i class="fas fa-plus-circle me-2"></i> Tambah Properti
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart Distribusi Properti - 5 TIPE BANGUNAN (TANPA GUDANG, TANPA TANAH)
    const ctxDist = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctxDist, {
        type: 'bar',
        data: {
            labels: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            datasets: [{
                label: 'Jumlah Properti',
                data: [0, 0, 0, 0, 0],
                backgroundColor: [
                    'rgba(74, 111, 165, 0.8)',
                    'rgba(23, 162, 184, 0.8)',
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(253, 126, 20, 0.8)'
                ],
                borderColor: [
                    '#4a6fa5',
                    '#17a2b8',
                    '#28a745',
                    '#ffc107',
                    '#fd7e14'
                ],
                borderWidth: 1,
                borderRadius: 8,
                maxBarThickness: 50
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.raw} unit`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0,0,0,0.02)'
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Unit',
                        color: '#6c757d'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Chart Status Properti (Doughnut Chart)
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Disewa', 'Terjual'],
            datasets: [{
                data: [0, 0, 0],
                backgroundColor: [
                    '#28a745',
                    '#ffc107',
                    '#6c757d'
                ],
                borderWidth: 0,
                borderRadius: 5,
                spacing: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} unit`;
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection