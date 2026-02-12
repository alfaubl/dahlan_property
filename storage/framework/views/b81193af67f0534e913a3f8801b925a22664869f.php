

<?php $__env->startSection('title', 'Tentang Kami - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* ========== ABOUT PAGE SPECIFIC STYLES ========== */
    .about-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0 80px;
        margin-top: 76px;
    }
    
    .mission-card {
        border-radius: 15px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        height: 100%;
    }
    
    .mission-card:hover {
        border-color: #0d6efd;
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(13, 110, 253, 0.1);
    }
    
    .team-member {
        text-align: center;
        padding: 30px 20px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .team-member:hover {
        background: #f8f9fa;
        transform: translateY(-5px);
    }
    
    .team-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #e9ecef;
        margin-bottom: 20px;
    }
    
    .timeline-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 40px;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #0d6efd;
    }
    
    .timeline-item::after {
        content: '';
        position: absolute;
        left: 9px;
        top: 25px;
        width: 2px;
        height: calc(100% + 20px);
        background: #dee2e6;
    }
    
    .timeline-item:last-child::after {
        display: none;
    }
    
    .stats-counter {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- ========== HERO SECTION ========== -->
<section class="about-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-4">Mengubah Cara Anda <span class="text-primary">Memiliki</span> Properti</h1>
                <p class="lead">Sejak 2015, Dahlan Property telah menjadi mitra terpercaya bagi ribuan keluarga dan investor dalam menemukan properti impian.</p>
            </div>
        </div>
    </div>
</section>

<!-- ========== ABOUT CONTENT ========== -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Visi & Misi Kami</h2>
                <p class="text-muted mb-4">Kami hadir untuk menyederhanakan proses pencarian dan kepemilikan properti di Indonesia melalui teknologi yang inovatif dan layanan yang terpercaya.</p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mission-card p-4 border">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                <i class="fas fa-bullseye text-primary fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Visi</h5>
                            <p class="text-muted mb-0">Menjadi platform properti digital terdepan di Indonesia yang menghubungkan setiap orang dengan rumah impian mereka.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mission-card p-4 border">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-block mb-3">
                                <i class="fas fa-flag text-primary fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Misi</h5>
                            <p class="text-muted mb-0">Menyediakan pengalaman pencarian properti yang transparan, aman, dan efisien bagi semua pengguna.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="About Us" class="img-fluid rounded-3 shadow" data-aos="fade-left">
            </div>
        </div>
        
        <!-- ========== TIMELINE ========== -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="fw-bold text-center mb-5" data-aos="fade-up">Perjalanan Kami</h2>
                
                <div class="timeline-wrapper">
                    <div class="timeline-item" data-aos="fade-right">
                        <h5 class="fw-bold">2015</h5>
                        <p class="text-muted">Dahlan Property didirikan dengan fokus pada properti residensial di Jakarta.</p>
                    </div>
                    
                    <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                        <h5 class="fw-bold">2018</h5>
                        <p class="text-muted">Meluncurkan platform digital pertama dan memperluas ke 5 kota besar di Indonesia.</p>
                    </div>
                    
                    <div class="timeline-item" data-aos="fade-right" data-aos-delay="200">
                        <h5 class="fw-bold">2021</h5>
                        <p class="text-muted">Mencapai 1.000 properti terdaftar dan meluncurkan aplikasi mobile.</p>
                    </div>
                    
                    <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                        <h5 class="fw-bold">2024</h5>
                        <p class="text-muted">Memperkenalkan teknologi virtual tour dan AI matching untuk pencarian properti.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== TEAM SECTION ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center mb-5" data-aos="fade-up">Tim Kami</h2>
        
        <div class="row g-4">
            <div class="col-md-3" data-aos="fade-up">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Team" class="team-img">
                    <h5 class="fw-bold mb-1">Ahmad Dahlan</h5>
                    <p class="text-primary mb-2">Founder & CEO</p>
                    <p class="text-muted small">Pengalaman 15 tahun di industri properti</p>
                </div>
            </div>
            
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Team" class="team-img">
                    <h5 class="fw-bold mb-1">Sari Dewi</h5>
                    <p class="text-primary mb-2">Head of Operations</p>
                    <p class="text-muted small">Spesialisasi dalam manajemen properti</p>
                </div>
            </div>
            
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Team" class="team-img">
                    <h5 class="fw-bold mb-1">Budi Santoso</h5>
                    <p class="text-primary mb-2">Technology Director</p>
                    <p class="text-muted small">Membangun platform teknologi properti</p>
                </div>
            </div>
            
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Team" class="team-img">
                    <h5 class="fw-bold mb-1">Maya Putri</h5>
                    <p class="text-primary mb-2">Customer Success</p>
                    <p class="text-muted small">Memastikan kepuasan setiap klien</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS ========== -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4" data-aos="fade-up">
                <div class="p-4">
                    <div class="stats-counter mb-2">1,250+</div>
                    <h5 class="text-muted">Properti Terdaftar</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4">
                    <div class="stats-counter mb-2">500+</div>
                    <h5 class="text-muted">Klien Puas</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4">
                    <div class="stats-counter mb-2">85+</div>
                    <h5 class="text-muted">Partner Agen</h5>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4">
                    <div class="stats-counter mb-2">15+</div>
                    <h5 class="text-muted">Kota di Indonesia</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/about.blade.php ENDPATH**/ ?>