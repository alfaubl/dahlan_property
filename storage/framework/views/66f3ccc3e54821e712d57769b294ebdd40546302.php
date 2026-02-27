\

<?php $__env->startSection('title', 'Detail Booking - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/booking-show.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="booking-show-wrapper">
    <div class="booking-show-container">
        
        <!-- ===== BACK BUTTON ===== -->
        <a href="<?php echo e(route('booking.index')); ?>" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Booking
        </a>

        <!-- ===== STATUS BANNER ===== -->
        <?php
            $status = $booking->payment->status ?? $booking->status ?? 'pending';
            $statusConfig = match($status) {
                'paid', 'success' => ['class' => 'success', 'icon' => 'fa-check-circle', 'text' => 'Pembayaran Lunas'],
                'pending' => ['class' => 'pending', 'icon' => 'fa-clock', 'text' => 'Menunggu Pembayaran'],
                'cancelled' => ['class' => 'cancelled', 'icon' => 'fa-times-circle', 'text' => 'Dibatalkan'],
                'failed' => ['class' => 'failed', 'icon' => 'fa-exclamation-circle', 'text' => 'Pembayaran Gagal'],
                default => ['class' => 'pending', 'icon' => 'fa-clock', 'text' => 'Menunggu Pembayaran']
            };
        ?>

        <div class="status-banner status-<?php echo e($statusConfig['class']); ?>">
            <div class="status-info">
                <i class="fas <?php echo e($statusConfig['icon']); ?>"></i>
                <div>
                    <h3>Status Pembayaran</h3>
                    <p><?php echo e($statusConfig['text']); ?></p>
                </div>
            </div>
            <div class="booking-code">
                <span>Kode Booking</span>
                <strong><?php echo e($booking->booking_code); ?></strong>
            </div>
        </div>

        <!-- ===== MAIN CONTENT ===== -->
        <div class="booking-detail-grid">
            <!-- LEFT COLUMN - DETAILS -->
            <div class="detail-column">
                <!-- Property Info -->
                <div class="detail-card">
                    <h3 class="card-title">
                        <i class="fas fa-building"></i>
                        Informasi Properti
                    </h3>
                    <div class="property-detail">
                        <div class="property-image">
                            <img src="<?php echo e($booking->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" alt="<?php echo e($booking->property->title); ?>">
                        </div>
                        <div class="property-info">
                            <h4><?php echo e($booking->property->title); ?></h4>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo e($booking->property->location); ?>

                            </p>
                            <div class="price-row">
                                <span>Harga Properti</span>
                                <strong>Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Details -->
                <div class="detail-card">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt"></i>
                        Detail Booking
                    </h3>
                    <table class="detail-table">
                        <tr>
                            <td>Tanggal Booking</td>
                            <td><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('d F Y')); ?></td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td><?php echo e(\Carbon\Carbon::parse($booking->booking_time)->format('H:i')); ?> WIB</td>
                        </tr>
                        <tr>
                            <td>Dibuat Pada</td>
                            <td><?php echo e($booking->created_at->format('d M Y, H:i')); ?></td>
                        </tr>
                        <?php if($booking->notes): ?>
                        <tr>
                            <td>Catatan</td>
                            <td><?php echo e($booking->notes); ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>

                <!-- Customer Info -->
                <?php if($booking->user): ?>
                <div class="detail-card">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Informasi Pemesan
                    </h3>
                    <table class="detail-table">
                        <tr>
                            <td>Nama</td>
                            <td><?php echo e($booking->user->name); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e($booking->user->email); ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><?php echo e($booking->user->phone ?? '-'); ?></td>
                        </tr>
                    </table>
                </div>
                <?php endif; ?>
            </div>

            <!-- RIGHT COLUMN - PAYMENT -->
            <div class="payment-column">
                <div class="payment-card">
                    <h3 class="card-title">
                        <i class="fas fa-credit-card"></i>
                        Informasi Pembayaran
                    </h3>

                    <?php if($booking->payment): ?>
                    <div class="payment-details">
                        <div class="payment-row">
                            <span>Order ID</span>
                            <span class="order-id"><?php echo e($booking->payment->order_id); ?></span>
                        </div>
                        <div class="payment-row">
                            <span>Metode</span>
                            <span><?php echo e($booking->payment->payment_method ?? '-'); ?></span>
                        </div>
                        <div class="payment-row">
                            <span>Status</span>
                            <span class="payment-status status-<?php echo e($statusConfig['class']); ?>">
                                <?php echo e($statusConfig['text']); ?>

                            </span>
                        </div>
                        <?php if($booking->paid_at): ?>
                        <div class="payment-row">
                            <span>Dibayar Pada</span>
                            <span><?php echo e(\Carbon\Carbon::parse($booking->paid_at)->format('d M Y, H:i')); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="price-summary">
                        <div class="price-row">
                            <span>Harga Properti</span>
                            <span>Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?></span>
                        </div>
                        <div class="price-row">
                            <span>Booking Fee (10%)</span>
                            <span>Rp <?php echo e(number_format($booking->payment->amount, 0, ',', '.')); ?></span>
                        </div>
                        <div class="price-row total">
                            <span>Total</span>
                            <span>Rp <?php echo e(number_format($booking->payment->amount, 0, ',', '.')); ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <?php if($status == 'pending'): ?>
                            <a href="<?php echo e(route('payment.process', $booking->id)); ?>" class="btn-pay">
                                <i class="fas fa-credit-card"></i>
                                Bayar Sekarang
                            </a>
                            <button class="btn-cancel" onclick="cancelBooking(<?php echo e($booking->id); ?>)">
                                <i class="fas fa-times-circle"></i>
                                Batalkan Booking
                            </button>
                        <?php endif; ?>

                        <?php if($status == 'paid' || $status == 'success'): ?>
                            <a href="#" class="btn-invoice">
                                <i class="fas fa-download"></i>
                                Download Invoice
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="support-card">
                    <i class="fas fa-headset"></i>
                    <h4>Butuh Bantuan?</h4>
                    <p>Hubungi customer service kami</p>
                    <a href="<?php echo e(route('contact')); ?>" class="support-link">Hubungi Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/js/booking-show.js')); ?>"></script>
<script>
    window.bookingId = <?php echo e($booking->id); ?>;
    window.csrfToken = '<?php echo e(csrf_token()); ?>';
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/bookings/show.blade.php ENDPATH**/ ?>