// File: public/js/payment.js
document.addEventListener('DOMContentLoaded', function() {
    // ========== PAYMENT BUTTON HANDLER ==========
    const payButton = document.getElementById('pay-button');
    const snapToken = document.getElementById('snap-token')?.value;
    const finishUrl = document.getElementById('finish-url')?.value;
    const unfinishUrl = document.getElementById('unfinish-url')?.value;
    const errorUrl = document.getElementById('error-url')?.value;
    
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
    
    // ========== AUTO-COPY ORDER ID ==========
    const orderIdElement = document.getElementById('order-id');
    if (orderIdElement) {
        orderIdElement.addEventListener('click', function() {
            navigator.clipboard.writeText(this.textContent).then(function() {
                alert('Order ID disalin!');
            });
        });
    }
    
    // ========== COUNTDOWN TIMER ==========
    const timerElement = document.getElementById('payment-timer');
    if (timerElement) {
        let timeLeft = 600;
        const timerInterval = setInterval(function() {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerElement.textContent = 'Waktu habis!';
                if (payButton) payButton.disabled = true;
            } else {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }
        }, 1000);
    }
});