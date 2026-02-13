

<?php $__env->startSection('title', 'Dashboard - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    :root {
        --primary: #4a6fa5;
        --success: #28a745;
        --warning: #ffc107;
        --danger: #dc3545;
        --info: #17a2b8;
        --purple: #6f42c1;
        --orange: #fd7e14;
    }

    .stat-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 15px;
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(74,111,165,0.1);
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
    }

    .greeting-card {
        background: linear-gradient(105deg, #2c3e50 0%, #3498db 100%);
        border-radius: 20px;
        padding: 25px;
        color: white;
        box-shadow: 0 10px 25px rgba(52,152,219,0.2);
    }

    .badge-premium {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(5px);
        padding: 5px 15px;
        border-radius: 25px;
        font-size: 0.8rem;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .property-type-card {
        border-radius: 12px;
        border: 1px solid #e9ecef;
        transition: all 0.2s ease;
        padding: 18px 10px;
        text-align: center;
        background: white;
    }
    
    .property-type-card:hover {
        border-color: var(--primary);
        background: #f8f9fa;
        transform: translateY(-3px);
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }

    .card-header {
        background: white;
        border-bottom: 1px solid #f1f5f9;
        padding: 15px 20px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">
    <!-- Greeting Card -->
    <div class="greeting-card mb-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-15 p-2 rounded-3 me-3">
                        <i class="fas fa-chart-line fa-2x text-white"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1">Dashboard Properti</h2>
                        <div class="d-flex gap-2 align-items-center flex-wrap">
                            <span class="badge-premium">
                                <i class="fas fa-calendar-alt me-1"></i><?php echo e(now()->format('l, d F Y')); ?>

                            </span>
                            <span class="badge-premium">
                                <i class="fas fa-building me-1"></i><?php echo e($totalProperties ?? 0); ?> Properti
                            </span>
                            <span class="badge-premium">
                                <i class="fas fa-user me-1"></i><?php echo e($user->name); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-lg-end mt-2 mt-lg-0">
                <span class="bg-white bg-opacity-15 px-4 py-2 rounded-pill">
                    <i class="fas fa-home me-1"></i> Dahlan Property
                </span>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 me-3">
                            <i class="fas fa-building text-primary fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-semibold">Total Properti</span>
                            <h2 class="fw-bold mb-0"><?php echo e($totalProperties ?? 0); ?></h2>
                            <small class="text-success">
                                <i class="fas fa-arrow-up"></i> Terdaftar
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success bg-opacity-10 me-3">
                            <i class="fas fa-check-circle text-success fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-semibold">Tersedia</span>
                            <h2 class="fw-bold mb-0">0</h2>
                            <small class="text-muted">Siap disewa/dijual</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 me-3">
                            <i class="fas fa-clock text-warning fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-semibold">Disewa</span>
                            <h2 class="fw-bold mb-0">0</h2>
                            <small class="text-muted">Dalam masa sewa</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card card h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-info bg-opacity-10 me-3">
                            <i class="fas fa-dollar-sign text-info fa-2x"></i>
                        </div>
                        <div>
                            <span class="text-muted text-uppercase small fw-semibold">Pendapatan</span>
                            <h2 class="fw-bold mb-0">Rp 0</h2>
                            <small class="text-muted">Bulan ini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-3 mb-4">
        <!-- Bar Chart - Distribusi -->
        <div class="col-lg-7">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-chart-bar text-primary me-2"></i>
                        Distribusi Properti
                    </h5>
                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                        <i class="fas fa-building me-1"></i> 5 Tipe
                    </span>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Doughnut Chart - Status -->
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-chart-pie text-success me-2"></i>
                        Status Properti
                    </h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="height: 250px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <div class="row mt-3 text-center">
                        <div class="col-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="badge bg-success rounded-circle p-2 me-1" style="width: 12px; height: 12px;"></span>
                                <small>Tersedia</small>
                            </div>
                            <span class="fw-bold">0</span>
                        </div>
                        <div class="col-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="badge bg-warning rounded-circle p-2 me-1" style="width: 12px; height: 12px;"></span>
                                <small>Disewa</small>
                            </div>
                            <span class="fw-bold">0</span>
                        </div>
                        <div class="col-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="badge bg-secondary rounded-circle p-2 me-1" style="width: 12px; height: 12px;"></span>
                                <small>Terjual</small>
                            </div>
                            <span class="fw-bold">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Property Types - 5 Bangunan Premium -->
    <div class="row g-3 mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-tags text-warning me-2"></i>
                        Portfolio Bangunan Premium
                    </h5>
                    <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                        <i class="fas fa-star me-1"></i> 5 Tipe
                    </span>
                </div>
                <div class="card-body">
                    <div class="row g-3 justify-content-center">
                        <div class="col-md-2 col-6">
                            <div class="property-type-card">
                                <i class="fas fa-home fa-2x text-primary mb-2"></i>
                                <h6 class="fw-bold mb-1">Rumah</h6>
                                <h4 class="fw-bold text-primary mb-0">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="property-type-card">
                                <i class="fas fa-building fa-2x text-info mb-2"></i>
                                <h6 class="fw-bold mb-1">Apartemen</h6>
                                <h4 class="fw-bold text-info mb-0">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="property-type-card">
                                <i class="fas fa-store fa-2x text-success mb-2"></i>
                                <h6 class="fw-bold mb-1">Ruko</h6>
                                <h4 class="fw-bold text-success mb-0">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="property-type-card">
                                <i class="fas fa-briefcase fa-2x text-warning mb-2"></i>
                                <h6 class="fw-bold mb-1">Kantor</h6>
                                <h4 class="fw-bold text-warning mb-0">0</h4>
                                <small class="text-muted">unit</small>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="property-type-card">
                                <i class="fas fa-umbrella-beach fa-2x" style="color: #fd7e14; mb-2"></i>
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

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-light border-0">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center">
                            <div class="bg-white p-2 rounded-3 me-2 shadow-sm">
                                <i class="fas fa-bolt text-warning"></i>
                            </div>
                            <div>
                                <span class="fw-bold">Akses Cepat</span>
                                <small class="text-muted d-block">Kelola properti Anda</small>
                            </div>
                        </div>
                        <div class="mt-2 mt-sm-0">
                            <a href="<?php echo e(route('properties.index')); ?>" class="btn btn-primary btn-sm rounded-pill px-3 me-1">
                                <i class="fas fa-list me-1"></i> Semua Properti
                            </a>
                            <a href="<?php echo e(route('properties.create')); ?>" class="btn btn-success btn-sm rounded-pill px-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Bar Chart - Distribusi 5 Tipe Bangunan
    const ctxBar = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            datasets: [{
                label: 'Jumlah Unit',
                data: [0, 0, 0, 0, 0],
                backgroundColor: [
                    '#4a6fa5',
                    '#17a2b8',
                    '#28a745',
                    '#ffc107',
                    '#fd7e14'
                ],
                borderRadius: 6,
                barPercentage: 0.6,
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
                    padding: 10,
                    cornerRadius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9',
                        drawBorder: false
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

    // Doughnut Chart - Status Properti
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
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#2c3e50'
                }
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/dashboard/index.blade.php ENDPATH**/ ?>