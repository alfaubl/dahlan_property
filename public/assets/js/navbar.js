// ===== NAVBAR JS =====

document.addEventListener('DOMContentLoaded', function() {
    initMobileMenu();
    initDropdown();
});

/**
 * Initialize mobile menu toggle
 */
function initMobileMenu() {
    const mobileBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (!mobileBtn || !mobileMenu) return;
    
    mobileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle('active');
        
        const icon = this.querySelector('i');
        if (icon) {
            if (mobileMenu.classList.contains('active')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!mobileBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.remove('active');
            const icon = mobileBtn.querySelector('i');
            if (icon) {
                icon.className = 'fas fa-bars';
            }
        }
    });
}

/**
 * Initialize dropdown menu
 */
function initDropdown() {
    const dropdown = document.querySelector('.dropdown');
    const trigger = document.querySelector('.dropdown-trigger');
    const menu = document.querySelector('.dropdown-menu');
    
    if (!dropdown || !trigger || !menu) return;
    
    // For mobile, toggle on click
    if (window.innerWidth <= 768) {
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            menu.classList.toggle('show');
            
            const chevron = this.querySelector('.chevron');
            if (chevron) {
                chevron.style.transform = menu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                menu.classList.remove('show');
                const chevron = trigger.querySelector('.chevron');
                if (chevron) {
                    chevron.style.transform = 'rotate(0)';
                }
            }
        });
    }
}