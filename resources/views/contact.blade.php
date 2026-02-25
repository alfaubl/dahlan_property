@extends('layouts.app')

@section('title', 'Hubungi Kami - Dahlan Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="space-y-8 animate-slideIn">
    
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-bg"></div>
        <div class="contact-hero-pattern"></div>
        
        <div class="contact-hero-content">
            <span class="contact-hero-badge">Hubungi Kami</span>
            <h1 class="contact-hero-title">Get In Touch</h1>
            <p class="contact-hero-subtitle">
                Kami siap membantu Anda 24/7. Hubungi tim kami untuk pertanyaan atau konsultasi properti.
            </p>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="contact-info-section">
        <div class="contact-info-grid">
            <!-- Phone -->
            <div class="contact-info-card">
                <div class="info-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="info-title">Telepon</h3>
                <div class="info-content">
                    <p>+62 21 1234 5678</p>
                    <p>+62 21 8765 4321</p>
                    <p class="text-sm text-gray-400 mt-2">Senin - Jumat, 09:00 - 18:00</p>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-info-card">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="info-title">Email</h3>
                <div class="info-content">
                    <p>info@dahlanproperty.com</p>
                    <p>support@dahlanproperty.com</p>
                    <p class="text-sm text-gray-400 mt-2">Respon dalam 24 jam</p>
                </div>
            </div>

            <!-- Location -->
            <div class="contact-info-card">
                <div class="info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3 class="info-title">Kantor Pusat</h3>
                <div class="info-content">
                    <p>Jl. Sudirman No. 123</p>
                    <p>Jakarta Pusat 12345</p>
                    <p class="text-sm text-gray-400 mt-2">Indonesia</p>
                </div>
            </div>

            <!-- Hours -->
            <div class="contact-info-card">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="info-title">Jam Operasional</h3>
                <div class="info-content">
                    <p>Senin - Jumat: 09:00 - 18:00</p>
                    <p>Sabtu: 09:00 - 15:00</p>
                    <p class="text-sm text-gray-400 mt-2">Minggu & Libur Nasional: Tutup</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map -->
    <section class="contact-form-section">
        <div class="contact-form-card">
            <div class="contact-form-grid">
                <!-- Left Side - Info -->
                <div class="form-left">
                    <h2>Kirim Pesan</h2>
                    <p>
                        Ada pertanyaan atau butuh bantuan? Isi form di samping dan tim kami akan segera menghubungi Anda.
                    </p>
                    
                    <ul class="contact-benefits">
                        <li class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="benefit-text">Respon cepat dalam 24 jam</span>
                        </li>
                        <li class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="benefit-text">Konsultasi gratis dengan ahli properti</span>
                        </li>
                        <li class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="benefit-text">Tim profesional dan berpengalaman</span>
                        </li>
                        <li class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="benefit-text">Solusi properti yang tepat untuk Anda</span>
                        </li>
                    </ul>
                </div>

                <!-- Right Side - Form -->
                <div class="form-right">
                    <form id="contactForm">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    Nama Lengkap
                                </label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="Masukkan email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-phone"></i>
                                    Telepon
                                </label>
                                <input type="tel" class="form-control" id="phone" name="phone" 
                                       placeholder="Masukkan nomor telepon">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-tag"></i>
                                    Subjek
                                </label>
                                <select class="form-control" id="subject" name="subject" required>
                                    <option value="">Pilih subjek</option>
                                    <option value="Info Properti">Info Properti</option>
                                    <option value="Booking">Booking</option>
                                    <option value="Konsultasi">Konsultasi</option>
                                    <option value="Kerjasama">Kerjasama</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-comment"></i>
                                Pesan
                            </label>
                            <textarea class="form-control" id="message" name="message" 
                                      placeholder="Tulis pesan Anda..." required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.819561!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5394d63e9b9%3A0x7f6d6b1b3b3b3b3b!2sJl.%20Sudirman%2C%20Jakarta%20Pusat!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                allowfullscreen=""
                loading="lazy">
            </iframe>
            
            <div class="map-overlay">
                <div class="map-overlay-icon">
                    <i class="fas fa-map-pin"></i>
                </div>
                <div class="map-overlay-text">
                    Dahlan Property
                    <small>Jl. Sudirman No. 123, Jakarta</small>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="faq-header">
            <span class="faq-badge">FAQ</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>
            <p>Temukan jawaban cepat untuk pertanyaan umum seputar layanan kami</p>
        </div>

        <div class="faq-grid">
            <!-- FAQ 1 -->
            <div class="faq-item active">
                <div class="faq-question">
                    <span>Bagaimana cara melakukan booking properti?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Anda dapat melakukan booking properti dengan memilih properti yang diinginkan, klik tombol "Booking Sekarang", dan ikuti langkah-langkah pembayaran. Tim kami akan segera menghubungi Anda untuk konfirmasi.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>Apakah properti yang ditampilkan sudah terverifikasi?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Ya, semua properti yang ditampilkan di platform kami telah melalui proses verifikasi ketat untuk memastikan keabsahan dan kelayakan properti.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana cara menghubungi agen properti?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Anda dapat menghubungi agen melalui form kontak di halaman properti, atau langsung melalui nomor telepon yang tercantum di detail properti.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>Apada ada biaya untuk menggunakan layanan ini?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Tidak ada biaya untuk mencari dan melihat properti. Biaya hanya dikenakan saat melakukan booking atau transaksi sesuai dengan ketentuan yang berlaku.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-item">
                <div class="faq-question">
                    <span>Bagaimana jika saya ingin menjual properti?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Silakan hubungi tim kami melalui form kontak atau telepon. Kami akan membantu Anda memasarkan properti dengan strategi terbaik.
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social-section">
        <div class="faq-header">
            <span class="faq-badge">Social Media</span>
            <h2>Ikuti Kami</h2>
            <p>Dapatkan update properti terbaru melalui media sosial kami</p>
        </div>

        <div class="social-grid">
            <a href="#" class="social-card facebook">
                <div class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="social-name">Facebook</div>
                <div class="social-followers">12.5K Followers</div>
            </a>

            <a href="#" class="social-card twitter">
                <div class="social-icon">
                    <i class="fab fa-twitter"></i>
                </div>
                <div class="social-name">Twitter</div>
                <div class="social-followers">8.2K Followers</div>
            </a>

            <a href="#" class="social-card instagram">
                <div class="social-icon">
                    <i class="fab fa-instagram"></i>
                </div>
                <div class="social-name">Instagram</div>
                <div class="social-followers">25.8K Followers</div>
            </a>

            <a href="#" class="social-card linkedin">
                <div class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </div>
                <div class="social-name">LinkedIn</div>
                <div class="social-followers">5.3K Followers</div>
            </a>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/contact.js') }}"></script>
@endsection