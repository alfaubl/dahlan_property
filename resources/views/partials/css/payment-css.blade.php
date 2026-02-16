<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
}

.bg-opacity-20 {
    background: rgba(255,255,255,0.2);
}

.bg-opacity-10 {
    background: rgba(255,255,255,0.1);
}

/* Timer styling */
#payment-timer {
    font-family: 'Courier New', monospace;
    letter-spacing: 2px;
}

/* Payment button */
.btn-primary {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(74,111,165,0.3) !important;
}

.btn-primary:disabled {
    opacity: 0.6;
    transform: none;
}

/* Payment method icons */
.d-flex.gap-2 img {
    filter: grayscale(0.5);
    opacity: 0.7;
    transition: all 0.2s ease;
}

.d-flex.gap-2 img:hover {
    filter: grayscale(0);
    opacity: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .d-flex.gap-2 {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .d-flex.gap-2 img {
        height: 25px;
    }
}
</style>