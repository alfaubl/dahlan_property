@extends('layouts.app')

@section('title', 'Daftar - Dahlan Property')

@section('content')
<section class="auth-section">
    <div class="auth-bg"></div>
    <div class="container">
        <div class="auth-content">
            <!-- Logo & Branding -->
            <div class="auth-branding">
                <a href="/" class="logo">
                    <div class="logo-image">
                        <img src="{{ asset('assets/logo dahlan_property 2.png') }}" alt="Dahlan Property">
                    </div>
                    <div class="logo-text">DahlanProperty</div>
                </a>
                <div class="auth-badge">
                    <i class="fas fa-rocket"></i>
                    <span>Mulai Gratis 30 Hari</span>
                </div>
            </div>

            <!-- Auth Card -->
            <div class="auth-card">
                <div class="auth-header">
                    <h2 class="auth-title">Bergabung dengan Kami</h2>
                    <p class="auth-subtitle">Mulai kelola properti Anda dalam hitungan menit</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i> Nama Lengkap
                            </label>
                            <div class="input-group">
                                <input type="text" id="name" name="name" required 
                                       class="form-input" placeholder="John Doe">
                                <div class="input-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company" class="form-label">
                                <i class="fas fa-building"></i> Nama Perusahaan
                            </label>
                            <div class="input-group">
                                <input type="text" id="company" name="company" 
                                       class="form-input" placeholder="PT. Contoh Property">
                                <div class="input-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Professional
                        </label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" required 
                                   class="form-input" placeholder="ceo@perusahaan.com">
                            <div class="input-icon">
                                <i class="fas fa-at"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
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
                            <div class="password-hint">
                                <i class="fas fa-info-circle"></i>
                                Minimal 8 karakter dengan angka & simbol
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock"></i> Konfirmasi Kata Sandi
                            </label>
                            <div class="input-group">
                                <input type="password" id="password_confirmation" name="password_confirmation" required 
                                       class="form-input" placeholder="••••••••">
                                <div class="input-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <i class="fas fa-phone"></i> Nomor Telepon
                        </label>
                        <div class="input-group">
                            <input type="tel" id="phone" name="phone" 
                                   class="form-input" placeholder="+62 812-3456-7890">
                            <div class="input-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="terms" required>
                            <span class="checkmark"></span>
                            Saya setuju dengan <a href="#" class="terms-link">Syarat & Ketentuan</a> dan 
                            <a href="#" class="terms-link">Kebijakan Privasi</a>
                        </label>
                        
                        <label class="checkbox-label">
                            <input type="checkbox" name="newsletter">
                            <span class="checkmark"></span>
                            Kirimi saya tips manajemen properti & pembaruan produk
                        </label>
                    </div>

                    <button type="submit" class="btn-auth btn-auth-primary">
                        <i class="fas fa-user-plus"></i>
                        <span>Buat Akun Gratis</span>
                    </button>

                    <div class="auth-divider">
                        <span>Sudah punya akun?</span>
                    </div>

                    <div class="auth-footer">
                        <a href="{{ route('login') }}" class="btn-auth btn-auth-secondary">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Masuk ke Akun yang Ada</span>
                        </a>
                        
                        <p class="auth-note">
                            <i class="fas fa-shield-alt"></i>
                            Data Anda diamankan dengan enkripsi tingkat bank
                        </p>
                    </div>
                </form>
            </div>

            <!-- Features -->
            <div class="register-features">
                <h3 class="features-title">Apa yang Anda Dapatkan</h3>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Analitik Real-time</h4>
                        <p>Pantau performa properti dengan dashboard interaktif</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Akses Mobile</h4>
                        <p>Kelola dari mana saja dengan aplikasi mobile-friendly</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Dukungan 24/7</h4>
                        <p>Tim ahli siap membantu kapan pun Anda butuhkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Register Specific Styles */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 25px;
}

.password-hint {
    margin-top: 8px;
    font-size: 12px;
    color: var(--gray);
    display: flex;
    align-items: center;
    gap: 5px;
}

.terms-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
}

.terms-link:hover {
    text-decoration: underline;
}

/* Auth Secondary Button */
.btn-auth-secondary {
    width: 100%;
    padding: 18px;
    background: var(--white);
    color: var(--primary);
    border: 2px solid var(--primary);
    border-radius: var(--radius-md);
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 15px;
    text-decoration: none;
}

.btn-auth-secondary:hover {
    background: var(--primary-soft);
    transform: translateY(-2px);
}

/* Register Features */
.register-features {
    margin-top: 60px;
    text-align: center;
}

.features-title {
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 40px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    max-width: 900px;
    margin: 0 auto;
}

.feature-item {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.15);
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-primary);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 24px;
    color: var(--white);
}

.feature-item h4 {
    color: var(--white);
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
}

.feature-item p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    line-height: 1.5;
}

/* Responsive */
@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .feature-item {
        padding: 25px 20px;
    }
}
</style>
@endsection