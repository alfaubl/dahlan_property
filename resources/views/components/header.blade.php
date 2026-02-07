<header id="header">
    <div class="container">
        <div class="header-container">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-image">
                    <img src="{{ asset('assets/logo dahlan_property 2.png') }}" alt="Dahlan Property">
                </div>
                <div class="logo-text">DahlanProperty</div>
            </a>

            <!-- Navigation -->
            <nav class="nav-links">
                <a href="#features" class="nav-link active">Fitur</a>
                <a href="#property" class="nav-link">Properti</a>
                <a href="#about" class="nav-link">Tentang</a>
                <a href="#contact" class="nav-link">Kontak</a>
            </nav>

            <!-- Auth Buttons -->
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn-auth btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </a>
                <a href="{{ route('register') }}" class="btn-auth btn-register">
                    <i class="fas fa-user-plus"></i> Daftar
                </a>
            </div>
        </div>
    </div>
</header>

<style>
/* Header Styles */
header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    padding: 20px 0;
    background: var(--white);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

header.scrolled {
    padding: 12px 0;
    box-shadow: var(--shadow-md);
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo */
.logo {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
}

.logo-image {
    width: 70px;
    height: 70px;
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.logo-image img {
    width: 110%;
    height: 110%;
    object-fit: cover;
    transform: scale(1.1);
}

.logo-text {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 28px;
    color: var(--primary);
}

/* Navigation */
.nav-links {
    display: flex;
    gap: 8px;
    align-items: center;
}

.nav-link {
    padding: 12px 24px;
    text-decoration: none;
    color: var(--dark);
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.nav-link:hover {
    background: var(--primary);
    color: var(--white);
    transform: translateY(-2px);
}

.nav-link.active {
    background: var(--primary);
    color: var(--white);
}

/* Auth Buttons */
.auth-buttons {
    display: flex;
    gap: 16px;
    align-items: center;
}

.btn-auth {
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-login {
    background: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-register {
    background: var(--primary);
    color: var(--white);
    box-shadow: var(--shadow-md);
}

.btn-login:hover {
    background: var(--primary);
    color: var(--white);
    transform: translateY(-2px);
}

.btn-register:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Responsive */
@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        gap: 20px;
    }
    
    .nav-links {
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .logo-text {
        font-size: 20px;
    }
}
</style>