

<?php $__env->startSection('title', $property->title ?? 'Detail Properti'); ?>

<?php $__env->startSection('styles'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/css/property-show.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="property-show-container">
    
    <!-- Back Button -->
    <a href="<?php echo e(route('properties.index')); ?>" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Daftar Properti</span>
    </a>

    <!-- Property Gallery -->
    <div class="property-gallery">
        <!-- Badges -->
        <div class="gallery-badge">
            <?php if($property->is_featured ?? false): ?>
            <span class="badge-featured">
                <i class="fas fa-star mr-1"></i> FEATURED
            </span>
            <?php endif; ?>
        </div>

        <!-- Main Image -->
        <div class="gallery-main">
            
            <img src="<?php echo e($property->image_url ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" 
                 alt="<?php echo e($property->title); ?>">
        </div>

        <!-- Thumbnails -->
        <div class="gallery-thumb">
            
            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Thumbnail 1">
        </div>
        <div class="gallery-thumb">
            
            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00" alt="Thumbnail 2">
        </div>
    </div>

    <!-- Property Info Grid -->
    <div class="property-info-grid">
        <!-- Left Column -->
        <div class="left-column">
            <!-- Title Section -->
            <div class="title-section">
                <h1 class="property-title"><?php echo e($property->title ?? 'Villa Eksklusif dengan Pemandangan Laut'); ?></h1>
                
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span><?php echo e($property->location ?? 'Jl. Raya Uluwatu, Bali'); ?></span>
                </div>

                <div class="property-meta">
                    <div class="meta-item">
                        <div class="meta-label">Luas Bangunan</div>
                        <div class="meta-value"><?php echo e($property->building_area ?? '250'); ?> m²</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Luas Tanah</div>
                        <div class="meta-value"><?php echo e($property->land_area ?? '300'); ?> m²</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Tahun</div>
                        <div class="meta-value"><?php echo e($property->year_built ?? '2024'); ?></div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="section-card">
                <h2 class="section-title">
                    <i class="fas fa-align-left"></i>
                    Deskripsi
                </h2>
                <div class="description-text">
                    <?php echo e($property->description ?? 'Villa mewah dengan pemandangan laut yang menakjubkan. Dilengkapi dengan kolam renang pribadi, taman tropis, dan akses langsung ke pantai. Cocok untuk investasi atau tempat liburan keluarga. Lokasi strategis dekat dengan berbagai fasilitas umum seperti restoran, supermarket, dan tempat wisata.'); ?>

                </div>
            </div>

            <!-- Specifications -->
            <div class="section-card">
                <h2 class="section-title">
                    <i class="fas fa-cog"></i>
                    Spesifikasi Bangunan
                </h2>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-icon primary">
                            <i class="fas fa-bed"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Kamar Tidur</div>
                            <div class="spec-value"><?php echo e($property->bedrooms ?? '4'); ?> Kamar</div>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon success">
                            <i class="fas fa-bath"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Kamar Mandi</div>
                            <div class="spec-value"><?php echo e($property->bathrooms ?? '3'); ?> Kamar</div>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon warning">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Garasi</div>
                            <div class="spec-value"><?php echo e($property->garage ?? '2'); ?> Mobil</div>
                        </div>
                    </div>

                    <div class="spec-item">
                        <div class="spec-icon info">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="spec-content">
                            <div class="spec-label">Listrik</div>
                            <div class="spec-value"><?php echo e($property->electricity ?? '5500'); ?> Watt</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facilities -->
            <div class="section-card">
                <h2 class="section-title">
                    <i class="fas fa-check-circle"></i>
                    Fasilitas
                </h2>
                <div class="facilities-grid">
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>AC Central</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Kolam Renang</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Keamanan 24 Jam</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Taman</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Internet</span>
                    </div>
                    <div class="facility-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Furnished</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Booking Card -->
        <div class="right-column">
            <div class="booking-card">
                <div class="booking-price-wrapper">
                    <div class="booking-price">
                        Rp <?php echo e(number_format($property->price ?? 2500000000, 0, ',', '.')); ?>

                    </div>
                    <div class="booking-period">/ <?php echo e($property->price_unit ?? 'tahun'); ?></div>
                </div>

                <div class="booking-features">
                    <div class="booking-feature">
                        <i class="fas fa-ruler-combined"></i>
                        <span>Luas: <?php echo e($property->building_area ?? '250'); ?> m²</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-bed"></i>
                        <span><?php echo e($property->bedrooms ?? '4'); ?> Kamar Tidur</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-bath"></i>
                        <span><?php echo e($property->bathrooms ?? '3'); ?> Kamar Mandi</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Min. Sewa 1 Tahun</span>
                    </div>
                    <div class="booking-feature">
                        <i class="fas fa-shield-alt"></i>
                        <span>Keamanan 24 Jam</span>
                    </div>
                </div>

                
                <a href="<?php echo e(route('booking.create', $property->id)); ?>" class="btn-booking">
                    <i class="fas fa-calendar-check"></i>
                    Booking Sekarang
                </a>

                <!-- Agent Info -->
                <div class="agent-card" data-phone="<?php echo e($property->agent_phone ?? '081234567890'); ?>">
                    <div class="agent-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="agent-info">
                        <div class="agent-label">Agent</div>
                        <div class="agent-name"><?php echo e($property->agent_name ?? 'Budi Santoso'); ?></div>
                        <div class="agent-phone">
                            <i class="fas fa-phone-alt"></i>
                            <span><?php echo e($property->agent_phone ?? '0812-3456-7890'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('assets/js/property-show.js')); ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Additional initialization if needed
        console.log('Property show page loaded');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/show.blade.php ENDPATH**/ ?>