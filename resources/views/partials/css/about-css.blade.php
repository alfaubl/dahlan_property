<style>
.hero-about {
    background: linear-gradient(135deg, #1e2b3c 0%, #2c3e50 100%);
    padding: 80px 0;
    color: white;
    position: relative;
    overflow: hidden;
}

.hero-about::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path fill="rgba(255,255,255,0.03)" d="M47,-70.5C61.1,-62.5,73.3,-49.2,79.5,-33.2C85.7,-17.2,85.9,1.4,79.2,17.8C72.5,34.2,58.9,48.4,43.6,58.3C28.3,68.2,11.3,73.8,-5.5,73.5C-22.3,73.2,-38.9,66.9,-52.9,56.3C-66.9,45.7,-78.3,30.8,-80.1,14.5C-81.9,-1.8,-74.1,-19.5,-62.8,-33.4C-51.5,-47.3,-36.7,-57.4,-21.1,-65.2C-5.5,-73,10.8,-78.5,26.4,-74.6C42,-70.8,56.9,-57.6,47,-70.5Z" transform="translate(100 100)"/></svg>');
    background-size: cover;
    opacity: 0.5;
}

.stats-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: none;
    height: 100%;
}

.stats-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(74,111,165,0.1);
}

.stats-card .bg-primary,
.stats-card .bg-success,
.stats-card .bg-warning {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.stats-card i {
    font-size: 2.5rem;
}

.stats-card h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.stats-card .text-primary { color: #4a6fa5 !important; }
.stats-card .text-success { color: #28a745 !important; }
.stats-card .text-warning { color: #ffc107 !important; }

.value-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border-radius: 15px;
    padding: 20px;
    border-left: 5px solid #4a6fa5;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.value-card .bg-primary,
.value-card .bg-info,
.value-card .bg-success {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.value-card i {
    font-size: 1.8rem;
}

.value-card h5 {
    font-weight: 700;
    margin-bottom: 5px;
    color: #2c3e50;
}

.value-card p {
    margin-bottom: 0;
    color: #6c757d;
}

.team-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.03);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.03);
    background: white;
}

.team-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(74,111,165,0.1);
}

.team-card img {
    height: 200px;
    object-fit: cover;
    width: 100%;
}

.team-card .card-body {
    padding: 1.5rem;
    text-align: center;
}

.team-card h5 {
    font-weight: 700;
    margin-bottom: 5px;
    color: #2c3e50;
}

.team-card .text-primary {
    color: #4a6fa5 !important;
    font-weight: 600;
    margin-bottom: 10px;
}

.team-card small {
    color: #6c757d;
}

.milestone-item {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #edf2f7;
}

.milestone-item:last-child {
    border-bottom: none;
}

.milestone-year {
    font-size: 1.5rem;
    font-weight: 700;
    color: #4a6fa5;
    min-width: 80px;
}

.milestone-item h5 {
    font-weight: 700;
    margin-bottom: 5px;
    color: #2c3e50;
}

.milestone-item p {
    margin-bottom: 0;
    color: #6c757d;
}

.chart-container {
    position: relative;
    height: 300px;
    width: 100%;
    margin: 20px 0;
}

.badge-premium {
    background: linear-gradient(135deg, #4a6fa5, #6b8cae);
    color: white;
    padding: 5px 15px;
    border-radius: 30px;
    font-size: 0.8rem;
}

.bg-opacity-10 {
    --bg-opacity: 0.1;
}

/* Vision Mission Cards */
.card.border-0.shadow-sm {
    border: none;
    box-shadow: 0 5px 20px rgba(0,0,0,0.02) !important;
}

.card.border-0.shadow-sm .bg-primary,
.card.border-0.shadow-sm .bg-success {
    width: 70px;
    height: 70px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.card.border-0.shadow-sm i {
    font-size: 2rem;
}

.card.border-0.shadow-sm h3 {
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.card.border-0.shadow-sm p,
.card.border-0.shadow-sm ul {
    color: #6c757d;
    margin-bottom: 0;
}

.card.border-0.shadow-sm ul li {
    margin-bottom: 10px;
}

.card.border-0.shadow-sm ul li:last-child {
    margin-bottom: 0;
}

.card.border-0.shadow-sm ul i {
    color: #28a745;
    margin-right: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-about {
        padding: 60px 0;
    }
    
    .hero-about h1 {
        font-size: 2rem;
    }
    
    .stats-card h3 {
        font-size: 2rem;
    }
    
    .milestone-item {
        flex-direction: column;
        text-align: center;
    }
    
    .milestone-year {
        margin-bottom: 10px;
    }
    
    .milestone-item .ms-4 {
        margin-left: 0 !important;
    }
}
</style>