<style>
:root {
    --primary: #4a6fa5;
    --primary-dark: #2c3e50;
    --success: #28a745;
    --warning: #ffc107;
    --danger: #dc3545;
    --gray-100: #f8f9fc;
    --gray-200: #eef2f6;
    --gray-600: #6c7a8a;
    --gray-800: #2c3e50;
}

.create-property-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: calc(100vh - 76px);
    padding: 40px 0;
}

.create-card {
    border: none;
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    overflow: hidden;
}

.create-header {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    padding: 40px 30px;
    color: white;
    position: relative;
    overflow: hidden;
}

.create-header::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 200px;
    height: 200px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    transform: rotate(15deg);
}

.create-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
}

.create-header p {
    opacity: 0.9;
    margin-bottom: 0;
    position: relative;
    z-index: 2;
}

.create-body {
    padding: 40px;
    background: white;
}

.form-section {
    background: var(--gray-100);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 25px;
    border: 1px solid var(--gray-200);
}

.section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--gray-800);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: var(--primary);
    font-size: 1.2rem;
}

.form-label {
    font-weight: 600;
    color: var(--gray-800);
    font-size: 0.9rem;
    margin-bottom: 8px;
}

.form-control, .form-select {
    border: 2px solid var(--gray-200);
    border-radius: 15px;
    padding: 12px 18px;
    font-size: 0.95rem;
    transition: all 0.2s ease;
    background: white;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(74,111,165,0.1);
    outline: none;
}

.form-control.is-invalid {
    border-color: var(--danger);
    background-image: none;
}

.invalid-feedback {
    color: var(--danger);
    font-size: 0.8rem;
    margin-top: 5px;
}

/* Chart Container */
.chart-container {
    background: white;
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 25px;
    border: 1px solid var(--gray-200);
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
}

.chart-wrapper {
    position: relative;
    height: 250px;
    width: 100%;
}

/* Button Styles */
.btn-save {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-save:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(74,111,165,0.3);
    color: white;
}

.btn-save:disabled {
    opacity: 0.6;
    transform: none;
    box-shadow: none;
}

.btn-cancel {
    background: white;
    color: var(--gray-600);
    border: 2px solid var(--gray-200);
    padding: 15px 40px;
    border-radius: 15px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.btn-cancel:hover {
    background: var(--gray-100);
    color: var(--gray-800);
}

/* Price Input Group */
.input-group-prepend {
    background: var(--gray-100);
    border: 2px solid var(--gray-200);
    border-right: none;
    border-radius: 15px 0 0 15px;
    padding: 12px 18px;
    color: var(--gray-600);
    font-weight: 600;
}

.input-group .form-control {
    border-left: none;
    border-radius: 0 15px 15px 0;
}

/* Responsive */
@media (max-width: 768px) {
    .create-body {
        padding: 25px 20px;
    }
    
    .form-section {
        padding: 20px;
    }
    
    .btn-save, .btn-cancel {
        width: 100%;
        justify-content: center;
    }
}
</style>