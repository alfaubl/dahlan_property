<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== BAR CHART - DISTRIBUSI PROPERTI ==========
    const ctxBar = document.getElementById('distributionChart');
    if (ctxBar) {
        new Chart(ctxBar.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
                datasets: [{
                    label: 'Jumlah Unit',
                    data: [0, 0, 0, 0, 0],
                    backgroundColor: [
                        'rgba(74, 111, 165, 0.9)',
                        'rgba(23, 162, 184, 0.9)',
                        'rgba(40, 167, 69, 0.9)',
                        'rgba(255, 193, 7, 0.9)',
                        'rgba(253, 126, 20, 0.9)'
                    ],
                    borderRadius: 8,
                    barPercentage: 0.55,
                    categoryPercentage: 0.8
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
                        backgroundColor: '#2c3e50',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return `${context.raw} Unit`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#eef2f6',
                            drawBorder: false,
                            lineWidth: 1
                        },
                        ticks: {
                            stepSize: 1,
                            color: '#6c7a8a'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#2c3e50',
                            font: {
                                weight: '500'
                            }
                        }
                    }
                }
            }
        });
    }

    // ========== DOUGHNUT CHART - STATUS PROPERTI ==========
    const ctxDoughnut = document.getElementById('statusChart');
    if (ctxDoughnut) {
        new Chart(ctxDoughnut.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Tersedia', 'Disewa', 'Terjual'],
                datasets: [{
                    data: [0, 0, 0],
                    backgroundColor: [
                        '#28a745',
                        '#ffc107',
                        '#6c757d'
                    ],
                    borderWidth: 0,
                    borderRadius: 5,
                    spacing: 8
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
                        backgroundColor: '#2c3e50',
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} Unit`;
                            }
                        }
                    }
                }
            }
        });
    }

    // ========== ANIMASI CARD ==========
    const statCards = document.querySelectorAll('.stat-card-premium');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    statCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // ========== AUTO UPDATE DATA (DEMO) ==========
    // Function to simulate data update (in real app, this would be AJAX)
    function refreshDashboardData() {
        // This is just a placeholder - in real app, you'd fetch new data via AJAX
        console.log('Dashboard data refreshed');
    }

    // Refresh data every 5 minutes (300000 ms)
    // setInterval(refreshDashboardData, 300000);
});
</script><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/js/dashboard-js.blade.php ENDPATH**/ ?>