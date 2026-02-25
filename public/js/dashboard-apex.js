// public/js/dashboard.js

// Initialize all charts
function initDashboardCharts(data) {
    // Distribution Chart
    if (document.getElementById('distributionChart')) {
        const distributionOptions = {
            series: [{
                name: 'Jumlah Properti',
                data: [0, 0, 0, 0, 0]
            }],
            chart: {
                type: 'bar',
                height: 300,
                fontFamily: 'Inter, sans-serif',
                toolbar: { show: false },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800
                }
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
            xaxis: {
                categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
                labels: { style: { fontSize: '12px' } }
            },
            yaxis: { labels: { style: { fontSize: '12px' } } },
            grid: { borderColor: '#e9ecef' }
        };

        new ApexCharts(document.getElementById('distributionChart'), distributionOptions).render();
    }

    // Status Chart
    if (document.getElementById('statusChart')) {
        const statusOptions = {
            series: [0, 0, 0],
            chart: {
                type: 'donut',
                height: 300,
                fontFamily: 'Inter, sans-serif',
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800
                }
            },
            colors: ['#28a745', '#ffc107', '#6c757d'],
            labels: ['Tersedia', 'Disewa', 'Terjual'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total',
                                formatter: function() {
                                    return '0 Unit';
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: { enabled: false },
            legend: { position: 'bottom' }
        };

        new ApexCharts(document.getElementById('statusChart'), statusOptions).render();
    }

    // Booking Chart
    if (document.getElementById('bookingChart')) {
        const bookingOptions = {
            series: [
                {
                    name: 'Booking Sukses',
                    data: data?.chartSuccess || [12, 19, 15, 17, 14, 23, 8],
                    color: '#06d6a0'
                },
                {
                    name: 'Booking Pending',
                    data: data?.chartPending || [5, 7, 4, 6, 8, 5, 3],
                    color: '#ffb703'
                }
            ],
            chart: {
                type: 'bar',
                height: 300,
                fontFamily: 'Inter, sans-serif',
                toolbar: { show: false },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 8,
                    columnWidth: '60%',
                    horizontal: false
                }
            },
            dataLabels: { enabled: false },
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
                labels: { style: { fontSize: '12px' } }
            },
            yaxis: { labels: { style: { fontSize: '12px' } } },
            grid: { borderColor: '#e9ecef' },
            legend: { position: 'top' }
        };

        new ApexCharts(document.getElementById('bookingChart'), bookingOptions).render();
    }
}

// Initialize counter animations
function initCounters() {
    if (typeof PureCounter !== 'undefined') {
        new PureCounter();
    }
}

// Export functions
window.initDashboardCharts = initDashboardCharts;
window.initCounters = initCounters;