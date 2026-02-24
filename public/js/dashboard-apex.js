// public/js/dashboard-apex.js

document.addEventListener('DOMContentLoaded', function() {
    console.log('Dashboard ApexCharts initializing...');
    
    // Data dari server
    const chartSuccess = window.dashboardData?.chartSuccess || [12, 19, 15, 17, 14, 23, 8];
    const chartPending = window.dashboardData?.chartPending || [5, 7, 4, 6, 8, 5, 3];
    
    // ===== DISTRIBUTION CHART (BAR) =====
    if (document.getElementById('distributionChart')) {
        const distributionOptions = {
            series: [{
                name: 'Jumlah Properti',
                data: [0, 0, 0, 0, 0]
            }],
            chart: {
                type: 'bar',
                height: 300,
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif'
            },
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    distributed: true
                }
            },
            colors: ['#4a6fa5', '#17a2b8', '#28a745', '#ffc107', '#fd7e14'],
            dataLabels: { enabled: false },
            legend: { show: false },
            xaxis: {
                categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
                labels: { style: { fontSize: '12px' } }
            },
            yaxis: {
                labels: { style: { fontSize: '12px' } },
                title: { text: 'Jumlah Unit' }
            },
            grid: {
                borderColor: '#e9ecef',
                strokeDashArray: 5
            },
            tooltip: {
                theme: 'dark',
                y: { formatter: (val) => val + ' Unit' }
            }
        };

        new ApexCharts(document.getElementById('distributionChart'), distributionOptions).render();
    }

    // ===== STATUS CHART (PIE/DOUGHNUT) =====
    if (document.getElementById('statusChart')) {
        const statusOptions = {
            series: [0, 0, 0],
            chart: {
                type: 'donut',
                height: 250,
                fontFamily: 'Inter, sans-serif'
            },
            labels: ['Tersedia', 'Disewa', 'Terjual'],
            colors: ['#28a745', '#ffc107', '#6c757d'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: () => '0 Unit'
                            }
                        }
                    }
                }
            },
            dataLabels: { enabled: false },
            legend: { show: false },
            stroke: { width: 0 },
            tooltip: {
                theme: 'dark',
                y: { formatter: (val) => val + ' Unit' }
            }
        };

        new ApexCharts(document.getElementById('statusChart'), statusOptions).render();
    }

    // ===== BOOKING CHART (LINE/BAR) =====
    if (document.getElementById('bookingChart')) {
        const bookingOptions = {
            series: [
                {
                    name: 'Booking Sukses',
                    data: chartSuccess,
                    color: '#10B981'
                },
                {
                    name: 'Booking Pending',
                    data: chartPending,
                    color: '#F59E0B'
                }
            ],
            chart: {
                type: 'bar',
                height: 300,
                stacked: false,
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif',
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 6,
                    columnWidth: '50%',
                    horizontal: false
                }
            },
            dataLabels: { enabled: false },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: (function() {
                    const days = [];
                    const today = new Date();
                    for (let i = 6; i >= 0; i--) {
                        const date = new Date(today);
                        date.setDate(date.getDate() - i);
                        
                        if (i === 0) days.push('Hari Ini');
                        else if (i === 1) days.push('Kemarin');
                        else {
                            days.push(date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }));
                        }
                    }
                    return days;
                })(),
                labels: { style: { fontSize: '11px' } }
            },
            yaxis: {
                title: { text: 'Jumlah Booking' },
                labels: { style: { fontSize: '11px' } }
            },
            fill: { opacity: 1 },
            tooltip: {
                theme: 'dark',
                y: { formatter: (val) => val + ' Booking' }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                fontSize: '12px',
                markers: { width: 10, height: 10, radius: 5 }
            },
            grid: {
                borderColor: '#e9ecef',
                strokeDashArray: 5
            }
        };

        new ApexCharts(document.getElementById('bookingChart'), bookingOptions).render();
    }

    // Animasi untuk table rows
    animateTableRows();
});

/**
 * Animasi untuk table rows
 */
function animateTableRows() {
    const rows = document.querySelectorAll('.data-table tbody tr');
    
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(10px)';
        row.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        
        setTimeout(() => {
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, 50 * index);
    });
}