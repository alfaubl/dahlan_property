@extends('layouts.app')

@section('title', 'Manajemen Properti - Dahlan Property')

@section('content')
<div class="properties-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <i class="fas fa-building"></i>
                Manajemen Properti
            </h1>
            <p class="page-subtitle">Kelola semua properti Anda di satu tempat</p>
        </div>
        <div class="header-actions">
            <button class="btn-primary btn-with-icon">
                <i class="fas fa-plus"></i>
                <span>Tambah Properti</span>
            </button>
            <button class="btn-secondary btn-with-icon">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </button>
            <button class="btn-outline btn-with-icon">
                <i class="fas fa-download"></i>
                <span>Ekspor</span>
            </button>
        </div>
    </div>

    <!-- Properties Stats -->
    <div class="properties-stats">
        <div class="stat-item">
            <div class="stat-icon total">
                <i class="fas fa-layer-group"></i>
            </div>
            <div class="stat-info">
                <h3>24</h3>
                <p>Total Properti</p>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon occupied">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>18</h3>
                <p>Terisi</p>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon available">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3>4</h3>
                <p>Tersedia</p>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon maintenance">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stat-info">
                <h3>2</h3>
                <p>Perbaikan</p>
            </div>
        </div>
    </div>

    <!-- Properties Table -->
    <div class="properties-table-container">
        <div class="table-header">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari properti..." class="search-input">
            </div>
            <div class="table-actions">
                <select class="select-input">
                    <option>Semua Tipe</option>
                    <option>Residensial</option>
                    <option>Komersial</option>
                    <option>Gudang</option>
                </select>
                <select class="select-input">
                    <option>Semua Status</option>
                    <option>Terisi</option>
                    <option>Tersedia</option>
                    <option>Perbaikan</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="properties-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="table-checkbox">
                        </th>
                        <th>Nama Properti</th>
                        <th>Tipe</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Harga Sewa</th>
                        <th>Penyewa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="table-checkbox"></td>
                        <td>
                            <div class="property-cell">
                                <div class="property-avatar" style="background: #4a6fa5;">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="property-info">
                                    <strong>Apartemen Menteng</strong>
                                    <small>ID: PROP-001</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-residential">Residensial</span></td>
                        <td>Menteng, Jakarta</td>
                        <td><span class="status-badge occupied">Terisi</span></td>
                        <td><strong>Rp 15,000,000</strong>/bulan</td>
                        <td>
                            <div class="tenant-info">
                                <div class="tenant-avatar">JD</div>
                                <span>John Doe</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="table-checkbox"></td>
                        <td>
                            <div class="property-cell">
                                <div class="property-avatar" style="background: #10b981;">
                                    <i class="fas fa-warehouse"></i>
                                </div>
                                <div class="property-info">
                                    <strong>Gudang Cibitung</strong>
                                    <small>ID: PROP-002</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-warehouse">Gudang</span></td>
                        <td>Cibitung, Bekasi</td>
                        <td><span class="status-badge available">Tersedia</span></td>
                        <td><strong>Rp 85,000,000</strong>/bulan</td>
                        <td>-</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="table-checkbox"></td>
                        <td>
                            <div class="property-cell">
                                <div class="property-avatar" style="background: #8b5cf6;">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div class="property-info">
                                    <strong>Ruko BSD</strong>
                                    <small>ID: PROP-003</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-commercial">Komersial</span></td>
                        <td>BSD City, Tangerang</td>
                        <td><span class="status-badge maintenance">Perbaikan</span></td>
                        <td><strong>Rp 25,000,000</strong>/bulan</td>
                        <td>
                            <div class="tenant-info">
                                <div class="tenant-avatar">MJ</div>
                                <span>PT. Maju Jaya</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="table-checkbox"></td>
                        <td>
                            <div class="property-cell">
                                <div class="property-avatar" style="background: #f59e0b;">
                                    <i class="fas fa-hotel"></i>
                                </div>
                                <div class="property-info">
                                    <strong>Villa Puncak</strong>
                                    <small>ID: PROP-004</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-vacation">Liburan</span></td>
                        <td>Puncak, Bogor</td>
                        <td><span class="status-badge occupied">Terisi</span></td>
                        <td><strong>Rp 8,000,000</strong>/malam</td>
                        <td>
                            <div class="tenant-info">
                                <div class="tenant-avatar">SR</div>
                                <span>Sarah Rose</span>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="table-footer">
            <div class="table-info">
                Menampilkan 1-4 dari 24 properti
            </div>
            <div class="pagination">
                <button class="pagination-btn disabled">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="pagination-btn active">1</button>
                <button class="pagination-btn">2</button>
                <button class="pagination-btn">3</button>
                <button class="pagination-btn">4</button>
                <button class="pagination-btn">5</button>
                <button class="pagination-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Properties Management Styles */
.properties-container {
    padding: 30px 0;
}

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    flex-wrap: wrap;
    gap: 20px;
}

.page-title {
    font-family: 'Poppins', sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: var(--dark);
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}

.page-subtitle {
    color: var(--gray);
    font-size: 16px;
}

.header-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn-with-icon {
    padding: 12px 20px;
    border-radius: var(--radius-md);
    font-weight: 600;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    font-size: 14px;
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

.btn-outline {
    background: white;
    color: var(--dark);
    border: 2px solid var(--light-gray);
}

.btn-with-icon:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Properties Stats */
.properties-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.properties-stats .stat-item {
    background: white;
    border-radius: var(--radius-lg);
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--light-gray);
}

.properties-stats .stat-icon {
    width: 60px;
    height: 60px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    flex-shrink: 0;
}

.properties-stats .stat-icon.total {
    background: linear-gradient(45deg, #4a6fa5, #166088);
}

.properties-stats .stat-icon.occupied {
    background: linear-gradient(45deg, #10b981, #059669);
}

.properties-stats .stat-icon.available {
    background: linear-gradient(45deg, #3b82f6, #1d4ed8);
}

.properties-stats .stat-icon.maintenance {
    background: linear-gradient(45deg, #f59e0b, #d97706);
}

.properties-stats .stat-info h3 {
    font-size: 32px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 5px;
}

.properties-stats .stat-info p {
    color: var(--gray);
    font-size: 14px;
}

/* Table Container */
.properties-table-container {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--light-gray);
    overflow: hidden;
}

.table-header {
    padding: 20px;
    border-bottom: 1px solid var(--light-gray);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.search-box {
    flex: 1;
    min-width: 300px;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray);
}

.search-input {
    width: 100%;
    padding: 12px 20px 12px 45px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-md);
    font-size: 14px;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
}

.table-actions {
    display: flex;
    gap: 10px;
}

.select-input {
    padding: 10px 15px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-md);
    font-size: 14px;
    color: var(--dark);
    background: white;
    min-width: 150px;
}

.select-input:focus {
    outline: none;
    border-color: var(--primary);
}

/* Table */
.table-responsive {
    overflow-x: auto;
}

.properties-table {
    width: 100%;
    border-collapse: collapse;
}

.properties-table thead {
    background: var(--primary-soft);
}

.properties-table th {
    padding: 15px 20px;
    text-align: left;
    font-weight: 600;
    color: var(--dark);
    border-bottom: 2px solid var(--light-gray);
    white-space: nowrap;
}

.properties-table td {
    padding: 15px 20px;
    border-bottom: 1px solid var(--light-gray);
    vertical-align: middle;
}

.properties-table tbody tr:hover {
    background: var(--primary-soft);
}

.table-checkbox {
    width: 18px;
    height: 18px;
    cursor: pointer;
}

/* Property Cell */
.property-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.property-avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    flex-shrink: 0;
}

.property-info {
    display: flex;
    flex-direction: column;
}

.property-info strong {
    color: var(--dark);
    font-weight: 600;
}

.property-info small {
    color: var(--gray);
    font-size: 12px;
}

/* Badges */
.badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
}

.badge-residential {
    background: #e0e7ff;
    color: #4a6fa5;
}

.badge-commercial {
    background: #f3e8ff;
    color: #8b5cf6;
}

.badge-warehouse {
    background: #dcfce7;
    color: #10b981;
}

.badge-vacation {
    background: #fef3c7;
    color: #f59e0b;
}

.status-badge {
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
}

.status-badge.occupied {
    background: #dcfce7;
    color: #10b981;
}

.status-badge.available {
    background: #dbeafe;
    color: #3b82f6;
}

.status-badge.maintenance {
    background: #fef3c7;
    color: #f59e0b;
}

/* Tenant Info */
.tenant-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.tenant-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
    flex-shrink: 0;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-sm);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    color: white;
    font-size: 12px;
}

.action-btn.view {
    background: #4a6fa5;
}

.action-btn.edit {
    background: #10b981;
}

.action-btn.delete {
    background: #ef4444;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

/* Table Footer */
.table-footer {
    padding: 20px;
    border-top: 1px solid var(--light-gray);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.table-info {
    color: var(--gray);
    font-size: 14px;
}

.pagination {
    display: flex;
    gap: 5px;
}

.pagination-btn {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    border: 2px solid var(--light-gray);
    background: white;
    color: var(--dark);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-size: 14px;
    font-weight: 600;
}

.pagination-btn:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.pagination-btn.active {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.pagination-btn.disabled {
    background: var(--light-bg);
    color: var(--gray);
    cursor: not-allowed;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .header-actions {
        width: 100%;
    }
    
    .btn-with-icon {
        flex: 1;
        justify-content: center;
    }
    
    .properties-stats {
        grid-template-columns: 1fr 1fr;
    }
    
    .table-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box {
        min-width: 100%;
    }
    
    .table-actions {
        width: 100%;
    }
    
    .select-input {
        flex: 1;
    }
    
    .table-footer {
        flex-direction: column;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .properties-stats {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection