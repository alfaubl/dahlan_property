// public/js/payment.js

// Inisialisasi Chart.js
document.addEventListener('DOMContentLoaded', function() {
    // Chart Utama
    const ctx = document.getElementById('paymentChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['BCA', 'Mandiri', 'BNI', 'GoPay'],
            datasets: [{
                data: [45, 30, 15, 10],
                backgroundColor: [
                    '#3B82F6',
                    '#10B981',
                    '#F59E0B',
                    '#EF4444'
                ],
                borderWidth: 0,
                borderRadius: 10,
                spacing: 5
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
                    callbacks: {
                        label: function(context) {
                            return `${context.raw}% pengguna memilih metode ini`;
                        }
                    }
                }
            }
        }
    });

    // Mini Chart (Area Chart)
    const miniCtx = document.getElementById('miniChart').getContext('2d');
    new Chart(miniCtx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                data: [12, 19, 15, 17, 14, 23, 18],
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 2,
                borderWidth: 2
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
                x: {
                    display: false
                },
                y: {
                    display: false,
                    beginAtZero: true
                }
            },
            elements: {
                line: {
                    borderWidth: 2
                }
            }
        }
    });

    // Timer Countdown
    startTimer(15, 0); // 15 menit

    // Animasi hover untuk payment method
    const methods = document.querySelectorAll('.payment-method');
    methods.forEach(method => {
        method.addEventListener('click', function() {
            methods.forEach(m => m.classList.remove('selected'));
            this.classList.add('selected');
            const radio = this.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;
        });
    });
});

// Fungsi Timer
function startTimer(minutes, seconds) {
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');
    
    let totalSeconds = (minutes * 60) + seconds;
    
    const timer = setInterval(function() {
        totalSeconds--;
        
        if (totalSeconds < 0) {
            clearInterval(timer);
            alert('Waktu pembayaran habis! Silakan ulangi pemesanan.');
            window.location.href = '/cart';
            return;
        }
        
        const mins = Math.floor(totalSeconds / 60);
        const secs = totalSeconds % 60;
        
        minutesEl.textContent = mins.toString().padStart(2, '0');
        secondsEl.textContent = secs.toString().padStart(2, '0');
        
        // Warning jika waktu tinggal 5 menit
        if (totalSeconds === 300) {
            showWarning('Waktu tinggal 5 menit!');
        }
    }, 1000);
    
    return timer;
}

// Fungsi untuk select payment
function selectPayment(method) {
    const methods = document.querySelectorAll('.payment-method');
    methods.forEach(m => m.classList.remove('selected'));
    
    const selected = event.currentTarget;
    selected.classList.add('selected');
    
    const radio = selected.querySelector('input[type="radio"]');
    if (radio) radio.checked = true;
    
    // Animasi pulse
    selected.style.animation = 'pulse 0.5s';
    setTimeout(() => {
        selected.style.animation = '';
    }, 500);
}

// Show warning dengan toast
function showWarning(message) {
    const toast = document.createElement('div');
    toast.className = 'toast-warning';
    toast.textContent = message;
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #F59E0B;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        z-index: 9999;
        animation: slideIn 0.3s;
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Animasi keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }
    
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

// Fungsi untuk bayar (integrasi Midtrans)
document.getElementById('pay-button').addEventListener('click', function() {
    const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
    
    if (!selectedMethod) {
        showWarning('Silakan pilih metode pembayaran terlebih dahulu!');
        return;
    }
    
    // Disable button selama proses
    this.disabled = true;
    this.innerHTML = '<span>Memproses...</span>';
    
    // Ambil snap token dari server (ini akan diisi dari PaymentController)
    const snapToken = '{{ $snapToken ?? '' }}';
    
    if (snapToken) {
        snap.pay(snapToken, {
            onSuccess: function(result) {
                window.location.href = '/payment/finish?order_id=' + result.order_id;
            },
            onPending: function(result) {
                window.location.href = '/payment/unfinish?order_id=' + result.order_id;
            },
            onError: function(result) {
                window.location.href = '/payment/error?order_id=' + result.order_id;
            },
            onClose: function() {
                // Enable button kembali
                document.getElementById('pay-button').disabled = false;
                document.getElementById('pay-button').innerHTML = 'Bayar Sekarang';
            }
        });
    } else {
        alert('Token pembayaran tidak ditemukan!');
        this.disabled = false;
        this.innerHTML = 'Bayar Sekarang';
    }
});