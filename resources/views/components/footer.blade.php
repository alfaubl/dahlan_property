<footer class="footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-column">
                <div class="logo" style="margin-bottom: 24px;">
                    <div class="logo-image" style="width: 40px; height: 40px;">
                        <img src="{{ asset('assets/logo dahlan_property 2.png') }}" alt="Dahlan Property">
                    </div>
                    <div class="logo-text" style="color: white;">DahlanProperty</div>
                </div>
                <p style="color: var(--gray); margin-bottom: 24px; font-size: 15px;">
                    Merevolusi manajemen properti dengan teknologi terkini
                    dan layanan luar biasa sejak 2024.
                </p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Produk</h3>
                <ul class="footer-links">
                    <li><a href="#features"><i class="fas fa-chevron-right"></i> Fitur</a></li>
                    <li><a href="#property"><i class="fas fa-chevron-right"></i> Properti</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Harga</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> API</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Dokumentasi</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Perusahaan</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Karir</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Blog</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Press</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Partner</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Kontak</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-envelope"></i> hello@dahlanproperty.com</a></li>
                    <li><a href="#"><i class="fas fa-phone"></i> +62 21 1234 5678</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</a></li>
                    <li><a href="#"><i class="fas fa-clock"></i> Dukungan 24/7</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="current-year">2024</span> Dahlan Property. Semua hak dilindungi. |
                <a href="#">Kebijakan Privasi</a> |
                <a href="#">Syarat Layanan</a>
            </p>
            <p style="margin-top: 10px; font-size: 13px;">
                Dibuat dengan <i class="fas fa-heart" style="color: #f72585;"></i> untuk profesional properti
            </p>
        </div>
    </div>
</footer>

<style>
/* Footer */
.footer {
    background: var(--dark);
    color: var(--white);
    padding: 80px 0 40px;
    position: relative;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 60px;
    margin-bottom: 60px;
}

.footer-column h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 24px;
    color: var(--white);
}

.footer-links {
    list-style: none;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: var(--gray);
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 10px;
}

.footer-links a:hover {
    color: var(--white);
    transform: translateX(5px);
}

.social-links {
    display: flex;
    gap: 20px;
    margin-top: 30px;
}

.social-link {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: var(--primary);
    transform: translateY(-3px);
}

.footer-bottom {
    text-align: center;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    color: var(--gray);
    font-size: 14px;
}

.footer-bottom a {
    color: var(--primary-light);
    text-decoration: none;
}
</style>