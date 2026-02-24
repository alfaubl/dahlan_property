

<?php $__env->startSection('title', $property->title . ' - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.css.property-show-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row">
        <!-- Kolom Kiri: Detail Properti -->
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('properties.index')); ?>">Jelajahi</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($property->title); ?></li>
                </ol>
            </nav>
            
            <h1 class="fw-bold mb-3"><?php echo e($property->title); ?></h1>
            
            <div class="d-flex align-items-center text-muted mb-4">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                <span><?php echo e($property->address); ?>, <?php echo e($property->city); ?>, <?php echo e($property->province); ?></span>
            </div>
            
            <div class="property-price mb-4">
                <span class="h2 fw-bold text-primary">Rp <?php echo e(number_format($property->price, 0, ',', '.')); ?></span>
                <span class="text-muted">/<?php echo e($property->purpose == 'sale' ? 'Jual' : 'Sewa'); ?></span>
            </div>
            
            <?php if($property->image): ?>
            <div class="property-gallery mb-4">
                <img src="<?php echo e($property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" 
                     alt="<?php echo e($property->title); ?>" class="img-fluid rounded-4 w-100" style="height: 400px; object-fit: cover;">
            </div>
            <?php endif; ?>
            
            <div class="property-description mb-5">
                <h5 class="fw-bold mb-3">Deskripsi</h5>
                <p class="text-muted"><?php echo e($property->description ?? 'Tidak ada deskripsi'); ?></p>
            </div>
            
            <div class="property-features mb-5">
                <h5 class="fw-bold mb-3">Fasilitas</h5>
                <div class="row g-3">
                    <?php if($property->bedrooms): ?>
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-bed fa-2x text-primary mb-2"></i>
                            <span class="d-block"><?php echo e($property->bedrooms); ?> Kamar Tidur</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($property->bathrooms): ?>
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-bath fa-2x text-primary mb-2"></i>
                            <span class="d-block"><?php echo e($property->bathrooms); ?> Kamar Mandi</span>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($property->area): ?>
                    <div class="col-md-3 col-6">
                        <div class="feature-item p-3 bg-light rounded-4 text-center">
                            <i class="fas fa-vector-square fa-2x text-primary mb-2"></i>
                            <span class="d-block"><?php echo e($property->area); ?> m²</span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Kolom Kanan: Booking Form -->
        <div class="col-lg-4">
            
            <div class="booking-section" id="booking-section">
                <h3 class="fw-bold mb-4">Booking Kunjungan</h3>
                
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('booking.store')); ?>" method="POST" class="card p-4 shadow-sm border-0">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
                        
                        <div class="mb-3">
                            <label for="booking_date" class="form-label fw-semibold">Tanggal Kunjungan</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" 
                                   min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>" required>
                            <?php $__errorArgs = ['booking_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger small"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="booking_time" class="form-label fw-semibold">Jam Kunjungan</label>
                            <select class="form-select" id="booking_time" name="booking_time" required>
                                <option value="">Pilih Jam</option>
                                <option value="09:00">09:00 WIB</option>
                                <option value="10:00">10:00 WIB</option>
                                <option value="11:00">11:00 WIB</option>
                                <option value="13:00">13:00 WIB</option>
                                <option value="14:00">14:00 WIB</option>
                                <option value="15:00">15:00 WIB</option>
                                <option value="16:00">16:00 WIB</option>
                            </select>
                            <?php $__errorArgs = ['booking_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger small"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="notes" class="form-label fw-semibold">Catatan (Opsional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2" 
                                      placeholder="Contoh: Ingin survey dengan keluarga..."></textarea>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger small"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="alert alert-info d-flex align-items-center mb-4">
                            <i class="fas fa-info-circle fa-2x me-3"></i>
                            <div>
                                <strong>Booking Fee: Rp <?php echo e(number_format($property->price * 0.1, 0, ',', '.')); ?></strong>
                                <p class="mb-0 small">(10% dari harga properti)</p>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-calendar-check me-2"></i>
                            Booking Sekarang
                        </button>
                    </form>
                <?php else: ?>
                    <div class="card p-4 text-center border-0 shadow-sm">
                        <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                        <h5>Silakan login untuk booking</h5>
                        <p class="text-muted small mb-3">Anda perlu login untuk melakukan booking properti ini</p>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login Sekarang</a>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contact Agent -->
            <div class="card p-4 shadow-sm border-0 mt-4">
                <h5 class="fw-bold mb-3">Butuh Bantuan?</h5>
                <p class="text-muted small mb-3">Hubungi agent kami untuk informasi lebih lanjut</p>
                <a href="https://wa.me/6281234567890" class="btn btn-success w-100">
                    <i class="fab fa-whatsapp me-2"></i>Chat WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/show.blade.php ENDPATH**/ ?>