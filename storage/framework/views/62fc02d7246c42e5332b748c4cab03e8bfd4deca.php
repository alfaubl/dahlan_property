<style>
/* ========== PROPERTIES INDEX PAGE STYLES ========== */
.hero-properties {
    background: linear-gradient(135deg, #1e2b3c 0%, #2c3e50 100%);
    padding: 60px 0;
    color: white;
    position: relative;
}

.hero-properties h1 {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.hero-properties .lead {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto 2rem;
}

/* Search Box */
.search-box {
    background: white;
    border-radius: 60px;
    padding: 8px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.search-box .form-control,
.search-box .form-select {
    border: none;
    border-radius: 50px;
    padding: 14px 22px;
    background: #f8fafc;
    font-size: 0.95rem;
    border: 2px solid transparent;
    transition: all 0.2s ease;
}

.search-box .form-control:focus,
.search-box .form-select:focus {
    border-color: #4a6fa5;
    background: white;
    box-shadow: none;
    outline: none;
}

.search-box .btn-search {
    border-radius: 50px;
    padding: 14px 35px;
    background: #4a6fa5;
    color: white;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
    font-size: 1rem;
    white-space: nowrap;
}

.search-box .btn-search:hover {
    background: #2c3e50;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(44, 62, 80, 0.3);
}

/* Filter Sidebar */
.filter-sidebar {
    background: white;
    border-radius: 24px;
    padding: 30px 25px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
    position: sticky;
    top: 100px;
    border: 1px solid #eef2f6;
}

.filter-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #eef2f6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.filter-title i {
    color: #4a6fa5;
}

.filter-group {
    margin-bottom: 25px;
}

.filter-label {
    font-weight: 600;
    margin-bottom: 12px;
    color: #2c3e50;
    font-size: 0.95rem;
}

.filter-group .form-select,
.filter-group .form-control {
    border: 2px solid #e9ecef;
    border-radius: 50px;
    padding: 12px 18px;
    font-size: 0.95rem;
    transition: all 0.2s ease;
}

.filter-group .form-select:focus,
.filter-group .form-control:focus {
    border-color: #4a6fa5;
    box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.1);
    outline: none;
}

.btn-outline-primary {
    border: 2px solid #4a6fa5;
    color: #4a6fa5;
    border-radius: 50px;
    padding: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: #4a6fa5;
    color: white;
    border-color: #4a6fa5;
}

/* Property Cards */
.property-card {
    border: none;
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.02);
    height: 100%;
    background: white;
    border: 1px solid #f0f4f8;
}

.property-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 50px rgba(74, 111, 165, 0.12);
    border-color: transparent;
}

.property-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.property-card:hover .property-image img {
    transform: scale(1.1);
}

.property-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #4a6fa5;
    color: white;
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.property-type {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(5px);
    color: #2c3e50;
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 0.8rem;
    font-weight: 600;
    z-index: 2;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.property-card .card-body {
    padding: 20px;
}

.property-price {
    font-size: 1.6rem;
    font-weight: 700;
    color: #4a6fa5;
    margin-bottom: 8px;
    line-height: 1.2;
}

.property-price small {
    font-size: 0.8rem;
    color: #6c757d;
    font-weight: 500;
    margin-left: 5px;
}

.property-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: #2c3e50;
    line-height: 1.4;
}

.property-address {
    color: #6c7a8a;
    font-size: 0.9rem;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.property-address i {
    color: #4a6fa5;
    font-size: 0.9rem;
}

.property-features {
    display: flex;
    gap: 20px;
    padding-top: 15px;
    border-top: 1px solid #edf2f7;
    margin-top: 5px;
}

.property-feature {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    color: #6c7a8a;
}

.property-feature i {
    color: #4a6fa5;
    font-size: 0.9rem;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 30px;
    border: 2px dashed #e9ecef;
}

.empty-state i {
    font-size: 5rem;
    color: #d0ddee;
    margin-bottom: 25px;
}

.empty-state h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.empty-state p {
    color: #6c7a8a;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.empty-state .btn-primary {
    background: #4a6fa5;
    border: none;
    border-radius: 50px;
    padding: 15px 40px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.empty-state .btn-primary:hover {
    background: #2c3e50;
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(44, 62, 80, 0.2);
}

/* Results Header */
.results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.results-header h5 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    background: #f8fafc;
    padding: 8px 20px;
    border-radius: 40px;
    border: 1px solid #e9ecef;
}

.results-header .text-muted {
    color: #6c7a8a;
    background: #f8fafc;
    padding: 8px 20px;
    border-radius: 40px;
    border: 1px solid #e9ecef;
}

/* Pagination */
.pagination {
    justify-content: center;
    margin-top: 50px;
    gap: 5px;
}

.page-link {
    border: none;
    margin: 0;
    border-radius: 12px !important;
    color: #2c3e50;
    padding: 12px 20px;
    font-weight: 600;
    transition: all 0.2s ease;
    background: white;
    border: 1px solid #e9ecef;
}

.page-item.active .page-link {
    background: #4a6fa5;
    color: white;
    border-color: #4a6fa5;
}

.page-link:hover {
    background: #f8fafc;
    color: #4a6fa5;
    border-color: #4a6fa5;
}

.page-item.disabled .page-link {
    background: #f8fafc;
    color: #a0b8cc;
    border-color: #e9ecef;
}

/* Responsive */
@media (max-width: 991.98px) {
    .hero-properties h1 {
        font-size: 2.2rem;
    }
    
    .filter-sidebar {
        position: static;
        margin-bottom: 30px;
    }
    
    .search-box {
        border-radius: 30px;
    }
    
    .search-box .btn-search {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .hero-properties {
        padding: 40px 0;
    }
    
    .hero-properties h1 {
        font-size: 1.8rem;
    }
    
    .hero-properties .lead {
        font-size: 1rem;
    }
    
    .search-box {
        flex-direction: column;
        background: transparent;
        box-shadow: none;
        padding: 0;
    }
    
    .search-box .form-control,
    .search-box .form-select,
    .search-box .btn-search {
        width: 100%;
        border-radius: 30px;
    }
    
    .property-image {
        height: 180px;
    }
    
    .property-price {
        font-size: 1.3rem;
    }
    
    .empty-state {
        padding: 50px 20px;
    }
    
    .empty-state h3 {
        font-size: 1.5rem;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/properties-index-css.blade.php ENDPATH**/ ?>