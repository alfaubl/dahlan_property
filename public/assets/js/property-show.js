// ===== PROPERTY SHOW JS =====

document.addEventListener('DOMContentLoaded', function() {
    console.log('Property show page loaded');
    
    // Initialize gallery
    initGallery();
    
    // Initialize agent contact
    initAgentContact();
    
    // Initialize smooth scroll
    initSmoothScroll();
});

// ===== GALLERY FUNCTIONALITY =====
function initGallery() {
    const mainImage = document.querySelector('.gallery-main img');
    const thumbnails = document.querySelectorAll('.gallery-thumb');
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            if (mainImage && imgSrc) {
                mainImage.src = imgSrc;
                // Add animation
                mainImage.style.opacity = '0';
                setTimeout(() => {
                    mainImage.style.opacity = '1';
                }, 200);
            }
        });
    });
}

// ===== AGENT CONTACT =====
function initAgentContact() {
    const agentCard = document.querySelector('.agent-card');
    
    if (agentCard) {
        agentCard.addEventListener('click', function() {
            const phone = this.dataset.phone;
            if (phone) {
                // Option 1: Open WhatsApp
                // window.open(`https://wa.me/${phone}`, '_blank');
                
                // Option 2: Make phone call
                window.location.href = `tel:${phone}`;
            }
        });
        
        // Add cursor pointer
        agentCard.style.cursor = 'pointer';
    }
}

// ===== SMOOTH SCROLL =====
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                e.preventDefault();
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

// ===== IMAGE LAZY LOADING =====
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// ===== SHARE FUNCTIONALITY =====
function shareProperty(title, url) {
    if (navigator.share) {
        navigator.share({
            title: title,
            url: url
        }).catch(console.error);
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(url).then(() => {
            showToast('Link disalin ke clipboard!');
        });
    }
}

// ===== SHOW TOAST NOTIFICATION =====
function showToast(message) {
    const toast = document.createElement('div');
    toast.textContent = message;
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #1f2937;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
        font-size: 14px;
        font-weight: 500;
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

// Add animation keyframes dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);

// ===== BOOKING BUTTON CLICK TRACKING =====
function trackBookingClick(propertyId) {
    // You can add analytics tracking here
    console.log('Booking clicked for property:', propertyId);
    
    // Example: Google Analytics
    // gtag('event', 'booking_click', {
    //     'property_id': propertyId
    // });
}

// Attach tracking to booking button
const bookingBtn = document.querySelector('.btn-booking');
if (bookingBtn) {
    bookingBtn.addEventListener('click', function() {
        const propertyId = this.dataset.propertyId || window.propertyId;
        if (propertyId) {
            trackBookingClick(propertyId);
        }
    });
}