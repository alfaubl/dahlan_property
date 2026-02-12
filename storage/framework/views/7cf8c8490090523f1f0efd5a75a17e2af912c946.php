<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
    
    <!-- Page Title -->
    <title><?php echo $__env->yieldContent('title', 'Dahlan Property - Marketplace Properti Terbaik'); ?></title>
    
    <!-- Global Styles -->
    <style>
        /* ========== GLOBAL STYLES ========== */
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6610f2;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            padding-top: 76px;
        }
        
        /* Navbar Scroll Effect */
        .navbar-scrolled {
            padding: 10px 0;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Button Styles */
        .btn-glow {
            position: relative;
            overflow: hidden;
            border: none;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: all 0.3s ease;
        }
        
        .btn-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
        }
        
        /* Hover Effect */
        .hover-primary {
            transition: all 0.3s ease;
            position: relative;
            padding-left: 0;
        }
        
        .hover-primary:hover {
            color: var(--primary-color) !important;
            padding-left: 10px;
        }
        
        /* Footer */
        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            margin: 30px 0;
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
            background: var(--primary-color);
            color: white !important;
        }
        
        /* Property Cards (Global) */
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
        
        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            body { padding-top: 66px; }
            .display-3 { font-size: 2.5rem !important; }
            .display-4 { font-size: 2rem !important; }
        }
    </style>
    
    <!-- Page Specific Styles -->
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
    <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="d-flex align-items-center">
                    <div class="bg-primary rounded-circle p-2 me-3 shadow-sm">
                        <i class="fas fa-building text-white fs-4"></i>
                    </div>
                    <div>
                        <span class="fw-bold text-dark fs-3">Dahlan</span>
                        <span class="fw-bold text-primary fs-3">Property</span>
                        <small class="d-block text-muted" style="font-size: 0.7rem; margin-top: -5px;">
                            Marketplace Properti Terbaik
                        </small>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto align-items-center">
                    <a class="nav-link fw-medium mx-2 <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="/">
                        <i class="fas fa-home me-1"></i> Beranda
                    </a>
                    <a class="nav-link fw-medium mx-2 <?php echo e(request()->is('properties') ? 'active' : ''); ?>" href="/properties">
                        <i class="fas fa-search me-1"></i> Jelajahi Properti
                    </a>
                    <a class="nav-link fw-medium mx-2 <?php echo e(request()->is('about') ? 'active' : ''); ?>" href="/about">
                        <i class="fas fa-info-circle me-1"></i> Tentang Kami
                    </a>
                    <a class="nav-link fw-medium mx-2 <?php echo e(request()->is('contact') ? 'active' : ''); ?>" href="/contact">
                        <i class="fas fa-envelope me-1"></i> Kontak
                    </a>
                    
                    <div class="vr mx-3 d-none d-lg-block" style="height: 25px;"></div>
                    
                    <?php if(auth()->guard()->check()): ?>
                        <div class="dropdown">
                            <a class="nav-link fw-medium mx-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> <?php echo e(Auth::user()->name); ?>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                <li><a class="dropdown-item" href="/profile"><i class="fas fa-user me-2"></i>Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="/logout">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a class="nav-link fw-medium mx-2" href="/login"><i class="fas fa-sign-in-alt me-1"></i> Masuk</a>
                        <a class="btn btn-primary btn-glow px-4 mx-2" href="/register"><i class="fas fa-plus-circle me-2"></i> Pasang Iklan</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- ========== MAIN CONTENT ========== -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="fw-bold mb-4">Dahlan Property</h4>
                    <p class="text-white-50">Platform properti terpercaya yang menghubungkan Anda dengan rumah impian di seluruh Indonesia.</p>
                    <div class="social-icons mt-4">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-4">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/" class="text-white-50 hover-primary text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="/properties" class="text-white-50 hover-primary text-decoration-none">Properti</a></li>
                        <li class="mb-2"><a href="/about" class="text-white-50 hover-primary text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="/contact" class="text-white-50 hover-primary text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-4">Layanan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 hover-primary text-decoration-none">Jual Properti</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 hover-primary text-decoration-none">Sewa Properti</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 hover-primary text-decoration-none">Konsultasi Properti</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 hover-primary text-decoration-none">Valuasi Properti</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 mb-4">
                    <h5 class="fw-bold mb-4">Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-map-marker-alt me-2 text-primary"></i> <span class="text-white-50">Jl. Properti No. 123, Jakarta</span></li>
                        <li class="mb-3"><i class="fas fa-phone me-2 text-primary"></i> <span class="text-white-50">+62 21 1234 5678</span></li>
                        <li class="mb-3"><i class="fas fa-envelope me-2 text-primary"></i> <span class="text-white-50">info@dahlanproperty.com</span></li>
                        <li><i class="fas fa-clock me-2 text-primary"></i> <span class="text-white-50">Senin-Jumat: 9:00-17:00</span></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-divider"></div>
            
            <div class="row">
                <div class="col-md-6">
                    <p class="text-white-50 mb-0">&copy; <?php echo e(date('Y')); ?> Dahlan Property. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white-50 text-decoration-none me-3">Kebijakan Privasi</a>
                    <a href="#" class="text-white-50 text-decoration-none">Syarat Layanan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========== GLOBAL SCRIPTS ========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            navbar.classList.toggle('navbar-scrolled', window.scrollY > 50);
        });
    </script>
    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/layouts/app.blade.php ENDPATH**/ ?>