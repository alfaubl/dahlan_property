@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('styles')
<style>
    :root {
        --primary: #4a6fa5;
        --primary-dark: #2c3e50;
        --primary-light: #6b8cae;
        --success: #28a745;
        --warning: #ffc107;
        --danger: #dc3545;
        --info: #17a2b8;
        --gray-100: #f8f9fc;
        --gray-200: #eef2f6;
        --gray-300: #e2e8f0;
        --gray-600: #6c7a8a;
        --gray-800: #2c3e50;
    }

    body {
        background: var(--gray-100) !important;
    }

    /* Main Container */
    .dashboard-container {
        background: var(--gray-100);
        min-height: 100vh;
        padding: 20px 0;
    }

    /* Greeting Card Premium */
    .greeting-premium {
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(255,255,255,0.8);
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .greeting-premium::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(74,111,165,0.02));
        pointer-events: none;
    }

    .greeting-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 20px rgba(74,111,165,0.15);
    }

    .greeting-avatar i {
        font-size: 1.8rem;
        color: white;
    }

    .greeting-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 5px;
    }

    .greeting-subtitle {
        color: var(--gray-600);
        font-size: 0.95rem;
    }

    .property-badge {
        background: var(--gray-100);
        border-radius: 30px;
        padding: 8px 18px;
        font-size: 0.85rem;
        color: var(--gray-800);
        border: 1px solid var(--gray-200);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .property-badge i {
        color: var(--primary);
    }

    /* Stat Cards Premium */
    .stat-card-premium {
        background: white;
        border-radius: 20px;
        padding: 24px;
        border: 1px solid var(--gray-200);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0,0,0,0.02);
    }

    .stat-card-premium:hover {
        transform: translateY(-5px);
        border-color: var(--primary-light);
        box-shadow: 0 20px 30px rgba(74,111,165,0.08);
    }

    .stat-card-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        opacity: 0.7;
    }

    .stat-icon-wrapper {
        width: 56px;
        height: 56px;
        background: var(--gray-100);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        border: 1px solid var(--gray-200);
    }

    .stat-icon-wrapper i {
        font-size: 1.6rem;
        color: var(--primary);
    }

    .stat-label {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--gray-600);
        margin-bottom: 4px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--gray-800);
        line-height: 1;
        margin-bottom: 4px;
    }

    .stat-trend {
        font-size: 0.75rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .stat-trend i {
        color: var(--success);
        font-size: 0.7rem;
    }

    /* Chart Cards */
    .chart-card {
        background: white;
        border-radius: 24px;
        border: 1px solid var(--gray-200);
        padding: 24px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.02);
        height: 100%;
    }

    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .chart-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--gray-800);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chart-title i {
        color: var(--primary);
        font-size: 1.2rem;
    }

    .chart-badge {
        background: var(--gray-100);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--gray-800);
        border: 1px solid var(--gray-200);
    }

    .chart-container {
        position: relative;
        height: 280px;
        width: 100%;
    }

    /* Property Type Cards Premium */
    .property-card {
        background: white;
        border-radius: 16px;
        padding: 20px 12px;
        border: 1px solid var(--gray-200);
        transition: all 0.2s ease;
        text-align: center;
        height: 100%;
        box-shadow: 0 2px 8px rgba(0,0,0,0.01);
    }

    .property-card:hover {
        border-color: var(--primary);
        background: linear-gradient(145deg, white, var(--gray-100));
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(74,111,165,0.08);
    }

    .property-icon {
        width: 56px;
        height: 56px;
        background: var(--gray-100);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        border: 1px solid var(--gray-200);
    }

    .property-icon i {
        font-size: 1.6rem;
    }

    .property-name {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 6px;
    }

    .property-count {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        line-height: 1;
        margin-bottom: 2px;
    }

    .property-unit {
        font-size: 0.7rem;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Quick Actions Premium */
    .quick-actions-card {
        background: white;
        border-radius: 20px;
        border: 1px solid var(--gray-200);
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.02);
    }

    .quick-actions-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .quick-actions-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #fff8e7, #fff);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ffe4b8;
    }

    .quick-actions-icon i {
        font-size: 1.3rem;
        color: #e67e22;
    }

    .quick-actions-text h6 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 4px;
    }

    .quick-actions-text p {
        font-size: 0.8rem;
        color: var(--gray-600);
        margin-bottom: 0;
    }

    .btn-premium {
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .btn-premium-primary {
        background: var(--primary);
        color: white;
    }

    .btn-premium-primary:hover {
        background: var(--primary-dark);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(74,111,165,0.15);
    }

    .btn-premium-success {
        background: var(--success);
        color: white;
    }

    .btn-premium-success:hover {
        background: #1e7e34;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(40,167,69,0.15);
    }

    /* Section Title */
    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: var(--primary);
        font-size: 1.1rem;
    }

    /* Status Indicator */
    .status-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--gray-200);
    }

    .status-item {
        text-align: center;
    }

    .status-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
    }

    .status-label {
        font-size: 0.75rem;
        color: var(--gray-600);
    }

    .status-value {
        font-size: 1rem;
        font-weight: 700;
        color: var(--gray-800);
        display: block;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .greeting-title {
            font-size: 1.4rem;
        }
        
        .stat-value {
            font-size: 1.6rem;
        }
        
        .quick-actions-card {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Bar Chart - Distribusi
    const ctxBar = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            datasets: [{
                label: 'Jumlah Unit',
                data: [0, 0, 0, 0, 0],
                backgroundColor: [
                    'rgba(74, 111, 165, 0.9)',
                    'rgba(23, 162, 184, 0.9)',
                    'rgba(40, 167, 69, 0.9)',
                    'rgba(255, 193, 7, 0.9)',
                    'rgba(253, 126, 20, 0.9)'
                ],
                borderRadius: 8,
                barPercentage: 0.55,
                categoryPercentage: 0.8
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
                    backgroundColor: '#2c3e50',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            return `${context.raw} Unit`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#eef2f6',
                        drawBorder: false,
                        lineWidth: 1
                    },
                    ticks: {
                        stepSize: 1,
                        color: '#6c7a8a'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#2c3e50',
                        font: {
                            weight: '500'
                        }
                    }
                }
            }
        }
    });

    // Doughnut Chart - Status
    const ctxDoughnut = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxDoughnut, {
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
                spacing: 8
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
                    backgroundColor: '#2c3e50',
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} Unit`;
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection