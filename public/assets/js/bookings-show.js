// ===== BOOKING SHOW JS =====
document.addEventListener('DOMContentLoaded', function () {
    initPaymentButton();
    initCancelButton();
});

/**
 * Initialize payment button
 */
function initPaymentButton() {
    const payBtn = document.querySelector('.btn-pay');
    if (!payBtn) return;

    payBtn.addEventListener('click', function (e) {
        e.preventDefault();
        const bookingId = this.dataset.id || window.bookingConfig?.id;

        if (!bookingId) {
            showNotification('ID booking tidak ditemukan', 'error');
            return;
        }

        if (confirm('Lanjutkan ke pembayaran?')) {
            // Show loading
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            this.disabled = true;

            // Redirect setelah loading
            setTimeout(() => {
                window.location.href = '/payment/process/' + bookingId;
            }, 500);
        }
    });
}

/**
 * Initialize cancel button
 */
function initCancelButton() {
    const cancelBtn = document.querySelector('.btn-cancel');
    if (!cancelBtn) return;

    cancelBtn.addEventListener('click', function (e) {
        e.preventDefault();
        
        // Ganti ke window.bookingConfig (konsisten)
        const bookingId = window.bookingConfig?.id;
        const token = document.querySelector('meta[name="csrf-token"]')?.content;

        if (!bookingId || !token) {
            showNotification('Data tidak lengkap', 'error');
            return;
        }

        if (!confirm('Yakin ingin membatalkan booking ini?')) return;

        // Show loading
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Membatalkan...';
        this.disabled = true;

        // API Call
        fetch(`/bookings/${bookingId}/cancel`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
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
                resetButton(this, originalText);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan', 'error');
            resetButton(this, originalText);
        });
    });
}

/**
 * Reset button after error
 */
function resetButton(btn, originalText) {
    btn.innerHTML = originalText;
    btn.disabled = false;
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
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);