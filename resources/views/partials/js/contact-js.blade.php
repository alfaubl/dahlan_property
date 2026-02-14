<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission handling
    const contactForm = document.querySelector('.contact-form form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual AJAX)
            setTimeout(() => {
                // Create success message
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success';
                alertDiv.innerHTML = '<i class="fas fa-check-circle me-2"></i> Pesan Anda telah terkirim! Tim kami akan segera menghubungi Anda.';
                
                // Insert alert at the top of form
                this.insertBefore(alertDiv, this.firstChild);
                
                // Reset form
                this.reset();
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Remove alert after 5 seconds
                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            }, 1500);
        });
    }
    
    // Phone number formatting (optional)
    const phoneInput = document.querySelector('input[type="tel"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.startsWith('0')) {
                    value = '62' + value.substring(1);
                }
                this.value = value;
            }
        });
    }
    
    // Smooth scroll to map when "Lihat Peta" is clicked
    const mapLinks = document.querySelectorAll('.contact-action[href="#"]');
    mapLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const mapSection = document.querySelector('.contact-map');
            if (mapSection) {
                mapSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    });
    
    // Animation on scroll for contact cards
    const contactCards = document.querySelectorAll('.contact-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    contactCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>