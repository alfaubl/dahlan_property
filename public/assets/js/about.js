// ===== ABOUT JS =====

document.addEventListener('DOMContentLoaded', function() {
    initGrowthChart();
    initTimelineAnimation();
    initTeamCards();
});

/**
 * Initialize ApexCharts for growth chart
 */
function initGrowthChart() {
    const chartElement = document.getElementById('growthChart');
    if (!chartElement) return;

    const options = {
        series: [
            {
                name: 'Properti Terjual',
                data: [150, 320, 580, 890, 1200, 1500]
            },
            {
                name: 'Klien Puas',
                data: [200, 450, 780, 1200, 1900, 2500]
            }
        ],
        chart: {
            type: 'area',
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
        colors: ['#4361ee', '#06d6a0'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.3
            }
        },
        xaxis: {
            categories: ['2015', '2017', '2019', '2021', '2023', '2024'],
            labels: {
                style: {
                    fontSize: '10px',
                    colors: '#64748b'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    fontSize: '10px',
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
                    return val + ' Unit';
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
 * Initialize timeline animation on scroll
 */
function initTimelineAnimation() {
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                }, index * 200);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });
    
    timelineItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(item);
    });
}

/**
 * Initialize team cards with hover effects
 */
function initTeamCards() {
    const teamCards = document.querySelectorAll('.team-card');
    
    teamCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
        
        // Social links
        const socialLinks = card.querySelectorAll('.social-link');
        socialLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.stopPropagation();
                // Add social tracking if needed
            });
        });
    });
}

/**
 * Show notification (optional)
 */
window.showNotification = function(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = 'about-notification';
    
    const colors = {
        success: 'linear-gradient(135deg, #06d6a0, #059669)',
        error: 'linear-gradient(135deg, #ef476f, #dc2626)',
        info: 'linear-gradient(135deg, #4361ee, #4cc9f0)'
    };
    
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${colors[type] || colors.info};
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        z-index: 9999;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        animation: slideIn 0.3s ease-out;
    `;
    
    notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
};