<section class="features" id="features">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Mengapa Memilih Kami</span>
            <h2 class="section-title">Fitur Unggulan</h2>
            <p class="section-description">
                Semua yang Anda butuhkan untuk mengelola bisnis properti dan perabotan dengan efisien
            </p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Analitik Cerdas</h3>
                <p class="feature-description">
                    Wawasan real-time dan analitik prediktif untuk mengoptimalkan portofolio properti
                    dan memaksimalkan ROI dengan rekomendasi cerdas.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h3 class="feature-title">Otomatisasi Pintar</h3>
                <p class="feature-description">
                    Pelacakan inventori otomatis, manajemen pemesanan, dan pemrosesan pembayaran
                    untuk menghemat waktu dan mengurangi kesalahan manual.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="feature-title">Mobile First</h3>
                <p class="feature-description">
                    Desain responsif lengkap dengan pengalaman aplikasi native. Kelola bisnis
                    Anda di mana saja dengan platform yang dioptimalkan untuk mobile.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Keamanan Enterprise</h3>
                <p class="feature-description">
                    Keamanan level bank dengan enkripsi end-to-end, autentikasi multi-faktor,
                    dan audit keamanan rutin untuk melindungi data Anda.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="feature-title">Sinkronisasi Real-time</h3>
                <p class="feature-description">
                    Sinkronisasi instan di semua perangkat dan platform. Perubahan yang dibuat
                    pada satu perangkat langsung tercermin di mana saja.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">Dukungan 24/7</h3>
                <p class="feature-description">
                    Dukungan pelanggan 24/7 via chat, email, dan telepon. Tim ahli kami
                    selalu siap membantu Anda sukses.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
/* Features Section */
.features {
    padding: 100px 0;
    background: var(--white);
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-subtitle {
    display: inline-block;
    background: var(--gradient-primary);
    color: var(--white);
    padding: 8px 24px;
    border-radius: 50px;
    font-weight: 600;
    margin-bottom: 20px;
}

.section-title {
    font-family: 'Poppins', sans-serif;
    font-size: 42px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 20px;
}

.section-description {
    color: var(--gray);
    font-size: 16px;
    max-width: 600px;
    margin: 0 auto;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.feature-card {
    background: var(--white);
    padding: 40px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border: 1px solid var(--light-gray);
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: var(--primary);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: var(--gradient-primary);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    font-size: 32px;
    color: var(--white);
}

.feature-title {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 16px;
    color: var(--dark);
}

.feature-description {
    color: var(--gray);
    line-height: 1.7;
}

/* Responsive */
@media (max-width: 1024px) {
    .section-title {
        font-size: 36px;
    }
}

@media (max-width: 480px) {
    .section-title {
        font-size: 28px;
    }
    
    .feature-card {
        padding: 30px 20px;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/components/sections/features.blade.php ENDPATH**/ ?>