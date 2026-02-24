// public/js/dashboard-config.js

/**
 * Mengambil data dari HTML data-attribute dan simpan ke window object
 * File ini HARUS dimuat sebelum dashboard-bookings.js
 */

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('chartDataContainer');
    
    if (container) {
        // Parse data dari HTML attribute
        const bookingsData = JSON.parse(container.getAttribute('data-bookings') || '[]');
        const totalPrice = parseFloat(container.getAttribute('data-total-price') || '0');
        const chartData = JSON.parse(container.getAttribute('data-chart') || '[]');
        
        // Simpan ke window object agar bisa diakses file JS lain
        window.bookingChartData = {
            bookings: bookingsData,
            totalPrice: totalPrice,
            chartData: chartData,
            // Format khusus untuk chart booking (success & pending per hari)
            success: chartData.success || [0, 0, 0, 0, 0, 0, 0],
            pending: chartData.pending || [0, 0, 0, 0, 0, 0, 0]
        };
        
        console.log('✅ Dashboard data loaded:', window.bookingChartData);
    } else {
        console.warn('⚠️ chartDataContainer not found, using default data');
        window.bookingChartData = {
            bookings: [],
            totalPrice: 0,
            chartData: [],
            success: [0, 0, 0, 0, 0, 0, 0],
            pending: [0, 0, 0, 0, 0, 0, 0]
        };
    }
});