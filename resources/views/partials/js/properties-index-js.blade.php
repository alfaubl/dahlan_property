<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== UPDATE PROPERTY COUNT ==========
    const propertyCount = document.getElementById('propertyCount');
    if (propertyCount) {
        // Count will be updated from PHP data
        // This is just for the initial static display
        propertyCount.innerText = '0';
    }
    
    // ========== SEARCH FORM HANDLER ==========
    const searchForm = document.querySelector('.search-box');
    const searchBtn = document.querySelector('.btn-search');
    
    if (searchBtn && searchForm) {
        searchBtn.addEventListener('click', function(e) {
            const searchInput = document.querySelector('.search-box input');
            const typeSelect = document.querySelector('.search-box select');
            
            // Show loading state
            const originalText = searchBtn.innerHTML;
            searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mencari...';
            searchBtn.disabled = true;
            
            // Simulate search (in real app, form will submit)
            setTimeout(() => {
                searchBtn.innerHTML = originalText;
                searchBtn.disabled = false;
                
                // Show alert for demo (remove in production)
                alert('Fitur pencarian akan segera diimplementasikan dengan data real.');
            }, 1000);
        });
    }
    
    // ========== FILTER HANDLER ==========
    const filterSelects = document.querySelectorAll('.filter-group select');
    const resetBtn = document.querySelector('.btn-outline-primary');
    
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            // In real app, this would trigger a form submit or AJAX
            console.log('Filter changed:', this.value);
        });
    });
    
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Reset all selects to default
            filterSelects.forEach(select => {
                select.selectedIndex = 0;
            });
            
            // Show feedback
            alert('Filter telah direset ke default.');
        });
    }
    
    // ========== PROPERTY CARD ANIMATION ==========
    const propertyCards = document.querySelectorAll('.property-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1, rootMargin: '50px' });
    
    propertyCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
    
    // ========== PRICE FORMATTING (FOR DEMO) ==========
    const priceElements = document.querySelectorAll('.property-price');
    priceElements.forEach(el => {
        // This is handled by PHP number_format, but we keep for demo
        // Just to show that JS is working
        el.setAttribute('title', 'Harga properti');
    });
    
    // ========== TOOLTIP INIT (if using Bootstrap tooltips) ==========
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (tooltipTriggerList.length > 0 && typeof bootstrap !== 'undefined') {
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
    
    // ========== LAZY LOAD IMAGES ==========
    const images = document.querySelectorAll('.property-image img');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.src; // Trigger load
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    }
});
</script>