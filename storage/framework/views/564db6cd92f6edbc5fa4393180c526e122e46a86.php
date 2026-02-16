

<?php $__env->startSection('title', 'Kontak - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.css.contact-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-section">
    <div class="container">
        <!-- Header -->
        <div class="contact-header">
            <h1>Hubungi Kami</h1>
            <p>Tim kami siap membantu Anda. Pilih saluran komunikasi yang paling nyaman.</p>
        </div>

        <!-- Contact Cards - 3 Kolom -->
        <div class="contact-grid">
            <!-- Kantor Pusat -->
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Kantor Pusat</h3>
                <div class="contact-detail">Jl. Sudirman No. 123</div>
                <div class="contact-meta">Jakarta Selatan, 12190</div>
                <a href="#" class="contact-action">
                    Lihat Peta <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Telepon -->
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Telepon</h3>
                <div class="contact-detail">(021) 1234-5678</div>
                <div class="contact-meta">Senin-Jumat, 09.00-17.00</div>
                <a href="tel:+622112345678" class="contact-action">
                    Hubungi <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Email -->
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email</h3>
                <div class="contact-detail">info@dahlanproperty.com</div>
                <div class="contact-meta">Respon 1x24 jam</div>
                <a href="mailto:info@dahlanproperty.com" class="contact-action">
                    Kirim Email <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Form & Map -->
        <div class="contact-bottom">
            <!-- Form Kontak -->
            <div class="contact-form">
                <h3 class="form-title">Kirim Pesan</h3>
                <form>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="nama@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon (Opsional)</label>
                        <input type="tel" class="form-control" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control" placeholder="Tulis pesan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Map & Info -->
            <div class="contact-map">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.432534264517!2d106.8226236749903!3d-6.214749293777437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e8f1e4e4e5%3A0x4e5e5e5e5e5e5e5e!2sJl.%20Sudirman%20No.%20123%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>

                <div class="office-hours">
                    <h3>
                        <i class="fas fa-clock"></i>
                        Jam Operasional
                    </h3>
                    
                    <div class="hours-list">
                        <div class="hours-item">
                            <span class="hours-day">Senin - Kamis</span>
                            <span class="hours-time">09.00 - 17.00</span>
                        </div>
                        <div class="hours-item">
                            <span class="hours-day">Jumat</span>
                            <span class="hours-time">09.00 - 16.00</span>
                        </div>
                        <div class="hours-item">
                            <span class="hours-day">Sabtu</span>
                            <span class="hours-time">09.00 - 14.00</span>
                        </div>
                        <div class="hours-item">
                            <span class="hours-day">Minggu & Libur</span>
                            <span class="hours-time text-danger">Tutup</span>
                        </div>
                    </div>

                    <div class="emergency-contact">
                        <i class="fas fa-phone-alt"></i>
                        <strong>Layanan Darurat 24 Jam</strong>
                        <span>+62 812-3456-7890 (WhatsApp)</span>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('partials.js.contact-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/contact.blade.php ENDPATH**/ ?>