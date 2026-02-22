

<?php $__env->startSection('title', 'Wishlist - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.css.wishlist-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="wishlist-container">
    <div class="container">
        <!-- Header -->
        <div class="wishlist-header">
            <h1>
                <i class="fas fa-heart"></i> 
                Properti Favorit
                <?php if(isset($wishlists) && $wishlists->count() > 0): ?>
                    <span class="wishlist-count"><?php echo e($wishlists->count()); ?> Properti</span>
                <?php endif; ?>
            </h1>
            <p>Properti yang Anda simpan untuk dilihat nanti</p>
        </div>

        <!-- Alert Messages -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if(session('info')): ?>
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                <?php echo e(session('info')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Content -->
        <?php if(isset($wishlists) && $wishlists->count() > 0): ?>
            <div class="property-grid">
                <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="wishlist-card">
                        <div class="card-image">
                            <img src="<?php echo e($wishlist->property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" 
                                 alt="<?php echo e($wishlist->property->title); ?>">
                            <span class="card-badge"><?php echo e($wishlist->property->type); ?></span>
                            
                            <form action="<?php echo e(route('wishlist.destroy', $wishlist)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="remove-btn" title="Hapus dari wishlist">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($wishlist->property->title); ?></h5>
                            
                            <div class="card-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo e($wishlist->property->city); ?></span>
                            </div>
                            
                            <div class="card-price">
                                Rp <?php echo e(number_format($wishlist->property->price, 0, ',', '.')); ?>

                            </div>
                            
                            <div class="property-features">
                                <?php if($wishlist->property->bedrooms): ?>
                                    <span>
                                        <i class="fas fa-bed"></i> <?php echo e($wishlist->property->bedrooms); ?> KT
                                    </span>
                                <?php endif; ?>
                                
                                <?php if($wishlist->property->bathrooms): ?>
                                    <span>
                                        <i class="fas fa-bath"></i> <?php echo e($wishlist->property->bathrooms); ?> KM
                                    </span>
                                <?php endif; ?>
                                
                                <?php if($wishlist->property->area): ?>
                                    <span>
                                        <i class="fas fa-vector-square"></i> <?php echo e($wishlist->property->area); ?> m²
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <a href="<?php echo e(route('properties.show', $wishlist->property)); ?>" class="btn-detail">
                                <span>Lihat Detail</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            
                            <span class="time-ago">
                                <?php echo e($wishlist->created_at->diffForHumans()); ?>

                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="empty-wishlist">
                <div class="empty-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Belum Ada Properti Favorit</h3>
                <p>Jelajahi properti kami dan klik ikon ❤️ untuk menyimpan properti incaran Anda</p>
                <a href="<?php echo e(route('properties.index')); ?>" class="btn-explore">
                    <span>Jelajahi Properti</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('partials.js.wishlist-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/wishlist/index.blade.php ENDPATH**/ ?>