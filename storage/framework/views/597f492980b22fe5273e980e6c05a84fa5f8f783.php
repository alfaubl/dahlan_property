

<?php $__env->startSection('title', 'Booking Saya - Dahlan Property'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bookings.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="bookings-wrapper">
    
    <!-- HEADER -->
    <div class="bookings-header">
        <div class="header-title">
            <h1>📋 Daftar Booking Saya</h1>
            <p>Kelola status booking properti Anda</p>
        </div>
        <a href="<?php echo e(route('properties.index')); ?>" class="btn-booking">
            <i class="fas fa-plus"></i> Booking Baru
        </a>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total"><i class="fas fa-calendar-check"></i></div>
            <div class="stat-info">
                <h3>Total Booking</h3>
                <p class="stat-value"><?php echo e($totalBookings ?? 0); ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon pending"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <h3>Menunggu</h3>
                <p class="stat-value"><?php echo e($pendingBookings ?? 0); ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3>Selesai</h3>
                <p class="stat-value"><?php echo e($successBookings ?? 0); ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cancelled"><i class="fas fa-times-circle"></i></div>
            <div class="stat-info">
                <h3>Dibatalkan</h3>
                <p class="stat-value"><?php echo e($cancelledBookings ?? 0); ?></p>
            </div>
        </div>
    </div>

    <!-- CHART SEMENTARA DIHAPUS DULU -->
    <div style="background: white; border-radius: 0.75rem; padding: 1rem; margin-bottom: 1rem; text-align: center;">
        <p>Chart akan muncul setelah error selesai</p>
    </div>

    <!-- FILTER -->
    <div class="filter-section">
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">Semua</button>
            <button class="filter-tab" data-filter="pending">Menunggu</button>
            <button class="filter-tab" data-filter="success">Selesai</button>
            <button class="filter-tab" data-filter="cancelled">Batal</button>
        </div>
        <div class="filter-search">
            <input type="text" id="searchInput" placeholder="Cari...">
            <button id="searchBtn"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-section">
        <table class="bookings-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Properti</th>
                    <th>Tgl</th>
                    <th>Check In</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $bookings ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>#<?php echo e($booking->id); ?></td>
                    <td><?php echo e($booking->property->title ?? 'Property'); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->created_at)->format('d/m')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('d/m')); ?></td>
                    <td>Rp<?php echo e(number_format($booking->total_price ?? 0, 0, ',', '.')); ?></td>
                    <td>
                        <span class="status-badge status-<?php echo e($booking->status); ?>">
                            <?php echo e($booking->status); ?>

                        </span>
                    </td>
                    <td>
                        <a href="#" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="empty-state">
                        <i class="fas fa-calendar-times empty-icon"></i>
                        <p>Belum ada booking</p>
                        <a href="<?php echo e(route('properties.index')); ?>">Cari Properti</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/bookings/index.blade.php ENDPATH**/ ?>