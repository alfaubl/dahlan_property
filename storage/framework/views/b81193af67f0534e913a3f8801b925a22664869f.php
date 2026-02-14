

<?php $__env->startSection('title', 'Tentang Kami - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.css.about-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="hero-about">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-white text-dark px-3 py-2 rounded-pill mb-3">
                    <i class="fas fa-building me-2 text-primary"></i>Since 2024
                </span>
                <h1 class="display-4 fw-bold mb-4">Membangun Kepercayaan, <br>Menghadirkan Kenyamanan</h1>
                <p class="lead mb-4 opacity-90">Dahlan Property hadir sebagai mitra terpercaya dalam menemukan properti impian Anda. Dengan pengalaman dan komitmen, kami menghubungkan Anda dengan hunian terbaik di seluruh Indonesia.</p>
                <div class="d-flex gap-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-2" style="color: rgba(255,255,255,0.9);"></i>
                        <div>
                            <span class="fw-bold d-block">100+</span>
                            <small>Properti</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-tie fa-2x me-2" style="color: rgba(255,255,255,0.9);"></i>
                        <div>
                            <span class="fw-bold d-block">500+</span>
                            <small>Klien Puas</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-city fa-2x me-2" style="color: rgba(255,255,255,0.9);"></i>
                        <div>
                            <span class="fw-bold d-block">15+</span>
                            <small>Kota</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80" 
                     alt="Modern Building" 
                     class="img-fluid rounded-4 shadow-lg"
                     style="max-height: 500px; width: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section with Chart -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stats-card h-100">
                    <div class="bg-primary bg-opacity-10">
                        <i class="fas fa-building text-primary"></i>
                    </div>
                    <h3 class="text-primary">150+</h3>
                    <p class="text-muted mb-0">Total Properti</p>
                    <small class="text-success">Tersebar di 15 kota</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card h-100">
                    <div class="bg-success bg-opacity-10">
                        <i class="fas fa-users text-success"></i>
                    </div>
                    <h3 class="text-success">500+</h3>
                    <p class="text-muted mb-0">Klien Puas</p>
                    <small class="text-success">Rating 4.9/5</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card h-100">
                    <div class="bg-warning bg-opacity-10">
                        <i class="fas fa-clock text-warning"></i>
                    </div>
                    <h3 class="text-warning">5+</h3>
                    <p class="text-muted mb-0">Tahun Pengalaman</p>
                    <small class="text-success">Sejak 2024</small>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row align-items-center mt-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Portofolio Properti Kami</h2>
                <p class="text-muted mb-4">Kami memiliki berbagai tipe properti premium yang tersebar di seluruh Indonesia. Dari hunian mewah hingga komersial strategis, semua dirancang untuk kenyamanan dan investasi terbaik Anda.</p>
                
                <div class="value-card">
                    <div class="bg-primary bg-opacity-10">
                        <i class="fas fa-home text-primary"></i>
                    </div>
                    <div>
                        <h5>Rumah Premium</h5>
                        <p>35% dari total portofolio</p>
                    </div>
                </div>
                
                <div class="value-card">
                    <div class="bg-info bg-opacity-10">
                        <i class="fas fa-building text-info"></i>
                    </div>
                    <div>
                        <h5>Apartemen Mewah</h5>
                        <p>25% dari total portofolio</p>
                    </div>
                </div>
                
                <div class="value-card">
                    <div class="bg-success bg-opacity-10">
                        <i class="fas fa-store text-success"></i>
                    </div>
                    <div>
                        <h5>Ruko & Komersial</h5>
                        <p>20% dari total portofolio</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 p-3">
                    <div class="chart-container">
                        <canvas id="portfolioChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="d-flex">
                        <div class="bg-primary bg-opacity-10">
                            <i class="fas fa-eye text-primary"></i>
                        </div>
                        <div>
                            <h3>Visi</h3>
                            <p>Menjadi perusahaan properti terdepan di Indonesia yang menghadirkan solusi hunian inovatif, berkualitas, dan berkelanjutan untuk setiap keluarga Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="d-flex">
                        <div class="bg-success bg-opacity-10">
                            <i class="fas fa-bullseye text-success"></i>
                        </div>
                        <div>
                            <h3>Misi</h3>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check-circle text-success"></i> Menyediakan properti berkualitas dengan harga kompetitif</li>
                                <li><i class="fas fa-check-circle text-success"></i> Memberikan pelayanan profesional dan transparan</li>
                                <li><i class="fas fa-check-circle text-success"></i> Membangun kepercayaan jangka panjang dengan klien</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Milestones -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-5">Perjalanan Kami</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4">
                    <div class="milestone-item">
                        <span class="milestone-year">2024</span>
                        <div class="ms-4">
                            <h5>Dahlan Property Didirikan</h5>
                            <p>Memulai perjalanan dengan 1 kantor dan 5 properti</p>
                        </div>
                    </div>
                    <div class="milestone-item">
                        <span class="milestone-year">2025</span>
                        <div class="ms-4">
                            <h5>Ekspansi ke 5 Kota</h5>
                            <p>Memperluas jaringan ke Jakarta, Surabaya, Bandung, Medan, Makassar</p>
                        </div>
                    </div>
                    <div class="milestone-item">
                        <span class="milestone-year">2026</span>
                        <div class="ms-4">
                            <h5>100+ Properti & 500+ Klien</h5>
                            <p>Mencapai tonggak sejarah dengan portofolio properti premium</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold text-center mb-2">Tim Profesional Kami</h2>
        <p class="text-muted text-center mb-5">Didukung oleh para ahli properti yang berpengalaman</p>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80" alt="Team">
                    <div class="card-body">
                        <h5>Ahmad Dahlan</h5>
                        <p class="text-primary">Founder & CEO</p>
                        <small>15+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=688&q=80" alt="Team">
                    <div class="card-body">
                        <h5>Sarah Wijaya</h5>
                        <p class="text-primary">Head of Marketing</p>
                        <small>10+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Team">
                    <div class="card-body">
                        <h5>Budi Santoso</h5>
                        <p class="text-primary">Property Consultant</p>
                        <small>8+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=761&q=80" alt="Team">
                    <div class="card-body">
                        <h5>Dewi Lestari</h5>
                        <p class="text-primary">Customer Relations</p>
                        <small>5+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('partials.js.about-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/about.blade.php ENDPATH**/ ?>