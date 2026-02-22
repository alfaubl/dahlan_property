<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== FAILURE REASONS CHART (PIE) ==========
    const ctx1 = document.getElementById('failureChart')?.getContext('2d');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Saldo Tidak Cukup', 'Batas Waktu Habis', 'Data Tidak Valid', 'Gangguan Jaringan'],
                datasets: [{
                    data: [40, 30, 20, 10],
                    backgroundColor: [
                        '#dc3545',
                        '#ffc107',
                        '#17a2b8',
                        '#6c757d'
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
                        labels: { usePointStyle: true, font: { size: 10 } }
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

    // ========== DAILY FAILURE CHART (BAR) ==========
    const ctx2 = document.getElementById('dailyFailureChart')?.getContext('2d');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Jumlah Transaksi Gagal',
                    data: [3, 5, 2, 4, 6, 1, 2],
                    backgroundColor: '#dc3545',
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
                        }
                    }
                }
            }
        });
    }

    // ========== AUTO REDIRECT AFTER 30 SECONDS (OPTIONAL) ==========
    // setTimeout(function() {
    //     window.location.href = '{{ route('properties.index') }}';
    // }, 30000);
});
</script>