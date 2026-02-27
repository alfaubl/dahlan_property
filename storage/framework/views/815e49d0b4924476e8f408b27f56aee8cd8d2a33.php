

<?php $__env->startSection('title', 'Booking Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/booking-create.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="booking-create-wrapper">
    <div class="booking-create-container">
        
        <!-- ===== HEADER ===== -->
        <div class="create-header">
            <h1 class="create-title">
                <i class="fas fa-calendar-plus"></i>
                Booking Properti
            </h1>
            <p class="create-subtitle">Isi form di bawah untuk melakukan booking properti</p>
        </div>

        <div class="create-grid">
            <!-- LEFT COLUMN - FORM -->
            <div class="form-column">
                <div class="form-card">
                    
                    <!-- Property Info -->
                    <div class="property-summary">
                        <div class="property-image">
                            
                            <img src="<?php echo e($property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" alt="<?php echo e($property->title); ?>">
                        </div>
                        <div class="property-info">
                            <h3><?php echo e($property->title); ?></h3>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo e($property->location); ?>

                            </p>
                            <div class="price-tag">
                                <span class="label">Harga</span>
                                <span class="value">Rp <?php echo e(number_format($property->price, 0, ',', '.')); ?></span>
                            </div>
                            <div class="fee-tag">
                                <span class="label">Booking Fee (10%)</span>
                                <span class="value">Rp <?php echo e(number_format($property->price * 0.1, 0, ',', '.')); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form action="<?php echo e(route('booking.store')); ?>" method="POST" class="booking-form" id="bookingForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar"></i>
                                    Tanggal Booking <span class="required">*</span>
                                </label>
                                <input type="date" name="booking_date" class="form-control" 
                                       min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i>
                                    Waktu <span class="required">*</span>
                                </label>
                                <input type="time" name="booking_time" class="form-control" value="10:00" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-sticky-note"></i>
                                Catatan (opsional)
                            </label>
                            <textarea name="notes" class="form-control" rows="4" placeholder="Tambahkan catatan untuk pemilik properti..."></textarea>
                        </div>

                        <div class="payment-summary">
                            <h4>Ringkasan Pembayaran</h4>
                            <div class="summary-row">
                                <span>Harga Properti</span>
                                <span>Rp <?php echo e(number_format($property->price, 0, ',', '.')); ?></span>
                            </div>
                            <div class="summary-row">
                                <span>Booking Fee (10%)</span>
                                <span class="fee">Rp <?php echo e(number_format($property->price * 0.1, 0, ',', '.')); ?></span>
                            </div>
                            <div class="summary-total">
                                <span>Total Dibayar</span>
                                <span class="total">Rp <?php echo e(number_format($property->price * 0.1, 0, ',', '.')); ?></span>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="<?php echo e(route('properties.show', $property->id)); ?>" class="btn-cancel">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn-submit" id="submitBtn">
                                <i class="fas fa-credit-card"></i> Lanjut ke Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT COLUMN - INFO & BENEFITS -->
            <div class="info-column">
                <div class="info-card">
                    <h3><i class="fas fa-shield-alt"></i> Keuntungan Booking</h3>
                    <ul class="benefits-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Booking fee hanya 10% dari harga properti</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pembayaran aman via Midtrans</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Booking dapat dibatalkan sebelum pembayaran</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Konfirmasi instan setelah pembayaran</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Dukungan customer service 24/7</span>
                        </li>
                    </ul>
                </div>

                <div class="info-card">
                    <h3><i class="fas fa-clock"></i> Proses Booking</h3>
                    <div class="steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-text">
                                <strong>Isi Form Booking</strong>
                                <small>Lengkapi data booking</small>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-text">
                                <strong>Bayar Booking Fee</strong>
                                <small>Transfer via Midtrans</small>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-text">
                                <strong>Booking Sukses</strong>
                                <small>Properti berhasil dibooking</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-card">
                    <h3><i class="fas fa-headset"></i> Butuh Bantuan?</h3>
                    <p>Tim customer service kami siap membantu Anda 24/7</p>
                    <a href="<?php echo e(route('contact')); ?>" class="contact-link">
                        <i class="fas fa-phone-alt"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/js/booking-create.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/bookings/create.blade.php ENDPATH**/ ?>