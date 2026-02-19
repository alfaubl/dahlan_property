<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle Password Visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    
    if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    }
    
    // Form Submit Loading Effect
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            submitBtn.disabled = true;
            
            // Form akan tetap disubmit
        });
    }
    
    // Auto-hide Alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    
    // Social Login Buttons (placeholder)
    const socialBtns = document.querySelectorAll('.social-btn');
    socialBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            alert('Social login akan segera tersedia!');
        });
    });
});
</script><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/js/auth-js.blade.php ENDPATH**/ ?>