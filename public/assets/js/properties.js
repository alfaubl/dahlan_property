// ===== PROPERTIES JS =====
document.addEventListener('DOMContentLoaded', function() {
    initChart();
    initFilterToggle();
    initFilterForm();
    initPropertyCards();
});

function initChart() {
    const chartElement = document.getElementById('propertiesChart');
    if (!chartElement || typeof ApexCharts === 'undefined') return;

    const options = {
        series: [{
            name: 'Jumlah Properti',
            data: [450, 320, 280, 190, 160]
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: { show: false },
            background: 'transparent'
        },
        colors: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'],
        plotOptions: {
            bar: {
                borderRadius: 8,
                columnWidth: '60%',
                distributed: true
            }
        },
        xaxis: {
            categories: ['Rumah', 'Apartemen', 'Ruko', 'Kantor', 'Villa'],
            labels: { style: { colors: '#1e293b', fontSize: '12px' } }
        },
        yaxis: {
            labels: { style: { colors: '#1e293b', fontSize: '11px' } }
        },
        tooltip: {
            theme: 'dark',
            y: { formatter: (val) => val + ' Properti' }
        },
        grid: { borderColor: '#e2e8f0' }
    };

    const chart = new ApexCharts(chartElement, options);
    chart.render();
}

function initFilterToggle() {
    const toggle = document.getElementById('filterToggle');
    const section = document.getElementById('filterSection');

    if (!toggle || !section) return;

    toggle.addEventListener('click', function() {
        section.classList.toggle('active');
        const icon = this.querySelector('i');
        if (icon) {
            icon.className = section.classList.contains('active') 
                ? 'fas fa-times' 
                : 'fas fa-sliders-h';
        }
    });
}

function initFilterForm() {
    const form = document.getElementById('filterForm');
    const resetBtn = document.getElementById('resetFilters');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Filter diterapkan');
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            document.querySelectorAll('.filter-select').forEach(select => {
                select.value = '';
            });
        });
    }
}

function initPropertyCards() {
    const cards = document.querySelectorAll('.property-card');
    
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const id = this.dataset.id;
            if (id) {
                window.location.href = '/properties/' + id;
            }
        });
    });
}