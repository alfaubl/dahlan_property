

<?php $__env->startSection('title', 'Dashboard - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/dashboard.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-wrapper">
    
    <!-- GREETING CARD -->
    <div class="greeting-card">
        <div class="greeting-content">
            <div class="greeting-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <div>
                <h1 class="greeting-title">Selamat Datang, <?php echo e($user->name ?? 'Pengguna'); ?>! 👋</h1>
                <div class="greeting-badges">
                    <span class="greeting-badge">
                        <i class="far fa-calendar"></i> <?php echo e(now()->format('l, d F Y')); ?>

                    </span>
                    <span class="greeting-badge">
                        <i class="fas fa-building"></i> <?php echo e($totalProperties ?? 0); ?> Properti
                    </span>
                    <span class="greeting-badge">
                        <i class="fas fa-star"></i> Member since <?php echo e($user->created_at->format('M Y') ?? '2024'); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: #3b82f6;">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value"><?php echo e($totalProperties ?? 0); ?></div>
                <div class="stat-label">Total Properti</div>
                <div class="stat-trend up">
                    <i class="fas fa-arrow-up"></i> Terdaftar
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: #10b981;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value"><?php echo e($availableProperties ?? 0); ?></div>
                <div class="stat-label">Tersedia</div>
                <div class="stat-trend neutral">
                    <i class="fas fa-clock"></i> Siap disewa
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: #f59e0b;">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value"><?php echo e($rentedProperties ?? 0); ?></div>
                <div class="stat-label">Disewa</div>
                <div class="stat-trend neutral">
                    <i class="fas fa-calendar"></i> Dalam masa sewa
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: #ef4444;">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">Rp <?php echo e(number_format($totalSpending ?? 0, 0, ',', '.')); ?></div>
                <div class="stat-label">Pendapatan</div>
                <div class="stat-trend up">
                    <i class="fas fa-chart-line"></i> Bulan ini
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="charts-grid">
        <!-- Distribution Chart -->
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">Distribusi Properti</h3>
                    <p class="chart-subtitle">Berdasarkan tipe bangunan</p>
                </div>
                <span class="chart-badge">5 Tipe</span>
            </div>
            <div id="distributionChart" class="chart-container"></div>
        </div>

        <!-- Status Chart -->
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">Status Properti</h3>
                    <p class="chart-subtitle">Tersedia vs Disewa vs Terjual</p>
                </div>
                <span class="chart-badge">Real-time</span>
            </div>
            <div id="statusChart" class="chart-container"></div>
        </div>
    </div>

    <!-- PROPERTY TYPES -->
    <div class="section-header">
        <h2 class="section-title">
            <i class="fas fa-tags"></i>
            Portfolio Bangunan Premium
        </h2>
        <span class="section-badge">5 Tipe</span>
    </div>

    <div class="property-grid">
        <div class="property-type">
            <i class="fas fa-home" style="color: #3b82f6;"></i>
            <h4>Rumah</h4>
            <div class="property-count">0</div>
            <div class="property-unit">UNIT</div>
        </div>
        <div class="property-type">
            <i class="fas fa-building" style="color: #10b981;"></i>
            <h4>Apartemen</h4>
            <div class="property-count">0</div>
            <div class="property-unit">UNIT</div>
        </div>
        <div class="property-type">
            <i class="fas fa-store" style="color: #f59e0b;"></i>
            <h4>Ruko</h4>
            <div class="property-count">0</div>
            <div class="property-unit">UNIT</div>
        </div>
        <div class="property-type">
            <i class="fas fa-briefcase" style="color: #ef4444;"></i>
            <h4>Kantor</h4>
            <div class="property-count">0</div>
            <div class="property-unit">UNIT</div>
        </div>
        <div class="property-type">
            <i class="fas fa-umbrella-beach" style="color: #8b5cf6;"></i>
            <h4>Villa</h4>
            <div class="property-count">0</div>
            <div class="property-unit">UNIT</div>
        </div>
    </div>

    <!-- QUICK ACTIONS -->
    <div class="quick-actions">
        <div class="quick-left">
            <div class="quick-icon">
                <i class="fas fa-bolt"></i>
            </div>
            <div>
                <h4>Akses Cepat</h4>
                <p>Kelola properti Anda dengan cepat dan mudah</p>
            </div>
        </div>
        <div class="quick-right">
            <a href="<?php echo e(route('properties.index')); ?>" class="btn-outline">
                <i class="fas fa-list"></i> Semua Properti
            </a>
            <a href="<?php echo e(route('properties.create')); ?>" class="btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Properti
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
<script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/dashboard/index.blade.php ENDPATH**/ ?>