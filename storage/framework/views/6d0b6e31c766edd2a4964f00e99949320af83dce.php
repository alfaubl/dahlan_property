<style>
.profile-container {
    padding: 40px 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #e9ecf2 100%);
    min-height: calc(100vh - 76px);
}

.profile-card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    margin-bottom: 25px;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 80px rgba(74, 111, 165, 0.12);
}

.profile-card .card-header {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
    color: white;
    border-bottom: none;
    padding: 20px 25px;
    font-weight: 600;
    font-size: 1.2rem;
}

.profile-card .card-header h5 {
    margin: 0;
    font-weight: 700;
    font-size: 1.2rem;
}

.profile-card .card-header i {
    margin-right: 10px;
    font-size: 1.2rem;
}

.profile-card .card-body {
    padding: 30px;
}

/* Form Styles */
.form-label {
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.95rem;
    margin-bottom: 8px;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 18px;
    font-size: 0.95rem;
    transition: all 0.2s ease;
    background: #fafcfc;
}

.form-control:focus {
    border-color: #4a6fa5;
    box-shadow: 0 0 0 4px rgba(74, 111, 165, 0.1);
    background: white;
    outline: none;
}

.form-control.is-invalid {
    border-color: #dc3545;
    background-image: none;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 5px;
    font-weight: 500;
}

/* Avatar Upload */
.avatar-preview {
    margin-top: 15px;
    text-align: center;
}

.avatar-preview img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid white;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.avatar-preview img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(74, 111, 165, 0.2);
}

/* Buttons */
.btn-update {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 30px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(74, 111, 165, 0.3);
    color: white;
}

.btn-password {
    background: linear-gradient(135deg, #f39c12, #e67e22);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 30px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-password:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(243, 156, 18, 0.3);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 30px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.btn-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(231, 76, 60, 0.3);
    color: white;
}

/* Warning Text */
.text-danger {
    color: #e74c3c !important;
    font-weight: 500;
    background: #fdf0ef;
    padding: 15px 20px;
    border-radius: 12px;
    border-left: 4px solid #e74c3c;
    margin-bottom: 20px;
}

/* Password Strength Indicator (optional) */
.password-strength {
    margin-top: 10px;
    height: 5px;
    border-radius: 5px;
    background: #e9ecef;
    overflow: hidden;
}

.password-strength-bar {
    height: 100%;
    width: 0%;
    transition: width 0.3s ease;
}

.strength-weak { background: #e74c3c; }
.strength-medium { background: #f39c12; }
.strength-strong { background: #27ae60; }

/* Responsive */
@media (max-width: 768px) {
    .profile-container {
        padding: 20px 15px;
    }
    
    .profile-card .card-body {
        padding: 20px;
    }
    
    .btn-update, .btn-password, .btn-delete {
        width: 100%;
    }
    
    .avatar-preview img {
        width: 100px;
        height: 100px;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/profile-edit-css.blade.php ENDPATH**/ ?>