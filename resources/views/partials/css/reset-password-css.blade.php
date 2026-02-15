<style>
/* ========== RESET PASSWORD PAGE STYLES ========== */
.auth-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 40px 0;
}

.auth-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path fill="rgba(255,255,255,0.03)" d="M47,-70.5C61.1,-62.5,73.3,-49.2,79.5,-33.2C85.7,-17.2,85.9,1.4,79.2,17.8C72.5,34.2,58.9,48.4,43.6,58.3C28.3,68.2,11.3,73.8,-5.5,73.5C-22.3,73.2,-38.9,66.9,-52.9,56.3C-66.9,45.7,-78.3,30.8,-80.1,14.5C-81.9,-1.8,-74.1,-19.5,-62.8,-33.4C-51.5,-47.3,-36.7,-57.4,-21.1,-65.2C-5.5,-73,10.8,-78.5,26.4,-74.6C42,-70.8,56.9,-57.6,47,-70.5Z" transform="translate(100 100)"/></svg>') no-repeat center center;
    opacity: 0.1;
}

.auth-content {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* Logo & Branding */
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
    padding: 8px 25px;
    border-radius: 40px;
    margin-top: 15px;
    color: white;
    font-size: 14px;
    backdrop-filter: blur(5px);
}

/* Auth Card */
.auth-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    max-width: 500px;
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

/* Form Elements */
.form-group {
    margin-bottom: 25px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
    font-size: 14px;
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
    font-size: 15px;
    transition: all 0.3s ease;
    background: white;
}

.form-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
}

.form-input[readonly] {
    background: #f8f9fa;
    cursor: not-allowed;
}

.input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    background: transparent;
    border: none;
    cursor: pointer;
}

/* Password Strength */
.password-strength {
    margin: 10px 0 5px;
}

.strength-bar {
    height: 5px;
    background: #e0e0e0;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 5px;
}

.strength-bar-fill {
    height: 100%;
    width: 0;
    transition: width 0.3s ease;
}

.strength-bar-fill.weak { 
    background: #dc3545; 
    width: 33.33%; 
}

.strength-bar-fill.medium { 
    background: #ffc107; 
    width: 66.66%; 
}

.strength-bar-fill.strong { 
    background: #28a745; 
    width: 100%; 
}

.strength-text {
    font-size: 12px;
    color: #666;
}

/* Password Requirements */
.password-requirements {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    margin: 20px 0;
}

.requirements-title {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 12px;
}

.requirements-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.requirements-list li {
    font-size: 13px;
    color: #666;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.requirements-list li i {
    width: 16px;
    font-size: 12px;
}

/* Info Box */
.info-box {
    background: #e3f2fd;
    border-left: 4px solid #2196f3;
    padding: 15px 20px;
    border-radius: 10px;
    margin: 0 30px 20px;
    font-size: 13px;
    color: #0c5460;
    display: flex;
    align-items: center;
    gap: 10px;
}

.info-box i {
    color: #2196f3;
    font-size: 16px;
}

/* Buttons */
.btn-auth {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
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

.btn-auth-primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102,126,234,0.4);
}

.btn-auth-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.btn-auth-secondary {
    background: #f8f9fa;
    color: #333;
    border: 2px solid #e0e0e0;
}

.btn-auth-secondary:hover {
    background: #e9ecef;
}

/* Divider */
.auth-divider {
    text-align: center;
    margin: 25px 0;
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
    font-size: 13px;
}

/* Security Steps */
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
    transition: transform 0.3s ease;
}

.step:hover {
    transform: translateY(-5px);
}

.step-number {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    font-weight: 700;
    margin: 0 auto 20px;
}

.step-number i {
    font-size: 24px;
}

.step-content h4 {
    color: white;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.step-content p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    line-height: 1.5;
}

/* Match Message */
#matchMessage {
    font-size: 13px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Responsive */
@media (max-width: 768px) {
    .auth-section {
        padding: 20px 0;
    }

    .steps-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .steps-title {
        font-size: 24px;
    }

    .auth-card {
        margin: 0 15px;
    }

    .auth-form {
        padding: 20px;
    }

    .info-box {
        margin: 0 20px 20px;
    }
}
</style>