<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Dahlan Property</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Import styles from main page */
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
            min-height: 100vh;
            display: flex;
            align-items: center;
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

        /* Register Card */
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .auth-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.25);
        }

        .auth-header {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            padding: 40px 30px 30px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .auth-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            animation: float 20s linear infinite;
        }

        .auth-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .auth-body {
            padding: 40px;
        }

        /* Form Styles */
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
            background: white;
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            padding: 15px 20px;
        }

        .form-control.with-icon {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        /* Custom Button */
        .btn-glow {
            position: relative;
            overflow: hidden;
            border: none;
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            transition: all 0.3s ease;
            padding: 15px 30px;
            font-weight: 600;
            border-radius: 12px;
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

        /* Progress Bar */
        .progress-container {
            margin-bottom: 30px;
        }

        .progress {
            height: 8px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .progress-bar {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            transition: width 0.5s ease;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-top: 20px;
        }

        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #6c757d;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step.active {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            transform: scale(1.1);
        }

        .step.completed {
            background: #28a745;
            color: white;
        }

        .step-label {
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 12px;
            color: #6c757d;
        }

        .step.active .step-label {
            color: #0d6efd;
            font-weight: 600;
        }

        /* User Type Selection */
        .user-type-selection {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 20px 0;
        }

        .user-type-card {
            padding: 25px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .user-type-card:hover {
            transform: translateY(-5px);
            border-color: #0d6efd;
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.1);
        }

        .user-type-card.selected {
            border-color: #0d6efd;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.05), rgba(102, 16, 242, 0.05));
            transform: translateY(-5px);
        }

        .user-type-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 24px;
        }

        /* Password Strength */
        .password-strength {
            height: 5px;
            border-radius: 2px;
            margin-top: 5px;
            background: #e0e0e0;
            overflow: hidden;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
        }

        .strength-weak {
            background: #dc3545;
        }

        .strength-medium {
            background: #ffc107;
        }

        .strength-strong {
            background: #28a745;
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

        /* Floating Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }

        .floating {
            animation: float 5s ease-in-out infinite;
        }

        /* Checkbox styles */
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .form-check-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
        }

        /* Link styles */
        .auth-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .auth-link:hover {
            color: #6610f2;
            padding-left: 5px;
        }

        .auth-link::before {
            content: '→';
            position: absolute;
            left: -15px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .auth-link:hover::before {
            left: -5px;
            opacity: 1;
        }

        /* Form steps */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0;
                background-attachment: scroll;
            }

            .auth-body {
                padding: 30px 20px;
            }

            .user-type-selection {
                grid-template-columns: 1fr;
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
                    <a class="btn btn-primary btn-glow px-4 mx-2 active" href="/register">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="auth-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="auth-header">
                            <div class="auth-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h2 class="fw-bold">Buat Akun Baru</h2>
                            <p class="mb-0 opacity-75">Bergabunglah dengan komunitas properti terbesar di Indonesia</p>
                        </div>

                        <div class="auth-body">
                            <!-- Progress Bar -->
                            <div class="progress-container">
                                <div class="progress">
                                    <div class="progress-bar" id="progressBar" style="width: 33%"></div>
                                </div>
                                <div class="progress-steps">
                                    <div class="step active" data-step="1">
                                        1
                                        <div class="step-label">Data Diri</div>
                                    </div>
                                    <div class="step" data-step="2">
                                        2
                                        <div class="step-label">Akun</div>
                                    </div>
                                    <div class="step" data-step="3">
                                        3
                                        <div class="step-label">Verifikasi</div>
                                    </div>
                                </div>
                            </div>

                            <form id="registerForm" action="/auth/register" method="POST">
                                <!-- Step 1: Personal Information -->
                                <div class="form-step active" id="step1">
                                    <h4 class="fw-bold mb-4">Informasi Pribadi</h4>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Saya ingin mendaftar sebagai:</label>
                                        <div class="user-type-selection">
                                            <div class="user-type-card" data-user-type="buyer">
                                                <div class="user-type-icon">
                                                    <i class="fas fa-search"></i>
                                                </div>
                                                <h5 class="fw-bold">Pembeli/Penyewa</h5>
                                                <p class="text-muted small mb-0">Mencari properti untuk ditinggali atau investasi</p>
                                            </div>
                                            <div class="user-type-card" data-user-type="seller">
                                                <div class="user-type-icon">
                                                    <i class="fas fa-home"></i>
                                                </div>
                                                <h5 class="fw-bold">Penjual/Pemilik</h5>
                                                <p class="text-muted small mb-0">Memasang iklan properti untuk dijual/disewa</p>
                                            </div>
                                        </div>
                                        <input type="hidden" id="userType" name="userType" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName" class="form-label fw-semibold">Nama Depan</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName" required