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

/* ========== GLOBAL PAYMENT STYLES ========== */
.payment-global-container {
    min-height: calc(100vh - 76px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.payment-global-container::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: moveDots 20s linear infinite;
}

@keyframes moveDots {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

.payment-global-card {
    background: white;
    border-radius: 30px;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    width: 100%;
    overflow: hidden;
    text-align: center;
    position: relative;
    z-index: 2;
    animation: cardFloat 0.6s ease-out;
}

@keyframes cardFloat {
    0% { transform: translateY(30px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

/* ========== CHARTS SECTION ========== */
.payment-charts-section {
    margin: 30px 0;
}

.payment-chart-card {
    background: white;
    border-radius: 20px;
    padding: 20px;
    border: 1px solid var(--gray-200);
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    height: 100%;
    transition: all 0.3s ease;
}

.payment-chart-card:hover {
    box-shadow: 0 10px 30px rgba(74, 111, 165, 0.1);
    transform: translateY(-3px);
}

.payment-chart-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.payment-chart-title i {
    color: var(--primary);
    font-size: 1.1rem;
}

.payment-chart-wrapper {
    position: relative;
    height: 200px;
    width: 100%;
}

/* ========== STATUS HEADERS ========== */
.payment-header-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    padding: 40px 30px;
    color: white;
    position: relative;
    overflow: hidden;
}

.payment-header-warning {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
    padding: 40px 30px;
    color: white;
    position: relative;
    overflow: hidden;
}

.payment-header-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    padding: 40px 30px;
    color: white;
    position: relative;
    overflow: hidden;
}

.payment-header-process {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
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

.payment-icon {
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 3rem;
    border: 3px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(5px);
    animation: iconPulse 2s infinite;
}

@keyframes iconPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.payment-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.payment-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.payment-body {
    padding: 40px;
    background: white;
}

/* ========== INFO BOXES ========== */
.payment-info-box {
    background: #f8f9fa;
    border-left: 5px solid var(--primary);
    padding: 20px;
    border-radius: 12px;
    text-align: left;
    margin-bottom: 30px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.02);
}

.payment-info-box i {
    font-size: 2rem;
    color: var(--primary);
}

.payment-info-box.success {
    border-left-color: var(--success);
}

.payment-info-box.success i {
    color: var(--success);
}

.payment-info-box.warning {
    border-left-color: var(--warning);
}

.payment-info-box.warning i {
    color: var(--warning);
}

.payment-info-box.danger {
    border-left-color: var(--danger);
}

.payment-info-box.danger i {
    color: var(--danger);
}

/* ========== ORDER DETAILS ========== */
.payment-order-details {
    background: var(--gray-100);
    border-radius: 16px;
    padding: 25px;
    margin: 30px 0;
    text-align: left;
    border: 1px solid var(--gray-200);
}

.payment-order-details h5 {
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px dashed var(--gray-200);
    display: flex;
    align-items: center;
    gap: 10px;
}

.payment-order-details h5 i {
    color: var(--primary);
}

.payment-detail-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    padding: 8px 0;
    border-bottom: 1px solid var(--gray-200);
}

.payment-detail-row:last-child {
    border-bottom: none;
}

.payment-detail-label {
    color: var(--gray-600);
    font-weight: 500;
}

.payment-detail-value {
    font-weight: 600;
    color: var(--gray-800);
}

/* ========== BUTTONS ========== */
.payment-btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    box-shadow: 0 10px 25px rgba(74, 111, 165, 0.2);
    position: relative;
    overflow: hidden;
    width: 100%;
}

.payment-btn-primary::before {
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

.payment-btn-primary:hover::before {
    width: 300px;
    height: 300px;
}

.payment-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(74, 111, 165, 0.3);
    color: white;
}

.payment-btn-success {
    background: linear-gradient(135deg, var(--success), #1e7e34);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    width: 100%;
}

.payment-btn-success:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(40, 167, 69, 0.3);
    color: white;
}

.payment-btn-warning {
    background: linear-gradient(135deg, var(--warning), #fd7e14);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    width: 100%;
}

.payment-btn-warning:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(255, 193, 7, 0.3);
    color: white;
}

.payment-btn-outline {
    background: white;
    color: var(--gray-600);
    border: 2px solid var(--gray-200);
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
}

.payment-btn-outline:hover {
    background: var(--gray-100);
    color: var(--gray-800);
    border-color: var(--primary);
}

.payment-btn-retry {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    margin: 10px 0;
    width: 100%;
}

.payment-btn-retry:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(74, 111, 165, 0.3);
}

.payment-btn-dashboard {
    background: white;
    color: var(--gray-600);
    border: 2px solid var(--gray-200);
    padding: 12px 30px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    flex: 1;
}

.payment-btn-dashboard:hover {
    background: var(--gray-100);
    color: var(--gray-800);
    border-color: var(--primary);
}

/* ========== COUNTDOWN TIMER ========== */
.payment-countdown {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    padding: 25px;
    border-radius: 20px;
    margin: 30px 0;
    position: relative;
    overflow: hidden;
}

.payment-countdown::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.payment-timer-label {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 8px;
}

.payment-timer-display {
    font-size: 3rem;
    font-weight: 700;
    font-family: 'Courier New', monospace;
    letter-spacing: 5px;
    position: relative;
    z-index: 2;
    text-shadow: 0 0 20px rgba(255,255,255,0.3);
}

/* ========== WARNING NOTES ========== */
.payment-warning-note {
    margin-top: 20px;
    color: var(--gray-600);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 15px;
    background: var(--gray-100);
    border-radius: 12px;
    border: 1px solid var(--gray-200);
}

.payment-warning-note i {
    color: var(--warning);
    font-size: 1.2rem;
}

/* ========== ERROR MESSAGES ========== */
.payment-error-message {
    background: #fff5f5;
    border-radius: 12px;
    padding: 15px;
    margin: 20px 0;
    color: var(--danger);
    font-weight: 500;
    text-align: left;
    border: 1px solid #ffcdd2;
    display: flex;
    align-items: center;
    gap: 10px;
}

.payment-error-message i {
    color: var(--danger);
    font-size: 1.2rem;
}

.payment-reasons-list {
    background: var(--gray-100);
    border-radius: 16px;
    padding: 25px;
    margin: 30px 0;
    text-align: left;
}

.payment-reasons-list h6 {
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.payment-reasons-list h6 i {
    color: var(--danger);
}

.payment-reasons-list ul {
    list-style: none;
    padding: 0;
}

.payment-reasons-list li {
    padding: 8px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--gray-600);
}

.payment-reasons-list li i {
    color: var(--danger);
    font-size: 0.9rem;
}

/* ========== CONTACT SUPPORT ========== */
.payment-contact-support {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid var(--gray-200);
}

.payment-contact-support p {
    color: var(--gray-600);
    margin-bottom: 15px;
}

.payment-btn-whatsapp {
    background: #25D366;
    color: white;
    padding: 12px 25px;
    border-radius: 40px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
    border: none;
}

.payment-btn-whatsapp:hover {
    background: #128C7E;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
}

/* ========== BADGES ========== */
.payment-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 30px;
    font-weight: 600;
    margin-bottom: 20px;
}

.payment-badge-success {
    background: rgba(40, 167, 69, 0.1);
    color: var(--success);
    border: 1px solid rgba(40, 167, 69, 0.2);
}

.payment-badge-warning {
    background: rgba(255, 193, 7, 0.1);
    color: var(--warning);
    border: 1px solid rgba(255, 193, 7, 0.2);
}

.payment-badge-danger {
    background: rgba(220, 53, 69, 0.1);
    color: var(--danger);
    border: 1px solid rgba(220, 53, 69, 0.2);
}

/* ========== PROGRESS INDICATOR ========== */
.payment-progress {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin: 20px 0;
}

.payment-progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.payment-progress-step .step-number {
    width: 35px;
    height: 35px;
    background: var(--gray-200);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--gray-600);
}

.payment-progress-step.active .step-number {
    background: var(--primary);
    color: white;
}

.payment-progress-step.completed .step-number {
    background: var(--success);
    color: white;
}

.payment-progress-step .step-label {
    font-size: 0.8rem;
    color: var(--gray-600);
}

.payment-progress-line {
    width: 50px;
    height: 2px;
    background: var(--gray-200);
}

.payment-progress-line.active {
    background: var(--primary);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 768px) {
    .payment-header-success,
    .payment-header-warning,
    .payment-header-danger,
    .payment-header-process {
        padding: 30px 20px;
    }
    
    .payment-icon {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
    
    .payment-title {
        font-size: 1.5rem;
    }
    
    .payment-body {
        padding: 30px 20px;
    }
    
    .payment-timer-display {
        font-size: 2rem;
    }
    
    .payment-btn-retry, .payment-btn-dashboard {
        width: 100%;
    }
    
    .payment-progress {
        flex-wrap: wrap;
    }
    
    .payment-progress-line {
        width: 20px;
    }
}

@media (max-width: 576px) {
    .d-flex.gap-2 {
        flex-direction: column;
    }
    
    .payment-btn-dashboard {
        width: 100%;
    }
}
</style>