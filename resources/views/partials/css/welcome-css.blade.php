<style>
/* ========== WELCOME/HOMEPAGE STYLES ========== */
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    padding: 120px 0;
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
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.hero-content h1 .text-primary {
    color: #0d6efd !important;
}

.hero-content .lead {
    font-size: 1.25rem;
    opacity: 0.95;
    margin-bottom: 2rem;
}

/* Search Form */
.search-form .form-control,
.search-form .form-select {
    border-radius: 12px;
    border: 2px solid transparent;
    padding: 15px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
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
    padding: 15px 30px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.search-form .btn-glow:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
    color: #0d6efd;
}

/* Stats Counter */
.stats-counter {
    font-size: 2.8rem;
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
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 30px 50px rgba(13, 110, 253, 0.15) !important;
}

.property-card img {
    height: 250px;
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
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
    z-index: 3;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    letter-spacing: 0.5px;
}

.category-badge.bg-success { background: #28a745 !important; }
.category-badge.bg-info { background: #17a2b8 !important; }
.category-badge.bg-warning { background: #ffc107 !important; color: #212529 !important; }

.property-card .card-body {
    padding: 25px 20px;
}

.property-card .card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
}

.property-card .card-text {
    color: #6c7a8a;
    font-size: 0.95rem;
    margin-bottom: 15px;
}

.property-card .card-text i {
    color: #0d6efd;
    width: 18px;
}

.price-tag {
    font-size: 1.4rem;
    font-weight: 700;
    color: #0d6efd;
}

.property-card .badge {
    background: #0d6efd !important;
    padding: 8px 15px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
}

.property-card .card-footer {
    background: white;
    border-top: 1px solid #f1f5f9;
    padding: 15px 20px;
}

.property-card .btn-outline-primary {
    border: 2px solid #0d6efd;
    color: #0d6efd;
    border-radius: 12px;
    padding: 10px;
    font-weight: 600;
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
    padding: 40px 30px;
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
    transform: translateY(-12px);
    border-color: #0d6efd;
    box-shadow: 0 25px 50px rgba(13, 110, 253, 0.1) !important;
}

.feature-icon {
    transition: all 0.6s ease;
    display: inline-block;
    margin-bottom: 25px;
}

.feature-icon i {
    font-size: 3rem;
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.feature-card:hover .feature-icon {
    transform: scale(1.2) rotate(10deg);
}

.feature-card h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.feature-card p {
    color: #6c7a8a;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 0;
}

/* Floating Animation */
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.floating {
    animation: float 5s ease-in-out infinite;
}

/* Section Titles */
.section-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.section-title .text-primary {
    color: #0d6efd !important;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #6c7a8a;
    max-width: 600px;
    margin: 0 auto;
}

/* Button Styles */
.btn-primary.btn-glow {
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    border: none;
    border-radius: 15px;
    padding: 15px 40px;
    font-weight: 600;
    font-size: 1.1rem;
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
        font-size: 2.8rem;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 80px 0;
        background-attachment: scroll;
    }
    
    .hero-content h1 {
        font-size: 2.2rem;
    }
    
    .hero-content .lead {
        font-size: 1.1rem;
    }
    
    .stats-counter {
        font-size: 2.2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .feature-card {
        padding: 30px 20px;
    }
}

@media (max-width: 576px) {
    .search-form .col-md-4,
    .search-form .col-md-2 {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .property-card img {
        height: 200px;
    }
}
</style>