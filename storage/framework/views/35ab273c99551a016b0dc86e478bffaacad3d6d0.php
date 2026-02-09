<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahlan Property - Marketplace Properti Terbaik Indonesia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Hero Section */
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

        /* Property Cards */
        .property-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            overflow: hidden;
            border-radius: 15px;
        }

        .property-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
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

        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0d6efd;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
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

        /* Footer Styles */
        .hover-primary {
            transition: all 0.3s ease;
            position: relative;
            padding-left: 0;
        }

        .hover-primary:hover {
            color: #0d6efd !important;
            padding-left: 10px;
        }

        .hover-primary::before {
            content: '→';
            position: absolute;
            left: -15px;
            opacity: 0;
            transition: all 0.3s ease;
            color: #0d6efd;
        }

        .hover-primary:hover::before {
            left: -5px;
            opacity: 1;
        }

        .social-icons a {
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            margin-right: 10px;
        }

        .social-icons a:hover {
            transform: translateY(-5px);
            background: #0d6efd;
            color: white !important;
        }

        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            margin: 30px 0;
        }

        /* Floating Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .floating {
            animation: float 5s ease-in-out infinite;
        }

        /* Custom Button */
        .btn-glow {
            position: relative;
            overflow: hidden;
            border: none;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            transition: all 0.3s ease;
        }

        .btn-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
        }

        .btn-glow::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-glow:hover::after {
            left: 100%;
        }

        /* Navbar */
        .navbar {
            padding: 15px 0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-scrolled {
            padding: 10px 0;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
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

        /* Responsive */
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
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="d-flex align-items-center">
                    <div class="bg-primary rounded-circle p-2 me-3 shadow-sm floating">
                        <i class="fas fa-building text-white fs-4"></i>
                    </div>
                    <div>
                        <span class="fw-bold text-dark fs-3">Dahlan</span>
                        <span class="fw-bold text-primary fs-3">Property</span>
                        <small class="d-block text-muted" style="font-size: 0.7rem; margin-top: -5px;">Marketplace Properti Terbaik</small>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto align-items-center">
                    <a class="nav-link fw-medium mx-2" href="/">Beranda</a>
                    <a class="nav-link fw-medium mx-2" href="/properties">Jelajahi Properti</a>
                    <a class="nav-link fw-medium mx-2" href="/about">Tentang Kami</a>
                    <a class="nav-link fw-medium mx-2" href="/contact">Kontak</a>
                    <div class="vr mx-3 d-none d-lg-block" style="height: 25px;"></div>
                    <a class="nav-link fw-medium mx-2" href="/login">Masuk</a>
                    <a class="btn btn-primary btn-glow px-4 mx-2" href="/register">
                        <i class="fas fa-plus-circle me-2"></i>Pasang Iklan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
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

    <!-- Stats Section -->
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

    <!-- Featured Properties -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-md-8">
                    <h2 class="display-5 fw-bold">Properti <span class="text-primary">Unggulan</span></h2>
                    <p class="lead text-muted">Properti pilihan dengan lokasi strategis dan fasilitas terbaik</p>
                </div>
                <div class="col-md-4 text-md-end align-self-center">
                    <a href="/properties" class="btn btn-outline-primary btn-lg">
                        Lihat Semua <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Property 1 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card property-card shadow-lg">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Rumah Modern">
                            <span class="category-badge bg-primary">Dijual</span>
                            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                <div class="text-white">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    <span>Kebayoran Baru, Jakarta</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Rumah Minimalis Modern 2 Lantai</h5>
                            <p class="card-text text-muted mb-3">
                                <i class="fas fa-bed me-2"></i>4 KT •
                                <i class="fas fa-bath ms-3 me-2"></i>3 KM •
                                <i class="fas fa-car ms-3 me-2"></i>2 Garasi
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="price-tag">Rp 2,5 M</div>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-heart me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 2 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card property-card shadow-lg">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Apartemen">
                            <span class="category-badge bg-warning text-dark">Disewa</span>
                            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                <div class="text-white">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    <span>SCBD, Jakarta Selatan</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Apartemen Mewah View Kota</h5>
                            <p class="card-text text-muted mb-3">
                                <i class="fas fa-bed me-2"></i>3 KT •
                                <i class="fas fa-bath ms-3 me-2"></i>2 KM •
                                <i class="fas fa-swimming-pool ms-3 me-2"></i>Pool
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="price-tag">Rp 15 JT/bulan</div>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-heart me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property 3 -->
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card property-card shadow-lg">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                class="card-img-top" alt="Tanah">
                            <span class="category-badge bg-primary">Dijual</span>
                            <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                                <div class="text-white">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    <span>BSD City, Tangerang</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Tanah Strategis Dekat Tol</h5>
                            <p class="card-text text-muted mb-3">
                                <i class="fas fa-ruler-combined me-2"></i>500 m² •
                                <i class="fas fa-road ms-3 me-2"></i>Akses Jalan 10m •
                                <i class="fas fa-water ms-3 me-2"></i>PDAM
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="price-tag">Rp 5 M</div>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="far fa-heart me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <div class="d-inline-flex align-items-center p-3 rounded-3" style="background: rgba(13, 110, 253, 0.05);">
                    <i class="fas fa-shield-alt fa-2x text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="mb-0 fw-bold">100% Iklan Terverifikasi</h6>
                        <small class="text-muted">Setiap properti sudah melalui proses verifikasi tim kami</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-lg-6 mx-auto text-center">
                    <h2 class="display-5 fw-bold">Mengapa Memilih <span class="text-primary">Kami</span>?</h2>
                    <p class="lead text-muted">Kami memberikan pengalaman terbaik dalam mencari properti impian Anda</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 feature-card shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Iklan Terverifikasi</h4>
                        <p class="text-muted">Setiap properti diverifikasi langsung oleh tim kami untuk memastikan keaslian dan ketersediaan. Tidak ada penipuan, hanya properti nyata.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 feature-card shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-headset fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Dukungan 24/7</h4>
                        <p class="text-muted">Tim ahli properti kami siap membantu Anda kapan saja. Dari konsultasi hingga negosiasi, kami menemani setiap langkah.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 feature-card shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-handshake fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Transaksi Aman</h4>
                        <p class="text-muted">Proses transaksi yang transparan dan aman dengan dukungan notaris profesional. Keamanan Anda adalah prioritas kami.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="p-4 feature-card shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-search fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Pencarian Cerdas</h4>
                        <p class="text-muted">Filter pencarian canggih membantu Anda menemukan properti yang sesuai dengan kebutuhan dan budget dalam hitungan menit.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-4 feature-card shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-camera fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Virtual Tour 360°</h4>
                        <p class="text-muted">Jelajahi properti secara virtual dari mana saja. Lihat setiap sudut rumah seperti Anda berada di lokasi.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="p-4 feature-card shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Analisis Pasar</h4>
                        <p class="text-muted">Dapatkan insight tren pasar properti terkini untuk membuat keputusan investasi yang tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 mb-4" data-aos="fade-up">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="fas fa-building text-white fs-4"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">Dahlan</h3>
                            <h3 class="fw-bold text-primary mb-0">Property</h3>
                        </div>
                    </div>
                    <p class="text-white-50 mb-4" style="line-height: 1.8;">
                        Platform marketplace properti terpercaya di Indonesia.
                        Kami berkomitmen untuk menghubungkan Anda dengan properti impian
                        melalui teknologi terkini dan layanan terbaik.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="text-white" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <h5 class="fw-bold mb-4 border-bottom border-secondary pb-2">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="/properties" class="text-white-50 text-decoration-none hover-primary">Jelajahi Properti</a></li>
                        <li class="mb-3"><a href="/about" class="text-white-50 text-decoration-none hover-primary">Tentang Kami</a></li>
                        <li class="mb-3"><a href="/contact" class="text-white-50 text-decoration-none hover-primary">Kontak Kami</a></li>
                        <li class="mb-3"><a href="/faq" class="text-white-50 text-decoration-none hover-primary">FAQ & Bantuan</a></li>
                        <li><a href="/privacy" class="text-white-50 text-decoration-none hover-primary">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <!-- Property Types -->
                <div class="col-lg-3 col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <h5 class="fw-bold mb-4 border-bottom border-secondary pb-2">Tipe Properti</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="/properties?type=house" class="text-white-50 text-decoration-none hover-primary"><i class="fas fa-home me-2"></i>Rumah</a></li>
                        <li class="mb-3"><a href="/properties?type=apartment" class="text-white-50 text-decoration-none hover-primary"><i class="fas fa-building me-2"></i>Apartemen</a></li>
                        <li class="mb-3"><a href="/properties?type=land" class="text-white-50 text-decoration-none hover-primary"><i class="fas fa-mountain me-2"></i>Tanah</a></li>
                        <li class="mb-3"><a href="/properties?type=commercial" class="text-white-50 text-decoration-none hover-primary"><i class="fas fa-store me-2"></i>Komersial</a></li>
                        <li><a href="/properties?type=villa" class="text-white-50 text-decoration-none hover-primary"><i class="fas fa-umbrella-beach me-2"></i>Villa</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <h5 class="fw-bold mb-4 border-bottom border-secondary pb-2">Hubungi Kami</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-4 d-flex align-items-start">
                            <i class="fas fa-map-marker-alt me-3 mt-1 text-primary"></i>
                            <span>Gedung Properti Plaza, Lt. 8<br>Jl. Sudirman No. 123<br>Jakarta Selatan 12345</span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                            <i class="fas fa-phone me-3 text-primary"></i>
                            <span>+62 812-3456-7890<br><small class="text-muted">(Customer Service)</small></span>
                        </li>
                        <li class="mb-4 d-flex align-items-center">
                            <i class="fas fa-envelope me-3 text-primary"></i>
                            <span>info@dahlanproperty.com<br>marketing@dahlanproperty.com</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="fas fa-clock me-3 text-primary"></i>
                            <span>Senin - Jumat: 08:00 - 17:00 WIB<br>Sabtu: 09:00 - 15:00 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-divider" data-aos="fade-up"></div>

            <!-- Newsletter -->
            <div class="row mb-4" data-aos="fade-up">
                <div class="col-lg-6 mb-3">
                    <h6 class="fw-bold mb-3">Berlangganan Newsletter</h6>
                    <p class="text-white-50 mb-3">Dapatkan update properti terbaru dan penawaran spesial langsung di email Anda</p>
                </div>
                <div class="col-lg-6 mb-3">
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Email Anda" required>
                        <button type="submit" class="btn btn-primary btn-glow">
                            <i class="fas fa-paper-plane me-2"></i>Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <div class="footer-divider" data-aos="fade-up"></div>

            <!-- Copyright -->
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <p class="mb-0 text-white-50">
                        &copy; 2024 <span class="text-white fw-medium">DahlanProperty</span>.
                        Hak cipta dilindungi undang-undang.
                    </p>
                </div>
                <div class="col-md-6 text-md-end" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0 text-white-50">
                        Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk
                        <span class="text-white">pecinta properti Indonesia</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-primary btn-lg rounded-circle shadow-lg"
        style="position: fixed; bottom: 30px; right: 30px; display: none; z-index: 1000;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JS -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            offset: 100,
            once: true,
            easing: 'ease-out-cubic'
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        if (backToTop) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTop.style.display = 'block';
                } else {
                    backToTop.style.display = 'none';
                }
            });

            backToTop.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/welcome.blade.php ENDPATH**/ ?>