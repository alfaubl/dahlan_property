// public/js/contact.js

document.addEventListener('DOMContentLoaded', function() {
    initContactForm();
    initFaqAccordion();
    initMapOverlay();
    initSocialCards();
    initFormValidation();
});

/**
 * Initialize contact form with AJAX submission
 */
function initContactForm() {
    const form = document.getElementById('contactForm');
    
    if (!form) return;
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            showNotification('error', 'Mohon lengkapi form dengan benar');
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('.btn-submit');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;
        
        // Simulate form submission (replace with actual AJAX)
        setTimeout(() => {
            // Success
            submitBtn.innerHTML = '<i class="fas fa-check"></i> Terkirim!';
            showNotification('success', 'Pesan Anda telah terkirim!');
            
            // Reset form
            form.reset();
            
            // Reset button after 2 seconds
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        }, 2000);
        
        // Actual AJAX implementation:
        /*
        try {
            const formData = new FormData(form);
            const response = await fetch('/contact/send', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showNotification('success', data.message);
                form.reset();
            } else {
                showNotification('error', data.message);
            }
        } catch (error) {
            showNotification('error', 'Terjadi kesalahan. Silakan coba lagi.');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
        */
    });
}

/**
 * Initialize FAQ accordion
 */
function initFaqAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
}

/**
 * Initialize map overlay with animation
 */
function initMapOverlay() {
    const mapOverlay = document.querySelector('.map-overlay');
    
    if (mapOverlay) {
        mapOverlay.style.animation = 'slideInRight 0.5s ease-out';
        
        // Add click event to open in Google Maps
        mapOverlay.addEventListener('click', () => {
            const address = encodeURIComponent('Jl. Sudirman No. 123, Jakarta');
            window.open(`https://www.google.com/maps/search/${address}`, '_blank');
        });
        
        mapOverlay.style.cursor = 'pointer';
    }
}

/**
 * Initialize social cards with hover effects
 */
function initSocialCards() {
    const socialCards = document.querySelectorAll('.social-card');
    
    socialCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('soft-shadow-hover');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('soft-shadow-hover');
        });
        
        card.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.classList.contains('facebook') ? 'Facebook' :
                            this.classList.contains('twitter') ? 'Twitter' :
                            this.classList.contains('instagram') ? 'Instagram' : 'LinkedIn';
            
            showNotification('info', `Membuka ${platform}`);
            
            // Actual link would be:
            // window.open(this.href, '_blank');
        });
    });
}

/**
 * Initialize form validation
 */
function initFormValidation() {
    const inputs = document.querySelectorAll('.form-control');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('error')) {
                validateField(this);
            }
        });
    });
}

/**
 * Validate single field
 */
function validateField(field) {
    const value = field.value.trim();
    const errorElement = field.parentElement.querySelector('.form-error');
    
    // Remove existing error
    if (errorElement) {
        errorElement.remove();
    }
    
    field.classList.remove('error');
    
    // Check if required
    if (field.hasAttribute('required') && !value) {
        showFieldError(field, 'Field ini wajib diisi');
        return false;
    }
    
    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            showFieldError(field, 'Format email tidak valid');
            return false;
        }
    }
    
    // Phone validation
    if (field.id === 'phone' && value) {
        const phoneRegex = /^[0-9+\-\s]+$/;
        if (!phoneRegex.test(value)) {
            showFieldError(field, 'Format nomor telepon tidak valid');
            return false;
        }
    }
    
    return true;
}

/**
 * Show field error
 */
function showFieldError(field, message) {
    field.classList.add('error');
    
    const error = document.createElement('span');
    error.className = 'form-error';
    error.textContent = message;
    
    field.parentElement.appendChild(error);
}

/**
 * Validate entire form
 */
function validateForm() {
    const inputs = document.querySelectorAll('.form-control');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });
    
    return isValid;
}

/**
 * Show notification
 */
function showNotification(type, message) {
    // Remove existing notification
    const existing = document.querySelector('.notification');
    if (existing) existing.remove();
    
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'info' ? 'fa-info-circle' : 'fa-exclamation-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

/**
 * Copy text to clipboard
 */
function copyToClipboard(text, type) {
    navigator.clipboard.writeText(text).then(() => {
        showNotification('success', `${type} berhasil disalin!`);
    }).catch(() => {
        showNotification('error', 'Gagal menyalin');
    });
}

/**
 * Initialize contact info copy
 */
function initCopyInfo() {
    const infoCards = document.querySelectorAll('.contact-info-card');
    
    infoCards.forEach(card => {
        card.addEventListener('click', function() {
            const content = this.querySelector('.info-content').innerText;
            const title = this.querySelector('.info-title').innerText;
            copyToClipboard(content, title);
        });
        
        card.style.cursor = 'pointer';
    });
}

// Initialize copy functionality
setTimeout(initCopyInfo, 500);

// Export functions
window.showNotification = showNotification;
window.validateForm = validateForm;
window.copyToClipboard = copyToClipboard;