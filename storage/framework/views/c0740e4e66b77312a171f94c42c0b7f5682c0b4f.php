<?php $__env->startSection('title', 'Login - Dahlan Property'); ?>

<?php $__env->startSection('content'); ?>
<section class="auth-section">
    <div class="auth-bg"></div>
    <div class="container">
        <div class="auth-content">
            <!-- Logo & Branding -->
            <div class="auth-branding">
                <a href="/" class="logo">
                    <div class="logo-image">
                        <img src="<?php echo e(asset('assets/logo dahlan_property 2.png')); ?>" alt="Dahlan Property">
                    </div>
                    <div class="logo-text">DahlanProperty</div>
                </a>
                <div class="auth-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>Login Aman & Terenkripsi</span>
                </div>
            </div>

            <!-- Auth Card -->
            <div class="auth-card">
                <div class="auth-header">
                    <h2 class="auth-title">Masuk ke Akun Anda</h2>
                    <p class="auth-subtitle">Kelola properti dan perabotan dengan lebih mudah</p>
                </div>

                <form method="POST" action="<?php echo e(route('login')); ?>" class="auth-form">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Alamat Email
                        </label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" required 
                                   class="form-input" placeholder="you@example.com">
                            <div class="input-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Kata Sandi
                        </label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" required 
                                   class="form-input" placeholder="••••••••">
                            <div class="input-icon">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                        <div class="form-options">
                            <label class="checkbox-label">
                                <input type="checkbox" name="remember">
                                <span class="checkmark"></span>
                                Ingat saya
                            </label>
                            <a href="#" class="forgot-link">Lupa kata sandi?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn-auth btn-auth-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk ke Dashboard</span>
                    </button>

                    <div class="auth-divider">
                        <span>atau lanjutkan dengan</span>
                    </div>

                    <div class="social-auth">
                        <a href="#" class="social-btn google-btn">
                            <i class="fab fa-google"></i>
                            <span>Google</span>
                        </a>
                        <a href="#" class="social-btn microsoft-btn">
                            <i class="fab fa-microsoft"></i>
                            <span>Microsoft</span>
                        </a>
                    </div>

                    <div class="auth-footer">
                        <p>Belum punya akun? <a href="<?php echo e(route('register')); ?>" class="auth-link">Daftar sekarang</a></p>
                        <p class="auth-note">
                            <i class="fas fa-info-circle"></i>
                            Dengan login, Anda menyetujui <a href="#">Syarat Layanan</a> kami.
                        </p>
                    </div>
                </form>
            </div>

            <!-- Stats -->
            <div class="auth-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Pengguna Aktif</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99.9%</span>
                    <span class="stat-label">Uptime</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Dukungan</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Auth Section */
.auth-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    padding: 100px 0 80px;
    overflow: hidden;
}

.auth-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    z-index: -2;
}

.auth-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 80px;
    background: var(--white);
    clip-path: polygon(0 60%, 100% 0, 100% 100%, 0 100%);
    z-index: -1;
}

.auth-content {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

/* Branding */
.auth-branding {
    text-align: center;
    margin-bottom: 40px;
}

.auth-branding .logo {
    justify-content: center;
    margin-bottom: 20px;
}

.auth-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 10px 20px;
    border-radius: 50px;
    color: var(--white);
    font-weight: 600;
    font-size: 14px;
}

/* Auth Card */
.auth-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    padding: 50px;
    box-shadow: var(--shadow-xl);
    max-width: 480px;
    margin: 0 auto;
    border: 1px solid var(--light-gray);
}

.auth-header {
    text-align: center;
    margin-bottom: 40px;
}

.auth-title {
    font-family: 'Poppins', sans-serif;
    font-size: 36px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 10px;
}

.auth-subtitle {
    color: var(--gray);
    font-size: 16px;
}

/* Form */
.auth-form {
    width: 100%;
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 8px;
    font-size: 14px;
}

.input-group {
    position: relative;
}

.form-input {
    width: 100%;
    padding: 16px 20px 16px 50px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-md);
    font-size: 16px;
    transition: all 0.3s ease;
    background: var(--light-bg);
}

.form-input:focus {
    outline: none;
    border-color: var(--primary);
    background: var(--white);
    box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.1);
}

.input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary);
    font-size: 18px;
}

/* Form Options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 12px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    font-size: 14px;
    color: var(--gray);
}

.checkbox-label input {
    display: none;
}

.checkmark {
    width: 18px;
    height: 18px;
    border: 2px solid var(--primary);
    border-radius: 4px;
    display: inline-block;
    position: relative;
}

.checkbox-label input:checked + .checkmark::after {
    content: '✓';
    position: absolute;
    color: var(--primary);
    font-weight: bold;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.forgot-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: color 0.3s ease;
}

.forgot-link:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

/* Auth Button */
.btn-auth-primary {
    width: 100%;
    padding: 18px;
    background: var(--gradient-primary);
    color: var(--white);
    border: none;
    border-radius: var(--radius-md);
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 30px 0;
}

.btn-auth-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Divider */
.auth-divider {
    display: flex;
    align-items: center;
    margin: 30px 0;
    color: var(--gray);
}

.auth-divider::before,
.auth-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--light-gray);
}

.auth-divider span {
    padding: 0 20px;
    font-size: 14px;
}

/* Social Auth */
.social-auth {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 30px;
}

.social-btn {
    padding: 14px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    border: 2px solid var(--light-gray);
    background: var(--white);
    color: var(--dark);
}

.social-btn:hover {
    transform: translateY(-2px);
    border-color: var(--primary);
}

.google-btn:hover {
    background: #4285F4;
    color: white;
    border-color: #4285F4;
}

.microsoft-btn:hover {
    background: #00A4EF;
    color: white;
    border-color: #00A4EF;
}

/* Auth Footer */
.auth-footer {
    text-align: center;
    margin-top: 30px;
    padding-top: 30px;
    border-top: 1px solid var(--light-gray);
}

.auth-footer p {
    margin-bottom: 10px;
    color: var(--gray);
}

.auth-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
}

.auth-link:hover {
    text-decoration: underline;
}

.auth-note {
    font-size: 13px;
    color: var(--gray);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 20px;
}

/* Stats */
.auth-stats {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 60px;
    flex-wrap: wrap;
}

.auth-stats .stat-item {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 20px 30px;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    min-width: 150px;
    text-align: center;
}

.auth-stats .stat-number {
    font-size: 32px;
    font-weight: 800;
    color: var(--white);
    display: block;
    margin-bottom: 5px;
}

.auth-stats .stat-label {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 600;
    font-size: 14px;
}

/* Responsive */
@media (max-width: 768px) {
    .auth-card {
        padding: 30px 20px;
    }
    
    .auth-title {
        font-size: 28px;
    }
    
    .social-auth {
        grid-template-columns: 1fr;
    }
    
    .auth-stats {
        gap: 20px;
    }
    
    .auth-stats .stat-item {
        min-width: 120px;
        padding: 15px 20px;
    }
}

@media (max-width: 480px) {
    .auth-section {
        padding: 80px 0 60px;
    }
    
    .auth-section::after {
        height: 50px;
        clip-path: polygon(0 30%, 100% 0, 100% 100%, 0 100%);
    }
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/auth/login.blade.php ENDPATH**/ ?>