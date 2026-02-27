

<?php $__env->startSection('title', 'Daftar Properti - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/properties.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="properties-wrapper">
    
    <!-- ===== HEADER ===== -->
    <div class="properties-header">
        <div>
            <h1 class="header-title">Jelajahi Properti</h1>
            <p class="header-subtitle">Temukan properti impian Anda dari ribuan pilihan terbaik</p>
        </div>
        <button class="filter-toggle" id="filterToggle">
            <i class="fas fa-sliders-h"></i>
            <span>Filter</span>
        </button>
    </div>

    <!-- ===== FILTER SECTION ===== -->
    <div class="filter-section" id="filterSection">
        <form id="filterForm">
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
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Harga</label>
                    <select class="filter-select" name="price">
                        <option value="">Semua Harga</option>
                        <option value="<500">< Rp 500 Jt</option>
                        <option value="500-1000">Rp 500 Jt - 1 M</option>
                        <option value=">1000">> Rp 1 M</option>
                    </select>
                </div>
            </div>
            <div class="filter-actions">
                <button type="button" class="btn-reset" id="resetFilters">Reset</button>
                <button type="submit" class="btn-apply">Terapkan Filter</button>
            </div>
        </form>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: #3b82f6; color: white;">
                <i class="fas fa-building"></i>
            </div>
            <div>
                <div class="stat-value">1.500+</div>
                <div class="stat-label">Total Properti</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #10b981; color: white;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <div class="stat-value">1.200+</div>
                <div class="stat-label">Tersedia</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #f59e0b; color: white;">
                <i class="fas fa-clock"></i>
            </div>
            <div>
                <div class="stat-value">24/7</div>
                <div class="stat-label">Layanan</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #ef4444; color: white;">
                <i class="fas fa-smile"></i>
            </div>
            <div>
                <div class="stat-value">98%</div>
                <div class="stat-label">Kepuasan</div>
            </div>
        </div>
    </div>

    <!-- ===== CHART SECTION ===== -->
    <div class="chart-section">
        <div class="chart-header">
            <div>
                <h3 class="chart-title">Distribusi Properti</h3>
                <p class="chart-subtitle">Berdasarkan tipe bangunan</p>
            </div>
            <span class="chart-badge">2024</span>
        </div>
        <div id="propertiesChart" class="chart-container"></div>
    </div>

    <!-- ===== PROPERTIES GRID ===== -->
    <div class="properties-grid" id="propertiesGrid">
        <!-- Property Card 1 -->
         <?php $__empty_1 = true; $__currentLoopData = $properties ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="property-card">
            <div class="property-image">
                <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994"  alt="<?php echo e($property->title); ?>">
                        <div class="property-price">Rp <?php echo e(number_format($property->price ?? 2500000000, 0, ',', '.')); ?></div>

         <!-- TOMBOL BOOKING - PAKAI $property DARI LOOP -->
            <a href="<?php echo e(route('booking.create', $property->id)); ?>" class="btn-booking-card">
                <i class="fas fa-calendar-check"></i> Booking Sekarang
            </a>


        </div>
        <div class="property-details">
            <h3 class="property-title"><?php echo e($property->title ?? 'Villa Eksklusif Bali'); ?></h3>
            <div class="property-location">
                <i class="fas fa-map-marker-alt"></i> <?php echo e($property->location ?? 'JL. Raya Uluwatu, Badung'); ?>

            </div>


            </div>
                <div class="property-features">
                    <span><i class="fas fa-bed"></i> 4 KT</span>
                    <span><i class="fas fa-bath"></i> 3 KM</span>
                    <span><i class="fas fa-vector-square"></i> 250 m²</span>
                </div>
            </div>
        </div>
        <!-- Property Card 2 -->
        <div class="property-card">
            <div class="property-image">
                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00" alt="Property">
                <div class="property-price">Rp 8,5 M</div>
            </div>
            <div class="property-details">
                <h3 class="property-title">Apartemen Mewah SCBD</h3>
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i> Jl. Sudirman, Jakarta
                </div>
                <div class="property-features">
                    <span><i class="fas fa-bed"></i> 3 KT</span>
                    <span><i class="fas fa-bath"></i> 2 KM</span>
                    <span><i class="fas fa-vector-square"></i> 150 m²</span>
                </div>
            </div>
        </div>
        <!-- Property Card 3 -->
        <div class="property-card">
            <div class="property-image">
                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Property">
                <div class="property-price">Rp 1,2 M</div>
            </div>
            <div class="property-details">
                <h3 class="property-title">Rumah Modern BSD</h3>
                <div class="property-location">
                    <i class="fas fa-map-marker-alt"></i> BSD City, Tangerang
                </div>
                <div class="property-features">
                    <span><i class="fas fa-bed"></i> 4 KT</span>
                    <span><i class="fas fa-bath"></i> 3 KM</span>
                    <span><i class="fas fa-vector-square"></i> 200 m²</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ApexCharts
    const options = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: { show: false },
            background: 'transparent'
        },
        colors: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true
            }
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            labels: { style: { colors: '#1e293b', fontSize: '12px' } }
        },
        yaxis: {
            labels: { style: { colors: '#1e293b', fontSize: '11px' } }
        },
        tooltip: {
            theme: 'dark',
            y: { formatter: (val) => val + ' Properti' }
        },
        grid: { borderColor: '#e2e8f0' }
    };

    const chart = new ApexCharts(document.getElementById('propertiesChart'), options);
    chart.render();

    // Filter toggle
    const filterToggle = document.getElementById('filterToggle');
    const filterSection = document.getElementById('filterSection');

    if (filterToggle && filterSection) {
        filterToggle.addEventListener('click', function() {
            filterSection.classList.toggle('active');
            const icon = this.querySelector('i');
            if (icon) {
                icon.className = filterSection.classList.contains('active') ? 'fas fa-times' : 'fas fa-sliders-h';
            }
        });
    }

    // Reset filter
    const resetBtn = document.getElementById('resetFilters');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            document.querySelectorAll('.filter-select').forEach(select => select.value = '');
        });
    }
});
</script>




<?php $__env->startSection('content'); ?>

<div class="container">

    <h1>Data Properties</h1>

    
    <?php if($properties->count() > 0): ?>

        <div class="row">
            <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5><?php echo e($property->name); ?></h5>
                            <p><?php echo e($property->type); ?></p>
                            <p><?php echo e($property->price); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    <?php else: ?>
        <p>Tidak ada data properti.</p>
    <?php endif; ?>

    
    <div id="propertiesChart"></div>

</div>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('scripts'); ?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const options = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: { show: false },
            background: 'transparent'
        },
        colors: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true
            }
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa']
        }
    };

    const chart = new ApexCharts(
        document.getElementById('propertiesChart'),
        options
    );

    chart.render();

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/properties/index.blade.php ENDPATH**/ ?>