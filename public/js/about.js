// public/js/about.js

document.addEventListener('DOMContentLoaded', function() {
    initCounterAnimation();
    initTeamCards();
    initTimelineAnimation();
    initScrollAnimations();
});

/**
 * Initialize counter animation for stats
 */
function initCounterAnimation() {
    const statValues = document.querySelectorAll('.stat-value');
    
    if (statValues.length && typeof PureCounter !== 'undefined') {
        new PureCounter({
            selector: '.stat-value',
            start: 0,
            duration: 2,
            once: true,
            pulse: true
        });
    } else {
        // Fallback manual animation
        statValues.forEach(stat => {
            const target = parseInt(stat.innerText.replace(/[^0-9]/g, ''));
            animateValue(stat, 0, target, 2000);
        });
    }
}

/**
 * Initialize team cards with hover effects
 */
function initTeamCards() {
    const teamCards = document.querySelectorAll('.team-card');
    
    teamCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('soft-shadow-hover');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('soft-shadow-hover');
        });
        
        // Social links click handler
        const socialLinks = card.querySelectorAll('.social-link');
        socialLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.stopPropagation();
                // Social link handling
                const platform = this.href.includes('linkedin') ? 'LinkedIn' :
                                this.href.includes('twitter') ? 'Twitter' : 'Email';
                showNotification('info', `Membuka ${platform}`);
            });
        });
    });
}

/**
 * Initialize timeline animation on scroll
 */
function initTimelineAnimation() {
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                }, index * 200);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5,
        rootMargin: '0px'
    });
    
    timelineItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(item);
    });
}

/**
 * Initialize scroll animations
 */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.mission-card, .vision-card, .value-card, .team-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px'
    });
    
    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(element);
    });
}

/**
 * Animate number value
 */
function animateValue(element, start, end, duration) {
    const range = end - start;
    const increment = range / (duration / 10);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
            current = end;
            clearInterval(timer);
        }
        element.innerText = Math.floor(current).toLocaleString('id-ID');
    }, 10);
}

/**
 * Show notification
 */
function showNotification(type, message) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Export functions
window.initCounterAnimation = initCounterAnimation;
window.showNotification = showNotification;