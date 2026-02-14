<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== PASSWORD STRENGTH INDICATOR ==========
    const passwordInput = document.getElementById('new_password');
    const strengthBar = document.createElement('div');
    strengthBar.className = 'password-strength';
    strengthBar.innerHTML = '<div class="password-strength-bar" id="strengthBar"></div>';
    
    if (passwordInput) {
        passwordInput.parentNode.appendChild(strengthBar);
        
        passwordInput.addEventListener('input', function() {
            const strength = checkPasswordStrength(this.value);
            updateStrengthBar(strength);
        });
    }
    
    function checkPasswordStrength(password) {
        let strength = 0;
        
        if (password.length >= 8) strength += 25;
        if (password.match(/[a-z]+/)) strength += 25;
        if (password.match(/[A-Z]+/)) strength += 25;
        if (password.match(/[0-9]+/)) strength += 15;
        if (password.match(/[$@#&!]+/)) strength += 10;
        
        return Math.min(strength, 100);
    }
    
    function updateStrengthBar(strength) {
        const bar = document.getElementById('strengthBar');
        if (!bar) return;
        
        bar.style.width = strength + '%';
        
        if (strength < 40) {
            bar.className = 'password-strength-bar strength-weak';
        } else if (strength < 70) {
            bar.className = 'password-strength-bar strength-medium';
        } else {
            bar.className = 'password-strength-bar strength-strong';
        }
    }
    
    // ========== AVATAR PREVIEW ==========
    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.querySelector('.avatar-preview img');
    
    if (avatarInput && avatarPreview) {
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // ========== FORM SUBMIT LOADING STATES ==========
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                submitBtn.disabled = true;
                
                // Form will still submit normally
                // The button will be re-enabled if there's an error (handled by server)
            }
        });
    });
    
    // ========== DELETE CONFIRMATION (already in onclick, but this is backup) ==========
    const deleteForm = document.querySelector('form[action*="profile.destroy"]');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.')) {
                e.preventDefault();
            }
        });
    }
    
    // ========== AUTO-HIDE ALERTS ==========
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    
    // ========== PHONE NUMBER FORMATTING ==========
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.startsWith('0')) {
                    value = '62' + value.substring(1);
                }
                this.value = value;
            }
        });
    }
    
    // ========== ANIMATED ENTRANCE ==========
    const cards = document.querySelectorAll('.profile-card');
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