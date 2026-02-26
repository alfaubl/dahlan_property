

<?php $__env->startSection('title', 'Booking Saya - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bookings.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bookings-container">
    
    <!-- HEADER SECTION -->
    <div class="header-section">
        <div class="header-left">
            <h1>
                <i class="fas fa-calendar-check"></i>
                Daftar Booking Saya
            </h1>
            <p>
                <span class="status-dot"></span>
                Kelola status booking properti Anda
            </p>
        </div>
        <a href="<?php echo e(route('properties.index')); ?>" class="btn-booking">
            <i class="fas fa-plus-circle"></i>
            <span>Booking Baru</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Total Booking</span>
                <span class="stat-value"><?php echo e($totalBookings ?? 0); ?></span>
                <span class="stat-trend">
                    <i class="fas fa-arrow-up"></i> All time
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Menunggu</span>
                <span class="stat-value"><?php echo e($pendingBookings ?? 0); ?></span>
                <span class="stat-trend">
                    <i class="fas fa-hourglass-half"></i> Perlu tindakan
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Selesai</span>
                <span class="stat-value"><?php echo e($successBookings ?? 0); ?></span>
                <span class="stat-trend">
                    <i class="fas fa-check"></i> Berhasil
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cancelled">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Dibatalkan</span>
                <span class="stat-value"><?php echo e($cancelledBookings ?? 0); ?></span>
                <span class="stat-trend">
                    <i class="fas fa-ban"></i> Batal
                </span>
            </div>
        </div>
    </div>

    <!-- CHART SECTION -->
    <div class="chart-card">
        <div class="chart-header">
            <div class="chart-title">
                <div class="chart-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <h3>Statistik 7 Hari Terakhir</h3>
                    <p>Perkembangan booking properti Anda</p>
                </div>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-dot success"></span>
                    <span>Sukses</span>
                </div>
                <div class="legend-item">
                    <span class="legend-dot pending"></span>
                    <span>Pending</span>
                </div>
                <div class="legend-item">
                    <span class="legend-dot cancelled"></span>
                    <span>Batal</span>
                </div>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="bookingsChart"></canvas>
        </div>
    </div>

    <!-- FILTER SECTION -->
    <div class="filter-section">
        <div class="filter-tabs">
            <button class="filter-btn active" data-filter="all">
                <i class="fas fa-list"></i> Semua
            </button>
            <button class="filter-btn" data-filter="pending">
                <i class="fas fa-clock"></i> Menunggu
            </button>
            <button class="filter-btn" data-filter="success">
                <i class="fas fa-check-circle"></i> Selesai
            </button>
            <button class="filter-btn" data-filter="cancelled">
                <i class="fas fa-times-circle"></i> Batal
            </button>
        </div>
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Cari ID atau properti...">
        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="table-card">
        <div class="table-header">
            <h3>
                <i class="fas fa-history"></i>
                Riwayat Booking
            </h3>
            <span class="table-count"><?php echo e($bookings->total() ?? 0); ?> total</span>
        </div>

        <div class="table-responsive">
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Properti</th>
                        <th>Tanggal</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php $__empty_1 = true; $__currentLoopData = $bookings ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-status="<?php echo e($booking->status ?? 'pending'); ?>" data-id="<?php echo e($booking->id); ?>">
                        <td>
                            <span class="booking-id">#<?php echo e(substr($booking->booking_code ?? $booking->id, -4)); ?></span>
                        </td>
                        <td>
                            <div class="property-info">
                                <strong><?php echo e($booking->property->title ?? '-'); ?></strong>
                                <small><?php echo e($booking->property->location ?? '-'); ?></small>
                            </div>
                        </td>
                        <td><?php echo e(\Carbon\Carbon::parse($booking->created_at)->format('d/m')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('d/m')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->addDays(7)->format('d/m')); ?></td>
                        <td>
                            <span class="booking-price">Rp<?php echo e(number_format($booking->total_price ?? 0,0,',','.')); ?></span>
                        </td>
                        <td>
                            <?php
                            $status = $booking->status ?? 'pending';
                            $badgeClass = 'badge-pending';
                            $badgeIcon = 'fa-clock';
                            if($status === 'success') {
                                $badgeClass = 'badge-success';
                                $badgeIcon = 'fa-check-circle';
                            } elseif($status === 'cancelled') {
                                $badgeClass = 'badge-cancelled';
                                $badgeIcon = 'fa-times-circle';
                            }
                            ?>
                            <span class="status-badge <?php echo e($badgeClass); ?>">
                                <i class="fas <?php echo e($badgeIcon); ?>"></i>
                                <?php echo e(ucfirst($status)); ?>

                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="<?php echo e(route('booking.show', $booking->id)); ?>" class="action-btn btn-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php if($booking->status == 'pending'): ?>
                                    <a href="#" class="action-btn btn-pay" title="Bayar" onclick="bayar(<?php echo e($booking->id); ?>); return false;">
                                        <i class="fas fa-credit-card"></i>
                                    </a>
                                    <button class="action-btn btn-cancel" title="Batalkan" onclick="batal(<?php echo e($booking->id); ?>); return false;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <i class="fas fa-calendar-times"></i>
                                <h3>Belum Ada Booking</h3>
                                <p>Mulai booking properti impian Anda sekarang</p>
                                <a href="<?php echo e(route('properties.index')); ?>" class="empty-btn">
                                    <i class="fas fa-search"></i> Cari Properti
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if(isset($bookings) && method_exists($bookings, 'links')): ?>
        <div class="pagination">
            <?php echo e($bookings->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('charts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/js/bookings.js')); ?>"></script>
<script>
window.bookingData = {
success: <?php echo json_encode($chartSuccess ?? [0,0,0,0,0,0,0]); ?>,
pending: <?php echo json_encode($chartPending ?? [0,0,0,0,0,0,0]); ?>,
cancelled: <?php echo json_encode($chartCancelled ?? [0,0,0,0,0,0,0]); ?>,
categories: <?php echo json_encode($chartCategories ?? ['20 Feb','21 Feb','22 Feb','23 Feb','24 Feb','25 Feb','26 Feb']); ?>

};
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/bookings/index.blade.php ENDPATH**/ ?>