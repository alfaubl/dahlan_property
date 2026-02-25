// public/js/property-show.js

document.addEventListener('DOMContentLoaded', function() {
    initGallery();
    initBookingButton();
    initStickyCard();
});

/**
 * Initialize gallery with lightbox
 */
function initGallery() {
    const mainImage = document.querySelector('.gallery-main img');
    const thumbnails = document.querySelectorAll('.gallery-thumb');
    const lightbox = createLightbox();
    
    let currentImageIndex = 0;
    const images = [
        mainImage?.src,
        ...Array.from(thumbnails).map(thumb => thumb.querySelector('img')?.src)
    ].filter(Boolean);
    
    // Thumbnail click to change main image
    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            mainImage.src = imgSrc;
            currentImageIndex = index + 1;
            
            // Add animation
            mainImage.style.animation = 'fadeIn 0.3s';
            setTimeout(() => {
                mainImage.style.animation = '';
            }, 300);
        });
    });
    
    // Main image click to open lightbox
    if (mainImage) {
        mainImage.addEventListener('click', function() {
            openLightbox(currentImageIndex);
        });
    }
    
    // Create lightbox
    function createLightbox() {
        const modal = document.createElement('div');
        modal.className = 'lightbox-modal';
        modal.innerHTML = `
            <div class="lightbox-content">
                <img src="" alt="Lightbox">
                <div class="lightbox-close">
                    <i class="fas fa-times"></i>
                </div>
                <div class="lightbox-nav prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="lightbox-nav next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        const closeBtn = modal.querySelector('.lightbox-close');
        const prevBtn = modal.querySelector('.prev');
        const nextBtn = modal.querySelector('.next');
        const lightboxImg = modal.querySelector('img');
        
        closeBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });
        
        prevBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            lightboxImg.src = images[currentImageIndex];
        });
        
        nextBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            lightboxImg.src = images[currentImageIndex];
        });
        
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('active')) return;
            
            if (e.key === 'Escape') {
                modal.classList.remove('active');
            } else if (e.key === 'ArrowLeft') {
                prevBtn.click();
            } else if (e.key === 'ArrowRight') {
                nextBtn.click();
            }
        });
        
        return {
            open: (index) => {
                currentImageIndex = index;
                lightboxImg.src = images[index];
                modal.classList.add('active');
            }
        };
    }
    
    function openLightbox(index) {
        lightbox.open(index);
    }
}

/**
 * Initialize booking button
 */
function initBookingButton() {
    const bookingBtn = document.querySelector('.btn-booking');
    
    if (bookingBtn) {
        bookingBtn.addEventListener('click', function(e) {
            // Show loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            this.disabled = true;
            
            // Simulate processing (remove in production)
            setTimeout(() => {
                this.innerHTML = originalText;
                this.disabled = false;
            }, 2000);
            
            // Actual implementation would redirect to booking page
            // window.location.href = this.href;
        });
    }
}

/**
 * Initialize sticky card with scroll effects
 */
function initStickyCard() {
    const bookingCard = document.querySelector('.booking-card');
    const rightColumn = document.querySelector('.right-column');
    
    if (!bookingCard || !rightColumn) return;
    
    let isSticky = false;
    const originalTop = rightColumn.offsetTop;
    
    window.addEventListener('scroll', function() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;
        const cardHeight = bookingCard.offsetHeight;
        const footerTop = document.querySelector('footer')?.offsetTop || document.body.offsetHeight;
        
        // Check if card should be sticky
        if (scrollY > originalTop - 100 && scrollY + cardHeight + 100 < footerTop) {
            if (!isSticky) {
                rightColumn.style.position = 'sticky';
                rightColumn.style.top = '100px';
                isSticky = true;
            }
        } else {
            if (isSticky) {
                rightColumn.style.position = 'static';
                isSticky = false;
            }
        }
    });
}

/**
 * Initialize agent contact
 */
function initAgentContact() {
    const agentCard = document.querySelector('.agent-card');
    
    if (agentCard) {
        agentCard.addEventListener('click', function() {
            const phone = this.dataset.phone;
            if (phone) {
                window.location.href = `tel:${phone}`;
            }
        });
        
        agentCard.style.cursor = 'pointer';
    }
}

/**
 * Initialize property stats counter
 */
function initPropertyStats() {
    const stats = document.querySelectorAll('.meta-value');
    
    stats.forEach(stat => {
        const value = stat.innerText;
        if (!isNaN(parseInt(value))) {
            animateValue(stat, 0, parseInt(value), 1000);
        }
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
        element.innerText = Math.floor(current);
    }, 10);
}

/**
 * Share property
 */
function shareProperty() {
    if (navigator.share) {
        navigator.share({
            title: document.querySelector('.property-title')?.innerText || 'Dahlan Property',
            text: document.querySelector('.description-text')?.innerText || 'Cek properti ini',
            url: window.location.href
        })
        .catch(console.error);
    } else {
        // Fallback
        navigator.clipboard.writeText(window.location.href);
        showNotification('success', 'Link properti disalin!');
    }
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
window.initGallery = initGallery;
window.initBookingButton = initBookingButton;
window.shareProperty = shareProperty;
window.showNotification = showNotification;