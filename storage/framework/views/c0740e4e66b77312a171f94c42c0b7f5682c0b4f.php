<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dahlan Property</title>

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

        /* Login Card */
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

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider span {
            padding: 0 15px;
            color: #6c757d;
            font-weight: 500;
        }

        /* Social Login */
        .social-login {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 20px 0;
        }

        .social-btn {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: white;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .social-btn.google:hover {
            border-color: #DB4437;
            color: #DB4437;
        }

        .social-btn.facebook:hover {
            border-color: #4267B2;
            color: #4267B2;
        }

        .social-btn.twitter:hover {
            border-color: #1DA1F2;
            color: #1DA1F2;
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

        /* Remember me checkbox */
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

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0;
                background-attachment: scroll;
            }

            .auth-body {
                padding: 30px 20px;
            }

            .social-login {
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
                    <a class="nav-link fw-medium mx-2 active" href="/login">Masuk</a>
                    <a class="btn btn-primary btn-glow px-4 mx-2" href="/register">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="auth-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="auth-header">
                            <div class="auth-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <h2 class="fw-bold">Selamat Datang</h2>
                            <p class="mb-0 opacity-75">Masuk ke akun Anda untuk melanjutkan</p>
                        </div>

                        <div class="auth-body">
                            <form id="loginForm" action="/auth/login" method="POST">
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control with-icon" id="email" name="email"
                                            placeholder="nama@email.com" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control with-icon" id="password"
                                            name="password" placeholder="••••••••" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
                                        <label class="form-check-label" for="rememberMe">
                                            Ingat saya
                                        </label>
                                    </div>
                                    <a href="/forgot-password" class="auth-link">Lupa password?</a>
                                </div>

                                <button type="submit" class="btn btn-glow w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                </button>

                                <div class="text-center mb-3">
                                    <span class="text-muted">Belum punya akun?</span>
                                    <a href="/register" class="auth-link ms-2">Daftar sekarang</a>
                                </div>

                                <div class="divider">
                                    <span>atau lanjutkan dengan</span>
                                </div>

                                <div class="social-login">
                                    <button type="button" class="social-btn google">
                                        <i class="fab fa-google"></i>
                                        <span class="d-none d-sm-inline">Google</span>
                                    </button>
                                    <button type="button" class="social-btn facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <span class="d-none d-sm-inline">Facebook</span>
                                    </button>
                                    <button type="button" class="social-btn twitter">
                                        <i class="fab fa-twitter"></i>
                                        <span class="d-none d-sm-inline">Twitter</span>
                                    </button>
                                </div>

                                <div class="alert alert-info mt-4" role="alert">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <small>Dengan masuk, Anda menyetujui <a href="/terms" class="alert-link">Syarat & Ketentuan</a> kami.</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form validation
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Basic validation
            if (!email || !password) {
                showAlert('error', 'Harap isi semua field');
                return;
            }
            
            if (!validateEmail(email)) {
                showAlert('error', 'Format email tidak valid');
                return;
            }
            
            // Simulate login process
            showAlert('success', 'Login berhasil! Mengalihkan...');
            
            // In real application, you would submit the form
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 1500);
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showAlert(type, message) {
            const alertHtml = `
                <div class="alert alert-${type === 'error' ? 'danger' : 'success'} alert-dismissible fade show" role="alert">
                    <i class="fas fa-${type === 'error' ? 'exclamation-triangle' : 'check-circle'} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            
            const form = document.getElementById('loginForm');
            form.insertAdjacentHTML('afterbegin', alertHtml);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                if (alert) {
                    alert.remove();
                }
            }, 5000);
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/auth/login.blade.php ENDPATH**/ ?>