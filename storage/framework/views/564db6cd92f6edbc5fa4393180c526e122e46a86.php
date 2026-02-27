

<?php $__env->startSection('title', 'Hubungi Kami - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/contact.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-wrapper">
    
    <!-- HERO SECTION -->
    <section class="contact-hero">
        <div class="hero-content">
            <span class="hero-badge">
                <i class="fas fa-headset"></i>
                HUBUNGI KAMI
            </span>
            <h1 class="hero-title">Get In Touch</h1>
            <p class="hero-text">
                Kami siap membantu Anda 24/7. Hubungi tim kami untuk pertanyaan atau konsultasi properti.
            </p>
        </div>
    </section>

    <!-- INFO CARDS -->
    <div class="info-grid">
        <!-- Phone -->
        <div class="info-card">
            <div class="info-icon phone">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h3 class="info-title">Telepon</h3>
            <div class="info-content">
                <p>+62 21 1234 5678</p>
                <p>+62 21 8765 4321</p>
                <p class="info-note">Senin - Jumat, 09:00 - 18:00</p>
            </div>
        </div>

        <!-- Email -->
        <div class="info-card">
            <div class="info-icon email">
                <i class="fas fa-envelope"></i>
            </div>
            <h3 class="info-title">Email</h3>
            <div class="info-content">
                <p>info@dahlanproperty.com</p>
                <p>support@dahlanproperty.com</p>
                <p class="info-note">Respon dalam 24 jam</p>
            </div>
        </div>

        <!-- Location -->
        <div class="info-card">
            <div class="info-icon location">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3 class="info-title">Kantor Pusat</h3>
            <div class="info-content">
                <p>Jl. Sudirman No. 123</p>
                <p>Jakarta Pusat 12345</p>
                <p class="info-note">Indonesia</p>
            </div>
        </div>

        <!-- Hours -->
        <div class="info-card">
            <div class="info-icon hours">
                <i class="fas fa-clock"></i>
            </div>
            <h3 class="info-title">Jam Operasional</h3>
            <div class="info-content">
                <p>Senin - Jumat: 09:00 - 18:00</p>
                <p>Sabtu: 09:00 - 15:00</p>
                <p class="info-note">Minggu & Libur: Tutup</p>
            </div>
        </div>
    </div>

    <!-- FORM & MAP SECTION -->
    <div class="form-map-section">
        <!-- Contact Form -->
        <div class="form-card">
            <h2 class="form-title">Kirim Pesan</h2>
            <p class="form-subtitle">Isi form di bawah dan tim kami akan segera menghubungi Anda</p>

            <form id="contactForm">
                <?php echo csrf_field(); ?>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i>
                            Email
                        </label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone"></i>
                            Telepon
                        </label>
                        <input type="tel" class="form-control" id="phone" placeholder="Masukkan nomor telepon">
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-tag"></i>
                            Subjek
                        </label>
                        <select class="form-control" id="subject">
                            <option value="">Pilih subjek</option>
                            <option value="info">Info Properti</option>
                            <option value="booking">Booking</option>
                            <option value="konsultasi">Konsultasi</option>
                            <option value="kerjasama">Kerjasama</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-comment"></i>
                        Pesan
                    </label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Tulis pesan Anda..."></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i>
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Map & Info -->
        <div class="map-card">
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.819561!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5394d63e9b9%3A0x7f6d6b1b3b3b3b3b!2sJl.%20Sudirman%2C%20Jakarta%20Pusat!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
            <div class="map-info">
                <div class="map-info-item">
                    <i class="fas fa-map-pin"></i>
                    <span>Jl. Sudirman No. 123, Jakarta Pusat</span>
                </div>
                <div class="map-info-item">
                    <i class="fas fa-phone"></i>
                    <span>+62 21 1234 5678</span>
                </div>
                <div class="map-info-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@dahlanproperty.com</span>
                </div>
                <div class="map-info-item">
                    <i class="fas fa-clock"></i>
                    <span>Senin - Jumat, 09:00 - 18:00</span>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS SECTION WITH APEXCHARTS -->
    <div class="stats-section">
        <div class="stats-header">
            <span class="stats-badge">STATISTIK KAMI</span>
            <h2 class="stats-title">Kami Melayani Ribuan Klien</h2>
            <p class="stats-subtitle">Statistik layanan dan kepuasan klien DahlanProperty</p>
        </div>

        <div class="stats-grid">
            <div class="stats-chart-card">
                <div class="chart-header">
                    <h3>Distribusi Layanan</h3>
                    <span class="chart-year">2024</span>
                </div>
                <div id="servicesChart" class="chart-container"></div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-color" style="background: #4361ee;"></span>
                        <span class="legend-label">Konsultasi</span>
                        <span class="legend-value">45%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #06d6a0;"></span>
                        <span class="legend-label">Booking</span>
                        <span class="legend-value">30%</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #ffb703;"></span>
                        <span class="legend-label">Info Properti</span>
                        <span class="legend-value">25%</span>
                    </div>
                </div>
            </div>

            <div class="quick-stats-grid">
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #4361ee20; color: #4361ee;">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">2500+</span>
                        <span class="quick-stat-label">Klien Puas</span>
                    </div>
                </div>
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #06d6a020; color: #06d6a0;">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">1500+</span>
                        <span class="quick-stat-label">Properti</span>
                    </div>
                </div>
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #ffb70320; color: #ffb703;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">24/7</span>
                        <span class="quick-stat-label">Layanan</span>
                    </div>
                </div>
                <div class="quick-stat-card">
                    <div class="quick-stat-icon" style="background: #ef476f20; color: #ef476f;">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div>
                        <span class="quick-stat-value">10+</span>
                        <span class="quick-stat-label">Tahun</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ SECTION -->
    <section class="faq-section">
        <h2 class="faq-title">Pertanyaan Umum</h2>
        
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Bagaimana cara booking properti?
                </div>
                <div class="faq-answer">
                    Anda dapat melakukan booking dengan memilih properti yang diinginkan, klik tombol "Booking Sekarang", dan ikuti langkah-langkah pembayaran.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Apakah properti sudah terverifikasi?
                </div>
                <div class="faq-answer">
                    Ya, semua properti telah melalui proses verifikasi ketat untuk memastikan keabsahan dan kelayakan.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Ada biaya untuk menggunakan layanan?
                </div>
                <div class="faq-answer">
                    Tidak ada biaya untuk mencari dan melihat properti. Biaya hanya dikenakan saat booking atau transaksi.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle"></i>
                    Cara menghubungi agen?
                </div>
                <div class="faq-answer">
                    Anda dapat menghubungi agen melalui form kontak atau nomor telepon yang tercantum di detail properti.
                </div>
            </div>
        </div>
    </section>

    <!-- SOCIAL MEDIA -->
    <section class="social-section">
        <h3 class="social-title">Ikuti Kami</h3>
        <div class="social-grid">
            <a href="#" class="social-link facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-link twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-link instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="social-link linkedin">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?php echo e(asset('assets/js/contact.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/contact.blade.php ENDPATH**/ ?>