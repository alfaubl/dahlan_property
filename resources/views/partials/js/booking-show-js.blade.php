<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== STATUS DISTRIBUTION CHART (PIE) ==========
    const ctx1 = document.getElementById('statusDistributionChart')?.getContext('2d');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Confirmed', 'Pending', 'Cancelled', 'Completed'],
                datasets: [{
                    data: [65, 20, 10, 5],
                    backgroundColor: [
                        '#28a745',
                        '#ffc107',
                        '#dc3545',
                        '#17a2b8'
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
                        labels: { 
                            usePointStyle: true,
                            font: { size: 10 }
                        }
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

    // ========== MONTHLY BOOKINGS CHART (LINE) ==========
    const ctx2 = document.getElementById('monthlyBookingsChart')?.getContext('2d');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Booking',
                    data: [12, 19, 15, 17, 24, 23, 28, 32, 29, 35, 42, 48],
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
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.raw} booking`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#eef2f6'
                        }
                    }
                }
            }
        });
    }

    // ========== PAYMENT BREAKDOWN CHART (BAR) ==========
    const ctx3 = document.getElementById('paymentBreakdownChart')?.getContext('2d');
    if (ctx3) {
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Booking Fee', 'Tax', 'Service Fee', 'Total'],
                datasets: [{
                    label: 'Jumlah (Rp)',
                    data: [amount, tax, service, total],
                    backgroundColor: [
                        '#4a6fa5',
                        '#ffc107',
                        '#17a2b8',
                        '#28a745'
                    ],
                    borderRadius: 5
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
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#eef2f6'
                        },
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    }

    // ========== COPY BOOKING CODE ==========
    const bookingCode = document.getElementById('bookingCode');
    if (bookingCode) {
        bookingCode.addEventListener('click', function() {
            const text = this.textContent;
            navigator.clipboard.writeText(text).then(function() {
                alert('Kode booking disalin ke clipboard!');
            });
        });
    }

    // ========== COUNTDOWN UNTUK PENDING BOOKING ==========
    const timerElement = document.getElementById('paymentTimer');
    if (timerElement) {
        let timeLeft = 600; // 10 minutes in seconds
        const timerInterval = setInterval(function() {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerElement.textContent = '00:00';
            } else {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }
        }, 1000);
    }

    // ========== ANIMATED ENTRANCE ==========
    const cards = document.querySelectorAll('.booking-chart-card, .booking-info-item, .booking-property-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>