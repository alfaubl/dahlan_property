<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation sebelum submit
    const registerForm = document.querySelector('form[method="POST"]');
    
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const password = document.querySelector('input[name="password"]');
            const confirmPassword = document.querySelector('input[name="password_confirmation"]');
            const terms = document.querySelector('input[name="terms"]');
            
            // Validasi password match
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                return;
            }
            
            // Validasi terms & conditions
            if (!terms.checked) {
                e.preventDefault();
                alert('Anda harus menyetujui syarat & ketentuan');
                return;
            }
            
            // Loading effect
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            submitBtn.disabled = true;
        });
    }
    
    // Auto-hide alert setelah 5 detik
    const alert = document.querySelector('.alert');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    }
    
    // Format nomor telepon (opsional)
    const phoneInput = document.querySelector('input[name="phone"]');
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
});
</script><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/js/register-js.blade.php ENDPATH**/ ?>