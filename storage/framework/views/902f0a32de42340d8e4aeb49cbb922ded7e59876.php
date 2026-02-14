<style>
.auth-container {
    min-height: calc(100vh - 200px);
    padding: 80px 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.auth-card {
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    border: none;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.auth-card:hover {
    transform: translateY(-5px);
}

.auth-header {
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    color: white;
    padding: 40px 30px;
    text-align: center;
}

.auth-header i {
    font-size: 3.5rem;
    margin-bottom: 15px;
    opacity: 0.9;
}

.auth-header h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.auth-header p {
    margin-bottom: 0;
    opacity: 0.9;
    font-size: 0.95rem;
}

.card-body {
    padding: 40px !important;
    background: white;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 0.95rem;
    transition: all 0.2s ease;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
    outline: none;
}

.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.form-check-input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
}

.btn-primary {
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    border: none;
    border-radius: 12px;
    padding: 14px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(13, 110, 253, 0.3);
}

.btn-primary:active {
    transform: translateY(0);
}

.alert {
    border-radius: 12px;
    padding: 15px 20px;
    border: none;
}

.alert-danger {
    background: #fff2f0;
    color: #dc3545;
    border-left: 4px solid #dc3545;
}

.alert-danger ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}

.alert-danger li {
    padding: 3px 0;
}

.text-center a {
    color: #0d6efd;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s ease;
}

.text-center a:hover {
    color: #6610f2;
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .auth-container {
        padding: 40px 20px;
    }
    
    .card-body {
        padding: 30px 20px !important;
    }
    
    .auth-header {
        padding: 30px 20px;
    }
    
    .auth-header h3 {
        font-size: 1.5rem;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/register-css.blade.php ENDPATH**/ ?>