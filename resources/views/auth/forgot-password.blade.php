@extends('layouts.app')

@section('title', 'Reset Password - Dahlan Property')

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

                <form method="POST" action="#" class="auth-form">
                    @csrf
                    
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
                        <a href="{{ route('login') }}" class="btn-auth btn-auth-secondary">
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

<style>
/* Specific styles for forgot password */
.form-help {
    margin-top: 8px;
    font-size: 13px;
    color: var(--gray);
    display: flex;
    align-items: center;
    gap: 6px;
}

.security-info {
    margin-top: 25px;
    padding-top: 25px;
    border-top: 1px solid var(--light-gray);
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.security-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--gray);
    font-size: 14px;
}

.security-item i {
    color: var(--primary);
}

/* Steps */
.security-steps {
    margin-top: 60px;
    text-align: center;
}

.steps-title {
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: var(--white);
    margin-bottom: 40px;
}

.steps-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    max-width: 900px;
    margin: 0 auto;
}

.step {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
    position: relative;
}

.step-number {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 24px;
    font-weight: 700;
    margin: 0 auto 20px;
}

.step-content h4 {
    color: var(--white);
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
}

.step-content p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
}

@media (max-width: 768px) {
    .steps-container {
        grid-template-columns: 1fr;
    }
    
    .security-info {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
}
</style>
@endsection