// ===== CONTACT JS =====

document.addEventListener('DOMContentLoaded', function() {
    initServicesChart();
    initContactForm();
    initFaqAccordion();
});

/**
 * Initialize ApexCharts for services distribution
 */
function initServicesChart() {
    const chartElement = document.getElementById('servicesChart');
    if (!chartElement) return;

    const options = {
        series: [45, 30, 25],
        chart: {
            type: 'donut',
            height: 250,
            fontFamily: 'Inter, sans-serif',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#4361ee', '#06d6a0', '#ffb703'],
        labels: ['Konsultasi', 'Booking', 'Info Properti'],
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total',
                            fontSize: '14px',
                            color: '#1e293b',
                            formatter: function() {
                                return '100%';
                            }
                        }
                    }
                }
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function(val) {
                    return val + '%';
                }
            }
        },
        stroke: {
            width: 0
        }
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
}

/**
 * Initialize contact form with validation
 */
function initContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name')?.value;
        const email = document.getElementById('email')?.value;
        const message = document.getElementById('message')?.value;

        // Simple validation
        if (!name || !email || !message) {
            showNotification('Mohon lengkapi semua field yang wajib diisi', 'error');
            return;
        }

        if (!validateEmail(email)) {
            showNotification('Format email tidak valid', 'error');
            return;
        }

        // Show loading state
        const submitBtn = form.querySelector('.btn-submit');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            showNotification('Pesan Anda telah terkirim!', 'success');
            form.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);

        // Actual API call would be:
        /*
        fetch('/contact/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ name, email, message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                form.reset();
            } else {
                showNotification(data.message, 'error');
            }
        })
        .catch(error => {
            showNotification('Terjadi kesalahan', 'error');
        })
        .finally(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
        */
    });
}

/**
 * Initialize FAQ accordion (if needed)
 */
function initFaqAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            item.classList.toggle('active');
        });
    });
}

/**
 * Validate email format
 */
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

/**
 * Show notification toast
 */
function showNotification(message, type = 'success') {
    // Remove existing notification
    const existing = document.querySelector('.contact-notification');
    if (existing) existing.remove();

    const notification = document.createElement('div');
    notification.className = 'contact-notification';
    
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
}

// Add animation keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);