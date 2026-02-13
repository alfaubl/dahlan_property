

<?php $__env->startSection('title', 'Jelajahi Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .hero-properties {
        background: linear-gradient(135deg, #1e2b3c 0%, #2c3e50 100%);
        padding: 60px 0;
        color: white;
        position: relative;
    }
    
    .search-box {
        background: white;
        border-radius: 50px;
        padding: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .search-box .form-control,
    .search-box .form-select {
        border: none;
        border-radius: 40px;
        padding: 12px 20px;
        background: #f8f9fa;
    }
    
    .search-box .btn-search {
        border-radius: 40px;
        padding: 12px 30px;
        background: #4a6fa5;
        color: white;
        font-weight: 600;
        border: none;
    }
    
    .search-box .btn-search:hover {
        background: #2c3e50;
    }
    
    .property-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        height: 100%;
    }
    
    .property-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(74,111,165,0.1);
    }
    
    .property-image {
        height: 220px;
        position: relative;
        overflow: hidden;
    }
    
    .property-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .property-card:hover .property-image img {
        transform: scale(1.1);
    }
    
    .property-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #4a6fa5;
        color: white;
        padding: 5px 15px;
        border-radius: 25px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }
    
    .property-type {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255,255,255,0.9);
        color: #2c3e50;
        padding: 8px 15px;
        border-radius: 25px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 2;
    }
    
    .property-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #4a6fa5;
        margin-bottom: 5px;
    }
    
    .property-price small {
        font-size: 0.8rem;
        color: #6c757d;
        font-weight: normal;
    }
    
    .property-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 5px;
        color: #2c3e50;
    }
    
    .property-address {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    
    .property-address i {
        color: #4a6fa5;
        width: 16px;
    }
    
    .property-features {
        display: flex;
        gap: 15px;
        padding-top: 15px;
        border-top: 1px solid #edf2f7;
    }
    
    .property-feature {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.85rem;
        color: #6c757d;
    }
    
    .property-feature i {
        color: #4a6fa5;
    }
    
    .filter-sidebar {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        position: sticky;
        top: 100px;
    }
    
    .filter-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #edf2f7;
    }
    
    .filter-group {
        margin-bottom: 25px;
    }
    
    .filter-label {
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
    }
    
    .pagination {
        justify-content: center;
        margin-top: 50px;
    }
    
    .page-link {
        border: none;
        margin: 0 5px;
        border-radius: 10px !important;
        color: #2c3e50;
        padding: 10px 18px;
        font-weight: 500;
    }
    
    .page-item.active .page-link {
        background: #4a6fa5;
        color: white;
    }
    
    .page-link:hover {
        background: #f8f9fa;
        color: #4a6fa5;
    }
    
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #e9ecef;
        margin-bottom: 20px;
    }
    
    .empty-state h3 {
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .empty-state p {
        color: #6c757d;
        margin-bottom: 25px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="hero-properties">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Jelajahi Properti Premium</h1>
                <p class="lead mb-5">Temukan rumah impian, apartemen mewah, atau properti komersial strategis di lokasi terbaik Indonesia.</p>
                
                <!-- Search Box -->
                <div class="search-box d-flex flex-wrap">
                    <input type="text" class="form-control flex-grow-1 me-2 mb-2 mb-md-0" placeholder="Cari lokasi atau nama properti...">
                    <select class="form-select w-auto me-2 mb-2 mb-md-0">
                        <option selected>Semua Tipe</option>
                        <option>Rumah</option>
                        <option>Apartemen</option>
                        <option>Ruko</option>
                        <option>Kantor</option>
                        <option>Villa</option>
                    </select>
                    <button class="btn-search px-4">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Properties Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Filter Sidebar -->
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h5 class="filter-title">
                        <i class="fas fa-filter me-2 text-primary"></i>Filter
                    </h5>
                    
                    <!-- Price Range -->
                    <div class="filter-group">
                        <label class="filter-label">Rentang Harga</label>
                        <select class="form-select rounded-pill">
                            <option selected>Semua Harga</option>
                            <option>< Rp 500 Juta</option>
                            <option>Rp 500 Jt - Rp 1 M</option>
                            <option>Rp 1 M - Rp 2 M</option>
                            <option>Rp 2 M - Rp 5 M</option>
                            <option>> Rp 5 Miliar</option>
                        </select>
                    </div>
                    
                    <!-- Bedrooms -->
                    <div class="filter-group">
                        <label class="filter-label">Kamar Tidur</label>
                        <select class="form-select rounded-pill">
                            <option selected>Semua</option>
                            <option>1+ Kamar</option>
                            <option>2+ Kamar</option>
                            <option>3+ Kamar</option>
                            <option>4+ Kamar</option>
                        </select>
                    </div>
                    
                    <!-- Bathrooms -->
                    <div class="filter-group">
                        <label class="filter-label">Kamar Mandi</label>
                        <select class="form-select rounded-pill">
                            <option selected>Semua</option>
                            <option>1+ Kamar Mandi</option>
                            <option>2+ Kamar Mandi</option>
                            <option>3+ Kamar Mandi</option>
                        </select>
                    </div>
                    
                    <!-- Status -->
                    <div class="filter-group">
                        <label class="filter-label">Status</label>
                        <select class="form-select rounded-pill">
                            <option selected>Semua</option>
                            <option>Dijual</option>
                            <option>Disewa</option>
                        </select>
                    </div>
                    
                    <!-- Sort -->
                    <div class="filter-group">
                        <label class="filter-label">Urutkan</label>
                        <select class="form-select rounded-pill">
                            <option>Terbaru</option>
                            <option>Harga Tertinggi</option>
                            <option>Harga Terendah</option>
                            <option>Terpopuler</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-outline-primary w-100 rounded-pill mt-3">
                        <i class="fas fa-redo-alt me-2"></i>Reset Filter
                    </button>
                </div>
            </div>
            
            <!-- Properties Grid -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">
                        <span id="propertyCount">0</span> Properti Ditemukan
                    </h5>
                    <span class="text-muted">
                        <i class="fas fa-map-marker-alt me-1 text-primary"></i> 15 Kota
                    </span>
                </div>
                
                <!-- Empty State (Karena masih 0 properti) -->
                <div class="empty-state">
                    <i class="fas fa-building"></i>
                    <h3>Belum Ada Properti</h3>
                    <p class="mb-3">Saat ini belum ada properti yang terdaftar. Silakan tambahkan properti baru.</p>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->isAdmin()): ?>
                            <a href="<?php echo e(route('properties.create')); ?>" class="btn btn-primary rounded-pill px-5 py-3">
                                <i class="fas fa-plus-circle me-2"></i>Tambah Properti Pertama
                            </a>
                        <?php else: ?>
                            <p class="text-muted">Hubungi admin untuk menambahkan properti.</p>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary rounded-pill px-5 py-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Login untuk Melihat
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Property Cards (Contoh data nanti dari database) -->
                <!-- 
                <div class="row g-4">
                    <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="property-card card">
                            <div class="property-image">
                                <span class="property-badge"><?php echo e($property->status); ?></span>
                                <span class="property-type"><?php echo e($property->type); ?></span>
                                <img src="<?php echo e($property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" alt="Property">
                            </div>
                            <div class="card-body">
                                <div class="property-price">
                                    Rp <?php echo e(number_format($property->price, 0, ',', '.')); ?>

                                    <small>/<?php echo e($property->purpose == 'sale' ? 'jual' : 'bulan'); ?></small>
                                </div>
                                <h5 class="property-title"><?php echo e($property->title); ?></h5>
                                <div class="property-address">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    <?php echo e($property->address); ?>, <?php echo e($property->city); ?>

                                </div>
                                <div class="property-features">
                                    <span class="property-feature">
                                        <i class="fas fa-bed"></i> <?php echo e($property->bedrooms ?? '-'); ?> KT
                                    </span>
                                    <span class="property-feature">
                                        <i class="fas fa-bath"></i> <?php echo e($property->bathrooms ?? '-'); ?> KM
                                    </span>
                                    <span class="property-feature">
                                        <i class="fas fa-vector-square"></i> <?php echo e($property->area ?? '-'); ?> m²
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="fas fa-building"></i>
                            <h3>Belum Ada Properti</h3>
                            <p>Saat ini belum ada properti yang terdaftar.</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                -->
                
                <!-- Pagination (hidden for now) -->
                <!-- 
                <nav aria-label="Page navigation" class="mt-5">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
                -->
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update property count (0 for now)
    document.getElementById('propertyCount').innerText = '0';
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/index.blade.php ENDPATH**/ ?>