@extends('layouts.app')

@section('title', 'Reset Password - Dahlan Property')

@section('styles')
    @include('partials.css.reset-password-css')
@endsection

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
                    <i class="fas fa-lock"></i>
                    <span>Buat Password Baru</span>
                </div>
            </div>

            <!-- Auth Card -->
            <div class="auth-card">
                <div class="auth-header">
                    <h2 class="auth-title">Buat Password Baru</h2>
                    <p class="auth-subtitle">Masukkan password baru untuk akun Anda</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <strong>Tip Keamanan:</strong> Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol untuk password yang kuat.
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="auth-form" id="resetForm">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Alamat Email
                        </label>
                        <div class="input-group">
                            <input type="email" id="email" name="email" required 
                                   class="form-input" value="{{ $email ?? old('email') }}" readonly>
                            <div class="input-icon">
                                <i class="fas fa-check-circle text-success"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password Baru
                        </label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" required 
                                   class="form-input" placeholder="Minimal 8 karakter">
                            <button type="button" class="input-icon" onclick="togglePassword('password')">
                                <i class="fas fa-eye" id="togglePassword"></i>
                            </button>
                        </div>
                        
                        <!-- Password Strength Indicator -->
                        <div class="password-strength">
                            <div class="strength-bar">
                                <div class="strength-bar-fill" id="strengthBar"></div>
                            </div>
                            <span class="strength-text" id="strengthText">Kekuatan Password</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock"></i> Konfirmasi Password
                        </label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation" required 
                                   class="form-input" placeholder="Ketik ulang password">
                            <button type="button" class="input-icon" onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye" id="toggleConfirm"></i>
                            </button>
                        </div>
                        <div id="matchMessage"></div>
                    </div>

                    <!-- Password Requirements -->
                    <div class="password-requirements">
                        <div class="requirements-title">Password harus mengandung:</div>
                        <ul class="requirements-list">
                            <li id="req-length"><i class="fas fa-times-circle"></i> Minimal 8 karakter</li>
                            <li id="req-uppercase"><i class="fas fa-times-circle"></i> Huruf besar (A-Z)</li>
                            <li id="req-lowercase"><i class="fas fa-times-circle"></i> Huruf kecil (a-z)</li>
                            <li id="req-number"><i class="fas fa-times-circle"></i> Angka (0-9)</li>
                            <li id="req-special"><i class="fas fa-times-circle"></i> Simbol (!@#$%^&*)</li>
                        </ul>
                    </div>

                    <button type="submit" class="btn-auth btn-auth-primary" id="submitBtn">
                        <i class="fas fa-sync-alt"></i>
                        <span>Reset Password</span>
                    </button>

                    <div class="auth-divider">
                        <span>atau</span>
                    </div>

                    <div class="auth-footer">
                        <a href="{{ route('login') }}" class="btn-auth btn-auth-secondary">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Login</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Security Tips -->
            <div class="security-steps">
                <h3 class="steps-title">Tips Password Aman</h3>
                <div class="steps-container">
                    <div class="step">
                        <div class="step-number"><i class="fas fa-ban"></i></div>
                        <div class="step-content">
                            <h4>Jangan Pakai Data Pribadi</h4>
                            <p>Hindari tanggal lahir, nama, atau nomor telepon</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number"><i class="fas fa-random"></i></div>
                        <div class="step-content">
                            <h4>Gunakan Kombinasi Acak</h4>
                            <p>Campur huruf, angka, dan simbol secara acak</p>
                        </div>
                    </div>
                    <div class="step">
                        <div class="step-number"><i class="fas fa-history"></i></div>
                        <div class="step-content">
                            <h4>Ganti Secara Berkala</h4>
                            <p>Update password setiap 3-6 bulan sekali</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    @include('partials.js.reset-password-js')
@endsection