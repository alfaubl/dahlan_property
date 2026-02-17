<script>
document.addEventListener('DOMContentLoaded', function() {
    // Countdown Timer (10 minutes from now)
    const timerElement = document.getElementById('countdown');
    if (timerElement) {
        const endTime = new Date().getTime() + (10 * 60 * 1000);
        
        const timerInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = endTime - now;
            
            if (distance <= 0) {
                clearInterval(timerInterval);
                timerElement.textContent = '00:00';
                return;
            }
            
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            timerElement.textContent = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
        }, 1000);
    }
});
</script>