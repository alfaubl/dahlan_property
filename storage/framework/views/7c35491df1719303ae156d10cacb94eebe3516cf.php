<style>
/* ========== WELCOME/HOMEPAGE STYLES ========== */
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-content h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.hero-content h1 .text-primary {
    color: #0d6efd !important;
}

.hero-content .lead {
    font-size: 1.1rem;
    opacity: 0.95;
    margin-bottom: 1.5rem;
}

/* Search Form */
.search-form .form-control,
.search-form .form-select {
    border-radius: 10px;
    border: 2px solid transparent;
    padding: 10px 15px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: white;
    height: auto;
}

.search-form .form-control:focus,
.search-form .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
    outline: none;
}

.search-form .btn-glow {
    background: white;
    color: #0d6efd;
    border: none;
    padding: 10px 25px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: auto;
}

.search-form .btn-glow:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
    color: #0d6efd;
}

/* Stats Counter */
.stats-counter {
    font-size: 2.2rem;
    font-weight: 700;
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
}

/* Property Cards */
.property-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.02);
    height: 100%;
    background: white;
}

.property-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 30px 50px rgba(13, 110, 253, 0.15) !important;
}

.property-card img {
    height: 200px;
    object-fit: cover;
    transition: transform 0.8s ease;
    width: 100%;
}

.property-card:hover img {
    transform: scale(1.1);
}

.property-card .position-relative {
    position: relative;
    overflow: hidden;
}

.category-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    padding: 6px 15px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.75rem;
    z-index: 3;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    letter-spacing: 0.5px;
}

.category-badge.bg-success { background: #28a745 !important; }
.category-badge.bg-info { background: #17a2b8 !important; }
.category-badge.bg-warning { background: #ffc107 !important; color: #212529 !important; }

.property-card .card-body {
    padding: 20px 15px;
}

.property-card .card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
}

.property-card .card-text {
    color: #6c7a8a;
    font-size: 0.85rem;
    margin-bottom: 12px;
}

.property-card .card-text i {
    color: #0d6efd;
    width: 16px;
}

.price-tag {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0d6efd;
}

.property-card .badge {
    background: #0d6efd !important;
    padding: 6px 12px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.75rem;
}

.property-card .card-footer {
    background: white;
    border-top: 1px solid #f1f5f9;
    padding: 12px 15px;
}

.property-card .btn-outline-primary {
    border: 2px solid #0d6efd;
    color: #0d6efd;
    border-radius: 10px;
    padding: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.property-card .btn-outline-primary:hover {
    background: #0d6efd;
    color: white;
}

/* Feature Cards */
.feature-card {
    transition: all 0.4s ease;
    border: 2px solid transparent;
    border-radius: 20px;
    background: white;
    height: 100%;
    position: relative;
    overflow: hidden;
    padding: 30px 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.feature-card:hover::before {
    transform: scaleX(1);
}

.feature-card:hover {
    transform: translateY(-8px);
    border-color: #0d6efd;
    box-shadow: 0 25px 50px rgba(13, 110, 253, 0.1) !important;
}

.feature-icon {
    transition: all 0.6s ease;
    display: inline-block;
    margin-bottom: 20px;
}

.feature-icon i {
    font-size: 2.5rem;
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.feature-card:hover .feature-icon {
    transform: scale(1.2) rotate(10deg);
}

.feature-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 12px;
}

.feature-card p {
    color: #6c7a8a;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 0;
}

/* Section Titles */
.section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.section-title .text-primary {
    color: #0d6efd !important;
}

.section-subtitle {
    font-size: 1rem;
    color: #6c7a8a;
    max-width: 600px;
    margin: 0 auto;
}

/* Button Styles */
.btn-primary.btn-glow {
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    border: none;
    border-radius: 12px;
    padding: 12px 30px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-primary.btn-glow:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(13, 110, 253, 0.3);
}

.btn-primary.btn-glow::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.btn-primary.btn-glow:hover::after {
    left: 100%;
}

/* Responsive */
@media (max-width: 991.98px) {
    .hero-content h1 {
        font-size: 2.2rem;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 60px 0;
        background-attachment: scroll;
    }
    
    .hero-content h1 {
        font-size: 1.8rem;
    }
    
    .hero-content .lead {
        font-size: 1rem;
    }
    
    .stats-counter {
        font-size: 1.8rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .feature-card {
        padding: 25px 15px;
    }
}

@media (max-width: 576px) {
    .search-form .col-md-4,
    .search-form .col-md-2 {
        width: 100%;
        margin-bottom: 8px;
    }
    
    .property-card img {
        height: 180px;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/welcome-css.blade.php ENDPATH**/ ?>