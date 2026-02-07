<section class="hero" id="home">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-star"></i>
                <span>Platform Manajemen Properti #1</span>
            </div>

            <h1 class="hero-title">
                Revolusi Bisnis<br>
                <span style="color: #e8f0fa;">Properti Anda</span>
            </h1>

            <p class="hero-subtitle">
                Platform all-in-one untuk manajemen properti, inventori perabotan,
                dan transaksi tanpa hambatan. Analitik real-time, workflow otomatis,
                dan wawasan cerdas untuk mengembangkan bisnis Anda.
            </p>

            <div class="hero-actions">
                <a href="{{ route('register') }}" class="btn-hero btn-hero-primary">
                    <i class="fas fa-rocket"></i> Mulai Gratis
                </a>
                <a href="#features" class="btn-hero btn-hero-secondary">
                    <i class="fas fa-play-circle"></i> Lihat Demo
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number" data-count="500">0</span>
                    <span class="stat-label">Properti Terkelola</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-count="1200">0</span>
                    <span class="stat-label">Item Perabotan</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-count="98">0</span>
                    <span class="stat-label">% Kepuasan</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    padding-top: 100px;
    overflow: hidden;
    padding-bottom: 80px;
}

.hero::after {
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

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-primary);
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    z-index: -2;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 50px;
    margin-bottom: 32px;
    color: var(--white);
    font-weight: 600;
}

.hero-title {
    font-family: 'Poppins', sans-serif;
    font-size: 56px;
    font-weight: 800;
    line-height: 1.1;
    color: var(--white);
    margin-bottom: 24px;
}

.hero-subtitle {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 48px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

/* Hero Buttons */
.hero-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 60px;
}

.btn-hero {
    padding: 18px 36px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 12px;
}

.btn-hero-primary {
    background: var(--white);
    color: var(--primary);
    box-shadow: var(--shadow-xl);
}

.btn-hero-secondary {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    color: var(--white);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.btn-hero-primary:hover {
    transform: translateY(-4px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
}

.btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-4px);
}

/* Stats */
.hero-stats {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-top: 80px;
    flex-wrap: wrap;
    position: relative;
    z-index: 2;
    margin-bottom: 40px;
}

.stat-item {
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 20px 30px;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    min-width: 180px;
}

.stat-number {
    font-size: 42px;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 8px;
    display: block;
}

.stat-label {
    color: rgba(255, 255, 255, 0.8);
    font-weight: 600;
}

/* Responsive */
@media (max-width: 1024px) {
    .hero-title {
        font-size: 48px;
    }
}

@media (max-width: 768px) {
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-hero {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
    
    .hero-stats {
        gap: 30px;
    }
    
    .stat-number {
        font-size: 36px;
    }
    
    .hero::after {
        height: 60px;
        clip-path: polygon(0 40%, 100% 0, 100% 100%, 0 100%);
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 36px;
    }
    
    .hero::after {
        height: 50px;
        clip-path: polygon(0 30%, 100% 0, 100% 100%, 0 100%);
    }
}
</style>