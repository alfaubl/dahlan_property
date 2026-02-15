<?php $__env->startSection('title', 'Lupa Password - Dahlan Property'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.css.forgot-password-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="auth-section">
    <div class="auth-bg"></div>
    <div class="container">
        <div class="auth-content">
            <!-- Logo & Branding -->
            <div class="auth-branding">
                <a href="/" class="logo">
                    <div class="">
                        <img src="" alt="">
                    </div>
                    <div class="logo-text">DahlanProperty</div>
                </a>
                <div class="auth-badge">
                    <i class="fas fa-key"></i>
                    <span>Reset Kata Sandi Aman</span>
                </div>
            </div>

            <!-- Auth Card -->
            <div class="auth-card">
                <div class="auth-header">
                    <h2 class="auth-title">Reset Kata Sandi</h2>
                    <p class="auth-subtitle">Masukkan email Anda untuk mendapatkan link reset</p>
                </div>

                <?php if(session('status')): ?>
                    <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('password.email')); ?>" class="auth-form">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Alamat Email
                        </label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" required 
                                   class="form-input" placeholder="you@example.com" value="<?php echo e(old('email')); ?>">
                            <div class="input-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                        <p class="form-help">
                            <i class="fas fa-info-circle"></i>
                            Link reset akan dikirim ke email Anda dalam 5 menit
                        </p>
                    </div>

                    <button type="submit" class="btn-auth btn-auth-primary">
                        <i class="fas fa-paper-plane"></i>
                        <span>Kirim Link Reset</span>
                    </button>

                    <div class="auth-divider">
                        <span>atau</span>
                    </div>

                    <div class="auth-footer">
                        <a href="<?php echo e(route('login')); ?>" class="btn-auth btn-auth-secondary">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Login</span>
                        </a>
                        
                        <div class="security-info">
                            <div class="security-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Enkripsi End-to-End</span>
                            </div>
                            <div class="security-item">
                                <i class="fas fa-clock"></i>
                                <span>Link berlaku 24 jam</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Security Steps -->
            <div class="security-steps">
                <h3 class="steps-title">Proses Reset yang Aman</h3>
                <div class="steps-container">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Verifikasi Email</h4>
                            <p>Masukkan email terdaftar untuk verifikasi</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Terima Link</h4>
                            <p>Cek inbox email untuk link reset</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Buat Sandi Baru</h4>
                            <p>Buat kata sandi baru yang kuat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>