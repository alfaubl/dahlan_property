

<?php $__env->startSection('title', 'Kontak Kami - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* ========== CONTACT PAGE SPECIFIC STYLES ========== */
    .contact-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 120px 0 80px;
        margin-top: 76px;
    }
    
    .contact-info-card {
        border-radius: 15px;
        transition: all 0.3s ease;
        height: 100%;
        border: 2px solid transparent;
    }
    
    .contact-info-card:hover {
        border-color: #0d6efd;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(13, 110, 253, 0.1);
    }
    
    .contact-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
    }
    
    .map-container {
        border-radius: 15px;
        overflow: hidden;
        height: 400px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .office-hours {
        list-style: none;
        padding: 0;
    }
    
    .office-hours li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }
    
    .office-hours li:last-child {
        border-bottom: none;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- ========== HERO SECTION ========== -->
<section class="contact-hero">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-4">Hubungi <span class="text-primary">Kami</span></h1>
                <p class="lead">Tim kami siap membantu Anda menemukan solusi properti terbaik. Jangan ragu untuk menghubungi kami.</p>
            </div>
        </div>
    </div>
</section>

<!-- ========== CONTACT CONTENT ========== -->
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-4">Kami Siap Membantu Anda</h2>
                <p class="text-muted mb-5">Pilih cara terbaik untuk terhubung dengan tim Dahlan Property</p>
            </div>
        </div>
        
        <!-- ========== CONTACT INFO CARDS ========== -->
        <div class="row g-4 mb-5">
            <div class="col-md-4" data-aos="fade-up">
                <div class="contact-info-card p-4 border text-center">
                    <div class="contact-icon bg-primary bg-opacity-10">
                        <i class="fas fa-map-marker-alt text-primary fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Kunjungi Kantor</h5>
                    <p class="text-muted mb-0">Jl. Properti No. 123, Jakarta Selatan<br>Indonesia 12560</p>
                    <div class="mt-3">
                        <a href="#map" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-directions me-2"></i>Dapatkan Petunjuk
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info-card p-4 border text-center">
                    <div class="contact-icon bg-primary bg-opacity-10">
                        <i class="fas fa-phone text-primary fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Telepon Kami</h5>
                    <p class="text-muted mb-2">+62 21 1234 5678</p>
                    <p class="text-muted mb-0">+62 812 3456 7890 (WhatsApp)</p>
                    <div class="mt-3">
                        <a href="tel:+622112345678" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-phone-alt me-2"></i>Telepon Sekarang
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-info-card p-4 border text-center">
                    <div class="contact-icon bg-primary bg-opacity-10">
                        <i class="fas fa-envelope text-primary fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Email Kami</h5>
                    <p class="text-muted mb-2">info@dahlanproperty.com</p>
                    <p class="text-muted mb-0">support@dahlanproperty.com</p>
                    <div class="mt-3">
                        <a href="mailto:info@dahlanproperty.com" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ========== FORM & MAP ========== -->
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm p-4">
                    <h3 class="fw-bold mb-4">Kirim Pesan</h3>
                    <form id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subjek *</label>
                                <select class="form-select" id="subject" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="property_inquiry">Pertanyaan Properti</option>
                                    <option value="listing_service">Layanan Pemasangan Iklan</option>
                                    <option value="partnership">Kemitraan</option>
                                    <option value="complaint">Keluhan</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <label for="message" class="form-label">Pesan *</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Saya ingin menerima informasi terbaru tentang properti
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-glow px-4">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left">
                <!-- Office Hours -->
                <div class="mb-4">
                    <h4 class="fw-bold mb-3">Jam Operasional</h4>
                    <ul class="office-hours">
                        <li class="d-flex justify-content-between">
                            <span>Senin - Jumat</span>
                            <span class="fw-medium">08:00 - 17:00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Sabtu</span>
                            <span class="fw-medium">09:00 - 15:00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Minggu</span>
                            <span class="fw-medium text-muted">Libur</span>
                        </li>
                    </ul>
                </div>
                
                <!-- FAQ -->
                <div class="mb-4">
                    <h4 class="fw-bold mb-3">Pertanyaan Umum</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara memasang iklan properti?
                                </button>
                            </h5>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Daftar akun terlebih dahulu, lalu klik "Pasang Iklan" di navbar. Ikuti panduan untuk mengisi detail properti Anda.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Berapa biaya pemasangan iklan?
                                </button>
                            </h5>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Pemasangan iklan dasar gratis. Paket premium dengan fitur tambahan tersedia mulai dari Rp 99.000/bulan.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apakah ada biaya untuk pembeli?
                                </button>
                            </h5>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tidak, untuk pembeli/pencari properti tidak dikenakan biaya apapun.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Map -->
                <div id="map" class="map-container mt-4">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2s!4v1622549402990!5m2!1sen!2s" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== SUPPORT SECTION ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="fw-bold mb-3">Butuh Bantuan Cepat?</h3>
                <p class="text-muted mb-0">Tim support kami siap membantu 24/7 melalui chat langsung. Klik tombol di samping untuk memulai percakapan.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <button class="btn btn-primary btn-glow px-4 py-3">
                    <i class="fas fa-comments me-2"></i>Mulai Chat Sekarang
                </button>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value,
            newsletter: document.getElementById('newsletter').checked
        };
        
        // Simple validation
        if (!formData.name || !formData.email || !formData.subject || !formData.message) {
            alert('Harap isi semua field yang wajib diisi (*)');
            return;
        }
        
        // Show loading
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Success message
            alert('✅ Terima kasih! Pesan Anda telah dikirim.\nTim kami akan menghubungi Anda dalam 1-2 hari kerja.');
            
            // Reset form
            this.reset();
            
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 1500);
    });
    
    // FAQ accordion enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('.accordion-button');
        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Close other accordions (optional)
                const activeButton = document.querySelector('.accordion-button:not(.collapsed)');
                if (activeButton && activeButton !== this) {
                    const targetId = activeButton.getAttribute('data-bs-target');
                    const target = document.querySelector(targetId);
                    if (target) {
                        const bsCollapse = bootstrap.Collapse.getInstance(target);
                        if (bsCollapse) bsCollapse.hide();
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/contact.blade.php ENDPATH**/ ?>