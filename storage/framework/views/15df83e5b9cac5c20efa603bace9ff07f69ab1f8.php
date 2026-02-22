

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
                        <form id="propertyForm" action="<?php echo e(route('properties.store')); ?>" method="POST">
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
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                        <select class="form-select" name="type" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="house">Rumah</option>
                                            <option value="apartment">Apartemen</option>
                                            <option value="land">Tanah</option>
                                            <option value="commercial">Komersial</option>
                                            <option value="villa">Villa</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" id="price" name="price" required min="0">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" required>
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
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="province">
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
                                        <input type="number" class="form-control" name="bedrooms" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Kamar Mandi</label>
                                        <input type="number" class="form-control" name="bathrooms" min="0">
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label class="form-label">Luas (m²)</label>
                                        <input type="number" class="form-control" name="area" min="0">
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Jelaskan detail properti Anda..."></textarea>
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
                                            <option value="available">Tersedia</option>
                                            <option value="sold">Terjual</option>
                                            <option value="rented">Disewa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tujuan</label>
                                        <select class="form-select" name="purpose">
                                            <option value="sale">Dijual</option>
                                            <option value="rent">Disewa</option>
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