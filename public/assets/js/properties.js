// ===== PROPERTIES JS PREMIUM =====
document.addEventListener('DOMContentLoaded', function() {
    initChart();
    initFilterToggle();
    initFilterForm();
    initPropertyCards();
    initSearch();
});

/**
 * Initialize ApexCharts
 */
function initChart() {
    const chartElement = document.getElementById('propertiesChart');
    if (!chartElement || typeof ApexCharts === 'undefined') return;

    const options = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: { show: false },
            background: 'transparent',
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
                distributed: true,
                dataLabels: { position: 'top' }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: (val) => val,
            offsetY: -20,
            style: {
                fontSize: '11px',
                colors: ['#1e293b']
            }
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            labels: { style: { colors: '#1e293b', fontSize: '11px' } }
        },
        yaxis: {
            labels: { style: { colors: '#1e293b', fontSize: '10px' } }
        },
        tooltip: {
            theme: 'dark',
            y: { formatter: (val) => val + ' Properti' }
        },
        grid: { borderColor: '#e2e8f0', strokeDashArray: 5 }
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
    window.propertiesChart = chart;
}

/**
 * Initialize filter toggle
 */
function initFilterToggle() {
    const toggle = document.querySelector('.filter-header');
    const filterBody = document.getElementById('filterBody');
    const toggleIcon = document.querySelector('.filter-toggle i');

    if (!toggle || !filterBody) return;

    toggle.addEventListener('click', function() {
        filterBody.classList.toggle('hidden');
        if (toggleIcon) {
            toggleIcon.className = filterBody.classList.contains('hidden') 
                ? 'fas fa-chevron-down' 
                : 'fas fa-chevron-up';
        }
    });
}

/**
 * Initialize filter form
 */
function initFilterForm() {
    const form = document.getElementById('filterForm');
    const resetBtn = document.getElementById('resetFilters');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Collect filter data
            const formData = new FormData(form);
            const filters = {};
            
            for (let [key, value] of formData.entries()) {
                if (value) filters[key] = value;
            }
            
            console.log('Filters applied:', filters);
            showNotification('Filter diterapkan', 'success');
            
            // Here you would typically make an API call to filter properties
            // filterProperties(filters);
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            document.querySelectorAll('.filter-select').forEach(select => {
                select.value = '';
            });
            showNotification('Filter direset', 'info');
        });
    }
}

/**
 * Initialize property cards
 */
function initPropertyCards() {
    const cards = document.querySelectorAll('.property-card');
    
    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Prevent navigation if clicking on booking button
            if (e.target.closest('.btn-booking')) return;
            
            const id = this.dataset.id;
            if (id) {
                window.location.href = `/properties/${id}`;
            }
        });
    });
}

/**
 * Initialize search functionality
 */
function initSearch() {
    const searchBtn = document.querySelector('.search-btn');
    const searchInput = document.querySelector('.hero-search input');

    if (!searchBtn || !searchInput) return;

    searchBtn.addEventListener('click', function() {
        const query = searchInput.value.trim();
        if (query) {
            showNotification(`Mencari: ${query}`, 'info');
            // Here you would typically redirect to search results
            // window.location.href = `/properties?search=${encodeURIComponent(query)}`;
        }
    });

    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchBtn.click();
        }
    });
}

/**
 * Show notification
 */
function showNotification(message, type = 'success') {
    const colors = {
        success: '#10b981',
        error: '#ef4444',
        warning: '#f59e0b',
        info: '#3b82f6'
    };
    
    const icons = {
        success: 'fa-check-circle',
        error: 'fa-times-circle',
        warning: 'fa-exclamation-circle',
        info: 'fa-info-circle'
    };

    const notification = document.createElement('div');
    notification.className = 'property-notification';
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${colors[type]};
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        z-index: 9999;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        gap: 8px;
        animation: slideIn 0.3s ease-out;
    `;
    
    notification.innerHTML = `
        <i class="fas ${icons[type]}"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Handle window resize for chart
window.addEventListener('resize', function() {
    if (window.propertiesChart) {
        window.propertiesChart.resize();
    }
});