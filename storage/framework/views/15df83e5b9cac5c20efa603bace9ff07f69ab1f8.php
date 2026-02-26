

<?php $__env->startSection('title', 'Tambah Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.css.property-create-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="create-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="create-card">
                    <!-- Header -->
                    <div class="create-header">
                        <h1>Tambah Properti Baru</h1>
                        <p>Lengkapi data properti Anda dengan lengkap dan akurat</p>
                    </div>

                    <!-- Body -->
                    <div class="create-body">
                        <form id="propertyForm" action="<?php echo e(route('properties.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <!-- Informasi Dasar -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Dasar
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Judul Properti <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="title" name="title" value="<?php echo e(old('title')); ?>" required>
                                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                        <select class="form-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="house" <?php echo e(old('type') == 'house' ? 'selected' : ''); ?>>Rumah</option>
                                            <option value="apartment" <?php echo e(old('type') == 'apartment' ? 'selected' : ''); ?>>Apartemen</option>
                                            <option value="land" <?php echo e(old('type') == 'land' ? 'selected' : ''); ?>>Tanah</option>
                                            <option value="commercial" <?php echo e(old('type') == 'commercial' ? 'selected' : ''); ?>>Komersial</option>
                                            <option value="villa" <?php echo e(old('type') == 'villa' ? 'selected' : ''); ?>>Villa</option>
                                        </select>
                                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="price" name="price" value="<?php echo e(old('price')); ?>" required min="0">
                                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               name="city" value="<?php echo e(old('city')); ?>" required>
                                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Lokasi
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="province" value="<?php echo e(old('province')); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Properti -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-home"></i>
                                    Detail Properti
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Tidur</label>
                                        <input type="number" class="form-control" name="bedrooms" value="<?php echo e(old('bedrooms', 0)); ?>" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Mandi</label>
                                        <input type="number" class="form-control" name="bathrooms" value="<?php echo e(old('bathrooms', 0)); ?>" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Luas (m²)</label>
                                        <input type="number" class="form-control" name="area" value="<?php echo e(old('area', 0)); ?>" min="0">
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Jelaskan detail properti Anda..."><?php echo e(old('description')); ?></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-tag"></i>
                                    Status
                                </h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="available" <?php echo e(old('status') == 'available' ? 'selected' : ''); ?>>Tersedia</option>
                                            <option value="sold" <?php echo e(old('status') == 'sold' ? 'selected' : ''); ?>>Terjual</option>
                                            <option value="rented" <?php echo e(old('status') == 'rented' ? 'selected' : ''); ?>>Disewa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tujuan</label>
                                        <select class="form-select" name="purpose">
                                            <option value="sale" <?php echo e(old('purpose') == 'sale' ? 'selected' : ''); ?>>Dijual</option>
                                            <option value="rent" <?php echo e(old('purpose') == 'rent' ? 'selected' : ''); ?>>Disewa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex gap-3 justify-content-end mt-4">
                                <a href="<?php echo e(route('properties.index')); ?>" class="btn-cancel">Batal</a>
                                <button type="submit" class="btn-save" id="saveBtn">
                                    <i class="fas fa-save"></i> Simpan Properti
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('partials.js.property-create-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/create.blade.php ENDPATH**/ ?>