// ===== PROPERTY CREATE JS =====

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submitBtn');
    const priceInput = document.getElementById('price');
    const imagesInput = document.getElementById('images');
    
    // Format price input (optional - remove commas for submission)
    if (priceInput) {
        priceInput.addEventListener('input', function() {
            // Remove non-numeric characters
            let value = this.value.replace(/[^0-9]/g, '');
            if (value) {
                // Store raw value for form submission
                this.dataset.rawValue = value;
                // Display formatted value
                this.value = parseInt(value).toLocaleString('id-ID');
            }
        });
        
        // Before form submit, restore raw value
        if (form) {
            form.addEventListener('submit', function() {
                if (priceInput.dataset.rawValue) {
                    priceInput.value = priceInput.dataset.rawValue;
                }
            });
        }
    }
    
    // Validate images before upload
    if (imagesInput) {
        imagesInput.addEventListener('change', function() {
            const files = this.files;
            const maxSize = 2 * 1024 * 1024; // 2MB
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    
                    // Check file type
                    if (!allowedTypes.includes(file.type)) {
                        alert(`File "${file.name}" bukan format gambar yang valid (JPEG, PNG, GIF)`);
                        this.value = '';
                        return;
                    }
                    
                    // Check file size
                    if (file.size > maxSize) {
                        alert(`File "${file.name}" terlalu besar (max 2MB)`);
                        this.value = '';
                        return;
                    }
                }
            }
        });
    }
    
    // Form submit handler
    if (form && submitBtn) {
        form.addEventListener('submit', function(e) {
            // Validate price
            const priceValue = priceInput ? parseFloat(priceInput.dataset.rawValue || priceInput.value.replace(/,/g, '')) : 0;
            if (priceValue <= 0) {
                e.preventDefault();
                alert('Harga harus lebih dari 0!');
                if (priceInput) priceInput.focus();
                return false;
            }
            
            // Validate images
            if (imagesInput && imagesInput.files.length === 0) {
                e.preventDefault();
                alert('Minimal upload 1 foto properti!');
                imagesInput.focus();
                return false;
            }
            
            // Disable button & show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
        });
    }
    
    // Auto-save draft (optional - localStorage)
    const formFields = form ? form.querySelectorAll('input, textarea, select') : [];
    formFields.forEach(field => {
        field.addEventListener('input', function() {
            if (this.name && this.type !== 'file') {
                localStorage.setItem('property_draft_' + this.name, this.value);
            }
        });
        
        // Load saved draft
        if (this.name && this.type !== 'file') {
            const savedValue = localStorage.getItem('property_draft_' + this.name);
            if (savedValue && !this.value) {
                this.value = savedValue;
            }
        }
    });
    
    // Clear draft on successful submit
    if (form) {
        form.addEventListener('submit', function() {
            formFields.forEach(field => {
                if (field.name && field.type !== 'file') {
                    localStorage.removeItem('property_draft_' + field.name);
                }
            });
        });
    }
});

// Preview images before upload
function previewImages(input) {
    const previewContainer = document.getElementById('imagePreview');
    if (previewContainer && input.files) {
        previewContainer.innerHTML = '';
        
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.style.cssText = 'display: inline-block; margin: 8px; position: relative;';
                div.innerHTML = `
                    <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0;">
                `;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }
}