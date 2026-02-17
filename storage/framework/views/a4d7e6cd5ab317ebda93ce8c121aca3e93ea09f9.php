
<div class="booking-section mt-5">
    <h3 class="fw-bold mb-4">Booking Kunjungan</h3>
    
    <?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('bookings.store')); ?>" method="POST" class="card p-4 shadow-sm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="property_id" value="<?php echo e($property->id); ?>">
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="booking_date" class="form-label fw-semibold">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date" 
                           min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>" required>
                </div>
                
                <div class="col-md-6">
                    <label for="booking_time" class="form-label fw-semibold">Jam Kunjungan</label>
                    <select class="form-select" id="booking_time" name="booking_time" required>
                        <option value="">Pilih Jam</option>
                        <option value="09:00">09:00 WIB</option>
                        <option value="10:00">10:00 WIB</option>
                        <option value="11:00">11:00 WIB</option>
                        <option value="13:00">13:00 WIB</option>
                        <option value="14:00">14:00 WIB</option>
                        <option value="15:00">15:00 WIB</option>
                    </select>
                </div>
                
                <div class="col-12">
                    <label for="notes" class="form-label fw-semibold">Catatan (Opsional)</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2" 
                              placeholder="Contoh: Ingin survey dengan keluarga..."></textarea>
                </div>
                
                <div class="col-12">
                    <div class="alert alert-info d-flex align-items-center">
                        <i class="fas fa-info-circle fa-2x me-3"></i>
                        <div>
                            <strong>Booking Fee: Rp <?php echo e(number_format($property->price * 0.1, 0, ',', '.')); ?></strong>
                            <p class="mb-0 small">(10% dari harga properti, akan dikonfirmasi via email)</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="fas fa-calendar-check me-2"></i>
                        Booking Sekarang
                    </button>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="card p-4 text-center">
            <i class="fas fa-lock fa-3x text-muted mb-3"></i>
            <h5>Silakan login untuk booking properti</h5>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mt-3">Login Sekarang</a>
        </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/show.blade.php ENDPATH**/ ?>