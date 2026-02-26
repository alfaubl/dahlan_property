// ===== BOOKING CREATE JS =====
document.addEventListener('DOMContentLoaded', function() {
    initChart();
    initFormValidation();
    initSimilarProperties();
});

/**
 * Initialize Highcharts
 */
function initChart() {
    if (typeof Highcharts === 'undefined') return;

    const data = window.propertyStats?.chartData || {
        categories: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kemarin', 'Hari Ini'],
        views: [45, 52, 38, 45, 39, 42, 28],
        interests: [12, 19, 15, 17, 14, 23, 8]
    };

    Highcharts.chart('bookingTrendChart', {
        chart: {
            type: 'line',
            height: 250,
            backgroundColor: 'transparent',
            style: { fontFamily: 'Inter, sans-serif' }
        },
        title: { text: null },
        xAxis: {
            categories: data.categories,
            labels: { style: { fontSize: '10px', color: '#64748b' } }
        },
        yAxis: {
            min: 0,
            title: { text: null },
            gridLineColor: '#e2e8f0',
            labels: { style: { fontSize: '9px', color: '#64748b' } }
        },
        tooltip: {
            shared: true,
            backgroundColor: '#1e293b',
            style: { color: '#fff', fontSize: '10px' }
        },
        plotOptions: {
            line: {
                marker: { enabled: true, radius: 3 },
                lineWidth: 2
            }
        },
        series: [
            {
                name: 'Dilihat',
                data: data.views,
                color: '#3b82f6',
                marker: { fillColor: '#3b82f6' }
            },
            {
                name: 'Diminati',
                data: data.interests,
                color: '#8b5cf6',
                marker: { fillColor: '#8b5cf6' }
            }
        ],
        credits: { enabled: false }
    });
}

/**
 * Initialize form validation
 */
function initFormValidation() {
    const form = document.getElementById('bookingForm');
    if (!form) return;

    const dateInput = form.querySelector('input[name="booking_date"]');
    const timeInput = form.querySelector('input[name="booking_time"]');

    // Set minimum date to tomorrow
    if (dateInput) {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        dateInput.min = tomorrow.toISOString().split('T')[0];
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate date
        if (dateInput && dateInput.value) {
            const selectedDate = new Date(dateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (selectedDate <= today) {
                alert('Tanggal booking harus setelah hari ini');
                return;
            }
        }

        // Validate time
        if (timeInput && !timeInput.value) {
            alert('Jam booking harus diisi');
            return;
        }

        // Show loading
        const submitBtn = form.querySelector('.btn-submit');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
        submitBtn.disabled = true;

        // Submit form
        form.submit();
    });

    // Real-time validation
    if (dateInput) {
        dateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (selectedDate <= today) {
                this.classList.add('error');
                showError('Tanggal booking harus setelah hari ini');
            } else {
                this.classList.remove('error');
            }
        });
    }
}

/**
 * Initialize similar properties click
 */
function initSimilarProperties() {
    const similarItems = document.querySelectorAll('.similar-item');
    
    similarItems.forEach(item => {
        item.addEventListener('click', function() {
            // Get property name
            const name = this.querySelector('strong')?.textContent;
            if (name) {
                showNotification(`Melihat properti: ${name}`, 'info');
            }
        });
    });
}

/**
 * Show error message
 */
function showError(message) {
    showNotification(message, 'error');
}

/**
 * Show notification
 */
function showNotification(message, type = 'info') {
    // Simple alert for now
    alert(message);
}

// Export functions
window.showNotification = showNotification;