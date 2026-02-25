// ===== BOOKINGS JS =====

document.addEventListener('DOMContentLoaded', function() {
    initBookingChart();
    initFilters();
    initSearch();
    initActionButtons();
});

/**
 * Initialize Highcharts
 */
function initBookingChart() {
    const chartElement = document.getElementById('bookingsChart');
    if (!chartElement || typeof Highcharts === 'undefined') return;

    const data = window.bookingData || {
        success: [12, 19, 15, 17, 14, 23, 8],
        pending: [5, 7, 4, 6, 8, 5, 3],
        cancelled: [2, 1, 3, 2, 1, 2, 1],
        categories: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kmr', 'H Ini']
    };

    Highcharts.chart('bookingsChart', {
        chart: {
            type: 'column',
            backgroundColor: 'transparent',
            height: 250,
            style: { fontFamily: 'Inter, sans-serif' },
            animation: { duration: 1000 }
        },
        title: { text: null },
        xAxis: {
            categories: data.categories,
            labels: { style: { fontSize: '10px', color: '#6b7280' } },
            lineColor: '#e5e7eb'
        },
        yAxis: {
            min: 0,
            title: { text: 'Jumlah Booking', style: { fontSize: '10px', color: '#6b7280' } },
            gridLineColor: '#e5e7eb'
        },
        tooltip: {
            shared: true,
            valueSuffix: ' booking',
            backgroundColor: '#2b2d42',
            style: { color: '#ffffff', fontSize: '11px' }
        },
        plotOptions: {
            column: {
                borderRadius: 4,
                borderWidth: 0,
                stacking: 'normal',
                dataLabels: { enabled: false }
            }
        },
        series: [
            { name: 'Sukses', data: data.success, color: '#06d6a0' },
            { name: 'Pending', data: data.pending, color: '#ffb703' },
            { name: 'Batal', data: data.cancelled, color: '#6c757d' }
        ],
        credits: { enabled: false }
    });
}

/**
 * Initialize filter tabs
 */
function initFilters() {
    const filterTabs = document.querySelectorAll('.filter-tab');
    const tableBody = document.getElementById('tableBody');

    if (!filterTabs.length || !tableBody) return;

    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            filterTabs.forEach(t => t.classList.remove('active'));
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

/**
 * Initialize search
 */
function initSearch() {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const tableBody = document.getElementById('tableBody');

    if (!searchInput || !searchBtn || !tableBody) return;

    function performSearch() {
        const term = searchInput.value.toLowerCase().trim();
        const rows = tableBody.querySelectorAll('tr');
        
        rows.forEach(row => {
            if (term === '') {
                row.style.display = '';
            } else {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            }
        });
    }

    searchBtn.addEventListener('click', performSearch);
    searchInput.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') performSearch();
    });
}

/**
 * Initialize action buttons
 */
function initActionButtons() {
    // View buttons
    document.querySelectorAll('.btn-view').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const bookingId = row?.dataset.id;
            if (bookingId) window.location.href = `/bookings/${bookingId}`;
        });
    });

    // Cancel buttons
    document.querySelectorAll('.btn-cancel').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const bookingId = row?.dataset.id;
            
            if (bookingId && confirm('Batalkan booking ini?')) {
                cancelBooking(bookingId, row, this);
            }
        });
    });

    // Pay buttons
    document.querySelectorAll('.btn-pay').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const bookingId = row?.dataset.id;
            if (bookingId) window.location.href = `/payment/process/${bookingId}`;
        });
    });
}

/**
 * Cancel booking
 */
function cancelBooking(bookingId, row, button) {
    if (!row) return;

    button.disabled = true;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

    setTimeout(() => {
        const statusCell = row.querySelector('.status-badge');
        if (statusCell) {
            statusCell.className = 'status-badge status-cancelled';
            statusCell.innerHTML = '<i class="fas fa-times-circle"></i> Batal';
        }
        
        row.dataset.status = 'cancelled';
        
        const actionDiv = row.querySelector('.action-buttons');
        if (actionDiv) {
            const viewBtn = actionDiv.querySelector('.btn-view');
            if (viewBtn) {
                actionDiv.innerHTML = viewBtn.outerHTML;
            }
        }
        
        if (window.showNotification) {
            window.showNotification('Booking berhasil dibatalkan', 'success');
        }
    }, 1000);
}