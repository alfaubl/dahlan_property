// public/js/dashboard-bookings.js

/**
 * Inisialisasi semua chart di dashboard
 */
document.addEventListener('DOMContentLoaded', function() {
    initDistributionChart();
    initStatusChart();
    initBookingChart();
    initFilters();
    animateTableRows();
});

/**
 * Chart Distribusi Properti (Bar Chart)
 */
function initDistributionChart() {
    const canvas = document.getElementById('distributionChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            datasets: [{
                label: 'Jumlah Properti',
                data: [0, 0, 0, 0, 0],
                backgroundColor: [
                    '#4a6fa5',
                    '#17a2b8',
                    '#28a745',
                    '#ffc107',
                    '#fd7e14'
                ],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#E5E7EB'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}

/**
 * Chart Status Properti (Doughnut Chart)
 */
function initStatusChart() {
    const canvas = document.getElementById('statusChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Disewa', 'Terjual'],
            datasets: [{
                data: [0, 0, 0],
                backgroundColor: ['#28a745', '#ffc107', '#6c757d'],
                borderWidth: 0,
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1F2937',
                    titleColor: '#F9FAFB',
                    bodyColor: '#E5E7EB'
                }
            }
        }
    });
}

/**
 * Chart Booking (Bar Chart)
 */
function initBookingChart() {
    const canvas = document.getElementById('bookingChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    
    // Data dari server
    const successData = window.bookingChartData?.success || [12, 19, 15, 17, 14, 23, 8];
    const pendingData = window.bookingChartData?.pending || [5, 7, 4, 6, 8, 5, 3];
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: getLast7Days(),
            datasets: [
                {
                    label: 'Booking Sukses',
                    data: successData,
                    backgroundColor: '#10B981',
                    borderRadius: 6,
                    barPercentage: 0.7
                },
                {
                    label: 'Booking Pending',
                    data: pendingData,
                    backgroundColor: '#F59E0B',
                    borderRadius: 6,
                    barPercentage: 0.7
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: '#1F2937',
                    titleColor: '#F9FAFB',
                    bodyColor: '#E5E7EB',
                    padding: 10,
                    cornerRadius: 6
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#E5E7EB'
                    },
                    ticks: {
                        stepSize: 5,
                        font: {
                            size: 11
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                }
            }
        }
    });
}

/**
 * Mendapatkan label 7 hari terakhir
 */
function getLast7Days() {
    const days = [];
    const today = new Date();
    const bulanIndo = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    
    for (let i = 6; i >= 0; i--) {
        const date = new Date(today);
        date.setDate(date.getDate() - i);
        
        if (i === 0) {
            days.push('Hari Ini');
        } else if (i === 1) {
            days.push('Kemarin');
        } else {
            const day = date.getDate();
            const month = bulanIndo[date.getMonth()];
            days.push(day + ' ' + month);
        }
    }
    
    return days;
}

/**
 * Inisialisasi filter buttons
 */
function initFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const bookingRows = document.querySelectorAll('.booking-row');
    
    if (!filterButtons.length || !bookingRows.length) return;
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active class
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get filter value
            const filterValue = this.dataset.filter;
            
            // Filter rows
            filterBookings(filterValue, bookingRows);
        });
    });
}

/**
 * Filter booking berdasarkan status
 */
function filterBookings(status, rows) {
    rows.forEach(row => {
        if (status === 'all' || row.dataset.status === status) {
            row.style.display = '';
            row.style.opacity = '1';
        } else {
            row.style.display = 'none';
            row.style.opacity = '0';
        }
    });
}

/**
 * Format currency
 */
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Animasi untuk table rows
 */
function animateTableRows() {
    const rows = document.querySelectorAll('.booking-row');
    
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        row.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        
        setTimeout(() => {
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, 100 * index);
    });
}

// Export functions ke global scope
window.initBookingChart = initBookingChart;
window.initFilters = initFilters;
window.filterBookings = filterBookings;
window.formatCurrency = formatCurrency;