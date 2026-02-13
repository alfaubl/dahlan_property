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
    }

    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        border-radius: 20px;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--info));
    }
    
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
    }

    .stat-icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(74,111,165,0.1) 0%, rgba(23,162,184,0.1) 100%);
    }

    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
        border-radius: 20px;
        background: white;
        padding: 20px;
    }

    .activity-timeline {
        position: relative;
        padding-left: 30px;
    }

    .activity-timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary), var(--info));
    }

    .activity-item {
        position: relative;
        padding-bottom: 25px;
    }

    .activity-item::before {
        content: '';
        position: absolute;
        left: -34px;
        top: 0;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--primary);
        border: 2px solid white;
        box-shadow: 0 0 0 2px rgba(74,111,165,0.2);
    }

    .quick-action-btn {
        transition: all 0.3s ease;
        border-radius: 16px;
        padding: 20px 15px;
        background: white;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }

    .quick-action-btn:hover {
        background: var(--primary);
        border-color: var(--primary);
        transform: scale(1.02);
    }

    .quick-action-btn:hover i,
    .quick-action-btn:hover p,
    .quick-action-btn:hover small {
        color: white !important;
    }

    .greeting-card {
        background: linear-gradient(135deg, var(--primary) 0%, var(--info) 100%);
        border-radius: 30px;
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
</style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <!-- Greeting Section Premium -->
    <div class="greeting-card mb-5 shadow-lg">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-20 p-3 rounded-3 me-3">
                        <i class="fas fa-crown fa-3x text-warning"></i>
                    </div>
                    <div>
                        <h1 class="display-5 fw-bold mb-2">Selamat Datang, {{ $user->name }}! 👋</h1>
                        <div class="d-flex gap-3 align-items-center">
                            <span class="badge-premium">
                                <i class="fas fa-calendar-alt me-2"></i>{{ now()->format('l, d F Y') }}
                            </span>
                            <span class="badge-premium">
                                <i class="fas fa-clock me-2"></i>{{ now()->format('H:i') }} WIB
                            </span>
                            @if($user->isActive())
                                <span class="badge-premium">
                                    <i class="fas fa-shield-alt me-2"></i>Akun Premium
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="bg-white bg-opacity-20 d-inline-block rounded-3 p-3">
                    <i class="fas fa-building fa-3x"></i>
                    <p class="mb-0 mt-2 fw-semibold">Dahlan Property</p>
                    <small>Property Management System</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Premium -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon-wrapper me-3">
                            <i class="fas fa-building fa-2x" style="color: var(--primary);"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Total Properti</span>
                            <h2 class="display-5 fw-bold mb-0">{{ $totalProperties }}</h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> +12% bulan ini
                            </small>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <a href="{{ route('properties.index') }}" class="text-decoration-none small fw-bold">
                            Kelola Properti <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon-wrapper me-3">
                            <i class="fas fa-shopping-cart fa-2x" style="color: var(--success);"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Keranjang</span>
                            <h2 class="display-5 fw-bold mb-0">{{ $totalCartItems }}</h2>
                            <small class="text-warning">
                                <i class="fas fa-clock"></i> {{ $totalCartItems }} item pending
                            </small>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <a href="{{ route('cart.index') }}" class="text-decoration-none small fw-bold">
                            Lihat Keranjang <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon-wrapper me-3">
                            <i class="fas fa-wallet fa-2x" style="color: var(--warning);"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Total Nilai</span>
                            <h6 class="display-6 fw-bold mb-0">Rp 0</h6>
                            <small class="text-muted">Belum ada transaksi</small>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <a href="#" class="text-decoration-none small fw-bold text-muted">
                            Lihat Laporan <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon-wrapper me-3">
                            <i class="fas fa-trophy fa-2x" style="color: var(--danger);"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Status Akun</span>
                            <div class="mt-2">
                                @if($user->isActive())
                                    <span class="badge bg-success px-3 py-2 rounded-pill">
                                        <i class="fas fa-check-circle me-1"></i>AKTIF
                                    </span>
                                @else
                                    <span class="badge bg-danger px-3 py-2 rounded-pill">
                                        <i class="fas fa-times-circle me-1"></i>NONAKTIF
                                    </span>
                                @endif
                            </div>
                            <small class="text-muted">Member since {{ $user->created_at->format('M Y') }}</small>
                        </div>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                        <a href="{{ route('profile.edit') }}" class="text-decoration-none small fw-bold">
                            Edit Profil <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Analytics Section -->
    <div class="row g-4 mb-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-chart-line me-2" style="color: var(--primary);"></i>
                            Analytics Overview
                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-light rounded-pill px-3" type="button" data-bs-toggle="dropdown">
                                Minggu Ini <i class="fas fa-chevron-down ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="propertyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">
                        <i class="fas fa-clock me-2" style="color: var(--info);"></i>
                        Aktivitas Terkini
                    </h5>
                </div>
                <div class="card-body">
                    <div class="activity-timeline">
                        <div class="activity-item">
                            <p class="mb-1 fw-bold">Login Berhasil</p>
                            <small class="text-muted">
                                <i class="fas fa-circle me-2" style="font-size: 6px; color: var(--success);"></i>
                                {{ now()->format('H:i') }} WIB
                            </small>
                        </div>
                        @if($totalCartItems > 0)
                        <div class="activity-item">
                            <p class="mb-1 fw-bold">{{ $totalCartItems }} Item di Keranjang</p>
                            <small class="text-muted">
                                <i class="fas fa-circle me-2" style="font-size: 6px; color: var(--warning);"></i>
                                Menunggu checkout
                            </small>
                        </div>
                        @endif
                        @if($totalProperties > 0)
                        <div class="activity-item">
                            <p class="mb-1 fw-bold">{{ $totalProperties }} Properti Terdaftar</p>
                            <small class="text-muted">
                                <i class="fas fa-circle me-2" style="font-size: 6px; color: var(--primary);"></i>
                                Siap dipasarkan
                            </small>
                        </div>
                        @endif
                        <div class="activity-item">
                            <p class="mb-1 fw-bold">Akun Dibuat</p>
                            <small class="text-muted">
                                <i class="fas fa-circle me-2" style="font-size: 6px; color: var(--info);"></i>
                                {{ $user->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Premium -->
    <div class="row g-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-bolt me-2" style="color: var(--warning);"></i>
                            Quick Actions
                        </h5>
                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            <i class="fas fa-keyboard me-1"></i> Shortcuts
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('properties.index') }}" class="text-decoration-none">
                                <div class="quick-action-btn">
                                    <i class="fas fa-list-ul fa-2x text-primary mb-3"></i>
                                    <p class="fw-bold mb-1">Lihat Properti</p>
                                    <small class="text-muted">Jelajahi semua listing</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('cart.index') }}" class="text-decoration-none">
                                <div class="quick-action-btn">
                                    <i class="fas fa-shopping-cart fa-2x text-success mb-3"></i>
                                    <p class="fw-bold mb-1">Keranjang</p>
                                    <small class="text-muted">{{ $totalCartItems }} item</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('properties.create') }}" class="text-decoration-none">
                                <div class="quick-action-btn">
                                    <i class="fas fa-plus-circle fa-2x text-info mb-3"></i>
                                    <p class="fw-bold mb-1">Tambah Properti</p>
                                    <small class="text-muted">Listing baru</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('profile.edit') }}" class="text-decoration-none">
                                <div class="quick-action-btn">
                                    <i class="fas fa-user-edit fa-2x text-secondary mb-3"></i>
                                    <p class="fw-bold mb-1">Edit Profil</p>
                                    <small class="text-muted">Update data diri</small>
                                </div>
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
    const ctx = document.getElementById('propertyChart').getContext('2d');
    
    // Data dummy - nanti bisa diganti dengan data real dari database
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    const currentMonth = new Date().getMonth();
    const last6Months = months.slice(Math.max(0, currentMonth - 5), currentMonth + 1);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: last6Months,
            datasets: [
                {
                    label: 'Properti Terjual',
                    data: [12, 19, 15, 17, 14, 13],
                    borderColor: '#4a6fa5',
                    backgroundColor: 'rgba(74, 111, 165, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#4a6fa5',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                },
                {
                    label: 'Properti Disewa',
                    data: [8, 12, 9, 15, 11, 10],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#28a745',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 6
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    padding: 12,
                    titleColor: '#850000',
                    bodyColor: '#fff'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0,0,0,0.02)'
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
});
</script>
@endsection