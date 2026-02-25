// ===== ANIMATIONS JS =====

document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initHoverAnimations();
});

/**
 * Initialize scroll-based animations
 */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slideIn');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    animatedElements.forEach(el => observer.observe(el));
}

/**
 * Initialize hover animations
 */
function initHoverAnimations() {
    const cards = document.querySelectorAll('.stat-card, .property-card, .chart-card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hover-lift');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hover-lift');
        });
    });
}

/**
 * Add parallax effect to background
 */
function initParallax() {
    window.addEventListener('scroll', function() {
        const scrollY = window.scrollY;
        const background = document.querySelector('body');
        
        if (background) {
            background.style.backgroundPosition = `center ${scrollY * 0.5}px`;
        }
    });
}