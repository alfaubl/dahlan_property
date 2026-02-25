

<?php $__env->startSection('title', 'Dahlan Property - Marketplace Properti Terbaik'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/welcome.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-16 animate-slideIn">
    
    <!-- ===== HERO SECTION ===== -->
    <section class="hero-section">
        <div class="hero-bg-gradient"></div>
        <div class="hero-bg-element-1"></div>
        <div class="hero-bg-element-2"></div>
        <div class="hero-bg-element-3"></div>
        
        <div class="hero-content">
            <div class="max-w-3xl mx-auto text-center" data-animate="true">
                <!-- Badge -->
                <div class="hero-badge">
                    <i class="fas fa-crown"></i>
                    <span>Premium Property Marketplace</span>
                </div>
                
                <!-- Main Title -->
                <h1 class="hero-title">
                    Temukan Properti 
                    <span class="hero-title-gradient">
                        Impian
                    </span>
                    Anda
                </h1>
                
                <!-- Description -->
                <p class="hero-description">
                    Platform properti terpercaya dengan ribuan pilihan rumah, apartemen, ruko, dan villa di seluruh Indonesia
                </p>
                
                <!-- Search Bar -->
                <div class="search-container">
                    <div class="search-wrapper">
                        <div class="search-input-wrapper">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" 
                                   placeholder="Cari properti berdasarkan lokasi, nama, atau tipe..."
                                   class="search-input">
                        </div>
                        <button class="search-button">
                            <i class="fas fa-search"></i>
                            <span>Cari</span>
                        </button>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value counter-value" data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="3">0</div>
                        <div class="stat-label">Properti</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value counter-value" data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="3">0</div>
                        <div class="stat-label">Kota</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value counter-value" data-purecounter-start="0" data-purecounter-end="2500" data-purecounter-duration="3">0</div>
                        <div class="stat-label">Klien</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value counter-value" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="3">0</div>
                        <div class="stat-label">Tahun</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FITUR SECTION ===== -->
    <section class="py-16">
        <div class="section-header">
            <span class="section-badge">MENGAPA MEMILIH KAMI</span>
            <h2 class="section-title">Kenapa Harus DahlanProperty?</h2>
            <p class="section-subtitle">Kami memberikan pengalaman terbaik dalam mencari properti impian Anda</p>
        </div>

        <div class="features-grid">
            <!-- Fitur 1 -->
            <div class="feature-card">
                <div class="feature-icon-wrapper primary">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">100% Terpercaya</h3>
                <p class="feature-description">Semua properti terverifikasi dan legalitas terjamin. Kami pastikan keamanan transaksi Anda.</p>
            </div>

            <!-- Fitur 2 -->
            <div class="feature-card">
                <div class="feature-icon-wrapper success">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="feature-title">24/7 Layanan</h3>
                <p class="feature-description">Tim customer service kami siap membantu Anda kapan saja, di mana saja.</p>
            </div>

            <!-- Fitur 3 -->
            <div class="feature-card">
                <div class="feature-icon-wrapper warning">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h3 class="feature-title">Harga Terbaik</h3>
                <p class="feature-description">Dapatkan penawaran harga terbaik dan promo menarik untuk setiap transaksi.</p>
            </div>
        </div>
    </section>

    <!-- ===== PROPERTY STATS CHART ===== -->
    <section class="stats-chart-section">
        <div class="chart-card">
            <div class="chart-grid">
                <!-- Left Content -->
                <div class="chart-content">
                    <span class="section-badge">STATISTIK PROPERTI</span>
                    <h2>Pertumbuhan Properti di Indonesia</h2>
                    <p class="chart-description">
                        Pasar properti di Indonesia terus berkembang pesat. Lihat distribusi dan pertumbuhan properti berdasarkan tipe dan wilayah.
                    </p>
                    
                    <div class="stats-list">
                        <div class="stat-list-item">
                            <span class="stat-dot primary"></span>
                            <span class="stat-list-text">Pertumbuhan 25% per tahun</span>
                        </div>
                        <div class="stat-list-item">
                            <span class="stat-dot success"></span>
                            <span class="stat-list-text">Lebih dari 1500 properti tersedia</span>
                        </div>
                        <div class="stat-list-item">
                            <span class="stat-dot warning"></span>
                            <span class="stat-list-text">Tersebar di 500 kota</span>
                        </div>
                    </div>

                    <div class="chart-actions">
                        <a href="<?php echo e(route('properties.index')); ?>" class="btn-primary">
                            <i class="fas fa-building"></i>
                            Lihat Properti
                        </a>
                        <a href="<?php echo e(route('contact')); ?>" class="btn-secondary">
                            <i class="fas fa-envelope"></i>
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <!-- Right Chart -->
                <div>
                    <div class="chart-container">
                        <div class="chart-header">
                            <h3>Distribusi Properti</h3>
                            <span class="text-sm text-gray-500">2024</span>
                        </div>
                        <div id="welcomeChart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PROPERTIES GRID ===== -->
    <section class="py-16">
        <div class="section-header">
            <span class="section-badge">PROPERTI PILIHAN</span>
            <h2 class="section-title">Properti Unggulan</h2>
            <p class="section-subtitle">Temukan properti terbaik dengan fasilitas premium</p>
        </div>

        <div class="properties-grid">
            <!-- Property Card 1 -->
            <div class="property-card" data-property-id="1">
                <div class="property-image">
                    <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994" alt="Property">
                    <div class="property-price">
                        <span>Rp 2.5M</span>
                    </div>
                </div>
                <div class="property-details">
                    <h3 class="property-title">Villa Eksklusif Bali</h3>
                    <p class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        JL. Raya Uluwatu, Badung
                    </p>
                    <div class="property-features">
                        <span><i class="fas fa-bed"></i> 4 KT</span>
                        <span><i class="fas fa-bath"></i> 3 KM</span>
                        <span><i class="fas fa-vector-square"></i> 250 m²</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 2 -->
            <div class="property-card" data-property-id="2">
                <div class="property-image">
                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00" alt="Property">
                    <div class="property-price">
                        <span>Rp 8.5M</span>
                    </div>
                </div>
                <div class="property-details">
                    <h3 class="property-title">Apartemen Mewah SCBD</h3>
                    <p class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Sudirman, Jakarta Pusat
                    </p>
                    <div class="property-features">
                        <span><i class="fas fa-bed"></i> 3 KT</span>
                        <span><i class="fas fa-bath"></i> 2 KM</span>
                        <span><i class="fas fa-vector-square"></i> 150 m²</span>
                    </div>
                </div>
            </div>

            <!-- Property Card 3 -->
            <div class="property-card" data-property-id="3">
                <div class="property-image">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Property">
                    <div class="property-price">
                        <span>Rp 1.2M</span>
                    </div>
                </div>
                <div class="property-details">
                    <h3 class="property-title">Rumah Modern BSD</h3>
                    <p class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        BSD City, Tangerang
                    </p>
                    <div class="property-features">
                        <span><i class="fas fa-bed"></i> 4 KT</span>
                        <span><i class="fas fa-bath"></i> 3 KM</span>
                        <span><i class="fas fa-vector-square"></i> 200 m²</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="view-all-btn">
            <a href="<?php echo e(route('properties.index')); ?>" class="btn-primary">
                <span>Lihat Semua Properti</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials-section">
        <div class="chart-card">
            <div class="section-header">
                <span class="section-badge">TESTIMONIAL</span>
                <h2 class="section-title">Apa Kata Mereka?</h2>
                <p class="section-subtitle">Pengalaman nyata dari klien yang telah menggunakan layanan kami</p>
            </div>

            <div class="testimonials-grid">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <i class="fas fa-quote-right quote-icon"></i>
                    <div class="testimonial-author">
                        <div class="author-avatar primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Budi Santoso</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-text">"Pelayanan sangat memuaskan, properti sesuai dengan deskripsi. Proses cepat dan mudah!"</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <i class="fas fa-quote-right quote-icon"></i>
                    <div class="testimonial-author">
                        <div class="author-avatar success">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Siti Aisyah</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-text">"Rekomendasi properti sangat akurat. Tim marketing responsif dan membantu proses sampai selesai."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <i class="fas fa-quote-right quote-icon"></i>
                    <div class="testimonial-author">
                        <div class="author-avatar warning">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Ahmad Hidayat</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-text">"Platformnya lengkap, fitur pencarian sangat membantu. Harga kompetitif dan transparan."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA SECTION ===== -->
    <section class="cta-section">
        <div class="cta-bg-1"></div>
        <div class="cta-bg-2"></div>
        
        <div class="cta-content">
            <h2 class="cta-title">Siap Menemukan Properti Impian?</h2>
            <p class="cta-description">Bergabung dengan ribuan klien yang telah menemukan properti impian mereka bersama kami</p>
            <div class="cta-buttons">
                <a href="<?php echo e(route('register')); ?>" class="btn-white">
                    <i class="fas fa-user-plus"></i>
                    Daftar Sekarang
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="btn-outline-white">
                    <i class="fas fa-headset"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/welcome.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/welcome.blade.php ENDPATH**/ ?>