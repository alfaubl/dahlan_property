<style>
/* ========== WISHLIST PAGE STYLES ========== */
.wishlist-container {
    min-height: 80vh;
    background: #f8fafc;
    padding: 40px 0;
}

/* Empty State Premium */
.empty-wishlist {
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    border-radius: 30px;
    padding: 60px 40px;
    text-align: center;
    max-width: 600px;
    margin: 40px auto;
    box-shadow: 0 20px 40px rgba(0,0,0,0.02);
    border: 1px solid rgba(0,0,0,0.02);
}

.empty-icon {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #fff0f0, #ffe0e0);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    position: relative;
}

.empty-icon i {
    font-size: 3.5rem;
    color: #ff6b6b;
    filter: drop-shadow(0 10px 15px rgba(255,107,107,0.2));
}

.empty-icon::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border: 2px dashed #ffb8b8;
    border-radius: 50%;
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.empty-wishlist h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.empty-wishlist p {
    color: #6c7a8a;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.btn-explore {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.btn-explore:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 30px rgba(74,111,165,0.2);
    color: white;
}

.btn-explore:hover i {
    transform: translateX(5px);
}

/* Header */
.wishlist-header {
    margin-bottom: 40px;
    position: relative;
}

.wishlist-header h1 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
}

.wishlist-header h1 i {
    color: #ff6b6b;
    margin-right: 10px;
}

.wishlist-header p {
    color: #6c7a8a;
    font-size: 1.1rem;
    padding-left: 45px;
}

.wishlist-count {
    background: #4a6fa5;
    color: white;
    padding: 5px 15px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-left: 15px;
}

/* Property Grid */
.property-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
    margin-top: 30px;
}

/* Wishlist Cards */
.wishlist-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    border: 1px solid #edf2f7;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.wishlist-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 40px rgba(74,111,165,0.1);
    border-color: transparent;
}

.card-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.wishlist-card:hover .card-image img {
    transform: scale(1.1);
}

.card-badge {
    position: absolute;
    bottom: 15px;
    left: 15px;
    background: rgba(255,255,255,0.95);
    padding: 6px 16px;
    border-radius: 30px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #2c3e50;
    backdrop-filter: blur(5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    z-index: 2;
}

.remove-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ff6b6b;
    font-size: 1.2rem;
    z-index: 10;
}

.remove-btn:hover {
    background: #ff6b6b;
    color: white;
    transform: scale(1.1);
}

.card-body {
    padding: 20px;
    flex: 1;
}

.card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.4;
}

.card-location {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c7a8a;
    font-size: 0.9rem;
    margin-bottom: 12px;
}

.card-location i {
    color: #4a6fa5;
    font-size: 0.9rem;
}

.card-price {
    font-size: 1.3rem;
    font-weight: 700;
    color: #4a6fa5;
    margin-bottom: 15px;
}

.property-features {
    display: flex;
    gap: 20px;
    color: #6c7a8a;
    font-size: 0.85rem;
    flex-wrap: wrap;
}

.property-features span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.property-features i {
    color: #4a6fa5;
    width: 16px;
}

.card-footer {
    padding: 15px 20px;
    border-top: 1px solid #edf2f7;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
}

.btn-detail {
    background: #f0f4f8;
    color: #4a6fa5;
    border: none;
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-detail:hover {
    background: #4a6fa5;
    color: white;
}

.btn-detail:hover i {
    transform: translateX(3px);
}

.time-ago {
    color: #a0b8cc;
    font-size: 0.8rem;
}

/* Alert Styles */
.alert {
    border-radius: 12px;
    padding: 15px 20px;
    margin-bottom: 25px;
    border: none;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-info {
    background: #d1ecf1;
    color: #0c5460;
    border-left: 4px solid #17a2b8;
}

.btn-close {
    margin-left: auto;
}

/* Responsive */
@media (max-width: 768px) {
    .wishlist-container {
        padding: 20px 0;
    }

    .empty-wishlist {
        padding: 40px 20px;
        margin: 20px;
    }

    .empty-wishlist h3 {
        font-size: 1.5rem;
    }

    .wishlist-header h1 {
        font-size: 1.8rem;
    }

    .wishlist-header p {
        padding-left: 0;
    }

    .property-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .card-image {
        height: 200px;
    }

    .property-features {
        gap: 15px;
    }
}

@media (max-width: 576px) {
    .card-footer {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }

    .btn-detail {
        width: 100%;
        justify-content: center;
    }
}
</style><?php /**PATH C:\xampp\htdocs\dahlan_project\resources\views/partials/css/wishlist-css.blade.php ENDPATH**/ ?>