<!-- resources/views/auth/payment/process.blade.php -->
@extends('layouts.app')

@section('content')
<div class="payment-container">
    <!-- Progress Step -->
    <div class="progress-step">
        <div class="step-item">
            <span class="step-number completed">1</span>
            <span class="step-label">Cart</span>
        </div>
        <div class="step-line completed"></div>
        
        <div class="step-item">
            <span class="step-number completed">2</span>
            <span class="step-label">Checkout</span>
        </div>
        <div class="step-line completed"></div>
        
        <div class="step-item">
            <span class="step-number active">3</span>
            <span class="step-label active">Payment</span>
        </div>
    </div>

    <div class="payment-grid">
        <!-- Kolom Kiri: Form Pembayaran -->
        <div class="payment-form-col">
            <div class="payment-card">
                <h2 class="card-title">Metode Pembayaran</h2>
                
                <!-- Pilihan Bank Transfer -->
                <div class="payment-method" onclick="selectPayment('bca')">
                    <div class="method-radio">
                        <input type="radio" name="payment_method" value="bca" id="bca">
                        <label for="bca" class="method-label">
                            <img src="/images/bca.png" alt="BCA" class="bank-logo">
                            <div class="method-info">
                                <p class="bank-name">Bank BCA</p>
                                <p class="bank-desc">Virtual Account BCA</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="payment-method" onclick="selectPayment('mandiri')">
                    <div class="method-radio">
                        <input type="radio" name="payment_method" value="mandiri" id="mandiri">
                        <label for="mandiri" class="method-label">
                            <img src="/images/mandiri.png" alt="Mandiri" class="bank-logo">
                            <div class="method-info">
                                <p class="bank-name">Bank Mandiri</p>
                                <p class="bank-desc">Virtual Account Mandiri</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="payment-method" onclick="selectPayment('bni')">
                    <div class="method-radio">
                        <input type="radio" name="payment_method" value="bni" id="bni">
                        <label for="bni" class="method-label">
                            <img src="/images/bni.png" alt="BNI" class="bank-logo">
                            <div class="method-info">
                                <p class="bank-name">Bank BNI</p>
                                <p class="bank-desc">Virtual Account BNI</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="payment-method" onclick="selectPayment('gopay')">
                    <div class="method-radio">
                        <input type="radio" name="payment_method" value="gopay" id="gopay">
                        <label for="gopay" class="method-label">
                            <img src="/images/gopay.png" alt="GoPay" class="bank-logo">
                            <div class="method-info">
                                <p class="bank-name">GoPay</p>
                                <p class="bank-desc">Transfer GoPay</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Chart Pembayaran -->
                <div class="chart-container">
                    <h3 class="chart-title">Statistik Pembayaran</h3>
                    <canvas id="paymentChart"></canvas>
                    <div class="chart-legend">
                        <div class="legend-item">
                            <span class="legend-color" style="background: #3B82F6;"></span>
                            <span>BCA (45%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color" style="background: #10B981;"></span>
                            <span>Mandiri (30%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color" style="background: #F59E0B;"></span>
                            <span>BNI (15%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color" style="background: #EF4444;"></span>
                            <span>GoPay (10%)</span>
                        </div>
                    </div>
                </div>

                <!-- Timer Pembayaran -->
                <div class="timer-container">
                    <p class="timer-label">Selesaikan pembayaran dalam:</p>
                    <div class="timer-display">
                        <span id="minutes">15</span>:<span id="seconds">00</span>
                    </div>
                </div>

                <!-- Tombol Bayar -->
                <button id="pay-button" class="pay-button">
                    <span>Bayar Sekarang</span>
                    <span class="total-amount">Rp {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}</span>
                </button>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan Order -->
        <div class="order-summary-col">
            <div class="summary-card">
                <h2 class="summary-title">Ringkasan Pesanan</h2>
                
                @if(isset($order) && $order)
                    <div class="order-items">
                        @foreach($order->items as $item)
                        <div class="order-item">
                            <div class="item-info">
                                <p class="item-name">{{ $item->property->title }}</p>
                                <p class="item-qty">x{{ $item->quantity }}</p>
                            </div>
                            <span class="item-price">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <hr class="divider">
                    
                    <div class="total-section">
                        <div class="total-row">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($order->subtotal ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="total-row">
                            <span>Biaya Layanan</span>
                            <span>Rp {{ number_format($order->fee ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="total-row grand-total">
                            <span>Total</span>
                            <span class="grand-total-amount">Rp {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <!-- Grafik Mini -->
                    <div class="mini-chart">
                        <canvas id="miniChart"></canvas>
                    </div>
                    
                    <div class="security-badge">
                        <svg class="lock-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span>Pembayaran aman dan terenkripsi</span>
                    </div>
                @else
                    <p class="empty-order">Tidak ada data order</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection