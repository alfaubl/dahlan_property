<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== SEARCH FORM HANDLER ==========
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mencari...';
                submitBtn.disabled = true;
                
                // Form akan tetap submit setelah loading
                // Loading hanya tampil sebentar
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 1500);
            }
        });
    }
    
    // ========== PROPERTY CARD HOVER EFFECT ==========
    const propertyCards = document.querySelectorAll('.property-card');
    propertyCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.zIndex = '10';
        });
        card.addEventListener('mouseleave', () => {
            card.style.zIndex = '1';
        });
    });
    
    // ========== STATS COUNTER ANIMATION ==========
    const stats = document.querySelectorAll('.stats-counter');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalValue = parseInt(target.innerText.replace(/[+,]/g, ''));
                
                if (!isNaN(finalValue)) {
                    let currentValue = 0;
                    const increment = Math.ceil(finalValue / 50);
                    const timer = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= finalValue) {
                            target.innerText = finalValue.toLocaleString() + '+';
                            clearInterval(timer);
                        } else {
                            target.innerText = currentValue.toLocaleString() + '+';
                        }
                    }, 30);
                }
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });
    
    stats.forEach(stat => observer.observe(stat));
    
    // ========== ANIMATED ENTRANCE FOR CARDS ==========
    const animatedElements = document.querySelectorAll('[data-aos]');
    const aosObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        aosObserver.observe(el);
    });
    
    // ========== PRICE FORMATTING ==========
    const priceTags = document.querySelectorAll('.price-tag');
    priceTags.forEach(tag => {
        let price = tag.innerText.replace(/[^0-9]/g, '');
        if (price) {
            // Formatting sudah di-handle oleh PHP, ini hanya contoh
        }
    });
    
    // ========== SMOOTH SCROLL FOR CTA BUTTONS ==========
    const ctaButtons = document.querySelectorAll('a[href^="#"]');
    ctaButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
});
</script>