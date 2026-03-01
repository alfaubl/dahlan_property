// ===== BOOKING SHOW JS WITH 3D APEXCHARTS =====
document.addEventListener('DOMContentLoaded', function() {
    init3DPieChart();
    init3DBarChart();
    init3DDonutChart();
    initCancelButton();
});

/**
 * Initialize 3D Pie Chart
 */
function init3DPieChart() {
    const chartElement = document.getElementById('pieChart3D');
    if (!chartElement || typeof ApexCharts === 'undefined') return;

    const data = window.paymentData || {
        propertyPrice: 8500000000,
        bookingFee: 850000000
    };

    const options = {
        series: [data.propertyPrice, data.bookingFee],
        chart: {
            type: 'pie',
            height: 300,
            fontFamily: 'Inter, sans-serif',
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            },
            background: 'transparent',
            dropShadow: {
                enabled: true,
                top: 5,
                left: 5,
                blur: 10,
                color: '#000',
                opacity: 0.2
            }
        },
        labels: ['Harga Properti', 'Booking Fee'],
        colors: ['#3b82f6', '#f59e0b'],
        legend: {
            show: false
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(value) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(value, { seriesIndex, w }) {
                return 'Rp ' + (w.globals.series[seriesIndex] / 1000000).toFixed(0) + ' Jt';
            },
            style: {
                fontSize: '11px',
                colors: ['#ffffff']
            },
            background: {
                enabled: true,
                foreColor: '#ffffff',
                padding: 4,
                borderRadius: 4,
                borderWidth: 0,
                opacity: 0.7
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 2,
                color: '#000',
                opacity: 0.5
            }
        },
        plotOptions: {
            pie: {
                expandOnClick: true,
                offsetX: 0,
                offsetY: 0,
                customScale: 1,
                dataLabels: {
                    offset: -10
                },
                donut: {
                    size: '0%',
                    background: 'transparent'
                }
            }
        },
        states: {
            hover: {
                filter: {
                    type: 'darken',
                    value: 0.8
                }
            }
        },
        stroke: {
            width: 2,
            colors: ['#ffffff']
        },
        grid: {
            padding: {
                top: 10,
                right: 10,
                bottom: 10,
                left: 10
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 250
                }
            }
        }]
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
    window.pieChart3D = chart;
}

/**
 * Initialize 3D Bar Chart
 */
function init3DBarChart() {
    const chartElement = document.getElementById('barChart3D');
    if (!chartElement || typeof ApexCharts === 'undefined') return;

    const data = window.paymentData || {
        propertyPrice: 8500000000,
        bookingFee: 850000000
    };

    const options = {
        series: [
            {
                name: 'Nilai',
                data: [data.propertyPrice, data.bookingFee]
            }
        ],
        chart: {
            type: 'bar',
            height: 300,
            fontFamily: 'Inter, sans-serif',
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            },
            background: 'transparent',
            dropShadow: {
                enabled: true,
                top: 5,
                left: 5,
                blur: 10,
                color: '#000',
                opacity: 0.2
            }
        },
        colors: ['#3b82f6', '#f59e0b'],
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true,
                dataLabels: {
                    position: 'top'
                },
                colors: {
                    ranges: [{
                        from: 0,
                        to: Infinity,
                        color: undefined
                    }]
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(value) {
                return 'Rp ' + (value / 1000000).toFixed(0) + ' Jt';
            },
            offsetY: -20,
            style: {
                fontSize: '11px',
                colors: ['#1e293b']
            },
            background: {
                enabled: true,
                foreColor: '#1e293b',
                padding: 4,
                borderRadius: 4,
                borderWidth: 0,
                opacity: 0.9
            }
        },
        xaxis: {
            categories: ['Harga Properti', 'Booking Fee'],
            labels: {
                style: {
                    fontSize: '11px',
                    colors: ['#1e293b']
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return 'Rp ' + (value / 1000000).toFixed(0) + ' Jt';
                },
                style: {
                    fontSize: '10px',
                    colors: ['#1e293b']
                }
            }
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(value) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                }
            }
        },
        grid: {
            borderColor: '#e2e8f0',
            strokeDashArray: 5
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 250
                }
            }
        }]
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
    window.barChart3D = chart;
}

/**
 * Initialize 3D Donut Chart
 */
function init3DDonutChart() {
    const chartElement = document.getElementById('donutChart3D');
    if (!chartElement || typeof ApexCharts === 'undefined') return;

    const data = window.paymentData || {
        propertyPrice: 8500000000,
        bookingFee: 850000000,
        total: 850000000
    };

    const options = {
        series: [data.bookingFee],
        chart: {
            type: 'donut',
            height: 350,
            fontFamily: 'Inter, sans-serif',
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            },
            background: 'transparent',
            dropShadow: {
                enabled: true,
                top: 5,
                left: 5,
                blur: 10,
                color: '#000',
                opacity: 0.2
            }
        },
        labels: ['Total Pembayaran'],
        colors: ['#3b82f6'],
        legend: {
            show: false
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(value) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(value) {
                return 'Rp ' + (value / 1000000).toFixed(0) + ' Jt';
            },
            style: {
                fontSize: '14px',
                colors: ['#ffffff']
            },
            background: {
                enabled: true,
                foreColor: '#ffffff',
                padding: 6,
                borderRadius: 6,
                borderWidth: 0,
                opacity: 0.8
            },
            dropShadow: {
                enabled: true,
                top: 2,
                left: 2,
                blur: 4,
                color: '#000',
                opacity: 0.5
            }
        },
        plotOptions: {
            pie: {
                expandOnClick: true,
                offsetX: 0,
                offsetY: 0,
                customScale: 1,
                dataLabels: {
                    offset: -10
                },
                donut: {
                    size: '70%',
                    background: 'transparent',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '14px',
                            color: '#1e293b'
                        },
                        value: {
                            show: true,
                            fontSize: '20px',
                            color: '#1e293b',
                            formatter: function(val) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(val);
                            }
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            fontSize: '16px',
                            color: '#1e293b',
                            formatter: function(w) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(data.total);
                            }
                        }
                    }
                }
            }
        },
        stroke: {
            width: 2,
            colors: ['#ffffff']
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 300
                }
            }
        }]
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
    window.donutChart3D = chart;
}

/**
 * Initialize cancel button
 */
function initCancelButton() {
    const cancelBtn = document.querySelector('.btn-cancel');
    if (!cancelBtn) return;

    cancelBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        const bookingId = window.bookingId;
        const csrf = window.csrfToken;

        if (!bookingId || !csrf) {
            showNotification('Data tidak lengkap', 'error');
            return;
        }

        // Show confirmation dialog
        showConfirmationDialog(bookingId, csrf, this);
    });
}

/**
 * Show confirmation dialog
 */
function showConfirmationDialog(bookingId, csrf, button) {
    // Create modal
    const modal = document.createElement('div');
    modal.className = 'cancel-modal';
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s;
        backdrop-filter: blur(5px);
    `;

    modal.innerHTML = `
        <div style="
            background: white;
            border-radius: 20px;
            padding: 2rem;
            max-width: 400px;
            width: 90%;
            text-align: center;
            animation: slideUp 0.3s;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.2);
        ">
            <div style="
                width: 5rem;
                height: 5rem;
                background: linear-gradient(135deg, #fee2e2, #fecaca);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                box-shadow: 0 10px 20px rgba(239,68,68,0.2);
            ">
                <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 2.5rem;"></i>
            </div>
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin-bottom: 0.5rem; background: linear-gradient(135deg, #ef4444, #dc2626); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Batalkan Booking?
            </h3>
            <p style="color: #64748b; margin-bottom: 2rem; font-size: 1rem;">
                Booking akan dibatalkan. Tindakan ini tidak dapat dibatalkan.
            </p>
            <div style="display: flex; gap: 1rem;">
                <button class="modal-cancel" style="
                    flex: 1;
                    padding: 0.75rem;
                    background: #f1f5f9;
                    border: none;
                    border-radius: 10px;
                    color: #475569;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s;
                ">Batal</button>
                <button class="modal-confirm" style="
                    flex: 1;
                    padding: 0.75rem;
                    background: linear-gradient(135deg, #ef4444, #dc2626);
                    border: none;
                    border-radius: 10px;
                    color: white;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s;
                    box-shadow: 0 4px 10px rgba(239,68,68,0.4);
                ">Ya, Batalkan</button>
            </div>
        </div>
    `;

    document.body.appendChild(modal);

    // Handle modal buttons
    modal.querySelector('.modal-cancel').addEventListener('click', () => {
        modal.style.animation = 'fadeOut 0.3s';
        setTimeout(() => modal.remove(), 300);
    });

    modal.querySelector('.modal-confirm').addEventListener('click', () => {
        modal.remove();
        processCancelBooking(bookingId, csrf, button);
    });

    // Close on outside click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.animation = 'fadeOut 0.3s';
            setTimeout(() => modal.remove(), 300);
        }
    });
}

/**
 * Process cancel booking API call
 */
function processCancelBooking(bookingId, csrf, button) {
    // Show loading state
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Membatalkan...';
    button.disabled = true;

    fetch(`/bookings/${bookingId}/cancel`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Booking berhasil dibatalkan', 'success');
            setTimeout(() => location.reload(), 1500);
        } else {
            showNotification(data.message || 'Gagal membatalkan', 'error');
            button.innerHTML = originalText;
            button.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan', 'error');
        button.innerHTML = originalText;
        button.disabled = false;
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
        border: 1px solid rgba(255,255,255,0.2);
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
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
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

// Handle window resize
window.addEventListener('resize', function() {
    if (window.pieChart3D) window.pieChart3D.resize();
    if (window.barChart3D) window.barChart3D.resize();
    if (window.donutChart3D) window.donutChart3D.resize();
});