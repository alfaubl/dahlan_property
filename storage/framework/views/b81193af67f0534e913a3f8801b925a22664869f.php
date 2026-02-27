

<?php $__env->startSection('title', 'Tentang Kami - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/about.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="about-wrapper">
    
    <!-- ===== HERO SECTION ===== -->
    <section class="about-hero">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-building"></i>
                TENTANG KAMI
            </span>
            <h1 class="hero-title">Dahlan Property</h1>
            <p class="hero-text">
                Mitra terpercaya Anda dalam menemukan properti impian sejak 2015
            </p>
        </div>
    </section>

    <!-- ===== MISSION & VISION ===== -->
    <div class="mission-vision-grid">
        <!-- Mission Card -->
        <div class="mission-card">
            <div class="card-icon mission">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2 class="card-title">Misi Kami</h2>
            <p class="card-text">
                Menjadi platform properti terdepan di Indonesia dengan menyediakan layanan yang transparan, terpercaya, dan inovatif. Kami berkomitmen untuk membantu setiap klien menemukan properti yang sesuai dengan kebutuhan dan impian mereka.
            </p>
        </div>

        <!-- Vision Card -->
        <div class="vision-card">
            <div class="card-icon vision">
                <i class="fas fa-eye"></i>
            </div>
            <h2 class="card-title">Visi Kami</h2>
            <p class="card-text">
                Menciptakan ekosistem properti digital yang memudahkan setiap orang untuk memiliki, menjual, dan menyewakan properti dengan cara yang aman, cepat, dan menyenangkan.
            </p>
        </div>
    </div>

    <!-- ===== STATS SECTION WITH APEXCHARTS ===== -->
    <div class="stats-section">
        <div class="stats-header">
            <span class="stats-badge">STATISTIK KAMI</span>
            <h2 class="stats-title">DahlanProperty dalam Angka</h2>
            <p class="stats-subtitle">Pertumbuhan dan pencapaian kami selama 10 tahun terakhir</p>
        </div>

        <div class="stats-grid">
            <!-- Chart Card -->
            <div class="stats-chart-card">
                <div class="chart-header">
                    <h3>Pertumbuhan Properti</h3>
                    <span class="chart-year">2015 - 2024</span>
                </div>
                <div id="growthChart" class="chart-container"></div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-color" style="background: #4361ee;"></span>
                        <span class="legend-label">Properti Terjual</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #06d6a0;"></span>
                        <span class="legend-label">Klien Puas</span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="quick-stats-grid">
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #4361ee20; color: #4361ee;">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">1500+</span>
                        <span class="quick-stat-label">Properti Terjual</span>
                    </div>
                </div>
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #06d6a020; color: #06d6a0;">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">2500+</span>
                        <span class="quick-stat-label">Klien Puas</span>
                    </div>
                </div>
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #ffb70320; color: #ffb703;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">10+</span>
                        <span class="quick-stat-label">Tahun</span>
                    </div>
                </div>
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #ef476f20; color: #ef476f;">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">25+</span>
                        <span class="quick-stat-label">Tim Profesional</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== TIMELINE SECTION ===== -->
    <section class="timeline-section">
        <div class="section-header">
            <span class="section-badge">PERJALANAN KAMI</span>
            <h2 class="section-title">Sejarah DahlanProperty</h2>
            <p class="section-subtitle">Perjalanan panjang kami dalam industri properti</p>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2015</span>
                    <h3 class="timeline-title">Awal Berdiri</h3>
                    <p class="timeline-text">
                        DahlanProperty didirikan dengan visi memudahkan masyarakat menemukan properti impian.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2017</span>
                    <h3 class="timeline-title">Ekspansi Pertama</h3>
                    <p class="timeline-text">
                        Membuka cabang pertama di Surabaya dan melayani lebih dari 500 klien.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2019</span>
                    <h3 class="timeline-title">Platform Digital</h3>
                    <p class="timeline-text">
                        Meluncurkan platform digital untuk memudahkan pencarian properti secara online.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2024</span>
                    <h3 class="timeline-title">Transformasi</h3>
                    <p class="timeline-text">
                        Bertransformasi menjadi marketplace properti terpercaya dengan ribuan properti.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== VALUES SECTION ===== -->
    <section class="values-section">
        <div class="section-header">
            <span class="section-badge">NILAI-NILAI KAMI</span>
            <h2 class="section-title">Prinsip yang Membangun Kami</h2>
            <p class="section-subtitle">Nilai-nilai yang menjadi fondasi setiap langkah kami</p>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon integrity">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="value-title">Integritas</h3>
                <p class="value-text">
                    Kami menjunjung tinggi kejujuran dan transparansi dalam setiap transaksi
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon excellence">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="value-title">Keunggulan</h3>
                <p class="value-text">
                    Selalu memberikan pelayanan terbaik dan melebihi ekspektasi
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon innovation">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="value-title">Inovasi</h3>
                <p class="value-text">
                    Terus berinovasi dalam teknologi dan layanan properti
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon customer">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="value-title">Customer First</h3>
                <p class="value-text">
                    Kepuasan klien adalah prioritas utama kami
                </p>
            </div>
        </div>
    </section>

    <!-- ===== TEAM SECTION ===== -->
    <section class="team-section">
        <div class="section-header">
            <span class="section-badge">TIM KAMI</span>
            <h2 class="section-title">Para Profesional di Belakang Layar</h2>
            <p class="section-subtitle">Tim berpengalaman yang siap membantu Anda</p>
        </div>

        <div class="team-grid">
            <!-- Team Member 1 -->
            <div class="team-card">
                <div class="team-image">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a" alt="Ahmad Dahlan">
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Ahmad Dahlan</h3>
                    <p class="team-position">Founder & CEO</p>
                    <p class="team-bio">Berpengalaman 15 tahun di industri properti dan pengembangan bisnis.</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-card">
                <div class="team-image">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" alt="Siti Nurhaliza">
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Siti Nurhaliza</h3>
                    <p class="team-position">Head of Marketing</p>
                    <p class="team-bio">Ahli strategi marketing dengan portofolio lebih dari 100 kampanye sukses.</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-card">
                <div class="team-image">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7" alt="Budi Santoso">
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Budi Santoso</h3>
                    <p class="team-position">Lead Property Consultant</p>
                    <p class="team-bio">Berpengalaman 10 tahun sebagai konsultan properti bersertifikasi.</p>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="team-card">
                <div class="team-image">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956" alt="Dewi Lestari">
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3 class="team-name">Dewi Lestari</h3>
                    <p class="team-position">Customer Relations</p>
                    <p class="team-bio">Spesialis dalam membangun hubungan baik dengan klien dan mitra.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA SECTION ===== -->
    <section class="about-cta">
        <div class="cta-content">
            <h2 class="cta-title">Siap Bekerja Sama?</h2>
            <p class="cta-text">
                Tim kami siap membantu Anda menemukan properti impian atau memasarkan properti Anda.
            </p>
            <div class="cta-buttons">
                <a href="<?php echo e(route('contact')); ?>" class="btn-primary">
                    <i class="fas fa-headset"></i>
                    Hubungi Kami
                </a>
                <a href="<?php echo e(route('properties.index')); ?>" class="btn-secondary">
                    <i class="fas fa-building"></i>
                    Lihat Properti
                </a>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?php echo e(asset('assets/js/about.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/about.blade.php ENDPATH**/ ?>