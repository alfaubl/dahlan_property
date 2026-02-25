// public/js/welcome.js

document.addEventListener('DOMContentLoaded', function() {
    // Initialize counter
    if (typeof PureCounter !== 'undefined') {
        new PureCounter();
    }
    
    // Initialize welcome chart
    initWelcomeChart();
    
    // Initialize scroll animations
    initScrollAnimations();
    
    // Initialize property card hover effects
    initPropertyCards();
});

/**
 * Initialize welcome chart
 */
function initWelcomeChart() {
    const chartElement = document.getElementById('welcomeChart');
    if (!chartElement) return;
    
    const welcomeOptions = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
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
                speed: 800
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true
            }
        },
        colors: ['#4361ee', '#06d6a0', '#ffb703', '#ef476f', '#4cc9f0'],
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            labels: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Inter, sans-serif'
                }
            },
            title: {
                text: 'Jumlah Properti'
            }
        },
        grid: {
            borderColor: '#e9ecef',
            strokeDashArray: 5
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(val) {
                    return val + ' Properti';
                }
            }
        }
    };

    const chart = new ApexCharts(chartElement, welcomeOptions);
    chart.render();
    
    // Store chart instance for resize handling
    window.welcomeChart = chart;
}

/**
 * Initialize scroll animations
 */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate="true"]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slideIn');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px'
    });
    
    animatedElements.forEach(el => observer.observe(el));
    
    // Also observe feature cards
    const featureCards = document.querySelectorAll('.feature-card');
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                cardObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    featureCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        cardObserver.observe(card);
    });
}

/**
 * Initialize property card hover effects
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
        card.addEventListener('click', function() {
            const propertyId = this.dataset.propertyId;
            if (propertyId) {
                window.location.href = `/properties/${propertyId}`;
            }
        });
    });
}

// Handle window resize
window.addEventListener('resize', function() {
    if (window.welcomeChart) {
        window.welcomeChart.resize();
    }
});

// Export functions
window.initWelcomeChart = initWelcomeChart;