// ===== BOOKING CREATE JS =====
document.addEventListener('DOMContentLoaded', function() {
    initDateValidation();
    initFormSubmit();
});

/**
 * Initialize date validation
 */
function initDateValidation() {
    const dateInput = document.querySelector('input[name="booking_date"]');
    if (!dateInput) return;

    // Set minimum date to tomorrow
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    dateInput.min = tomorrow.toISOString().split('T')[0];

    // Real-time validation
    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate <= today) {
            this.classList.add('error');
            showNotification('Tanggal booking harus setelah hari ini', 'error');
            this.value = '';
        } else {
            this.classList.remove('error');
        }
    });
}

/**
 * Initialize form submit with loading state
 */
function initFormSubmit() {
    const form = document.getElementById('bookingForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        const dateInput = document.querySelector('input[name="booking_date"]');
        const timeInput = document.querySelector('input[name="booking_time"]');

        // Validasi
        if (!dateInput.value) {
            e.preventDefault();
            showNotification('Tanggal booking harus diisi', 'error');
            dateInput.focus();
            return;
        }

        if (!timeInput.value) {
            e.preventDefault();
            showNotification('Waktu booking harus diisi', 'error');
            timeInput.focus();
            return;
        }

        // Tampilkan loading
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
        submitBtn.disabled = true;

        // Form akan submit
        // Jika ada error, button akan di-reset oleh server
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
    `;

    notification.innerHTML = `<span>${message}</span>`;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
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
    .error {
        border-color: #ef4444 !important;
    }
    .error:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
    }
`;
document.head.appendChild(style);