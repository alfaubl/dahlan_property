@extends('layouts.app')

@section('title', 'Dashboard - Dahlan Property')

@section('content')
<div class="dashboard-container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="header-content">
            <h1 class="dashboard-title">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </h1>
            <p class="dashboard-subtitle">Selamat datang, <strong>Admin</strong>! Terakhir login: 2 jam yang lalu</p>
        </div>
        <div class="header-actions">
            <button class="btn-dashboard btn-primary">
                <i class="fas fa-plus"></i> Properti Baru
            </button>
            <button class="btn-dashboard btn-secondary">
                <i class="fas fa-download"></i> Ekspor Laporan
            </button>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(45deg, #4a6fa5, #166088);">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-value">24</h3>
                <p class="stat-label">Properti Aktif</p>
                <span class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i> 12% dari bulan lalu
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(45deg, #10b981, #059669);">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-value">Rp 850<small>Jt</small></h3>
                <p class="stat-label">Pendapatan Bulanan</p>
                <span class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i> 8% dari bulan lalu
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(45deg, #8b5cf6, #7c3aed);">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-value">156</h3>
                <p class="stat-label">Penyewa Aktif</p>
                <span class="stat-trend positive">
                    <i class="fas fa-arrow-up"></i> 5% dari bulan lalu
                </span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(45deg, #f59e0b, #d97706);">
                <i class="fas fa-couch"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-value">892</h3>
                <p class="stat-label">Item Perabotan</p>
                <span class="stat-trend negative">
                    <i class="fas fa-arrow-down"></i> 3% dari bulan lalu
                </span>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Activity -->
    <div class="dashboard-grid">
        <!-- Quick Actions -->
        <div class="grid-card quick-actions-card">
            <div class="card-header">
                <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="actions-grid">
                    <a href="#" class="action-item">
                        <div class="action-icon" style="background: #4a6fa5;">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="action-info">
                            <h4>Tambah Properti</h4>
                            <p>Tambah properti baru ke sistem</p>
                        </div>
                    </a>
                    <a href="#" class="action-item">
                        <div class="action-icon" style="background: #10b981;">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="action-info">
                            <h4>Buat Invoice</h4>
                            <p>Generate invoice untuk penyewa</p>
                        </div>
                    </a>
                    <a href="#" class="action-item">
                        <div class="action-icon" style="background: #8b5cf6;">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="action-info">
                            <h4>Maintenance</h4>
                            <p>Ajukan request perbaikan</p>
                        </div>
                    </a>
                    <a href="#" class="action-item">
                        <div class="action-icon" style="background: #f59e0b;">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="action-info">
                            <h4>Laporan</h4>
                            <p>Generate laporan bulanan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid-card activity-card">
            <div class="card-header">
                <h3><i class="fas fa-history"></i> Aktivitas Terbaru</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Pembayaran Diterima</h4>
                            <p>Rp 15,000,000 dari Apartemen Menteng</p>
                            <span class="activity-time">10 menit yang lalu</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Maintenance Request</h4>
                            <p>AC rusak di Villa Puncak</p>
                            <span class="activity-time">1 jam yang lalu</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon info">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Penyewa Baru</h4>
                            <p>PT. Maju Jaya menyewa Ruko BSD</p>
                            <span class="activity-time">3 jam yang lalu</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon primary">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Properti Ditambahkan</h4>
                            <p>Apartemen Sudirman Tower ditambahkan</p>
                            <span class="activity-time">1 hari yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties Overview -->
    <div class="dashboard-section">
        <div class="section-header">
            <h2><i class="fas fa-building"></i> Properti Anda</h2>
            <a href="#" class="section-link">Lihat Semua Properti</a>
        </div>
        
        <div class="properties-grid">
            <div class="property-card">
                <div class="property-image" style="background: linear-gradient(45deg, #4a6fa5, #166088);">
                    <span class="property-badge occupied">Terisi</span>
                    <i class="fas fa-home"></i>
                </div>
                <div class="property-content">
                    <h3>Apartemen Menteng</h3>
                    <p class="property-location">
                        <i class="fas fa-map-marker-alt"></i> Menteng, Jakarta
                    </p>
                    <div class="property-stats">
                        <div class="stat">
                            <i class="fas fa-bed"></i>
                            <span>3 Kamar</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-ruler-combined"></i>
                            <span>120 m²</span>
                        </div>
                    </div>
                    <div class="property-rent">
                        <strong>Rp 15,000,000</strong>
                        <span>/ bulan</span>
                    </div>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image" style="background: linear-gradient(45deg, #10b981, #059669);">
                    <span class="property-badge available">Tersedia</span>
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="property-content">
                    <h3>Gudang Cibitung</h3>
                    <p class="property-location">
                        <i class="fas fa-map-marker-alt"></i> Cibitung, Bekasi
                    </p>
                    <div class="property-stats">
                        <div class="stat">
                            <i class="fas fa-pallet"></i>
                            <span>500 m²</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-truck-loading"></i>
                            <span>Dock 2</span>
                        </div>
                    </div>
                    <div class="property-rent">
                        <strong>Rp 85,000,000</strong>
                        <span>/ bulan</span>
                    </div>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image" style="background: linear-gradient(45deg, #8b5cf6, #7c3aed);">
                    <span class="property-badge maintenance">Perbaikan</span>
                    <i class="fas fa-store"></i>
                </div>
                <div class="property-content">
                    <h3>Ruko BSD</h3>
                    <p class="property-location">
                        <i class="fas fa-map-marker-alt"></i> BSD City, Tangerang
                    </p>
                    <div class="property-stats">
                        <div class="stat">
                            <i class="fas fa-door-open"></i>
                            <span>2 Lantai</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-ruler-combined"></i>
                            <span>200 m²</span>
                        </div>
                    </div>
                    <div class="property-rent">
                        <strong>Rp 25,000,000</strong>
                        <span>/ bulan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Styles */
.dashboard-container {
    padding: 30px 0;
}

/* Dashboard Header */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
    gap: 20px;
}

.header-content .dashboard-title {
    font-family: 'Poppins', sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}

.header-content .dashboard-subtitle {
    color: var(--gray);
    font-size: 16px;
}

.header-actions {
    display: flex;
    gap: 15px;
}

.btn-dashboard {
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: var(--gradient-primary);
    color: white;
}

.btn-secondary {
    background: white;
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-dashboard:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Stats Overview */
.stats-overview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.stat-card {
    background: white;
    border-radius: var(--radius-lg);
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border: 1px solid var(--light-gray);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.stat-icon {
    width: 70px;
    height: 70px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: white;
    flex-shrink: 0;
}

.stat-info {
    flex: 1;
}

.stat-value {
    font-size: 36px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 5px;
}

.stat-value small {
    font-size: 20px;
}

.stat-label {
    color: var(--gray);
    font-size: 14px;
    margin-bottom: 8px;
}

.stat-trend {
    font-size: 12px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
}

.stat-trend.positive {
    color: #10b981;
}

.stat-trend.negative {
    color: #ef4444;
}

/* Dashboard Grid */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.grid-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    border: 1px solid var(--light-gray);
}

.card-header {
    padding: 20px 25px;
    border-bottom: 1px solid var(--light-gray);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.card-link:hover {
    text-decoration: underline;
}

.card-body {
    padding: 25px;
}

/* Quick Actions */
.actions-grid {
    display: grid;
    gap: 15px;
}

.action-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: var(--radius-md);
    text-decoration: none;
    color: var(--dark);
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.action-item:hover {
    background: var(--primary-soft);
    border-color: var(--primary);
    transform: translateX(5px);
}

.action-icon {
    width: 50px;
    height: 50px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    flex-shrink: 0;
}

.action-info h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 4px;
}

.action-info p {
    color: var(--gray);
    font-size: 13px;
}

/* Activity List */
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.activity-item {
    display: flex;
    gap: 15px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--light-gray);
}

.activity-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.activity-icon.success {
    background: #dcfce7;
    color: #10b981;
}

.activity-icon.warning {
    background: #fef3c7;
    color: #f59e0b;
}

.activity-icon.info {
    background: #e0e7ff;
    color: #4a6fa5;
}

.activity-icon.primary {
    background: var(--primary-soft);
    color: var(--primary);
}

.activity-content {
    flex: 1;
}

.activity-content h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 4px;
    color: var(--dark);
}

.activity-content p {
    color: var(--gray);
    font-size: 14px;
    margin-bottom: 4px;
}

.activity-time {
    font-size: 12px;
    color: var(--gray);
}

/* Properties Section */
.dashboard-section {
    margin-top: 40px;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.section-header h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 24px;
    font-weight: 700;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.section-link:hover {
    text-decoration: underline;
}

.properties-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.property-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border: 1px solid var(--light-gray);
}

.property-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.property-image {
    height: 150px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 48px;
}

.property-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    color: white;
}

.property-badge.occupied {
    background: #10b981;
}

.property-badge.available {
    background: #3b82f6;
}

.property-badge.maintenance {
    background: #f59e0b;
}

.property-content {
    padding: 20px;
}

.property-content h3 {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 10px;
}

.property-location {
    color: var(--gray);
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 15px;
}

.property-stats {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}

.property-stats .stat {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--gray);
    font-size: 14px;
}

.property-rent {
    display: flex;
    align-items: baseline;
    gap: 5px;
    font-size: 18px;
}

.property-rent strong {
    color: var(--primary);
    font-weight: 700;
}

.property-rent span {
    color: var(--gray);
    font-size: 14px;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .header-actions {
        width: 100%;
    }
    
    .btn-dashboard {
        flex: 1;
        justify-content: center;
    }
    
    .stats-overview {
        grid-template-columns: 1fr;
    }
    
    .dashboard-grid {
        grid-template-columns: 1fr;
    }
    
    .properties-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection