// public/js/properties.js

document.addEventListener('DOMContentLoaded', function() {
    initPropertyCards();
    initWishlistButtons();
    initFilters();
    initPagination();
    initSearch();
});

/**
 * Initialize property cards with hover effects
 */
function initPropertyCards() {
    const propertyCards = document.querySelectorAll('.property-card');
    
    propertyCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('soft-shadow-hover');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('soft-shadow-hover');
        });
        
        // Make card clickable
        card.addEventListener('click', function(e) {
            // Don't navigate if clicking on wishlist button
            if (e.target.closest('.btn-wishlist')) {
                return;
            }
            
            const propertyId = this.dataset.propertyId;
            if (propertyId) {
                window.location.href = `/properties/${propertyId}`;
            }
        });
    });
}

/**
 * Initialize wishlist buttons
 */
function initWishlistButtons() {
    const wishlistButtons = document.querySelectorAll('.btn-wishlist');
    
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const propertyId = this.dataset.propertyId;
            const icon = this.querySelector('i');
            
            // Toggle active class
            this.classList.toggle('active');
            
            if (this.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                showNotification('success', 'Properti ditambahkan ke wishlist');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                showNotification('info', 'Properti dihapus dari wishlist');
            }
            
            // Here you would typically make an AJAX call to update wishlist
            updateWishlist(propertyId, this.classList.contains('active'));
        });
    });
}

/**
 * Update wishlist via AJAX
 */
function updateWishlist(propertyId, isAdding) {
    // Show loading state
    showLoading(true);
    
    // Simulate API call
    setTimeout(() => {
        showLoading(false);
    }, 500);
    
    // Actual implementation would be:
    /*
    fetch(`/wishlist/${propertyId}`, {
        method: isAdding ? 'POST' : 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        showNotification('success', data.message);
    })
    .catch(error => {
        showNotification('error', 'Terjadi kesalahan');
    })
    .finally(() => {
        showLoading(false);
    });
    */
}

/**
 * Initialize filter functionality
 */
function initFilters() {
    const filterForm = document.getElementById('filterForm');
    const filterSelects = document.querySelectorAll('.filter-select');
    const resetBtn = document.getElementById('resetFilters');
    
    if (filterSelects.length) {
        filterSelects.forEach(select => {
            select.addEventListener('change', function() {
                // Auto submit on change (optional)
                // filterForm.submit();
            });
        });
    }
    
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            filterSelects.forEach(select => {
                select.value = '';
            });
            filterForm.submit();
        });
    }
}

/**
 * Initialize pagination
 */
function initPagination() {
    const paginationItems = document.querySelectorAll('.pagination-item:not(.disabled)');
    
    paginationItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if (this.classList.contains('disabled')) {
                e.preventDefault();
            }
        });
    });
}

/**
 * Initialize search functionality with debounce
 */
function initSearch() {
    const searchInput = document.querySelector('.search-input');
    
    if (searchInput) {
        const debouncedSearch = debounce(function(value) {
            if (value.length > 2) {
                performSearch(value);
            }
        }, 500);
        
        searchInput.addEventListener('input', function(e) {
            debouncedSearch(e.target.value);
        });
    }
}

/**
 * Perform search
 */
function performSearch(query) {
    showLoading(true);
    
    // Simulate search
    setTimeout(() => {
        showLoading(false);
        showNotification('info', `Mencari: ${query}`);
    }, 500);
}

/**
 * Debounce function
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Show loading spinner
 */
function showLoading(show) {
    let spinner = document.querySelector('.properties-loading');
    
    if (show) {
        if (!spinner) {
            spinner = document.createElement('div');
            spinner.className = 'properties-loading';
            spinner.innerHTML = `
                <div class="loading-overlay">
                    <div class="loading-content">
                        <div class="animate-spin">
                            <i class="fas fa-circle-notch fa-3x text-primary"></i>
                        </div>
                        <p class="mt-3 text-gray-600">Memuat...</p>
                    </div>
                </div>
            `;
            document.body.appendChild(spinner);
        }
    } else {
        if (spinner) spinner.remove();
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
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'info' ? 'fa-info-circle' : 'fa-exclamation-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Export functions
window.initPropertyCards = initPropertyCards;
window.initWishlistButtons = initWishlistButtons;
window.initFilters = initFilters;
window.showNotification = showNotification;
window.showLoading = showLoading;