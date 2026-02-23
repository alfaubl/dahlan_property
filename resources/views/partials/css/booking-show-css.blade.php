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

.booking-show-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: calc(100vh - 76px);
    padding: 40px 0;
}

.booking-show-card {
    border: none;
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background: white;
    position: relative;
}

.booking-show-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, var(--primary), var(--secondary), var(--info));
}

.booking-show-header {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    padding: 40px 30px;
    color: white;
    position: relative;
    overflow: hidden;
}

.booking-show-header::after {
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

.booking-show-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
}

.booking-show-header p {
    opacity: 0.9;
    margin-bottom: 0;
    position: relative;
    z-index: 2;
    font-size: 1rem;
}

.booking-show-body {
    padding: 40px;
    background: white;
}

/* ========== STATUS BADGE ========== */
.booking-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: 600;
    margin-bottom: 25px;
    border: 1px solid rgba(0,0,0,0.05);
}

.booking-status-badge i {
    font-size: 1rem;
}

.booking-status-badge.pending {
    background: rgba(255, 193, 7, 0.1);
    color: #ffc107;
    border-color: rgba(255, 193, 7, 0.2);
}

.booking-status-badge.confirmed {
    background: rgba(40, 167, 69, 0.1);
    color: #28a745;
    border-color: rgba(40, 167, 69, 0.2);
}

.booking-status-badge.cancelled {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
    border-color: rgba(220, 53, 69, 0.2);
}

.booking-status-badge.completed {
    background: rgba(23, 162, 184, 0.1);
    color: #17a2b8;
    border-color: rgba(23, 162, 184, 0.2);
}

/* ========== BOOKING CODE ========== */
.booking-code-box {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 30px;
    text-align: center;
    border: 2px dashed var(--primary);
    position: relative;
    overflow: hidden;
}

.booking-code-box::before {
    content: 'BOOKING';
    position: absolute;
    top: -10px;
    right: -10px;
    font-size: 5rem;
    font-weight: 900;
    color: rgba(74, 111, 165, 0.05);
    transform: rotate(15deg);
}

.booking-code-label {
    color: var(--gray-600);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.booking-code-value {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary);
    letter-spacing: 3px;
    font-family: 'Courier New', monospace;
    position: relative;
    z-index: 2;
}

/* ========== CHARTS SECTION ========== */
.booking-charts-section {
    margin: 30px 0;
}

.booking-chart-card {
    background: white;
    border-radius: 20px;
    padding: 20px;
    border: 1px solid var(--gray-200);
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    height: 100%;
    transition: all 0.3s ease;
}

.booking-chart-card:hover {
    box-shadow: 0 10px 30px rgba(74, 111, 165, 0.1);
    transform: translateY(-3px);
}

.booking-chart-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.booking-chart-title i {
    color: var(--primary);
    font-size: 1.1rem;
}

.booking-chart-wrapper {
    position: relative;
    height: 200px;
    width: 100%;
}

/* ========== INFO SECTIONS ========== */
.booking-info-section {
    background: var(--gray-100);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 25px;
    border: 1px solid var(--gray-200);
}

.booking-info-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.booking-info-title i {
    color: var(--primary);
}

.booking-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.booking-info-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: white;
    border-radius: 15px;
    border: 1px solid var(--gray-200);
    transition: all 0.2s ease;
}

.booking-info-item:hover {
    border-color: var(--primary);
    box-shadow: 0 5px 15px rgba(74, 111, 165, 0.05);
    transform: translateY(-2px);
}

.booking-info-icon {
    width: 45px;
    height: 45px;
    background: rgba(74, 111, 165, 0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.booking-info-icon i {
    font-size: 1.3rem;
    color: var(--primary);
}

.booking-info-content {
    flex: 1;
}

.booking-info-label {
    color: var(--gray-600);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 2px;
}

.booking-info-value {
    font-weight: 700;
    color: var(--gray-800);
    font-size: 1rem;
}

/* ========== PROPERTY INFO ========== */
.booking-property-card {
    display: flex;
    align-items: center;
    gap: 20px;
    background: white;
    border-radius: 20px;
    padding: 20px;
    border: 1px solid var(--gray-200);
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.booking-property-card:hover {
    border-color: var(--primary);
    box-shadow: 0 10px 25px rgba(74, 111, 165, 0.1);
}

.booking-property-image {
    width: 100px;
    height: 100px;
    border-radius: 15px;
    overflow: hidden;
}

.booking-property-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.booking-property-details {
    flex: 1;
}

.booking-property-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 5px;
}

.booking-property-location {
    color: var(--gray-600);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.booking-property-location i {
    color: var(--primary);
}

.booking-property-price {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--primary);
    margin-top: 8px;
}

/* ========== TIMELINE ========== */
.booking-timeline {
    margin: 30px 0;
}

.booking-timeline-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 20px 0;
    border-bottom: 1px dashed var(--gray-200);
}

.booking-timeline-item:last-child {
    border-bottom: none;
}

.booking-timeline-icon {
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border: 2px solid var(--gray-200);
}

.booking-timeline-icon i {
    font-size: 1.3rem;
    color: var(--primary);
}

.booking-timeline-icon.completed {
    border-color: var(--success);
    background: rgba(40, 167, 69, 0.05);
}

.booking-timeline-icon.completed i {
    color: var(--success);
}

.booking-timeline-icon.active {
    border-color: var(--warning);
    background: rgba(255, 193, 7, 0.05);
}

.booking-timeline-icon.active i {
    color: var(--warning);
}

.booking-timeline-content {
    flex: 1;
}

.booking-timeline-title {
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 5px;
}

.booking-timeline-time {
    color: var(--gray-600);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.booking-timeline-time i {
    font-size: 0.8rem;
    color: var(--gray-400);
}

/* ========== ACTION BUTTONS ========== */
.booking-action-buttons {
    display: flex;
    gap: 15px;
    margin-top: 30px;
    flex-wrap: wrap;
}

.booking-btn {
    padding: 15px 30px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    flex: 1;
    min-width: 200px;
    border: none;
    cursor: pointer;
}

.booking-btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    box-shadow: 0 10px 25px rgba(74, 111, 165, 0.2);
}

.booking-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(74, 111, 165, 0.3);
    color: white;
}

.booking-btn-success {
    background: linear-gradient(135deg, var(--success), #1e7e34);
    color: white;
}

.booking-btn-success:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(40, 167, 69, 0.3);
    color: white;
}

.booking-btn-warning {
    background: linear-gradient(135deg, var(--warning), #fd7e14);
    color: white;
}

.booking-btn-warning:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(255, 193, 7, 0.3);
    color: white;
}

.booking-btn-danger {
    background: linear-gradient(135deg, var(--danger), #c82333);
    color: white;
}

.booking-btn-danger:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(220, 53, 69, 0.3);
    color: white;
}

.booking-btn-outline {
    background: white;
    color: var(--gray-600);
    border: 2px solid var(--gray-200);
}

.booking-btn-outline:hover {
    background: var(--gray-100);
    color: var(--gray-800);
    border-color: var(--primary);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 768px) {
    .booking-show-body {
        padding: 25px 20px;
    }
    
    .booking-code-value {
        font-size: 1.8rem;
    }
    
    .booking-property-card {
        flex-direction: column;
        text-align: center;
    }
    
    .booking-property-image {
        margin: 0 auto;
    }
    
    .booking-info-grid {
        grid-template-columns: 1fr;
    }
    
    .booking-action-buttons {
        flex-direction: column;
    }
    
    .booking-btn {
        width: 100%;
    }
}
</style>