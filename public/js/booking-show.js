// public/js/booking-show.js

/**
 * Inisialisasi ECharts untuk statistik booking
 */
function initBookingChart(data) {
    const chartDom = document.getElementById('bookingStatsChart');
    if (!chartDom) return;

    const myChart = echarts.init(chartDom);
    
    const option = {
        title: {
            text: 'Distribusi Status Booking',
            left: 'center',
            top: 0,
            textStyle: {
                fontSize: 16,
                fontWeight: 'bold',
                color: '#2b2d42'
            }
        },
        tooltip: {
            trigger: 'item',
            formatter: '{b}: {c} ({d}%)',
            backgroundColor: '#2b2d42',
            borderColor: '#2b2d42',
            textStyle: {
                color: '#fff',
                fontSize: 12
            }
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            top: 'middle',
            textStyle: {
                fontSize: 12,
                color: '#2b2d42'
            },
            itemGap: 15,
            itemWidth: 10,
            itemHeight: 10
        },
        series: [
            {
                name: 'Status Booking',
                type: 'pie',
                radius: ['45%', '70%'],
                center: ['60%', '50%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: false
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: 14,
                        fontWeight: 'bold'
                    }
                },
                data: [
                    {
                        value: data.paid,
                        name: 'Lunas',
                        itemStyle: { color: '#06d6a0' }
                    },
                    {
                        value: data.pending,
                        name: 'Pending',
                        itemStyle: { color: '#ffb703' }
                    },
                    {
                        value: data.failed,
                        name: 'Gagal',
                        itemStyle: { color: '#ef476f' }
                    },
                    {
                        value: data.cancelled,
                        name: 'Dibatalkan',
                        itemStyle: { color: '#6c757d' }
                    }
                ]
            }
        ],
        graphic: [
            {
                type: 'text',
                left: 'center',
                top: '48%',
                style: {
                    text: 'Total',
                    fill: '#adb5bd',
                    fontSize: 12,
                    fontWeight: 'normal'
                }
            },
            {
                type: 'text',
                left: 'center',
                top: '52%',
                style: {
                    text: data.paid + data.pending + data.failed + data.cancelled,
                    fill: '#2b2d42',
                    fontSize: 20,
                    fontWeight: 'bold'
                }
            }
        ]
    };
    
    myChart.setOption(option);
    
    // Responsive
    window.addEventListener('resize', function() {
        myChart.resize();
    });
    
    return myChart;
}

/**
 * Inisialisasi handler pembayaran Midtrans
 */
function initPaymentHandler() {
    const payButton = document.querySelector('.btn-pay');
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    
    if (!payButton) return;
    
    payButton.addEventListener('click', function() {
        const bookingId = this.dataset.bookingId;
        
        // Show modal
        paymentModal.show();
        
        // Get snap token
        fetch(`/payment/snap-token/${bookingId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            paymentModal.hide();
            
            if (data.snap_token) {
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        showNotification('success', 'Pembayaran berhasil!');
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    },
                    onPending: function(result) {
                        showNotification('warning', 'Pembayaran sedang diproses');
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    },
                    onError: function(result) {
                        showNotification('error', 'Pembayaran gagal, silakan coba lagi');
                        paymentModal.hide();
                    },
                    onClose: function() {
                        paymentModal.hide();
                    }
                });
            } else {
                showNotification('error', 'Gagal memuat token pembayaran');
                paymentModal.hide();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('error', 'Terjadi kesalahan, silakan coba lagi');
            paymentModal.hide();
        });
    });
}

/**
 * Show notification
 */
function showNotification(type, message) {
    // Cek apakah sudah ada toast container
    let toastContainer = document.querySelector('.toast-container');
    
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        document.body.appendChild(toastContainer);
    }
    
    // Buat toast
    const toastId = 'toast-' + Date.now();
    const toastHtml = `
        <div id="${toastId}" class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    toastContainer.insertAdjacentHTML('beforeend', toastHtml);
    
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
    toast.show();
    
    // Hapus setelah hidden
    toastElement.addEventListener('hidden.bs.toast', function() {
        this.remove();
    });
}