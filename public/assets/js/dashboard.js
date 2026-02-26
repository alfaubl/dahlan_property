// ===== DASHBOARD JS =====

document.addEventListener('DOMContentLoaded', function() {
    initDistributionChart();
    initStatusChart();
});

/**
 * Initialize ECharts for property distribution
 */
function initDistributionChart() {
    const chartElement = document.getElementById('distributionChart');
    if (!chartElement) return;

    const chart = echarts.init(chartElement);
    
    const option = {
        tooltip: {
            trigger: 'axis',
            axisPointer: { type: 'shadow' },
            backgroundColor: '#1e293b',
            borderColor: '#1e293b',
            textStyle: { color: '#fff' }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            data: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            axisLabel: { color: '#64748b' },
            axisLine: { lineStyle: { color: '#e2e8f0' } }
        },
        yAxis: {
            type: 'value',
            axisLabel: { color: '#64748b' },
            splitLine: { lineStyle: { color: '#e2e8f0', type: 'dashed' } }
        },
        series: [
            {
                name: 'Jumlah Properti',
                type: 'bar',
                data: [12, 19, 15, 17, 14],
                itemStyle: {
                    borderRadius: [8, 8, 0, 0],
                    color: function(params) {
                        const colors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'];
                        return colors[params.dataIndex % colors.length];
                    }
                },
                barWidth: '60%',
                label: {
                    show: true,
                    position: 'top',
                    color: '#1e293b',
                    fontWeight: 500,
                    fontSize: 11
                }
            }
        ]
    };

    chart.setOption(option);

    // Responsive
    window.addEventListener('resize', function() {
        chart.resize();
    });

    return chart;
}

/**
 * Initialize ECharts for status distribution
 */
function initStatusChart() {
    const chartElement = document.getElementById('statusChart');
    if (!chartElement) return;

    const chart = echarts.init(chartElement);
    
    const option = {
        tooltip: {
            trigger: 'item',
            backgroundColor: '#1e293b',
            borderColor: '#1e293b',
            textStyle: { color: '#fff' },
            formatter: '{b}: {c} ({d}%)'
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            top: 'center',
            textStyle: { color: '#64748b' },
            itemGap: 15,
            itemWidth: 10,
            itemHeight: 10
        },
        series: [
            {
                name: 'Status Properti',
                type: 'pie',
                radius: ['45%', '70%'],
                center: ['60%', '50%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 8,
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
                    { value: 0, name: 'Tersedia', itemStyle: { color: '#10b981' } },
                    { value: 0, name: 'Disewa', itemStyle: { color: '#f59e0b' } },
                    { value: 0, name: 'Terjual', itemStyle: { color: '#6b7280' } }
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
                    fill: '#64748b',
                    fontSize: 12,
                    fontWeight: 'normal'
                }
            },
            {
                type: 'text',
                left: 'center',
                top: '52%',
                style: {
                    text: '0',
                    fill: '#1e293b',
                    fontSize: 20,
                    fontWeight: 'bold'
                }
            }
        ]
    };

    chart.setOption(option);

    // Responsive
    window.addEventListener('resize', function() {
        chart.resize();
    });

    return chart;
}

// Export functions
window.initDistributionChart = initDistributionChart;
window.initStatusChart = initStatusChart;