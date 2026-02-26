// ===== BOOKINGS JS =====
document.addEventListener('DOMContentLoaded', function() {
    initChart();
    initFilters();
    initSearch();
});

/**
 * Initialize Chart.js
 */
function initChart() {
    const ctx = document.getElementById('bookingsChart');
    
    // Cek apakah Chart.js sudah loaded
    if (typeof Chart === 'undefined') {
        console.warn('Chart.js belum loaded');
        return;
    }
    
    // Cek apakah element chart ada
    if (!ctx) {
        console.warn('Element bookingsChart tidak ditemukan');
        return;
    }
    
    // Cek apakah data sudah ada
    const data = window.bookingData;
    if (!data) {
        console.warn('Data booking tidak ditemukan');
        return;
    }
    
    // Destroy chart lama jika ada (untuk prevent duplikasi)
    const existingChart = Chart.getChart(ctx);
    if (existingChart) {
        existingChart.destroy();
    }
    
    // Create new chart
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.categories,
            datasets: [
                {
                    label: 'Sukses',
                    data: data.success,
                    backgroundColor: '#10b981',
                    borderRadius: 6,
                    barPercentage: 0.7
                },
                {
                    label: 'Pending',
                    data: data.pending,
                    backgroundColor: '#f59e0b',
                    borderRadius: 6,
                    barPercentage: 0.7
                },
                {
                    label: 'Batal',
                    data: data.cancelled,
                    backgroundColor: '#ef4444',
                    borderRadius: 6,
                    barPercentage: 0.7
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2.5,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleFont: { size: 13 },
                    bodyFont: { size: 12 },
                    borderRadius: 8,
                    displayColors: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: { size: 11 }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    ticks: {
                        font: { size: 11 }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            animation: {
                duration: 800,
                easing: 'easeOutQuart'
            }
        }
    });
}

/**
 * Initialize Filter Tabs
 */
function initFilters() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const rows = document.querySelectorAll('#tableBody tr[data-status]');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active dari semua button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Get filter value
            const filter = this.getAttribute('data-filter');
            
            // Filter table rows
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                
                if (filter === 'all' || status === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
}

/**
 * Initialize Search Functionality
 */
function initSearch() {
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('#tableBody tr[data-status]');
    
    if (!searchInput) return;
    
    const searchFunction = function() {
        const query = searchInput.value.toLowerCase().trim();
        
        rows.forEach(row => {
            // Skip empty state row
            if (row.querySelector('.empty-state')) {
                return;
            }
            
            const text = row.textContent.toLowerCase();
            
            if (text.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    };
    
    // Search on input
    searchInput.addEventListener('input', searchFunction);
    
    // Search on Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchFunction();
        }
    });
}

/**
 * Payment function (dummy)
 */
function bayar(bookingId) {
    if (confirm('Lanjutkan pembayaran untuk booking #' + bookingId + '?')) {
        alert('Redirect ke payment gateway...');
        // window.location.href = '/payment/' + bookingId;
    }
}

/**
 * Cancel booking function (dummy)
 */
function batal(bookingId) {
    if (confirm('Yakin ingin membatalkan booking #' + bookingId + '?')) {
        alert('Booking dibatalkan');
        // Implement cancel logic here
    }
}