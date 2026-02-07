<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahlan Property</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            /* SATU WARNA */
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* HEADER - LOGO BESAR DENGAN BACKGROUND PUTIH */
        header {
            padding: 20px 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            height: 100px;
            position: relative;
        }

        .header-container {
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0 20px;
            gap: 4 0px;
        }

        /* LOGO AREA - BESAR DENGAN BACKGROUND PUTIH */
        .logo-area {
            width: 370px;
            /* SANGAT LEBAR */
            height: 170px;
            /* SANGAT TINGGI */
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            margin-right: auto;
            background: transparent !important;
            /* Background putih */
            padding: 0 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }

        .logo-area img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
            /* Filter untuk membuat logo lebih kontras */
            filter: brightness(1.05) contrast(1.1);
        }

        /* Efek hover untuk logo */
        .logo-area img:hover {
            transform: scale(1.03);
        }

        /* NAVIGASI - dengan latar putih juga */
        .nav-links {
            display: flex;
            gap: 30px;
            flex-shrink: 0;
            margin-left: auto;
            background: white;
            padding: 10px 20px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            text-decoration: none;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-size: 17px;
            white-space: nowrap;
            background: #4a6fa5;
        }

        .nav-link:hover {
            background: linear-gradient(45deg, #4a6fa5, #166088);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(74, 111, 165, 0.3);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 30px;
            margin-bottom: 60px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e6f0;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 52px;
            color: #2c3e50;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 20px;
            color: #5d6d7e;
            max-width: 800px;
            margin: 0 auto 40px;
            line-height: 1.7;
        }

        /* CTA Buttons */
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .btn {
            padding: 18px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4a6fa5, #166088);
            color: white;
            box-shadow: 0 6px 20px rgba(74, 111, 165, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(74, 111, 165, 0.6);
        }

        .btn-secondary {
            background: white;
            color: #4a6fa5;
            border: 2px solid #4a6fa5;
            box-shadow: 0 4px 15px rgba(74, 111, 165, 0.15);
        }

        .btn-secondary:hover {
            background: #4a6fa5;
            color: white;
            transform: translateY(-4px);
        }

        /* Features Section */
        .features {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            color: #2c3e50;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(45deg, #4a6fa5, #166088);
            border-radius: 2px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }

        .feature-card {
            background: white;
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-align: center;
            border: 1px solid #eef2f7;
        }

        .feature-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            font-size: 48px;
            color: #4a6fa5;
            margin-bottom: 25px;
        }

        .feature-card h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 26px;
        }

        .feature-card p {
            color: #5d6d7e;
            line-height: 1.7;
            font-size: 17px;
        }

        /* Property Types */
        .property-types {
            padding: 80px 0;
            background: white;
            border-radius: 30px;
            margin-bottom: 60px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #eef2f7;
        }

        .types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .type-item {
            background: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            border: 1px solid #f0f4f8;
        }

        .type-item:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-8px);
        }

        .type-icon {
            font-size: 40px;
            color: #4a6fa5;
            margin-bottom: 20px;
        }

        .type-item h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 50px 0;
            margin-top: 80px;
            border-radius: 30px 30px 0 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: bold;
        }

        .footer-links {
            display: flex;
            gap: 25px;
        }

        .footer-link {
            color: #ecf0f1;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 16px;
        }

        .footer-link:hover {
            color: #4a6fa5;
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            color: #bdc3c7;
            font-size: 15px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .logo-area {
                width: 300px;
                height: 80px;
            }

            .header-container {
                padding: 0 20px;
            }
        }

        @media (max-width: 768px) {
            header {
                height: 120px;
            }

            .header-container {
                flex-direction: column;
                gap: 20px;
                padding: 0 15px;
            }

            .logo-area {
                width: 280px;
                height: 70px;
                margin: 0 auto;
                padding: 5px;
            }

            .nav-links {
                margin: 0 auto;
                gap: 15px;
                padding: 8px 15px;
            }

            .nav-link {
                padding: 10px 18px;
                font-size: 15px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .hero p {
                font-size: 18px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .btn {
                width: 100%;
                max-width: 320px;
                justify-content: center;
                padding: 16px 30px;
            }
        }

        @media (max-width: 480px) {
            .logo-area {
                width: 250px;
                height: 60px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                padding: 5px 10px;
            }

            .nav-link {
                padding: 8px 15px;
                font-size: 14px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .section-title {
                font-size: 34px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <!-- Logo kiri dengan gambar SANGAT BESAR -->
            <div class="logo-area">
                <img src="logo dahlan_property 2.png" alt="Dahlan Property">
            </div>

            <!-- Navigasi -->
            <nav class="nav-links">
                <a href="#features" class="nav-link">Fitur</a>
                <a href="#property" class="nav-link">Property</a>
                <a href="#about" class="nav-link">Tentang</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Menyediakan Property dan Perabotan Rumah Tangga</h1>
            <p>Kelola inventory property, perabotan rumah, dan transaksi dengan sistem terintegrasi yang modern dan efisien. Pantau stok, kelola pemesanan, dan optimalkan bisnis property Anda.</p>

            <div class="cta-buttons">
                <a href="/login" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Masuk ke Dashboard
                </a>
                <a href="/register" class="btn btn-secondary">
                    <i class="fas fa-user-plus"></i> Daftar Akun Baru
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Fitur Unggulan Sistem</h2>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Dashboard Real-Time</h3>
                    <p>Pantau statistik property, penjualan, dan inventory secara real-time dengan grafik interaktif.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏘️</div>
                    <h3>Manajemen Property</h3>
                    <p>Kelola data property, foto, spesifikasi, dan ketersediaan dengan sistem katalog digital.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🛋️</div>
                    <h3>Inventory Perabotan</h3>
                    <p>Tracking stok perabotan rumah tangga, pemesanan, dan pengiriman secara terintegrasi.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Transaksi & Keuangan</h3>
                    <p>Sistem pembayaran, invoice otomatis, dan laporan keuangan lengkap untuk bisnis property.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Property Types -->
    <section class="property-types" id="property">
        <div class="container">
            <h2 class="section-title">Jenis Property dan Perabotan</h2>

            <div class="types-grid">
                <div class="type-item">
                    <div class="type-icon">🏡</div>
                    <h3>Rumah Tinggal</h3>
                    <p>Properti residensial</p>
                </div>

                <div class="type-item">
                    <div class="type-icon">🏢</div>
                    <h3>Apartemen</h3>
                    <p>Unit vertikal modern</p>
                </div>

                <div class="type-item">
                    <div class="type-icon">🛋️</div>
                    <h3>Perabotan</h3>
                    <p>Furniture & dekorasi</p>
                </div>

                <div class="type-item">
                    <div class="type-icon">🍽️</div>
                    <h3>Perlengkapan Dapur</h3>
                    <p>Alat masak & makan</p>
                </div>

                <div class="type-item">
                    <div class="type-icon">🛏️</div>
                    <h3>Perlengkapan Kamar</h3>
                    <p>Tempat tidur & lemari</p>
                </div>

                <div class="type-item">
                    <div class="type-icon">🛁</div>
                    <h3>Perlengkapan Kamar Mandi</h3>
                    <p>Sanitari & aksesoris</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h2 class="section-title">Tentang Dahlan Property</h2>
            <div style="text-align: center; max-width: 800px; margin: 0 auto; padding: 40px 0;">
                <p style="font-size: 18px; line-height: 1.8; color: #5d6d7e;">
                    Dahlan Property ialah bisnis yang menyediakan berbagai property dan perabotan rumah tangga. Dengan teknologi terkini, kami membantu Anda mengelola inventory, transaksi, dan pelanggan dengan lebih efisien.
                </p>

                <div style="display: flex; justify-content: center; gap: 30px; margin-top: 40px;">
                    <div style="text-align: center;">
                        <div style="font-size: 32px; color: #4a6fa5; font-weight: bold;">500+</div>
                        <div style="color: #5d6d7e;">Property Terkelola</div>
                    </div>

                    <div style="text-align: center;">
                        <div style="font-size: 32px; color: #4a6fa5; font-weight: bold;">1,200+</div>
                        <div style="color: #5d6d7e;">Perabotan Tersedia</div>
                    </div>

                    <div style="text-align: center;">
                        <div style="font-size: 32px; color: #4a6fa5; font-weight: bold;">98%</div>
                        <div style="color: #5d6d7e;">Kepuasan Pengguna</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">Dahlan Property</div>

                <div class="footer-links">
                    <a href="#features" class="footer-link">Fitur</a>
                    <a href="#property" class="footer-link">Property</a>
                    <a href="#about" class="footer-link">Tentang</a>
                </div>
            </div>

            <div class="copyright">
                &copy; 2024 Dahlan Property - Sistem Manajemen Property & Perabotan Rumah Tangga. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    </script>
</body>

</html><?php /**PATH C:\laragon\www\dahlan_project\resources\views/welcome.blade.php ENDPATH**/ ?>