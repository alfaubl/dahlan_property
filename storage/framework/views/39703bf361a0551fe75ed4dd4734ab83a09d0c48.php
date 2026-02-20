<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('propertyForm');
    const saveBtn = document.getElementById('saveBtn');
    
    if (form && saveBtn) {
        // Real-time validation
        const inputs = form.querySelectorAll('input[required], select[required]');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.remove('is-invalid');
                }
            });
        });

        // Submit handling
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Check required fields
            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    input.classList.add('is-invalid');
                    isValid = false;
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Harap isi semua field yang wajib diisi!');
                return;
            }

            // Disable button
            saveBtn.disabled = true;
            saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menyimpan...';
        });
    }

    // Price formatting
    const priceInput = document.getElementById('price');
    if (priceInput) {
        priceInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value) {
                this.value = parseInt(value, 10);
            }
        });
    }
});
</script><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/js/property-create-js.blade.php ENDPATH**/ ?>