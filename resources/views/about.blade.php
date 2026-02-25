@extends('layouts.app')

@section('title', 'Tentang Kami - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<div class="space-y-8 animate-slideIn">
    
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-bg"></div>
        <div class="about-hero-pattern"></div>
        
        <div class="about-hero-content">
            <span class="about-hero-badge">Tentang Kami</span>
            <h1 class="about-hero-title">Dahlan Property</h1>
            <p class="about-hero-subtitle">
                Mitra terpercaya Anda dalam menemukan properti impian sejak 2015
            </p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-vision-section">
        <div class="mission-vision-grid">
            <!-- Mission Card -->
            <div class="mission-card">
                <div class="card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h2 class="card-title">Misi Kami</h2>
                <p class="card-text">
                    Menjadi platform properti terdepan di Indonesia dengan menyediakan layanan yang transparan, terpercaya, dan inovatif. Kami berkomitmen untuk membantu setiap klien menemukan properti yang sesuai dengan kebutuhan dan impian mereka.
                </p>
            </div>

            <!-- Vision Card -->
            <div class="vision-card">
                <div class="card-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h2 class="card-title">Visi Kami</h2>
                <p class="card-text">
                    Menciptakan ekosistem properti digital yang memudahkan setiap orang untuk memiliki, menjual, dan menyewakan properti dengan cara yang aman, cepat, dan menyenangkan.
                </p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value" data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="2">0</div>
                <div class="stat-label">Properti Terjual</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="2">0</div>
                <div class="stat-label">Klien Puas</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2">0</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="2">0</div>
                <div class="stat-label">Tim Profesional</div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="section-header">
            <span class="section-badge">Nilai-Nilai Kami</span>
            <h2>Prinsip yang Membangun Kami</h2>
            <p>Nilai-nilai yang menjadi fondasi setiap langkah kami</p>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon integrity">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="value-title">Integritas</h3>
                <p class="value-description">
                    Kami menjunjung tinggi kejujuran dan transparansi dalam setiap transaksi
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon excellence">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="value-title">Keunggulan</h3>
                <p class="value-description">
                    Selalu memberikan pelayanan terbaik dan melebihi ekspektasi
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon innovation">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="value-title">Inovasi</h3>
                <p class="value-description">
                    Terus berinovasi dalam teknologi dan layanan properti
                </p>
            </div>

            <div class="value-card">
                <div class="value-icon customer">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="value-title">Customer First</h3>
                <p class="value-description">
                    Kepuasan klien adalah prioritas utama kami
                </p>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="section-header">
            <span class="section-badge">Perjalanan Kami</span>
            <h2>Sejarah Dahlan Property</h2>
            <p>Perjalanan panjang kami dalam industri properti</p>
        </div>

        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2015</span>
                    <h3 class="timeline-title">Awal Berdiri</h3>
                    <p class="timeline-text">
                        Dahlan Property didirikan dengan visi memudahkan masyarakat menemukan properti impian.
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

    <!-- Team Section -->
    <section class="team-section">
        <div class="section-header">
            <span class="section-badge">Tim Kami</span>
            <h2>Para Profesional di Belakang Layar</h2>
            <p>Tim berpengalaman yang siap membantu Anda</p>
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

    <!-- CTA Section -->
    <section class="about-cta">
        <div class="about-cta-bg-1"></div>
        <div class="about-cta-bg-2"></div>
        
        <div class="about-cta-content">
            <h2 class="about-cta-title">Siap Bekerja Sama?</h2>
            <p class="about-cta-text">
                Tim kami siap membantu Anda menemukan properti impian atau memasarkan properti Anda.
            </p>
            <div class="about-cta-buttons">
                <a href="{{ route('contact') }}" class="btn-about-primary">
                    <i class="fas fa-headset mr-2"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('properties.index') }}" class="btn-about-secondary">
                    <i class="fas fa-building mr-2"></i>
                    Lihat Properti
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/about.js') }}"></script>
@endsection