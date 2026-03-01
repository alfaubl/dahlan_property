

<?php $__env->startSection('title', 'Jelajahi Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/properties.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="properties-wrapper">
    
    <!-- ===== HERO SECTION ===== -->
    <div class="hero-section">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-crown"></i> Premium Properties
            </span>
            <h1 class="hero-title">Jelajahi Properti <span class="hero-highlight">Impian</span> Anda</h1>
            <p class="hero-subtitle">Temukan ribuan properti berkualitas dengan harga terbaik di Indonesia</p>
            
            <!-- Search Bar -->
            <div class="hero-search">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="heroSearchInput" placeholder="Cari properti berdasarkan lokasi, nama, atau tipe...">
                <button class="search-btn" onclick="searchProperty()">Cari</button>
            </div>
            
            <!-- Stats -->
            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-value"><?php echo e($totalProperties ?? 1500); ?>+</span>
                    <span class="hero-stat-label">Properti</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value"><?php echo e($totalCities ?? 500); ?>+</span>
                    <span class="hero-stat-label">Kota</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-value"><?php echo e($satisfactionRate ?? 98); ?>%</span>
                    <span class="hero-stat-label">Kepuasan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FILTER SECTION ===== -->
    <div class="filter-section" id="filterSection">
        <div class="filter-header">
            <h3><i class="fas fa-sliders-h"></i> Filter Pencarian</h3>
            <button class="filter-toggle" id="filterToggle">
                <i class="fas fa-chevron-up"></i>
            </button>
        </div>
        <div class="filter-body" id="filterBody">
            <form id="filterForm" action="<?php echo e(route('properties.index')); ?>" method="GET">
                <div class="filter-grid">
                    <div class="filter-item">
                        <label class="filter-label">Tipe Properti</label>
                        <select class="filter-select" name="type">
                            <option value="">Semua Tipe</option>
                            <option value="rumah">Rumah</option>
                            <option value="apartemen">Apartemen</option>
                            <option value="ruko">Ruko</option>
                            <option value="kantor">Kantor</option>
                            <option value="villa">Villa</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Lokasi</label>
                        <select class="filter-select" name="location">
                            <option value="">Semua Lokasi</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                            <option value="surabaya">Surabaya</option>
                            <option value="bali">Bali</option>
                            <option value="medan">Medan</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Kamar Tidur</label>
                        <select class="filter-select" name="bedrooms">
                            <option value="">Semua</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Harga Minimal</label>
                        <select class="filter-select" name="min_price">
                            <option value="">Minimal</option>
                            <option value="100000000">Rp 100 Jt</option>
                            <option value="500000000">Rp 500 Jt</option>
                            <option value="1000000000">Rp 1 M</option>
                            <option value="2000000000">Rp 2 M</option>
                            <option value="5000000000">Rp 5 M</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Harga Maksimal</label>
                        <select class="filter-select" name="max_price">
                            <option value="">Maksimal</option>
                            <option value="500000000">Rp 500 Jt</option>
                            <option value="1000000000">Rp 1 M</option>
                            <option value="2000000000">Rp 2 M</option>
                            <option value="5000000000">Rp 5 M</option>
                            <option value="10000000000">Rp 10 M</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <label class="filter-label">Status</label>
                        <select class="filter-select" name="status">
                            <option value="">Semua</option>
                            <option value="available">Tersedia</option>
                            <option value="sold">Terjual</option>
                            <option value="rented">Disewa</option>
                        </select>
                    </div>
                </div>
                <div class="filter-actions">
                    <button type="button" class="btn-reset" id="resetFilters">
                        <i class="fas fa-redo-alt"></i> Reset
                    </button>
                    <button type="submit" class="btn-apply">
                        <i class="fas fa-search"></i> Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon total">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($totalProperties ?? 1500); ?>+</span>
                <span class="stat-label">Total Properti</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon available">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($availableProperties ?? 1200); ?>+</span>
                <span class="stat-label">Tersedia</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cities">
                <i class="fas fa-city"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($totalCities ?? 500); ?>+</span>
                <span class="stat-label">Kota</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon satisfaction">
                <i class="fas fa-smile"></i>
            </div>
            <div class="stat-info">
                <span class="stat-value"><?php echo e($satisfactionRate ?? 98); ?>%</span>
                <span class="stat-label">Kepuasan</span>
            </div>
        </div>
    </div>

    <!-- ===== APEXCHARTS SECTION ===== -->
    <div class="chart-section">
        <div class="chart-header">
            <div class="chart-title-wrapper">
                <div class="chart-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div>
                    <h3 class="chart-title">Distribusi Properti</h3>
                    <p class="chart-subtitle">Berdasarkan tipe bangunan • Update real-time</p>
                </div>
            </div>
            <div class="chart-legend">
                <div class="legend-item">
                    <span class="legend-color" style="background: #3b82f6;"></span>
                    <span>Rumah</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #10b981;"></span>
                    <span>Apartemen</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #f59e0b;"></span>
                    <span>Ruko</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #ef4444;"></span>
                    <span>Kantor</span>
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background: #8b5cf6;"></span>
                    <span>Villa</span>
                </div>
            </div>
        </div>
        <div id="propertiesChart" class="chart-container"></div>
    </div>

    <!-- ===== PROPERTIES GRID ===== -->
    <div class="section-header">
        <h2 class="section-title">
            <i class="fas fa-building"></i>
            Properti Pilihan
        </h2>
        <span class="section-badge"><?php echo e($properties->total() ?? 0); ?> Properti</span>
    </div>

    <div class="properties-grid" id="propertiesGrid">
        <?php $__empty_1 = true; $__currentLoopData = $properties ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="property-card" data-id="<?php echo e($property->id); ?>">
            <!-- Status Badge -->
            <div class="property-badge <?php echo e($property->status ?? 'available'); ?>">
                <?php echo e($property->status == 'available' ? 'Tersedia' : ($property->status == 'sold' ? 'Terjual' : 'Disewa')); ?>

            </div>
            
            <!-- ✅ FAVORITE BUTTON (WISHLIST) -->
            <?php if(auth()->guard()->check()): ?>
                <button class="btn-favorite <?php echo e(in_array($property->id, $favoriteIds ?? []) ? 'active' : ''); ?>" 
                        data-property-id="<?php echo e($property->id); ?>" 
                        onclick="toggleFavorite(<?php echo e($property->id); ?>)" 
                        title="<?php echo e(in_array($property->id, $favoriteIds ?? []) ? 'Hapus dari favorit' : 'Tambah ke favorit'); ?>">
                    <i class="fas fa-heart"></i>
                </button>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn-favorite" title="Login untuk favorite">
                    <i class="fas fa-heart"></i>
                </a>
            <?php endif; ?>
            
            <div class="property-image">
                <img src="<?php echo e($property->image ?? 'https://images.unsplash.com/photo-1568605114967-8130f3a36994'); ?>" alt="<?php echo e($property->title); ?>">
                <div class="property-price">
                    Rp <?php echo e(number_format($property->price ?? 2500000000, 0, ',', '.')); ?>

                </div>
            </div>
            <div class="property-details">
                <h3 class="property-title"><?php echo e($property->title ?? 'Villa Eksklusif Bali'); ?></h3>
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php echo e($property->location ?? $property->city ?? 'JL. Raya Uluwatu, Badung'); ?>

                </div>
                <div class="property-features">
                    <div class="feature">
                        <i class="fas fa-bed"></i>
                        <span><?php echo e($property->bedrooms ?? 4); ?> KT</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-bath"></i>
                        <span><?php echo e($property->bathrooms ?? 3); ?> KM</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-vector-square"></i>
                        <span><?php echo e($property->area ?? 250); ?> m²</span>
                    </div>
                </div>
                <div class="property-footer">
                    <div class="property-agent">
                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($property->agent ?? $property->user->name ?? 'Dahlan')); ?>&background=3b82f6&color=fff" alt="Agent">
                        <span><?php echo e($property->agent ?? $property->user->name ?? 'Ahmad Dahlan'); ?></span>
                    </div>
                    <div class="property-actions">
                        <a href="<?php echo e(route('properties.show', $property->id)); ?>" class="btn-detail" title="Lihat Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('booking.create', $property->id)); ?>" class="btn-booking">
                            <i class="fas fa-calendar-check"></i>
                            Booking
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-state">
            <i class="fas fa-building empty-icon"></i>
            <h3>Belum Ada Properti</h3>
            <p>Properti akan segera ditambahkan. Silakan cek kembali nanti.</p>
            <a href="<?php echo e(route('dashboard')); ?>" class="empty-btn">Kembali ke Dashboard</a>
        </div>
        <?php endif; ?>
    </div>

    <!-- ===== PAGINATION ===== -->
    <?php if(isset($properties) && method_exists($properties, 'links')): ?>
    <div class="pagination-wrapper">
        <?php echo e($properties->links()); ?>

    </div>
    <?php endif; ?>

    <!-- ===== CTA SECTION ===== -->
    <div class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Tidak Menemukan Properti yang Dicari?</h2>
            <p class="cta-text">Tim kami siap membantu Anda menemukan properti impian</p>
            <div class="cta-buttons">
                <a href="<?php echo e(route('contact')); ?>" class="cta-btn-primary">
                    <i class="fas fa-headset"></i>
                    Hubungi Kami
                </a>
                <a href="<?php echo e(route('properties.create')); ?>" class="cta-btn-secondary">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Properti
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?php echo e(asset('assets/js/properties.js')); ?>"></script>
<script>
// ===== TOGGLE FAVORITE FUNCTION =====
function toggleFavorite(propertyId) {
    fetch(`/wishlist/toggle/${propertyId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const btn = document.querySelector(`.btn-favorite[data-property-id="${propertyId}"]`);
            if (data.action === 'added') {
                btn.classList.add('active');
                showToast('✅ Ditambahkan ke favorit');
            } else {
                btn.classList.remove('active');
                showToast('❌ Dihapus dari favorit');
            }
        } else {
            showToast('⚠️ ' + (data.message || 'Terjadi kesalahan'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('⚠️ Terjadi kesalahan');
    });
}

// ===== SHOW TOAST NOTIFICATION =====
function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = message;
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #1f2937;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
        font-size: 14px;
        font-weight: 500;
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

// Add animation keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);

// ===== SEARCH FUNCTION =====
function searchProperty() {
    const query = document.getElementById('heroSearchInput').value;
    if (query) {
        window.location.href = `<?php echo e(route('properties.index')); ?>?search=${encodeURIComponent(query)}`;
    }
}

// ===== ENTER KEY SEARCH =====
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('heroSearchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchProperty();
            }
        });
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/index.blade.php ENDPATH**/ ?>