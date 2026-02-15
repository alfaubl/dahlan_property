<style>
/* Specific styles for forgot password */
.auth-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.auth-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,...') no-repeat center center;
    opacity: 0.1;
}

.auth-content {
    max-width: 1200px;
    margin: 0 auto;
}

.auth-branding {
    text-align: center;
    margin-bottom: 40px;
}

.logo {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    text-decoration: none;
}

.logo-image {
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 15px;
    padding: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.logo-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.logo-text {
    font-size: 24px;
    font-weight: 700;
    color: white;
}

.auth-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255,255,255,0.2);
    padding: 8px 20px;
    border-radius: 40px;
    margin-top: 15px;
    color: white;
}

.auth-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    max-width: 450px;
    margin: 0 auto;
    overflow: hidden;
}

.auth-header {
    background: linear-gradient(135deg, #667eea, #764ba2);
    padding: 30px;
    text-align: center;
    color: white;
}

.auth-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
}

.auth-subtitle {
    opacity: 0.9;
    font-size: 14px;
}

.auth-form {
    padding: 30px;
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
}

.form-label i {
    margin-right: 8px;
    color: #667eea;
}

.input-group {
    position: relative;
}

.form-input {
    width: 100%;
    padding: 12px 45px 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
}

.input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}

.form-help {
    margin-top: 8px;
    font-size: 13px;
    color: #666;
    display: flex;
    align-items: center;
    gap: 6px;
}

.btn-auth {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-auth-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.btn-auth-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102,126,234,0.4);
}

.btn-auth-secondary {
    background: #f8f9fa;
    color: #333;
    border: 2px solid #e0e0e0;
}

.btn-auth-secondary:hover {
    background: #e9ecef;
}

.auth-divider {
    text-align: center;
    margin: 20px 0;
    position: relative;
}

.auth-divider::before,
.auth-divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 45%;
    height: 1px;
    background: #e0e0e0;
}

.auth-divider::before { left: 0; }
.auth-divider::after { right: 0; }

.auth-divider span {
    background: white;
    padding: 0 15px;
    color: #666;
    font-size: 14px;
}

.auth-footer {
    margin-top: 20px;
}

.security-info {
    margin-top: 25px;
    padding-top: 25px;
    border-top: 1px solid #e0e0e0;
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.security-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 14px;
}

.security-item i {
    color: #667eea;
}

/* Steps */
.security-steps {
    margin-top: 60px;
    text-align: center;
}

.steps-title {
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: white;
    margin-bottom: 40px;
}

.steps-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    max-width: 900px;
    margin: 0 auto;
}

.step {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
    position: relative;
}

.step-number {
    width: 50px;
    height: 50px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    font-weight: 700;
    margin: 0 auto 20px;
}

.step-content h4 {
    color: white;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
}

.step-content p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
}

@media (max-width: 768px) {
    .steps-container {
        grid-template-columns: 1fr;
    }
    
    .security-info {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/forgot-password-css.blade.php ENDPATH**/ ?>