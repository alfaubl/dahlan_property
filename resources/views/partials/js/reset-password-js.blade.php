<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== TOGGLE PASSWORD VISIBILITY ==========
    window.togglePassword = function(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = fieldId === 'password' ? 
                     document.querySelector('#togglePassword') : 
                     document.querySelector('#toggleConfirm');
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    };

    // ========== PASSWORD STRENGTH CHECKER ==========
    const passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            
            // Check requirements
            const hasLength = password.length >= 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasLower = /[a-z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[!@#$%^&*]/.test(password);
            
            // Update requirement icons
            const reqLength = document.getElementById('req-length');
            const reqUpper = document.getElementById('req-uppercase');
            const reqLower = document.getElementById('req-lowercase');
            const reqNumber = document.getElementById('req-number');
            const reqSpecial = document.getElementById('req-special');
            
            if (reqLength) {
                reqLength.innerHTML = `<i class="fas ${hasLength ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}"></i> Minimal 8 karakter`;
            }
            if (reqUpper) {
                reqUpper.innerHTML = `<i class="fas ${hasUpper ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}"></i> Huruf besar (A-Z)`;
            }
            if (reqLower) {
                reqLower.innerHTML = `<i class="fas ${hasLower ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}"></i> Huruf kecil (a-z)`;
            }
            if (reqNumber) {
                reqNumber.innerHTML = `<i class="fas ${hasNumber ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}"></i> Angka (0-9)`;
            }
            if (reqSpecial) {
                reqSpecial.innerHTML = `<i class="fas ${hasSpecial ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}"></i> Simbol (!@#$%^&*)`;
            }
            
            // Calculate strength
            const requirements = [hasLength, hasUpper, hasLower, hasNumber, hasSpecial];
            const score = requirements.filter(Boolean).length;
            
            // Reset classes
            strengthBar.className = 'strength-bar-fill';
            
            if (password.length === 0) {
                strengthBar.style.width = '0';
                if (strengthText) strengthText.innerText = 'Kekuatan Password';
            } else if (score <= 2) {
                strengthBar.classList.add('weak');
                if (strengthText) strengthText.innerText = 'Lemah - Tambah variasi karakter';
            } else if (score <= 4) {
                strengthBar.classList.add('medium');
                if (strengthText) strengthText.innerText = 'Sedang - Bisa ditingkatkan';
            } else {
                strengthBar.classList.add('strong');
                if (strengthText) strengthText.innerText = 'Kuat - Password aman';
            }
        });
    }

    // ========== PASSWORD MATCH CHECKER ==========
    const confirmInput = document.getElementById('password_confirmation');
    const matchMessage = document.getElementById('matchMessage');
    
    if (confirmInput && matchMessage) {
        confirmInput.addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirm = this.value;
            
            if (confirm.length > 0) {
                if (password === confirm) {
                    matchMessage.innerHTML = '<i class="fas fa-check-circle text-success"></i> Password cocok';
                    matchMessage.style.color = '#28a745';
                } else {
                    matchMessage.innerHTML = '<i class="fas fa-times-circle text-danger"></i> Password tidak cocok';
                    matchMessage.style.color = '#dc3545';
                }
            } else {
                matchMessage.innerHTML = '';
            }
        });
    }

    // ========== FORM SUBMIT LOADING ==========
    const resetForm = document.getElementById('resetForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (resetForm && submitBtn) {
        resetForm.addEventListener('submit', function() {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Memproses...</span>';
            submitBtn.disabled = true;
        });
    }

    // ========== ANIMATED ENTRANCE ==========
    const cards = document.querySelectorAll('.step, .auth-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>