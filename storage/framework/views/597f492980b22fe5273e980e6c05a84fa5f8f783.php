

<?php $__env->startSection('title', 'Daftar Booking Saya'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/bookings.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="booking-container">
    <!-- Header -->
    <div class="booking-header">
        <h2 class="booking-title">📋 Daftar Booking Saya</h2>
        <a href="<?php echo e(route('properties.index')); ?>" class="btn-booking-new">
            <i class="fas fa-plus"></i>
            <span>Booking Baru</span>
        </a>
    </div>

    <!-- Statistik Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h3 class="stat-label">Total Booking</h3>
                <div class="stat-value"><?php echo e($totalBookings ?? 0); ?></div>
            </div>
            <div class="stat-icon stat-icon-total">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3 class="stat-label">Menunggu</h3>
                <div class="stat-value"><?php echo e($pendingBookings ?? 0); ?></div>
            </div>
            <div class="stat-icon stat-icon-pending">
                <i class="fas fa-clock"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3 class="stat-label">Selesai</h3>
                <div class="stat-value"><?php echo e($successBookings ?? 0); ?></div>
            </div>
            <div class="stat-icon stat-icon-success">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <h3 class="stat-label">Total Spending</h3>
                <div class="stat-value">Rp <?php echo e(number_format($totalSpending ?? 0, 0, ',', '.')); ?></div>
            </div>
            <div class="stat-icon stat-icon-total">
                <i class="fas fa-money-bill-wave"></i>
            </div>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="chart-container">
        <h3 class="chart-title">📊 Statistik Booking 7 Hari Terakhir</h3>
        <div class="chart-wrapper">
            <canvas id="bookingChart"></canvas>
        </div>
    </div>

    <!-- Filter Buttons -->
    <div class="filter-container">
        <button class="filter-btn active" data-filter="all">Semua</button>
        <button class="filter-btn" data-filter="pending">Menunggu</button>
        <button class="filter-btn" data-filter="success">Selesai</button>
        <button class="filter-btn" data-filter="expired">Kadaluarsa</button>
        <button class="filter-btn" data-filter="cancelled">Dibatalkan</button>
    </div>

    <!-- Tabel Booking -->
    <div class="table-container">
        <table class="booking-table">
            <thead>
                <tr>
                    <th>ID Booking</th>
                    <th>Property</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="bookingTableBody">
                <?php $__empty_1 = true; $__currentLoopData = $bookings ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="booking-row" data-status="<?php echo e($booking->status ?? 'pending'); ?>">
                    <td class="booking-id">#<?php echo e($booking->id); ?></td>
                    <td>
                        <div class="property-info">
                            <strong><?php echo e($booking->property->title ?? 'Property'); ?></strong>
                            <small><?php echo e($booking->property->location ?? '-'); ?></small>
                        </div>
                    </td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->check_in)->format('d M Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->check_out)->format('d M Y')); ?></td>
                    <td class="booking-price">Rp <?php echo e(number_format($booking->total_price ?? 0, 0, ',', '.')); ?></td>
                    <td>
                        <?php
                            $statusClass = match($booking->status) {
                                'pending' => 'badge-pending',
                                'success' => 'badge-success',
                                'expired' => 'badge-expired',
                                'cancelled' => 'badge-cancelled',
                                default => 'badge-pending'
                            };
                            $statusText = match($booking->status) {
                                'pending' => 'Menunggu',
                                'success' => 'Selesai',
                                'expired' => 'Kadaluarsa',
                                'cancelled' => 'Dibatalkan',
                                default => 'Menunggu'
                            };
                        ?>
                        <span class="status-badge <?php echo e($statusClass); ?>"><?php echo e($statusText); ?></span>
                    </td>
                    <td>
                        <?php if($booking->payment): ?>
                            <?php
                                $paymentClass = $booking->payment->status == 'success' ? 'badge-success' : 'badge-pending';
                                $paymentText = $booking->payment->status == 'success' ? 'Lunas' : 'Belum Lunas';
                            ?>
                            <span class="status-badge <?php echo e($paymentClass); ?>"><?php echo e($paymentText); ?></span>
                        <?php else: ?>
                            <span class="status-badge badge-pending">Belum Bayar</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('booking.show', $booking->id)); ?>" class="btn-detail">
                            <i class="fas fa-eye"></i>
                            <span>Detail</span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8">
                        <div class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <p>Belum ada booking</p>
                            <a href="<?php echo e(route('properties.index')); ?>" class="btn-booking-new">
                                Booking Sekarang
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if(isset($bookings) && method_exists($bookings, 'links')): ?>
    <div class="pagination-wrapper">
        <?php echo e($bookings->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/bookings.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/bookings/index.blade.php ENDPATH**/ ?>