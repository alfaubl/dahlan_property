


<?php $__env->startSection('title', 'Detail Booking'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            
            <div class="mb-4">
                <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-outline-secondary">
                    ← Kembali ke Daftar Booking
                </a>
            </div>

            
            <div class="card shadow-sm border-0">
                
                
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1">
                                <i class="bi bi-receipt me-2"></i>Detail Booking
                            </h2>
                            <p class="mb-0 opacity-75">Informasi lengkap booking properti Anda</p>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-light text-primary fs-6">
                                <?php echo e($booking->booking_code); ?>

                            </span>
                        </div>
                    </div>
                </div>

                
                <div class="card-body p-4">
                    
                    
                    <?php
                        $status = $booking->payment->status ?? 'pending';
                        
                        $badge = match($status) {
                            'paid' => 'bg-success',
                            'pending' => 'bg-warning',
                            'challenge' => 'bg-info',
                            'failed', 'expired', 'cancelled', 'deny' => 'bg-danger',
                            default => 'bg-secondary'
                        };
                        
                        $statusLabel = match($status) {
                            'paid' => 'Lunas',
                            'pending' => 'Menunggu Pembayaran',
                            'challenge' => 'Verifikasi',
                            'failed' => 'Gagal',
                            'expired' => 'Kadaluarsa',
                            'cancelled' => 'Dibatalkan',
                            'deny' => 'Ditolak',
                            default => 'Tidak Diketahui'
                        };
                    ?>

                    
                    <div class="alert <?php echo e($badge); ?> bg-opacity-10 border-0 rounded-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">Status Pembayaran</h5>
                                <small class="text-muted">Status transaksi pembayaran Anda</small>
                            </div>
                            <span class="badge <?php echo e($badge); ?> px-4 py-2 fs-5">
                                <?php echo e($statusLabel); ?>

                            </span>
                        </div>
                    </div>

                    
                    <div class="row g-4 mb-4">
                        
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm bg-light">
                                <div class="card-body">
                                    <h6 class="card-title text-muted mb-3">
                                        <i class="bi bi-house-door-fill me-2 text-primary"></i>Informasi Properti
                                    </h6>
                                    <table class="table table-borderless mb-0">
                                        <tr>
                                            <td class="text-muted">Nama Properti</td>
                                            <td class="fw-bold"><?php echo e($booking->property->name ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Lokasi</td>
                                            <td><?php echo e($booking->property->location ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Harga</td>
                                            <td class="text-primary fw-bold">
                                                Rp <?php echo e(number_format($booking->total_price, 0, ',', '.')); ?>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm bg-light">
                                <div class="card-body">
                                    <h6 class="card-title text-muted mb-3">
                                        <i class="bi bi-calendar-event-fill me-2 text-primary"></i>Detail Booking
                                    </h6>
                                    <table class="table table-borderless mb-0">
                                        <tr>
                                            <td class="text-muted">Tanggal Booking</td>
                                            <td class="fw-bold"><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('d F Y')); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Waktu</td>
                                            <td><?php echo e(\Carbon\Carbon::parse($booking->booking_time)->format('H:i')); ?> WIB</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Dibuat Pada</td>
                                            <td><?php echo e($booking->created_at->format('d M Y, H:i')); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <?php if($booking->user): ?>
                    <div class="card border-0 shadow-sm mb-4 bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-muted mb-3">
                                <i class="bi bi-person-fill me-2 text-primary"></i>Informasi Pemesan
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <strong>Nama:</strong>
                                    <p class="mb-0"><?php echo e($booking->user->name ?? '-'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <strong>Email:</strong>
                                    <p class="mb-0"><?php echo e($booking->user->email ?? '-'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <strong>Telepon:</strong>
                                    <p class="mb-0"><?php echo e($booking->user->phone ?? '-'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    
                    <?php if($booking->notes): ?>
                    <div class="card border-0 shadow-sm mb-4 bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-muted mb-2">
                                <i class="bi bi-journal-text me-2 text-primary"></i>Catatan
                            </h6>
                            <p class="mb-0"><?php echo e($booking->notes); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    
                    <?php if($booking->payment): ?>
                    <div class="card border-0 shadow-sm mb-4 bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-muted mb-3">
                                <i class="bi bi-credit-card-2-front me-2 text-primary"></i>Informasi Pembayaran
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <strong>Order ID:</strong>
                                    <p class="mb-0 font-monospace small"><?php echo e($booking->payment->order_id ?? '-'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <strong>Metode:</strong>
                                    <p class="mb-0"><?php echo e($booking->payment->payment_method ?? '-'); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <strong>Dibayar Pada:</strong>
                                    <p class="mb-0"><?php echo e($booking->paid_at ? \Carbon\Carbon::parse($booking->paid_at)->format('d M Y, H:i') : '-'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0">
                                <i class="bi bi-graph-up me-2 text-primary"></i>Statistik Booking Anda
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                
                                <div class="col-md-8">
                                    <div id="bookingStatusChart" style="height: 350px;"></div>
                                </div>
                                
                                
                                <div class="col-md-4">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="card bg-success bg-opacity-10 border-0">
                                                <div class="card-body text-center">
                                                    <h3 class="text-success mb-0"><?php echo e($stats['paid'] ?? 0); ?></h3>
                                                    <small class="text-muted">Lunas</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card bg-warning bg-opacity-10 border-0">
                                                <div class="card-body text-center">
                                                    <h3 class="text-warning mb-0"><?php echo e($stats['pending'] ?? 0); ?></h3>
                                                    <small class="text-muted">Pending</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card bg-danger bg-opacity-10 border-0">
                                                <div class="card-body text-center">
                                                    <h3 class="text-danger mb-0"><?php echo e($stats['failed'] ?? 0); ?></h3>
                                                    <small class="text-muted">Gagal</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card bg-secondary bg-opacity-10 border-0">
                                                <div class="card-body text-center">
                                                    <h3 class="text-secondary mb-0"><?php echo e($stats['cancelled'] ?? 0); ?></h3>
                                                    <small class="text-muted">Dibatalkan</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card bg-primary bg-opacity-10 border-0">
                                                <div class="card-body text-center">
                                                    <h3 class="text-primary mb-0"><?php echo e($stats['total'] ?? 0); ?></h3>
                                                    <small class="text-muted">Total Booking</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="d-flex gap-2 flex-wrap pt-3 border-top">
                        <?php if($status === 'pending'): ?>
                            <button type="button" class="btn btn-primary btn-pay" data-booking-id="<?php echo e($booking->id); ?>">
                                <i class="bi bi-credit-card me-2"></i>Bayar Sekarang
                            </button>
                        <?php endif; ?>

                        <?php if($status === 'paid'): ?>
                            <a href="#" class="btn btn-success">
                                <i class="bi bi-download me-2"></i>Download Invoice
                            </a>
                        <?php endif; ?>

                        <?php if($status === 'pending'): ?>
                            <form action="<?php echo e(route('booking.cancel', $booking->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin membatalkan booking ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-x-circle me-2"></i>Batalkan Booking
                                </button>
                            </form>
                        <?php endif; ?>

                        <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-outline-secondary ms-auto">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php if($status === 'pending'): ?>
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mb-0">Memuat halaman pembayaran...</p>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
    .badge {
        min-width: 140px;
    }
    .table td {
        padding: 0.5rem 0;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>

<script>
// ============================================
// ECHARTS - Grafik Status Booking
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    const chartDom = document.getElementById('bookingStatusChart');
    if (chartDom) {
        const myChart = echarts.init(chartDom);
        
        const option = {
            title: {
                text: 'Distribusi Status Booking',
                left: 'center',
                textStyle: {
                    fontSize: 16,
                    fontWeight: 'bold'
                }
            },
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} ({d}%)'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                top: 'middle'
            },
            series: [
                {
                    name: 'Status Booking',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: 20,
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [
                        { 
                            value: <?php echo e($stats['paid'] ?? 0); ?>, 
                            name: 'Lunas',
                            itemStyle: { color: '#198754' }
                        },
                        { 
                            value: <?php echo e($stats['pending'] ?? 0); ?>, 
                            name: 'Pending',
                            itemStyle: { color: '#ffc107' }
                        },
                        { 
                            value: <?php echo e($stats['failed'] ?? 0); ?>, 
                            name: 'Gagal',
                            itemStyle: { color: '#dc3545' }
                        },
                        { 
                            value: <?php echo e($stats['cancelled'] ?? 0); ?>, 
                            name: 'Dibatalkan',
                            itemStyle: { color: '#6c757d' }
                        }
                    ]
                }
            ]
        };
        
        myChart.setOption(option);
        
        // Responsive resize
        window.addEventListener('resize', function() {
            myChart.resize();
        });
    }
    
    
    <?php if($status === 'pending'): ?>
    const payButton = document.querySelector('.btn-pay');
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    
    if (payButton) {
        payButton.addEventListener('click', function() {
            const bookingId = this.dataset.bookingId;
            paymentModal.show();
            
            fetch(`/payment/snap-token/${bookingId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                paymentModal.hide();
                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            window.location.href = '<?php echo e(route("booking.show", $booking->id)); ?>?success=1';
                        },
                        onPending: function(result) {
                            window.location.href = '<?php echo e(route("booking.show", $booking->id)); ?>?pending=1';
                        },
                        onError: function(result) {
                            alert('Pembayaran gagal. Silakan coba lagi.');
                        },
                        onClose: function() {}
                    });
                } else {
                    alert('Gagal memuat token pembayaran.');
                }
            })
            .catch(error => {
                paymentModal.hide();
                alert('Terjadi kesalahan. Silakan coba lagi.');
            });
        });
    }
    <?php endif; ?>
});
</script>


<?php if($status === 'pending'): ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/bookings/show.blade.php ENDPATH**/ ?>