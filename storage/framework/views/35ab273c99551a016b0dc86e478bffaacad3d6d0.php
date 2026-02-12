

<?php $__env->startSection('title', 'Marketplace Properti Terbaik Indonesia'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* ========== WELCOME PAGE SPECIFIC STYLES ========== */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        padding: 120px 0;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .property-card img {
        transition: transform 0.8s ease;
        height: 250px;
        object-fit: cover;
    }
    
    .property-card:hover img {
        transform: scale(1.1);
    }
    
    .category-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 8px 15px;
        border-radius: 25px;
        font-weight: 600;
        z-index: 3;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    
    /* Feature Cards */
    .feature-card {
        transition: all 0.4s ease;
        border: 2px solid transparent;
        border-radius: 15px;
        background: white;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }
    
    .feature-card:hover::before {
        transform: scaleX(1);
    }
    
    .feature-card:hover {
        transform: translateY(-12px);
        border-color: #0d6efd;
        box-shadow: 0 15px 30px rgba(13, 110, 253, 0.15) !important;
    }
    
    .feature-icon {
        transition: all 0.6s ease;
        display: inline-block;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .feature-card:hover .feature-icon {
        transform: scale(1.2) rotate(10deg);
    }
    
    /* Floating Animation */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    .floating {
        animation: float 5s ease-in-out infinite;
    }
    
    /* Search Form */
    .search-form input,
    .search-form select {
        border-radius: 10px;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }
    
    .search-form input:focus,
    .search-form select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
    }
    
    /* Stats Counter */
    .stats-counter {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 80px 0;
            background-attachment: scroll;
        }
        .hero-section h1 {
            font-size: 2rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- ========== HERO SECTION ========== -->
<section class="hero-section">
    <div class="container hero-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h1 class="display-3 fw-bold mb-4">Temukan Properti <span class="text-primary">Impian</span> Anda</h1>
                <p class="lead mb-5">Kami menghubungkan Anda dengan properti terbaik di Indonesia. Lebih dari <span class="fw-bold">1,250+</span> properti tersedia untuk dijual dan disewa.</p>

                <!-- Search Form -->
                <form action="/properties" method="GET" class="row g-3 justify-content-center search-form">
                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                        <input type="text" class="form-control form-control-lg" name="search" placeholder="📍 Cari lokasi atau nama properti...">
                    </div>
                    <div class="col-md-2" data-aos="fade-right" data-aos-delay="200">
                        <select class="form-select form-select-lg" name="type">
                            <option value="">🏠 Semua Tipe</option>
                            <option value="house">🏡 Rumah</option>
                            <option value="apartment">🏢 Apartemen</option>
                            <option value="land">🌱 Tanah</option>
                            <option value="commercial">🏬 Komersial</option>
                        </select>
                    </div>
                    <div class="col-md-2" data-aos="fade-right" data-aos-delay="300">
                        <select class="form-select form-select-lg" name="price_range">
                            <option value="">💰 Kisaran Harga</option>
                            <option value="0-500000000">💵 Dibawah 500 JT</option>
                            <option value="500000000-1000000000">💰 500 JT - 1 M</option>
                            <option value="1000000000-5000000000">💎 1 M - 5 M</option>
                            <option value="5000000000-10000000000">🏆 5 M+</option>
                        </select>
                    </div>
                    <div class="col-md-2" data-aos="fade-left" data-aos-delay="400">
                        <button type="submit" class="btn btn-light btn-lg w-100 btn-glow">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>
                </form>

                <div class="mt-5" data-aos="fade-up" data-aos-delay="500">
                    <small class="text-white-50"><i class="fas fa-info-circle me-2"></i>Tekan Enter untuk mencari properti di seluruh Indonesia</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS SECTION ========== -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4">
                    <div class="stats-counter mb-2">1,250+</div>
                    <h5 class="text-muted">Properti Tersedia</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4">
                    <div class="stats-counter mb-2">500+</div>
                    <h5 class="text-muted">Klien Puas</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4">
                    <div class="stats-counter mb-2">85+</div>
                    <h5 class="text-muted">Partner Agen</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="p-4">
                    <div class="stats-counter mb-2">24/7</div>
                    <h5 class="text-muted">Dukungan</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== FEATURED PROPERTIES ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold display-5 mb-3">Properti <span class="text-primary">Unggulan</span></h2>
                <p class="text-muted lead">Rekomendasi properti terbaik pilihan kami</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Property 1 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="property-card card shadow-sm border-0 h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" alt="Modern House">
                        <span class="category-badge bg-success text-white">Rumah</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Rumah Modern di Pondok Indah</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Jakarta Selatan
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="price-tag">Rp 3,5 M</div>
                            <span class="badge bg-primary">4 Kamar</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <!-- Property 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="property-card card shadow-sm border-0 h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" alt="Apartment">
                        <span class="category-badge bg-info text-white">Apartemen</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Apartemen Mewah SCBD</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Jakarta Pusat
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="price-tag">Rp 1,2 M</div>
                            <span class="badge bg-primary">2 Kamar</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
            
            <!-- Property 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="property-card card shadow-sm border-0 h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" alt="Villa">
                        <span class="category-badge bg-warning text-dark">Villa</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Villa Eksklusif Bali</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Badung, Bali
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="price-tag">Rp 8,5 M</div>
                            <span class="badge bg-primary">6 Kamar</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="/properties" class="btn btn-primary btn-glow px-5 py-3">
                <i class="fas fa-search me-2"></i>Lihat Semua Properti
            </a>
        </div>
    </div>
</section>

<!-- ========== FEATURES SECTION ========== -->
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold display-5 mb-3">Mengapa Memilih <span class="text-primary">Kami</span>?</h2>
                <p class="text-muted lead">Kami memberikan pengalaman terbaik dalam mencari properti</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="feature-card p-4 shadow-sm text-center">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt fa-3x"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Aman & Terpercaya</h4>
                    <p class="text-muted">Semua properti terverifikasi dengan sistem keamanan berlapis untuk transaksi yang aman.</p>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card p-4 shadow-sm text-center">
                    <div class="feature-icon">
                        <i class="fas fa-search fa-3x"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Pencarian Cerdas</h4>
                    <p class="text-muted">Fitur pencarian canggih dengan filter lengkap untuk menemukan properti sesuai kebutuhan.</p>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card p-4 shadow-sm text-center">
                    <div class="feature-icon">
                        <i class="fas fa-headset fa-3x"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Dukungan 24/7</h4>
                    <p class="text-muted">Tim customer service siap membantu Anda kapan saja melalui berbagai channel komunikasi.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Welcome page specific scripts
    document.addEventListener('DOMContentLoaded', function() {
        // Form submission handler
        const searchForm = document.querySelector('.search-form');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                // Add loading animation
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mencari...';
                submitBtn.disabled = true;
                
                // Simulate search delay
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 1500);
            });
        }
        
        // Property card hover effect
        const propertyCards = document.querySelectorAll('.property-card');
        propertyCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.zIndex = '10';
            });
            card.addEventListener('mouseleave', () => {
                card.style.zIndex = '1';
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/welcome.blade.php ENDPATH**/ ?>