

<?php $__env->startSection('title', 'Kontak - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* ===== SIMPLE MODERN CONTACT ===== */
    .contact-section {
        padding: 60px 0;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .contact-header h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .contact-header p {
        font-size: 1.1rem;
        color: #6c7a8a;
        max-width: 600px;
        margin: 0 auto;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-bottom: 50px;
    }

    .contact-item {
        background: white;
        border: 1px solid #eef2f6;
        border-radius: 12px;
        padding: 30px 25px;
        transition: all 0.2s ease;
        text-align: center;
    }

    .contact-item:hover {
        border-color: #4a6fa5;
        box-shadow: 0 5px 20px rgba(74, 111, 165, 0.05);
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: #f0f4f8;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .contact-icon i {
        font-size: 1.8rem;
        color: #4a6fa5;
    }

    .contact-item h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .contact-detail {
        font-size: 1rem;
        color: #4a6fa5;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .contact-meta {
        font-size: 0.9rem;
        color: #6c7a8a;
    }

    .contact-action {
        display: inline-block;
        margin-top: 15px;
        color: #4a6fa5;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .contact-action i {
        font-size: 0.8rem;
        margin-left: 5px;
        transition: transform 0.2s ease;
    }

    .contact-action:hover {
        color: #2c3e50;
    }

    .contact-action:hover i {
        transform: translateX(3px);
    }

    /* Form & Map */
    .contact-bottom {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        align-items: start;
    }

    .contact-form {
        background: white;
        border: 1px solid #eef2f6;
        border-radius: 16px;
        padding: 35px;
    }

    .form-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 12px 18px;
        border: 1px solid #e0e7ec;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        background: #fafcfc;
    }

    .form-control:focus {
        outline: none;
        border-color: #4a6fa5;
        background: white;
        box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        background: #4a6fa5;
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-submit:hover {
        background: #2c3e50;
    }

    .contact-map {
        background: white;
        border: 1px solid #eef2f6;
        border-radius: 16px;
        padding: 20px;
    }

    .map-placeholder {
        background: #f0f4f8;
        border-radius: 12px;
        height: 250px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #6c7a8a;
    }

    .map-placeholder i {
        font-size: 2.5rem;
        color: #a0b8cc;
        margin-bottom: 10px;
    }

    .office-hours {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #eef2f6;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 0.95rem;
    }

    .hours-day {
        color: #2c3e50;
        font-weight: 500;
    }

    .hours-time {
        color: #6c7a8a;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .contact-bottom {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .contact-header h1 {
            font-size: 2rem;
        }
    }
</style>
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
                        <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Nomor Telepon (opsional)">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Tulis pesan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Map & Jam Operasional -->
            <div class="contact-map">
                <!-- Google Maps Embed - LANGSUNG TAMPIL -->
                <div style="border-radius: 12px; overflow: hidden; height: 250px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.432534264517!2d106.8226236749903!3d-6.214749293777437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e8f1e4e4e5%3A0x4e5e5e5e5e5e5e5e!2sJl.%20Sudirman%20No.%20123%2C%20RT.1%2FRW.3%2C%20Karet%20Tengsin%2C%20Kecamatan%20Tanah%20Abang%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010220!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="office-hours">
                    <!-- ... sisanya tetap sama ... -->
                </div>
            </div>



            <div class="office-hours">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #2c3e50; margin-bottom: 15px;">
                    <i class="fas fa-clock" style="color: #4a6fa5; margin-right: 8px;"></i>
                    Jam Operasional
                </h3>
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
                    <span class="hours-time" style="color: #e74c3c;">Tutup</span>
                </div>
            </div>

            <!-- Social Media - Simple -->
            <div style="margin-top: 25px; display: flex; gap: 15px;">
                <a href="#" style="color: #6c7a8a; font-size: 1.2rem; transition: color 0.2s;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" style="color: #6c7a8a; font-size: 1.2rem; transition: color 0.2s;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" style="color: #6c7a8a; font-size: 1.2rem; transition: color 0.2s;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" style="color: #6c7a8a; font-size: 1.2rem; transition: color 0.2s;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/contact.blade.php ENDPATH**/ ?>