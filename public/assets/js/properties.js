// ===== PROPERTIES JS =====

document.addEventListener('DOMContentLoaded', function() {
    initPropertiesChart();
    initFilterToggle();
    initFilterForm();
    initWishlist();
    initPropertyCards();
    initPagination();
});

/**
 * Initialize ApexCharts for property distribution
 */
function initPropertiesChart() {
    const chartElement = document.getElementById('propertiesChart');
    if (!chartElement) return;

    const options = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
        chart: {
            type: 'bar',
            height: 250,
            fontFamily: 'Inter, sans-serif',
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            }
        },
        colors: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            labels: {
                style: {
                    fontSize: '11px',
                    colors: '#64748b'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    fontSize: '11px',
                    colors: '#64748b'
                }
            }
        },
        legend: {
            show: false
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(val) {
                    return val + ' Properti';
                }
            }
        },
        grid: {
            borderColor: '#e9ecef',
            strokeDashArray: 5
        }
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
}

/**
 * Initialize filter toggle for mobile
 */
function initFilterToggle() {
    const toggleBtn = document.getElementById('filterToggle');
    const filterSection = document.getElementById('filterSection');
    
    if (toggleBtn && filterSection) {
        toggleBtn.addEventListener('click', function() {
            filterSection.classList.toggle('active');
            const icon = toggleBtn.querySelector('i');
            if (icon) {
                if (filterSection.classList.contains('active')) {
                    icon.className = 'fas fa-times';
                } else {
                    icon.className = 'fas fa-sliders-h';
                }
            }
        });
    }
}

/**
 * Initialize filter form
 */
function initFilterForm() {
    const filterForm = document.getElementById('filterForm');
    const resetBtn = document.getElementById('resetFilters');
    
    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(filterForm);
            const filters = {};
            
            for (let [key, value] of formData.entries()) {
                if (value) filters[key] = value;
            }
            
            console.log('Filters applied:', filters);
            showNotification('Menerapkan filter...', 'info');
            
            // Simulate API call
            setTimeout(() => {
                showNotification('Filter diterapkan', 'success');
            }, 1000);
        });
    }
    
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            const selects = document.querySelectorAll('.filter-select');
            selects.forEach(select => {
                select.value = '';
            });
            showNotification('Filter direset', 'info');
        });
    }
}

/**
 * Initialize wishlist buttons
 */
function initWishlist() {
    const wishlistBtns = document.querySelectorAll('.btn-wishlist');
    
    wishlistBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const icon = this.querySelector('i');
            const propertyId = this.dataset.id;
            
            if (!icon) return;
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.classList.add('active');
                showNotification('Ditambahkan ke wishlist', 'success');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.classList.remove('active');
                showNotification('Dihapus dari wishlist', 'info');
            }
            
            console.log('Wishlist toggled for property:', propertyId);
        });
    });
}

/**
 * Initialize property cards
 */
function initPropertyCards() {
    const propertyCards = document.querySelectorAll('.property-card:not(.skeleton)');
    
    propertyCards.forEach(card => {
        card.addEventListener('click', function() {
            const propertyId = this.dataset.id;
            if (propertyId) {
                window.location.href = `/properties/${propertyId}`;
            }
        });
    });
}

/**
 * Initialize pagination
 */
function initPagination() {
    const paginationItems = document.querySelectorAll('.pagination-item:not(.disabled)');
    
    paginationItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all
            paginationItems.forEach(i => i.classList.remove('active'));
            
            // Add active class to clicked item
            this.classList.add('active');
            
            // Scroll to top of properties grid
            const grid = document.getElementById('propertiesGrid');
            if (grid) {
                grid.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
            showNotification('Memuat halaman...', 'info');
        });
    });
}

/**
 * Show notification
 */
function showNotification(message, type = 'success') {
    // Remove existing notification
    const existing = document.querySelector('.property-notification');
    if (existing) existing.remove();

    const notification = document.createElement('div');
    notification.className = 'property-notification';
    
    let bgColor;
    if (type === 'success') {
        bgColor = 'linear-gradient(135deg, #10b981, #34d399)';
    } else if (type === 'error') {
        bgColor = 'linear-gradient(135deg, #ef4444, #f87171)';
    } else {
        bgColor = 'linear-gradient(135deg, #3b82f6, #60a5fa)';
    }
    
    notification.style.background = bgColor;
    
    let icon;
    if (type === 'success') {
        icon = 'fa-check-circle';
    } else if (type === 'error') {
        icon = 'fa-times-circle';
    } else {
        icon = 'fa-info-circle';
    }
    
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fas ${icon}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Export to global scope if needed
window.showNotification = showNotification;