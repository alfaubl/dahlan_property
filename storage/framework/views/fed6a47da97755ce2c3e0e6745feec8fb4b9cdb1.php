<style>
    /* ========== GLOBAL STYLES ========== */
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0b5ed7;
        --secondary-color: #6610f2;
        --dark-color: #212529;
        --light-color: #f8f9fa;
        --gray-100: #f8f9fc;
        --gray-200: #eef2f6;
        --gray-600: #6c7a8a;
        --gray-800: #2c3e50;
    }

    body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        padding-top: 76px;
        background: var(--gray-100);
    }

    /* ========== NAVBAR ========== */
    .navbar-scrolled {
        padding: 10px 0;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand .brand-icon {
        width: 32px;
        height: 32px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .navbar-brand .brand-icon i {
        font-size: 1.1rem;
        color: white;
    }

    .navbar-brand .brand-text {
        font-size: 1.1rem;
        font-weight: 700;
    }

    .navbar-brand .brand-text-dark {
        color: var(--gray-800);
    }

    .navbar-brand .brand-text-primary {
        color: var(--primary-color);
    }

    .navbar-brand .brand-subtitle {
        font-size: 0.55rem;
        color: var(--gray-600);
        margin-top: -3px;
        letter-spacing: 0.3px;
    }

    .nav-link {
        font-size: 0.85rem;
        font-weight: 500;
        padding: 0.4rem 0.6rem;
        color: var(--gray-800);
        transition: color 0.2s ease;
    }

    .nav-link i {
        font-size: 0.75rem;
        margin-right: 4px;
    }

    .nav-link:hover {
        color: var(--primary-color);
    }

    .nav-link.active {
        color: var(--primary-color);
        font-weight: 600;
    }

    /* ========== BUTTONS ========== */
    .btn-glow {
        position: relative;
        overflow: hidden;
        border: none;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        transition: all 0.3s ease;
        color: white;
        font-weight: 600;
    }

    .btn-glow:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
        color: white;
    }

    .btn-premium {
        font-size: 0.8rem;
        font-weight: 600;
        padding: 0.35rem 1.2rem;
        border-radius: 30px;
    }

    /* ========== FOOTER ========== */
    .footer-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        margin: 30px 0;
    }

    .social-icons a {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        margin-right: 10px;
        color: white;
    }

    .social-icons a:hover {
        transform: translateY(-5px);
        background: var(--primary-color);
        color: white !important;
    }

    .hover-primary {
        transition: all 0.3s ease;
        position: relative;
        padding-left: 0;
    }

    .hover-primary:hover {
        color: var(--primary-color) !important;
        padding-left: 10px;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .navbar-nav {
            padding: 1rem 0;
        }
        
        .nav-link {
            padding: 0.6rem 1rem;
            border-radius: 8px;
        }
        
        .nav-link:hover {
            background: var(--gray-100);
        }
        
        .btn-premium {
            width: 100%;
            margin-top: 0.5rem;
        }
    }

    @media (max-width: 768px) {
        body { 
            padding-top: 66px; 
        }
    }
</style>    <?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/layouts/app-css.blade.php ENDPATH**/ ?>