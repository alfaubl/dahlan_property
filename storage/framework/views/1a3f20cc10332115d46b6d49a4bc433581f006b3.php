<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== AUTO-HIDE ALERTS ==========
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });

    // ========== REMOVE BUTTON CONFIRMATION ==========
    const removeForms = document.querySelectorAll('form[action*="wishlist"]');
    removeForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Hapus properti ini dari wishlist?')) {
                e.preventDefault();
            }
        });
    });

    // ========== CARD HOVER ANIMATIONS ==========
    const cards = document.querySelectorAll('.wishlist-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });

    // ========== LAZY LOAD IMAGES ==========
    const images = document.querySelectorAll('.card-image img');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));

    // ========== ANIMATED ENTRANCE ==========
    const cardsToAnimate = document.querySelectorAll('.wishlist-card, .empty-wishlist');
    const entranceObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    cardsToAnimate.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        entranceObserver.observe(card);
    });

    // ========== UPDATE WISHLIST COUNT (IF NEEDED) ==========
    const updateWishlistCount = () => {
        const count = document.querySelectorAll('.wishlist-card').length;
        const countBadge = document.querySelector('.wishlist-count');
        if (countBadge) {
            countBadge.textContent = `${count} Properti`;
        }
    };
});
</script><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/js/wishlist-js.blade.php ENDPATH**/ ?>