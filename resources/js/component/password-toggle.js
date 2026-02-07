// Password Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all password toggle buttons
    document.querySelectorAll('.password-toggle-btn').forEach(button => {
        button.addEventListener('click', function() {
            const passwordInput = this.closest('.password-input-wrapper').querySelector('input[type="password"], input[type="text"]');
            const eyeOpenIcon = this.querySelector('.eye-open');
            const eyeClosedIcon = this.querySelector('.eye-closed');
            
            if (passwordInput.type === 'password') {
                // Show password
                passwordInput.type = 'text';
                eyeOpenIcon.classList.add('hidden');
                eyeClosedIcon.classList.remove('hidden');
                this.setAttribute('aria-label', 'Hide password');
            } else {
                // Hide password
                passwordInput.type = 'password';
                eyeOpenIcon.classList.remove('hidden');
                eyeClosedIcon.classList.add('hidden');
                this.setAttribute('aria-label', 'Show password');
            }
        });
    });
});