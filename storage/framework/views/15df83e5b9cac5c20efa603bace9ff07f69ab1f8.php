

<?php $__env->startSection('title', 'Upload Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/property-create.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="property-create-wrapper">
    <div class="property-create-container">
        
        <!-- ===== HEADER ===== -->
        <div class="create-header">
            <h1>
                <i class="fas fa-plus-circle"></i>
                Upload Properti
            </h1>
            <p>Tampilkan properti Anda kepada ribuan pencari properti</p>
        </div>

        <!-- ===== FORM ===== -->
        <div class="create-form-card">
            <form action="<?php echo e(route('properties.store')); ?>" method="POST" enctype="multipart/form-data" id="propertyForm">
                <?php echo csrf_field(); ?>

                <!-- Basic Info -->
                <div class="form-section">
                    <h3>📋 Informasi Dasar</h3>
                    
                    <div class="form-group">
                        <label for="title">Judul Properti <span class="required">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" 
                               value="<?php echo e(old('title')); ?>" required 
                               placeholder="Contoh: Villa Mewah dengan Kolam Renang">
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-text"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi <span class="required">*</span></label>
                        <textarea id="description" name="description" class="form-control" 
                                  rows="6" required 
                                  placeholder="Jelaskan detail properti Anda..."><?php echo e(old('description')); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-text"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="address">Alamat <span class="required">*</span></label>
                            <input type="text" id="address" name="address" class="form-control" 
                                   value="<?php echo e(old('address')); ?>" required 
                                   placeholder="Contoh: Jl. Raya Uluwatu No. 123">
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="city">Kota <span class="required">*</span></label>
                            <input type="text" id="city" name="city" class="form-control" 
                                   value="<?php echo e(old('city')); ?>" required 
                                   placeholder="Contoh: Badung">
                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="province">Provinsi <span class="required">*</span></label>
                            <input type="text" id="province" name="province" class="form-control" 
                                   value="<?php echo e(old('province')); ?>" required 
                                   placeholder="Contoh: Bali">
                            <?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga (Rp) <span class="required">*</span></label>
                            <input type="number" id="price" name="price" class="form-control" 
                                   value="<?php echo e(old('price')); ?>" required 
                                   placeholder="Contoh: 2500000000">
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="type">Tipe Properti <span class="required">*</span></label>
                            <select id="type" name="type" class="form-control" required>
                                <option value="">Pilih Tipe</option>
                                <option value="rumah" <?php echo e(old('type') == 'rumah' ? 'selected' : ''); ?>>Rumah</option>
                                <option value="apartemen" <?php echo e(old('type') == 'apartemen' ? 'selected' : ''); ?>>Apartemen</option>
                                <option value="ruko" <?php echo e(old('type') == 'ruko' ? 'selected' : ''); ?>>Ruko</option>
                                <option value="kantor" <?php echo e(old('type') == 'kantor' ? 'selected' : ''); ?>>Kantor</option>
                                <option value="villa" <?php echo e(old('type') == 'villa' ? 'selected' : ''); ?>>Villa</option>
                            </select>
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="purpose">Tujuan <span class="required">*</span></label>
                            <select id="purpose" name="purpose" class="form-control" required>
                                <option value="">Pilih Tujuan</option>
                                <option value="sale" <?php echo e(old('purpose') == 'sale' ? 'selected' : ''); ?>>Dijual</option>
                                <option value="rent" <?php echo e(old('purpose') == 'rent' ? 'selected' : ''); ?>>Disewakan</option>
                                <option value="both" <?php echo e(old('purpose') == 'both' ? 'selected' : ''); ?>>Dijual/Disewakan</option>
                            </select>
                            <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div class="form-section">
                    <h3>🏠 Detail Properti</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bedrooms">Kamar Tidur <span class="required">*</span></label>
                            <input type="number" id="bedrooms" name="bedrooms" class="form-control" 
                                   value="<?php echo e(old('bedrooms', 0)); ?>" required min="0">
                            <?php $__errorArgs = ['bedrooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="bathrooms">Kamar Mandi <span class="required">*</span></label>
                            <input type="number" id="bathrooms" name="bathrooms" class="form-control" 
                                   value="<?php echo e(old('bathrooms', 0)); ?>" required min="0">
                            <?php $__errorArgs = ['bathrooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="area">Luas (m²) <span class="required">*</span></label>
                            <input type="number" id="area" name="area" class="form-control" 
                                   value="<?php echo e(old('area', 0)); ?>" required min="0">
                            <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="garages">Garasi</label>
                            <input type="number" id="garages" name="garages" class="form-control" 
                                   value="<?php echo e(old('garages', 0)); ?>" min="0">
                            <?php $__errorArgs = ['garages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="year_built">Tahun Dibangun</label>
                            <input type="number" id="year_built" name="year_built" class="form-control" 
                                   value="<?php echo e(old('year_built')); ?>" min="1900" max="<?php echo e(date('Y')); ?>">
                            <?php $__errorArgs = ['year_built'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error-text"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="form-section">
                    <h3>📸 Foto Properti</h3>
                    
                    <div class="form-group">
                        <label for="images">Upload Foto <span class="required">*</span></label>
                        <input type="file" id="images" name="images[]" class="form-control" 
                               accept="image/*" multiple required onchange="previewImages(this)">
                        <small class="text-muted">Upload minimal 1 foto (max 2MB per foto)</small>
                        <div id="imagePreview" style="margin-top: 12px;"></div>
                        <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-text"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-text"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>Proses Approval:</strong>
                        <p>Properti Anda akan direview oleh admin dalam 1-2 hari kerja. Anda akan menerima notifikasi setelah properti disetujui.</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a href="<?php echo e(route('properties.my')); ?>" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fas fa-upload"></i> Upload Properti
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/js/property-create.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/create.blade.php ENDPATH**/ ?>