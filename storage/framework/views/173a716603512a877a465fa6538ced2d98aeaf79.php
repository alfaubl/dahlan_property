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

.create-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: calc(100vh - 76px);
    padding: 40px 0;
}

.create-card {
    background: white;
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

.btn-save {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 15px;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.btn-save:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(74,111,165,0.3);
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
    text-decoration: none;
    display: inline-block;
}

.btn-cancel:hover {
    background: var(--gray-100);
    color: var(--gray-800);
}

@media (max-width: 768px) {
    .create-body { padding: 25px 20px; }
    .btn-save, .btn-cancel { width: 100%; text-align: center; }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/property-create-css.blade.php ENDPATH**/ ?>