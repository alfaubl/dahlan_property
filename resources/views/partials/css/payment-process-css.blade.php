<style>
:root {
    --primary: #4a6fa5;
    --primary-dark: #2c3e50;
    --secondary: #6b8cae;
    --success: #28a745;
    --warning: #ffc107;
    --danger: #dc3545;
    --info: #17a2b8;
    --light: #f8f9fa;
    --dark: #343a40;
    --gray-100: #f8f9fc;
    --gray-200: #eef2f6;
    --gray-300: #e2e8f0;
    --gray-600: #6c7a8a;
    --gray-800: #2c3e50;
    --white: #ffffff;
}

.payment-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: calc(100vh - 76px);
    padding: 40px 0;
}

.payment-card {
    border: none;
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background: white;
    position: relative;
}

.payment-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, var(--primary), var(--secondary), var(--info));
}

.payment-header {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    padding: 40px 30px;
    color: white;
    position: relative;
    overflow: hidden;
}

.payment-header::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: rotate(15deg);
}

.payment-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
}

.payment-header p {
    opacity: 0.9;
    margin-bottom: 0;
    position: relative;
    z-index: 2;
    font-size: 1rem;
}

.payment-body {
    padding: 40px;
    background: white;
}

/* Timer Section */
.timer-section {
    background: linear-gradient(135deg, var(--gray-100), white);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
    border: 1px solid var(--gray-200);
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
}

.timer-wrapper {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.timer-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--warning), #fd7e14);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 20px rgba(255, 193, 7, 0.2);
}

.timer-icon i {
    font-size: 2rem;
    color: white;
}

.timer-content {
    flex: 1;
}

.timer-label {
    color: var(--gray-600);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.timer-display {
    font-size: 3rem;
    font-weight: 700;
    color: var(--warning);
    font-family: 'Courier New', monospace;
    line-height: 1;
    text-shadow: 0 2px 10px rgba(255, 193, 7, 0.2);
}

.order-id-box {
    background: white;
    border-radius: 15px;
    padding: 15px 25px;
    border: 2px dashed var(--gray-200);
    text-align: center;
    transition: all 0.3s ease;
}

.order-id-box:hover {
    border-color: var(--primary);
    background: var(--gray-100);
}

.order-id-box .label {
    color: var(--gray-600);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.order-id-box .value {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary);
    cursor: pointer;
    transition: all 0.2s ease;
}

.order-id-box .value:hover {
    color: var(--primary-dark);
    transform: scale(1.05);
}

/* Charts Section */
.charts-section {
    margin-bottom: 30px;
}

.chart-card {
    background: white;
    border-radius: 20px;
    padding: 20px;
    border: 1px solid var(--gray-200);
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    height: 100%;
    transition: all 0.3s ease;
}

.chart-card:hover {
    box-shadow: 0 10px 30px rgba(74, 111, 165, 0.1);
    transform: translateY(-3px);
}

.chart-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.chart-title i {
    color: var(--primary);
    font-size: 1.1rem;
}

.chart-wrapper {
    position: relative;
    height: 200px;
    width: 100%;
}

/* Booking Info */
.booking-info {
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
    border: 1px solid rgba(33, 150, 243, 0.2);
}

.booking-code {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary-dark);
    margin-bottom: 10px;
}

.booking-details {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.booking-detail-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.booking-detail-item i {
    width: 30px;
    height: 30px;
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
}

/* Property Info */
.property-info {
    background: white;
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 30px;
    border: 1px solid var(--gray-200);
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.property-image {
    width: 80px;
    height: 80px;
    border-radius: 15px;
    overflow: hidden;
}

.property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.property-details {
    flex: 1;
}

.property-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 5px;
}

.property-location {
    color: var(--gray-600);
    font-size: 0.9rem;
}

.property-location i {
    color: var(--primary);
    margin-right: 5px;
}

/* Payment Details */
.payment-details {
    background: var(--gray-100);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid var(--gray-200);
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    color: var(--gray-600);
    font-weight: 500;
}

.detail-value {
    font-weight: 600;
    color: var(--gray-800);
}

.total-row {
    font-size: 1.2rem;
    padding-top: 15px;
}

.total-value {
    color: var(--primary);
    font-weight: 700;
}

/* Payment Methods */
.payment-methods {
    background: white;
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 30px;
    border: 1px solid var(--gray-200);
}

.methods-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 15px;
}

.method-icons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    align-items: center;
}

.method-icons img {
    height: 30px;
    filter: grayscale(0.5);
    opacity: 0.7;
    transition: all 0.2s ease;
}

.method-icons img:hover {
    filter: grayscale(0);
    opacity: 1;
    transform: scale(1.1);
}

/* Pay Button */
.pay-button {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 18px 30px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(74, 111, 165, 0.2);
}

.pay-button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.pay-button:hover::before {
    width: 300px;
    height: 300px;
}

.pay-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(74, 111, 165, 0.3);
}

.pay-button:disabled {
    opacity: 0.6;
    transform: none;
    box-shadow: none;
    cursor: not-allowed;
}

.pay-button i {
    font-size: 1.2rem;
}

/* Security Badge */
.security-badge {
    margin-top: 20px;
    text-align: center;
    color: var(--gray-600);
    font-size: 0.9rem;
}

.security-badge i {
    color: var(--primary);
    margin-right: 5px;
}

/* Responsive */
@media (max-width: 768px) {
    .payment-body {
        padding: 25px 20px;
    }
    
    .timer-display {
        font-size: 2rem;
    }
    
    .timer-wrapper {
        flex-direction: column;
        text-align: center;
    }
    
    .method-icons {
        justify-content: center;
    }
    
    .property-info {
        flex-direction: column;
        text-align: center;
    }
    
    .property-image {
        margin: 0 auto;
    }
}
</style>