// ===== WELCOME JS =====

document.addEventListener('DOMContentLoaded', function() {
    // Initialize PureCounter
    if (typeof PureCounter !== 'undefined') {
        new PureCounter();
    }
    
    // Initialize ApexCharts
    initDistributionChart();
    
    // Initialize property cards
    initPropertyCards();
});

/**
 * Initialize ApexCharts for property distribution
 */
function initDistributionChart() {
    const chartElement = document.getElementById('distributionChart');
    if (!chartElement) return;

    const options = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
        chart: {
            type: 'bar',
            height: 350,
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
            fontFamily: 'Inter, sans-serif',
            background: 'transparent'
        },
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true,
                dataLabels: {
                    position: 'top'
                }
            }
        },
        colors: ['#4361ee', '#06d6a0', '#ffb703', '#ef476f', '#4cc9f0'],
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return val;
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ['#2b2d42']
            }
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            labels: {
                style: {
                    fontSize: '12px',
                    colors: '#4b5563'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: {
            labels: {
                style: {
                    fontSize: '11px',
                    colors: '#4b5563'
                }
            },
            title: {
                text: 'Jumlah Properti',
                style: {
                    fontSize: '12px',
                    color: '#4b5563'
                }
            }
        },
        grid: {
            borderColor: '#e9ecef',
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(val) {
                    return val + ' Properti';
                }
            },
            style: {
                fontSize: '12px'
            }
        },
        states: {
            hover: {
                filter: {
                    type: 'darken',
                    value: 0.8
                }
            }
        }
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
}

/**
 * Initialize property cards with hover effects
 */
function initPropertyCards() {
    const propertyCards = document.querySelectorAll('.group');
    
    propertyCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('soft-shadow-hover');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('soft-shadow-hover');
        });
        
        // Make card clickable
        card.addEventListener('click', function() {
            // You can add navigation logic here
            console.log('Property card clicked');
        });
    });
}

/**
 * Show notification (optional)
 */
window.showNotification = function(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-5 right-5 px-6 py-4 rounded-xl text-white z-50 animate-slideIn`;
    
    const colors = {
        success: 'linear-gradient(135deg, #06d6a0, #059669)',
        error: 'linear-gradient(135deg, #ef476f, #dc2626)',
        warning: 'linear-gradient(135deg, #ffb703, #f97316)',
        info: 'linear-gradient(135deg, #4361ee, #4cc9f0)'
    };
    
    notification.style.background = colors[type] || colors.info;
    
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : type === 'warning' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
};