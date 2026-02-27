<style>
.auth-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
}

.auth-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 450px;
    padding: 40px;
}

.auth-header {
    text-align: center;
    margin-bottom: 30px;
}

.auth-header h2 {
    color: #333;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 28px;
}

.auth-header p {
    color: #666;
    font-size: 16px;
}

.auth-form .form-group {
    margin-bottom: 25px;
}

.auth-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #444;
    font-size: 14px;
}

.auth-form input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.auth-form input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
}

.btn-auth {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.btn-auth:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102,126,234,0.4);
}

.remember-me {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px 0;
}

.remember-me label {
    font-weight: normal;
    color: #666;
}

.forgot-link {
    color: #667eea;
    text-decoration: none;
    font-size: 14px;
}

.forgot-link:hover {
    text-decoration: underline;
}

.auth-footer {
    text-align: center;
    margin-top: 25px;
    color: #666;
    font-size: 14px;
}

.auth-footer a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
}

.auth-footer a:hover {
    text-decoration: underline;
}

.error-feedback {
    color: #dc3545;
    font-size: 13px;
    margin-top: 5px;
}

.alert {
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 14px;
}

.alert-danger {
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

/* Responsive */
@media (max-width: 576px) {
    .auth-container {
        padding: 30px 20px;
    }
    
    .auth-header h2 {
        font-size: 24px;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/auth-css.blade.php ENDPATH**/ ?>