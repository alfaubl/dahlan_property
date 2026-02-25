<footer>
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="company-info">
                <div class="company-logo">
                    <div class="logo-circle animate-float">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="company-name">DahlanProperty</span>
                </div>
                <p class="company-description">
                    Marketplace properti terpercaya di Indonesia. Temukan properti impian Anda dengan mudah dan aman.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="footer-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('properties.index') }}">Properties</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="footer-title">Contact Us</h3>
                <ul class="contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Sudirman No. 123, Jakarta
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        +62 21 1234 5678
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        info@dahlanproperty.com
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <p>© {{ date('Y') }} DahlanProperty. All rights reserved.</p>
        </div>
    </div>
</footer>