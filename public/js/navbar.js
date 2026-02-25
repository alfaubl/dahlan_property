// ===== NAVBAR JS =====

document.addEventListener('DOMContentLoaded', function() {
    initActiveLinks();
    initUserMenu();
});

/**
 * Initialize active state for navigation links
 */
function initActiveLinks() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        
        if (href === currentPath || 
            (currentPath.startsWith(href) && href !== '/')) {
            link.classList.add('active');
        }
    });
}

/**
 * Initialize user menu interactions
 */
function initUserMenu() {
    const userMenu = document.querySelector('.user-menu');
    
    if (userMenu) {
        userMenu.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.nextElementSibling;
            
            if (dropdown) {
                dropdown.style.opacity = '1';
                dropdown.style.visibility = 'visible';
            }
        });
    }
}