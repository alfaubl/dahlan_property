<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== INITIALIZE CHARTS ==========
    
    // Chart 1: Payment Breakdown (Doughnut)
    const ctx1 = document.getElementById('paymentBreakdownChart')?.getContext('2d');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Booking Fee', 'Tax', 'Service Fee'],
                datasets: [{
                    data: [70, 20, 10],
                    backgroundColor: [
                        '#4a6fa5',
                        '#17a2b8',
                        '#28a745'
                    ],
                    borderWidth: 0,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { usePointStyle: true, padding: 15 }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw}%`;
                            }
                        }
                    }
                }
            }
        });
    }

    // Chart 2: Payment Trend (Line)
    const ctx2 = document.getElementById('paymentTrendChart')?.getContext('2d');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pembayaran Hari Ini',
                    data: [0, 0, 0, 0, 0, 0, 0],
                    borderColor: '#4a6fa5',
                    backgroundColor: 'rgba(74, 111, 165, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#4a6fa5',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    // ========== COUNTDOWN TIMER ==========
    const timerElement = document.getElementById('paymentTimer');
    if (timerElement) {
        let timeLeft = 600; // 10 minutes in seconds
        const timerInterval = setInterval(function() {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerElement.textContent = '00:00';
                if (payButton) payButton.disabled = true;
            } else {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
        }, 1000);
    }

    // ========== PAYMENT BUTTON HANDLER ==========
    const payButton = document.getElementById('payButton');
    const snapToken = document.getElementById('snapToken')?.value;
    const finishUrl = document.getElementById('finishUrl')?.value;
    const unfinishUrl = document.getElementById('unfinishUrl')?.value;
    const errorUrl = document.getElementById('errorUrl')?.value;

    if (payButton && snapToken) {
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            payButton.disabled = true;
            payButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';

            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    if (finishUrl) {
                        window.location.href = finishUrl + '?order_id=' + result.order_id;
                    }
                },
                onPending: function(result) {
                    if (unfinishUrl) {
                        window.location.href = unfinishUrl + '?order_id=' + result.order_id;
                    }
                },
                onError: function(result) {
                    if (errorUrl) {
                        window.location.href = errorUrl + '?order_id=' + result.order_id;
                    }
                },
                onClose: function() {
                    payButton.disabled = false;
                    payButton.innerHTML = '<i class="fas fa-credit-card me-2"></i>Lanjutkan Pembayaran';
                }
            });
        });
    }

    // ========== COPY ORDER ID ==========
    const orderIdElement = document.getElementById('orderId');
    if (orderIdElement) {
        orderIdElement.addEventListener('click', function() {
            navigator.clipboard.writeText(this.textContent).then(function() {
                alert('Order ID disalin ke clipboard!');
            });
        });
    }

    // ========== PRICE FORMATTING ==========
    const amountElement = document.getElementById('paymentAmount');
    if (amountElement) {
        let amount = parseInt(amountElement.textContent.replace(/\D/g, ''));
        if (!isNaN(amount)) {
            amountElement.textContent = 'Rp ' + amount.toLocaleString('id-ID');
        }
    }

    // ========== ANIMATED ENTRANCE ==========
    const cards = document.querySelectorAll('.chart-card, .payment-details, .booking-info');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 })

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>