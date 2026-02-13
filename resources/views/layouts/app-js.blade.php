<script>
    // ========== GLOBAL JAVASCRIPT ==========

    // AOS Animation Initialization
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({ 
                duration: 800, 
                once: true 
            });
        }
    });

    // Navbar Scroll Effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (navbar) {
            navbar.classList.toggle('navbar-scrolled', window.scrollY > 50);
        }
    });

    // Form Search Loading Effect
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.querySelector('.search-form');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mencari...';
                    submitBtn.disabled = true;
                    
                    // Reset after 1.5 seconds (for demo)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 1500);
                }
            });
        }
    });

    // Dropdown Menu untuk Mobile
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelectorAll('.dropdown-toggle');
        dropdownToggle.forEach(toggle => {
            if (window.innerWidth < 992) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const menu = this.nextElementSibling;
                    menu.classList.toggle('show');
                });
            }
        });
    });
</script>