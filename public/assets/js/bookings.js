// ===== BOOKINGS JS =====
document.addEventListener('DOMContentLoaded', function() {
    initChart();
    initFilters();
    initSearch();
    initCancelButtons();
});

function initChart() {
    const canvas = document.getElementById('bookingsChart');
    if (!canvas || typeof ApexCharts === 'undefined') return;

    const data = window.bookingData || {
        success: [12, 19, 15, 17, 14, 23, 8],
        pending: [5, 7, 4, 6, 8, 5, 3],
        cancelled: [2, 1, 3, 2, 1, 2, 1],
        categories: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kmr', 'H Ini']
    };

    const options = {
        series: [
            { name: 'Sukses', data: data.success },
            { name: 'Pending', data: data.pending },
            { name: 'Batal', data: data.cancelled }
        ],
        chart: {
            type: 'bar',
            height: 300,
            stacked: true,
            toolbar: { show: false },
            animations: { enabled: true }
        },
        colors: ['#10b981', '#f59e0b', '#ef4444'],
        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: '60%',
                horizontal: false
            }
        },
        xaxis: {
            categories: data.categories,
            labels: { style: { fontSize: '11px' } }
        },
        yaxis: {
            labels: { style: { fontSize: '11px' } },
            title: { text: 'Jumlah Booking' }
        },
        tooltip: {
            theme: 'dark',
            y: { formatter: (val) => val + ' booking' }
        },
        legend: { position: 'top' },
        grid: { borderColor: '#e2e8f0' }
    };

    const chart = new ApexCharts(canvas, options);
    chart.render();
}

function initFilters() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const tableBody = document.getElementById('tableBody');

    if (!filterBtns.length || !tableBody) return;

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.dataset.filter;
            const rows = tableBody.querySelectorAll('tr');

            rows.forEach(row => {
                if (filter === 'all' || row.dataset.status === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
}

function initSearch() {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('tableBody');

    if (!searchInput || !tableBody) return;

    searchInput.addEventListener('keyup', function() {
        const term = this.value.toLowerCase();
        const rows = tableBody.querySelectorAll('tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(term) ? '' : 'none';
        });
    });
}

function initCancelButtons() {
    window.cancelBooking = function(id) {
        if (!confirm('Yakin ingin membatalkan booking ini?')) return;

        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        btn.disabled = true;

        fetch(`/bookings/${id}/cancel`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.csrfToken,
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Booking dibatalkan');
                location.reload();
            } else {
                alert(data.message || 'Gagal membatalkan');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(() => {
            alert('Terjadi kesalahan');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    };
}