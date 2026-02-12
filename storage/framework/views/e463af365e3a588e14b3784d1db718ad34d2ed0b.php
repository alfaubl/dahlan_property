

<?php $__env->startSection('title', 'Daftar Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* ========== PROPERTIES PAGE SPECIFIC STYLES ========== */
    .properties-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0 60px;
        margin-top: 76px;
    }
    
    .filter-sidebar {
        position: sticky;
        top: 100px;
        border-radius: 15px;
    }
    
    .property-card-img {
        height: 200px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }
    
    .property-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 1;
    }
    
    .pagination .page-link {
        border-radius: 8px;
        margin: 0 3px;
        border: none;
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        border-color: #0d6efd;
    }
    
    .empty-state {
        padding: 80px 20px;
        text-align: center;
    }
    
    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.3;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- ========== HERO SECTION ========== -->
<section class="properties-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">Jelajahi <span class="text-primary">Properti</span></h1>
                <p class="lead">Temukan properti impian Anda dari koleksi terbaik kami</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo e(route('properties.create')); ?>" class="btn btn-light btn-glow px-4">
                    <i class="fas fa-plus-circle me-2"></i>Pasang Iklan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========== MAIN CONTENT ========== -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- ========== FILTER SIDEBAR ========== -->
            <div class="col-lg-3 mb-4">
                <div class="filter-sidebar card shadow-sm border-0 p-4">
                    <h5 class="fw-bold mb-4"><i class="fas fa-filter me-2"></i>Filter Pencarian</h5>
                    
                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                        <!-- Search -->
                        <div class="mb-3">
                            <label class="form-label fw-medium">Kata Kunci</label>
                            <input type="text" class="form-control" name="search" value="<?php echo e(request('search')); ?>" 
                                   placeholder="Cari properti...">
                        </div>
                        
                        <!-- Property Type -->
                        <div class="mb-3">
                            <label class="form-label fw-medium">Tipe Properti</label>
                            <select class="form-select" name="type">
                                <option value="">Semua Tipe</option>
                                <option value="house" <?php echo e(request('type') == 'house' ? 'selected' : ''); ?>>Rumah</option>
                                <option value="apartment" <?php echo e(request('type') == 'apartment' ? 'selected' : ''); ?>>Apartemen</option>
                                <option value="land" <?php echo e(request('type') == 'land' ? 'selected' : ''); ?>>Tanah</option>
                                <option value="commercial" <?php echo e(request('type') == 'commercial' ? 'selected' : ''); ?>>Komersial</option>
                            </select>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="mb-3">
                            <label class="form-label fw-medium">Kisaran Harga</label>
                            <select class="form-select" name="price_range">
                                <option value="">Semua Harga</option>
                                <option value="0-500000000" <?php echo e(request('price_range') == '0-500000000' ? 'selected' : ''); ?>>
                                    < Rp 500 JT</option>
                                <option value="500000000-1000000000" <?php echo e(request('price_range') == '500000000-1000000000' ? 'selected' : ''); ?>>
                                    Rp 500 JT - 1 M</option>
                                <option value="1000000000-5000000000" <?php echo e(request('price_range') == '1000000000-5000000000' ? 'selected' : ''); ?>>
                                    Rp 1 M - 5 M</option>
                                <option value="5000000000-10000000000" <?php echo e(request('price_range') == '5000000000-10000000000' ? 'selected' : ''); ?>>
                                    > Rp 5 M</option>
                            </select>
                        </div>
                        
                        <!-- City -->
                        <div class="mb-3">
                            <label class="form-label fw-medium">Kota</label>
                            <input type="text" class="form-control" name="city" value="<?php echo e(request('city')); ?>" 
                                   placeholder="Nama kota...">
                        </div>
                        
                        <!-- Bedrooms -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Jumlah Kamar</label>
                            <select class="form-select" name="bedrooms">
                                <option value="">Semua</option>
                                <option value="1" <?php echo e(request('bedrooms') == '1' ? 'selected' : ''); ?>>1 Kamar</option>
                                <option value="2" <?php echo e(request('bedrooms') == '2' ? 'selected' : ''); ?>>2 Kamar</option>
                                <option value="3" <?php echo e(request('bedrooms') == '3' ? 'selected' : ''); ?>>3 Kamar</option>
                                <option value="4" <?php echo e(request('bedrooms') == '4' ? 'selected' : ''); ?>>4+ Kamar</option>
                            </select>
                        </div>
                        
                        <!-- Buttons -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-glow">
                                <i class="fas fa-search me-2"></i>Terapkan Filter
                            </button>
                            <a href="<?php echo e(url()->current()); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-redo me-2"></i>Reset Filter
                            </a>
                        </div>
                    </form>
                    
                    <!-- Quick Stats -->
                    <div class="mt-4 pt-4 border-top">
                        <h6 class="fw-bold mb-3">Statistik</h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Total Properti:</span>
                            <span class="fw-medium"><?php echo e($properties->total()); ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Halaman:</span>
                            <span class="fw-medium"><?php echo e($properties->currentPage()); ?>/<?php echo e($properties->lastPage()); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ========== PROPERTIES LISTING ========== -->
            <div class="col-lg-9">
                <!-- Alert Messages -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <!-- Properties Grid -->
                <?php if($properties->count() > 0): ?>
                    <div class="row g-4">
                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                                <div class="property-card card shadow-sm border-0 h-100">
                                    <div class="position-relative">
                                        <img src="<?php echo e($property->images && count(json_decode($property->images)) > 0 ? json_decode($property->images)[0] : 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'); ?>" 
                                             class="property-card-img card-img-top" alt="<?php echo e($property->title); ?>">
                                        <span class="property-badge badge bg-<?php echo e($property->type == 'house' ? 'success' : ($property->type == 'apartment' ? 'info' : ($property->type == 'land' ? 'warning' : 'secondary'))); ?>">
                                            <?php echo e(ucfirst($property->type)); ?>

                                        </span>
                                        <?php if($property->featured): ?>
                                            <span class="property-badge badge bg-danger" style="top: 45px;">
                                                <i class="fas fa-star me-1"></i>Featured
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold mb-2"><?php echo e(Str::limit($property->title, 40)); ?></h5>
                                        <p class="card-text text-muted small mb-3">
                                            <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                            <?php echo e($property->city); ?>, <?php echo e($property->province); ?>

                                        </p>
                                        
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="price-tag">
                                                Rp <?php echo e(number_format($property->price, 0, ',', '.')); ?>

                                            </div>
                                            <div class="property-features">
                                                <span class="badge bg-light text-dark me-1">
                                                    <i class="fas fa-bed text-primary me-1"></i><?php echo e($property->bedrooms); ?>

                                                </span>
                                                <span class="badge bg-light text-dark">
                                                    <i class="fas fa-bath text-primary me-1"></i><?php echo e($property->bathrooms); ?>

                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo e(route('properties.show', $property)); ?>" class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>Detail
                                            </a>
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(auth()->id() == $property->user_id): ?>
                                                    <div class="btn-group">
                                                        <a href="<?php echo e(route('properties.edit', $property)); ?>" class="btn btn-outline-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="<?php echo e(route('properties.destroy', $property)); ?>" method="POST" class="d-inline">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                                                    onclick="return confirm('Hapus properti ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-0 pt-0">
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            <?php echo e($property->created_at->diffForHumans()); ?>

                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if($properties->hasPages()): ?>
                        <div class="mt-5">
                            <nav aria-label="Properties pagination">
                                <ul class="pagination justify-content-center">
                                    
                                    <?php if($properties->onFirstPage()): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($properties->previousPageUrl()); ?>" rel="prev">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    
                                    <?php $__currentLoopData = range(1, $properties->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($page == $properties->currentPage()): ?>
                                            <li class="page-item active">
                                                <span class="page-link"><?php echo e($page); ?></span>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo e($properties->url($page)); ?>"><?php echo e($page); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                    <?php if($properties->hasMorePages()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($properties->nextPageUrl()); ?>" rel="next">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled">
                                            <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Empty State -->
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Tidak Ada Properti Ditemukan</h4>
                        <p class="text-muted mb-4">
                            <?php if(request()->hasAny(['search', 'type', 'price_range', 'city', 'bedrooms'])): ?>
                                Coba ubah filter pencarian Anda atau
                            <?php endif; ?>
                            Jadilah yang pertama memasang properti!
                        </p>
                        <a href="<?php echo e(route('properties.create')); ?>" class="btn btn-primary btn-glow px-4">
                            <i class="fas fa-plus-circle me-2"></i>Pasang Iklan Properti
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Properties page specific scripts
    document.addEventListener('DOMContentLoaded', function() {
        // Filter form enhancement
        const filterForm = document.querySelector('.filter-sidebar form');
        if (filterForm) {
            const inputs = filterForm.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Auto-submit on price range change
                    if (this.name === 'price_range' || this.name === 'type') {
                        filterForm.submit();
                    }
                });
            });
        }
        
        // Property card hover effects
        const propertyCards = document.querySelectorAll('.property-card');
        propertyCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const img = this.querySelector('.property-card-img');
                if (img) {
                    img.style.transform = 'scale(1.05)';
                    img.style.transition = 'transform 0.5s ease';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const img = this.querySelector('.property-card-img');
                if (img) {
                    img.style.transform = 'scale(1)';
                }
            });
        });
        
        // Delete confirmation
        const deleteForms = document.querySelectorAll('form[action*="destroy"]');
        deleteForms.forEach(form => {
            const button = form.querySelector('button[type="submit"]');
            if (button) {
                button.addEventListener('click', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus properti ini?')) {
                        e.preventDefault();
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/index.blade.php ENDPATH**/ ?>