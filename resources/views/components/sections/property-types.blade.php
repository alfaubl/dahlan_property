<section class="property-types" id="property">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Layanan Kami</span>
            <h2 class="section-title">Solusi Komprehensif</h2>
            <p class="section-description">
                Manajemen end-to-end untuk semua jenis properti dan perabotan
            </p>
        </div>

        <div class="types-grid">
            <div class="type-card">
                <div class="type-image">
                    <i class="fas fa-building"></i>
                </div>
                <div class="type-content">
                    <h3 class="type-title">Properti Komersial</h3>
                    <p class="type-description">
                        Ruang kantor, toko ritel, dan gedung komersial dengan
                        manajemen sewa yang canggih.
                    </p>
                </div>
            </div>

            <div class="type-card">
                <div class="type-image">
                    <i class="fas fa-home"></i>
                </div>
                <div class="type-content">
                    <h3 class="type-title">Properti Residensial</h3>
                    <p class="type-description">
                        Rumah, apartemen, dan kondominium dengan manajemen penyewa
                        dan pelacakan perawatan.
                    </p>
                </div>
            </div>

            <div class="type-card">
                <div class="type-image">
                    <i class="fas fa-couch"></i>
                </div>
                <div class="type-content">
                    <h3 class="type-title">Perabotan Premium</h3>
                    <p class="type-description">
                        Inventori perabotan berkualitas tinggi dengan pelacakan stok
                        real-time dan pemesanan ulang otomatis.
                    </p>
                </div>
            </div>

            <div class="type-card">
                <div class="type-image">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="type-content">
                    <h3 class="type-title">Manajemen Gudang</h3>
                    <p class="type-description">
                        Manajemen inventori dan gudang lengkap untuk penyimpanan
                        dan distribusi perabotan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Property Types */
.property-types {
    padding: 100px 0;
    background: var(--light-bg);
}

.types-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 60px;
}

.type-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border: 1px solid var(--light-gray);
}

.type-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
    border-color: var(--primary);
}

.type-image {
    height: 200px;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 60px;
    color: var(--white);
}

.type-content {
    padding: 30px;
}

.type-title {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--dark);
}

.type-description {
    color: var(--gray);
    font-size: 14px;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 480px) {
    .type-card {
        padding: 30px 20px;
    }
}
</style>