<footer class="footer-modern">
    <div class="container">
        <div class="row g-5">
            {{-- Brand Column --}}
            <div class="col-lg-4">
                <div class="footer-brand">
                    kopi<span class="accent">1815</span>
                </div>
                <p class="footer-text mb-4">
                    Premium Indonesian coffee experience. Locally sourced, carefully roasted, 
                    and passionately served since day one.
                </p>
                <div class="footer-social">
                    <a href="https://instagram.com/kopi.1815" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/6285186111106" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://tiktok.com/@kopi_1815" target="_blank" rel="noopener" aria-label="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="mailto:1815kopijogja@gmail.com" aria-label="Email">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-4">
                <h5 class="footer-title">Menu</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('menu.index') }}">Our Menu</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            {{-- Locations --}}
            <div class="col-lg-3 col-md-4">
                <h5 class="footer-title">Locations</h5>
                <ul class="footer-links">
                    <li>
                        <a href="#">
                            <i class="bi bi-geo-alt"></i>
                            Banjarmasin
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-geo-alt"></i>
                            Banjarbaru
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-geo-alt"></i>
                            Yogyakarta
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="col-lg-3 col-md-4">
                <h5 class="footer-title">Contact Us</h5>
                <ul class="footer-links">
                    <li>
                        <a href="tel:+6285186111106">
                            <i class="bi bi-telephone"></i>
                            +62 851 8611 1106
                        </a>
                    </li>
                    <li>
                        <a href="mailto:1815kopijogja@gmail.com">
                            <i class="bi bi-envelope"></i>
                            1815kopijogja@gmail.com
                        </a>
                    </li>
                    <li class="mt-3">
                        <span class="footer-text">
                            <i class="bi bi-clock me-2"></i>
                            10:00 AM - 10:00 PM
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="footer-bottom">
            <p class="mb-0">
                © {{ date('Y') }} <strong>Kopi 1815</strong>. All rights reserved. 
                <span class="mx-2">|</span>
                Crafted with <i class="bi bi-heart-fill text-danger"></i> in Indonesia
            </p>
        </div>
    </div>
</footer>
