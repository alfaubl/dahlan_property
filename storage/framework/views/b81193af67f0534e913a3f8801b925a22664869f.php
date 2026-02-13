

<?php $__env->startSection('title', 'Tentang Kami - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .hero-about {
        background: linear-gradient(135deg, #1e2b3c 0%, #2c3e50 100%);
        padding: 80px 0;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .hero-about::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path fill="rgba(255,255,255,0.03)" d="M47,-70.5C61.1,-62.5,73.3,-49.2,79.5,-33.2C85.7,-17.2,85.9,1.4,79.2,17.8C72.5,34.2,58.9,48.4,43.6,58.3C28.3,68.2,11.3,73.8,-5.5,73.5C-22.3,73.2,-38.9,66.9,-52.9,56.3C-66.9,45.7,-78.3,30.8,-80.1,14.5C-81.9,-1.8,-74.1,-19.5,-62.8,-33.4C-51.5,-47.3,-36.7,-57.4,-21.1,-65.2C-5.5,-73,10.8,-78.5,26.4,-74.6C42,-70.8,56.9,-57.6,47,-70.5Z" transform="translate(100 100)"/></svg>');
        background-size: cover;
        opacity: 0.5;
    }
    
    .stats-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: none;
    }
    
    .stats-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(74,111,165,0.1);
    }
    
    .value-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-radius: 15px;
        padding: 20px;
        border-left: 5px solid #4a6fa5;
        margin-bottom: 20px;
    }
    
    .team-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.03);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.03);
    }
    
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(74,111,165,0.1);
    }
    
    .team-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin: -60px auto 0;
    }
    
    .chart-container {
        position: relative;
        height: 300px;
        width: 100%;
        margin: 20px 0;
    }
    
    .milestone-item {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #edf2f7;
    }
    
    .milestone-year {
        font-size: 1.5rem;
        font-weight: 700;
        color: #4a6fa5;
        min-width: 80px;
    }
    
    .office-img {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .badge-premium {
        background: linear-gradient(135deg, #4a6fa5, #6b8cae);
        color: white;
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.8rem;
    }
</style>
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
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                        <i class="fas fa-building text-primary fa-3x"></i>
                    </div>
                    <h3 class="fw-bold display-5 text-primary">150+</h3>
                    <p class="text-muted mb-0">Total Properti</p>
                    <small class="text-success">Tersebar di 15 kota</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card h-100">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                        <i class="fas fa-users text-success fa-3x"></i>
                    </div>
                    <h3 class="fw-bold display-5 text-success">500+</h3>
                    <p class="text-muted mb-0">Klien Puas</p>
                    <small class="text-success">Rating 4.9/5</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card h-100">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                        <i class="fas fa-clock text-warning fa-3x"></i>
                    </div>
                    <h3 class="fw-bold display-5 text-warning">5+</h3>
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
                
                <div class="value-card d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                        <i class="fas fa-home text-primary fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Rumah Premium</h5>
                        <p class="text-muted mb-0">35% dari total portofolio</p>
                    </div>
                </div>
                
                <div class="value-card d-flex align-items-center">
                    <div class="bg-info bg-opacity-10 rounded-3 p-3 me-3">
                        <i class="fas fa-building text-info fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Apartemen Mewah</h5>
                        <p class="text-muted mb-0">25% dari total portofolio</p>
                    </div>
                </div>
                
                <div class="value-card d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 rounded-3 p-3 me-3">
                        <i class="fas fa-store text-success fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Ruko & Komersial</h5>
                        <p class="text-muted mb-0">20% dari total portofolio</p>
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
                        <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                            <i class="fas fa-eye text-primary fa-3x"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-3">Visi</h3>
                            <p class="text-muted">Menjadi perusahaan properti terdepan di Indonesia yang menghadirkan solusi hunian inovatif, berkualitas, dan berkelanjutan untuk setiap keluarga Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="d-flex">
                        <div class="bg-success bg-opacity-10 rounded-3 p-3 me-3">
                            <i class="fas fa-bullseye text-success fa-3x"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-3">Misi</h3>
                            <ul class="text-muted list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Menyediakan properti berkualitas dengan harga kompetitif</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Memberikan pelayanan profesional dan transparan</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Membangun kepercayaan jangka panjang dengan klien</li>
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
                            <h5 class="fw-bold mb-1">Dahlan Property Didirikan</h5>
                            <p class="text-muted mb-0">Memulai perjalanan dengan 1 kantor dan 5 properti</p>
                        </div>
                    </div>
                    <div class="milestone-item">
                        <span class="milestone-year">2025</span>
                        <div class="ms-4">
                            <h5 class="fw-bold mb-1">Ekspansi ke 5 Kota</h5>
                            <p class="text-muted mb-0">Memperluas jaringan ke Jakarta, Surabaya, Bandung, Medan, Makassar</p>
                        </div>
                    </div>
                    <div class="milestone-item">
                        <span class="milestone-year">2026</span>
                        <div class="ms-4">
                            <h5 class="fw-bold mb-1">100+ Properti & 500+ Klien</h5>
                            <p class="text-muted mb-0">Mencapai tonggak sejarah dengan portofolio properti premium</p>
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
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80" 
                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="Team">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-1">Ahmad Dahlan</h5>
                        <p class="text-primary mb-2">Founder & CEO</p>
                        <small class="text-muted">15+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=688&q=80" 
                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="Team">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-1">Sarah Wijaya</h5>
                        <p class="text-primary mb-2">Head of Marketing</p>
                        <small class="text-muted">10+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" 
                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="Team">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-1">Budi Santoso</h5>
                        <p class="text-primary mb-2">Property Consultant</p>
                        <small class="text-muted">8+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card card border-0">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=761&q=80" 
                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="Team">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-1">Dewi Lestari</h5>
                        <p class="text-primary mb-2">Customer Relations</p>
                        <small class="text-muted">5+ tahun pengalaman</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('portfolioChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            datasets: [{
                data: [35, 25, 20, 12, 8],
                backgroundColor: [
                    '#4a6fa5',
                    '#17a2b8',
                    '#28a745',
                    '#ffc107',
                    '#fd7e14'
                ],
                borderWidth: 0,
                borderRadius: 8,
                spacing: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    backgroundColor: '#2c3e50',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8,
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw}%`;
                        }
                    }
                }
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/about.blade.php ENDPATH**/ ?>