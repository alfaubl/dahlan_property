<style>
/* ========== UNFINISH PAGE SPECIFIC STYLES ========== */
.unfinish-charts-section {
    margin: 30px 0;
}

.unfinish-chart-card {
    background: white;
    border-radius: 20px;
    padding: 20px;
    border: 1px solid var(--gray-200);
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    height: 100%;
    transition: all 0.3s ease;
}

.unfinish-chart-card:hover {
    box-shadow: 0 10px 30px rgba(255, 193, 7, 0.1);
    transform: translateY(-3px);
    border-color: var(--warning);
}

.unfinish-chart-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.unfinish-chart-title i {
    color: var(--warning);
    font-size: 1.1rem;
}

.unfinish-chart-wrapper {
    position: relative;
    height: 200px;
    width: 100%;
}

.pending-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 193, 7, 0.1);
    color: var(--warning);
    padding: 8px 16px;
    border-radius: 30px;
    font-weight: 600;
    border: 1px solid rgba(255, 193, 7, 0.2);
    margin-bottom: 20px;
}

.pending-status-badge i {
    font-size: 1rem;
}

.pending-tips {
    background: linear-gradient(135deg, #fff9e6, #fff3d6);
    border-radius: 16px;
    padding: 20px;
    margin: 20px 0;
    border-left: 5px solid var(--warning);
}

.pending-tips h6 {
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.pending-tips ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pending-tips li {
    padding: 8px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--gray-600);
    font-size: 0.95rem;
}

.pending-tips li i {
    color: var(--warning);
    width: 20px;
}

.progress-indicator {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin: 20px 0;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.progress-step .step-number {
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

.progress-step.active .step-number {
    background: var(--warning);
    color: white;
}

.progress-step.completed .step-number {
    background: var(--success);
    color: white;
}

.progress-step .step-label {
    font-size: 0.8rem;
    color: var(--gray-600);
}

.progress-line {
    width: 50px;
    height: 2px;
    background: var(--gray-200);
}

.progress-line.active {
    background: var(--warning);
}

@media (max-width: 576px) {
    .progress-indicator {
        flex-wrap: wrap;
    }
    
    .progress-line {
        width: 20px;
    }
}
</style>