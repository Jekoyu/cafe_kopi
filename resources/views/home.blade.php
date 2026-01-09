@extends('layouts.app')

@section('page_css')
<style>
    /* ========== HERO SECTION ========== */
    .hero-section {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--cream) 0%, var(--orange-50) 100%);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 80%;
        height: 150%;
        background: radial-gradient(circle, rgba(249, 115, 22, 0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--accent-light);
        color: var(--orange-700);
        font-size: 0.85rem;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: var(--radius-full);
        margin-bottom: 24px;
    }

    .hero-badge i {
        font-size: 1rem;
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 24px;
        color: var(--text-primary);
    }

    .hero-title .highlight {
        position: relative;
        display: inline-block;
    }

    .hero-title .highlight::after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 0;
        width: 100%;
        height: 12px;
        background: var(--orange-200);
        z-index: -1;
        border-radius: 4px;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: var(--text-secondary);
        margin-bottom: 32px;
        max-width: 500px;
        line-height: 1.7;
    }

    .hero-buttons {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .hero-stats {
        display: flex;
        gap: 40px;
        margin-top: 60px;
        padding-top: 40px;
        border-top: 1px solid rgba(0,0,0,0.08);
    }

    .stat-item {
        text-align: left;
    }

    .stat-number {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--accent);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-top: 8px;
    }

    .hero-image-wrapper {
        position: relative;
        z-index: 2;
    }

    .hero-image {
        width: 100%;
        max-width: 550px;
        border-radius: var(--radius-2xl);
        box-shadow: var(--shadow-2xl);
        transform: rotate(2deg);
        transition: transform var(--transition-slow);
    }

    .hero-image:hover {
        transform: rotate(0deg) scale(1.02);
    }

    .hero-float-card {
        position: absolute;
        background: white;
        border-radius: var(--radius-lg);
        padding: 16px 20px;
        box-shadow: var(--shadow-xl);
        display: flex;
        align-items: center;
        gap: 12px;
        animation: float 6s ease-in-out infinite;
    }

    .hero-float-card.top {
        top: 10%;
        right: -10%;
    }

    .hero-float-card.bottom {
        bottom: 15%;
        left: -5%;
        animation-delay: -3s;
    }

    .float-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .float-text strong {
        display: block;
        font-weight: 700;
        color: var(--text-primary);
    }

    .float-text span {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    /* ========== MENU SECTION ========== */
    .menu-section {
        background: white;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .menu-card {
        position: relative;
        border-radius: var(--radius-xl);
        overflow: hidden;
        aspect-ratio: 1;
        cursor: pointer;
        transition: all var(--transition-base);
    }

    .menu-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 40%, rgba(0,0,0,0.85) 100%);
        z-index: 1;
        transition: all var(--transition-base);
    }

    .menu-card:hover::before {
        background: linear-gradient(180deg, transparent 20%, rgba(249, 115, 22, 0.9) 100%);
    }

    .menu-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--transition-slow);
    }

    .menu-card:hover img {
        transform: scale(1.1);
    }

    .menu-card-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 24px;
        z-index: 2;
        color: white;
    }

    .menu-card h4 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 4px;
        transform: translateY(0);
        transition: transform var(--transition-base);
    }

    .menu-card:hover h4 {
        transform: translateY(-5px);
    }

    .menu-card p {
        font-size: 0.9rem;
        opacity: 0.85;
        margin: 0;
    }

    .menu-card-icon {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 44px;
        height: 44px;
        background: white;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent);
        opacity: 0;
        transform: translateY(-10px);
        transition: all var(--transition-base);
        z-index: 2;
    }

    .menu-card:hover .menu-card-icon {
        opacity: 1;
        transform: translateY(0);
    }

    /* ========== FEATURES SECTION ========== */
    .features-section {
        background: linear-gradient(135deg, var(--brown-900) 0%, #2a1a10 100%);
        position: relative;
        overflow: hidden;
    }

    .features-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.5;
    }

    .features-section .section-badge {
        background: rgba(249, 115, 22, 0.2);
        color: var(--orange-400);
    }

    .features-section .section-title,
    .features-section .section-subtitle {
        color: white;
    }

    .features-section .section-subtitle {
        opacity: 0.7;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-xl);
        padding: 32px;
        text-align: center;
        transition: all var(--transition-base);
        height: 100%;
    }

    .feature-card:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-8px);
        border-color: var(--orange-500);
    }

    .feature-icon {
        width: 72px;
        height: 72px;
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 2rem;
        color: white;
        box-shadow: var(--shadow-orange);
    }

    .feature-card h4 {
        color: white;
        font-size: 1.25rem;
        margin-bottom: 12px;
    }

    .feature-card p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.95rem;
        margin: 0;
    }

    /* ========== CONTACT SECTION ========== */
    .contact-section {
        background: var(--cream-dark);
    }

    .contact-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 40px;
        box-shadow: var(--shadow-lg);
        height: 100%;
        transition: all var(--transition-base);
        border: 1px solid transparent;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        border-color: var(--orange-200);
        box-shadow: var(--shadow-xl);
    }

    .contact-card-icon {
        width: 60px;
        height: 60px;
        background: var(--accent-light);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--accent);
        margin-bottom: 20px;
    }

    .contact-card h4 {
        font-size: 1.25rem;
        margin-bottom: 12px;
        color: var(--text-primary);
    }

    .contact-card p {
        color: var(--text-muted);
        margin-bottom: 16px;
    }

    .contact-link {
        color: var(--accent);
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all var(--transition-fast);
    }

    .contact-link:hover {
        color: var(--orange-700);
        gap: 10px;
    }

    /* ========== CTA SECTION ========== */
    .cta-section {
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 60%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
    }

    .cta-title {
        font-size: clamp(2rem, 4vw, 3rem);
        color: white;
        margin-bottom: 16px;
    }

    .cta-text {
        font-size: 1.125rem;
        opacity: 0.9;
        margin-bottom: 32px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .btn-cta-white {
        background: white;
        color: var(--orange-600);
        font-weight: 700;
        padding: 16px 40px;
        border-radius: var(--radius-full);
        border: none;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        transition: all var(--transition-base);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-cta-white:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        color: var(--orange-700);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1200px) {
        .menu-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 991.98px) {
        .hero-section {
            padding: 60px 0;
            min-height: auto;
        }

        .hero-image-wrapper {
            margin-top: 60px;
        }

        .hero-float-card {
            display: none;
        }

        .hero-stats {
            gap: 30px;
        }

        .stat-number {
            font-size: 2rem;
        }
    }

    @media (max-width: 767.98px) {
        .menu-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .menu-card {
            aspect-ratio: 16/10;
        }

        .hero-stats {
            flex-wrap: wrap;
            gap: 24px;
        }

        .stat-item {
            flex: 1 1 45%;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .hero-buttons .btn-primary-modern,
        .hero-buttons .btn-outline-modern {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')

{{-- ==================== HERO SECTION ==================== --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-right">
                    <div class="hero-badge">
                        <i class="bi bi-stars"></i>
                        Premium Indonesian Coffee
                    </div>

                    <h1 class="hero-title">
                        <span class="highlight text-gradient">KOPI 1815</span>
                    </h1>

                    <p class="hero-subtitle">
                        Slow progress is still progress.
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ route('menu.index') }}" class="btn-primary-modern">
                            <i class="bi bi-cup-hot"></i>
                            View Menu
                        </a>
                        <a href="{{ route('about') }}" class="btn-outline-modern">
                            <i class="bi bi-play-circle"></i>
                            About Us
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">3+</div>
                            <div class="stat-label">Active Branches</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Menu Options</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">1000+</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image-wrapper" data-aos="fade-left" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80" 
                         alt="Premium Coffee" class="hero-image">

                    <div class="hero-float-card top">
                        <div class="float-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div class="float-text">
                            <strong>Premium Quality</strong>
                            <span>100% Arabica Beans</span>
                        </div>
                    </div>

                    <div class="hero-float-card bottom">
                        <div class="float-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <div class="float-text">
                            <strong>5.0 Rating</strong>
                            <span>Customer Love</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== MENU SECTION ==================== --}}
<section class="section-modern menu-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-cup-hot"></i>
                Our Menu
            </span>
            <h2 class="section-title">Discover Our Signature</h2>
            <p class="section-subtitle">
                Handcrafted drinks & comfort food to complement your day
            </p>
            <div class="accent-line"></div>
        </div>

        <div class="menu-grid">
            <a href="{{ route('menu.index') }}" class="menu-card" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80" alt="Signature">
                <div class="menu-card-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
                <div class="menu-card-content">
                    <h4>Signature</h4>
                    <p>House Favorites</p>
                </div>
            </a>

            <a href="{{ route('menu.index') }}" class="menu-card" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=800&q=80" alt="Coffee Based">
                <div class="menu-card-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
                <div class="menu-card-content">
                    <h4>Coffee Based</h4>
                    <p>Espresso Drinks</p>
                </div>
            </a>

            <a href="{{ route('menu.index') }}" class="menu-card" data-aos="fade-up" data-aos-delay="300">
                <img src="https://images.unsplash.com/photo-1544145945-f90425340c7e?auto=format&fit=crop&w=800&q=80" alt="Non Coffee">
                <div class="menu-card-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
                <div class="menu-card-content">
                    <h4>Non Coffee</h4>
                    <p>Refreshing Drinks</p>
                </div>
            </a>

            <a href="{{ route('menu.index') }}" class="menu-card" data-aos="fade-up" data-aos-delay="400">
                <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?auto=format&fit=crop&w=800&q=80" alt="Food">
                <div class="menu-card-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
                <div class="menu-card-content">
                    <h4>Food</h4>
                    <p>Comfort Food</p>
                </div>
            </a>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('menu.index') }}" class="btn-primary-modern">
                <i class="bi bi-grid"></i>
                Explore Full Menu
            </a>
        </div>
    </div>
</section>

{{-- ==================== FEATURES SECTION ==================== --}}
<section class="section-modern features-section">
    <div class="container position-relative">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-star"></i>
                Why Choose Us
            </span>
            <h2 class="section-title">Why Kopi 1815?</h2>
            <p class="section-subtitle">
                More than just coffee, we deliver an experience
            </p>
            <div class="accent-line"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h4>Premium Beans</h4>
                    <p>Selected coffee beans directly from local Indonesian farmers</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-fire"></i>
                    </div>
                    <h4>Fresh Roasted</h4>
                    <p>Quality roasting process for the perfect taste</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h4>Crafted with Love</h4>
                    <p>Every cup is made with passion and precision</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-house-heart"></i>
                    </div>
                    <h4>Cozy Space</h4>
                    <p>Comfortable place to work, study, or relax</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== CONTACT SECTION ==================== --}}
<section class="section-modern contact-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-chat-heart"></i>
                Get in Touch
            </span>
            <h2 class="section-title">Contact Us</h2>
            <p class="section-subtitle">
                Partnerships, catering, events, or just chat about coffee
            </p>
            <div class="accent-line"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4>Our Locations</h4>
                    <p>Available in 3 cities: Banjarmasin, Banjarbaru, and Yogyakarta</p>
                    <a href="{{ route('about') }}" class="contact-link">
                        View Full Address
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h4>Email & Social</h4>
                    <p>1815kopijogja@gmail.com<br>Instagram: @kopi.1815</p>
                    <a href="mailto:1815kopijogja@gmail.com" class="contact-link">
                        Send Email
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h4>Phone</h4>
                    <p>+62 851 8611 1106<br>Operating Hours: 10:00 AM - 10:00 PM</p>
                    <a href="tel:+6285186111106" class="contact-link">
                        Call Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== CTA SECTION ==================== --}}
<section class="section-modern cta-section" style="padding: 80px 0;">
    <div class="container">
        <div class="cta-content" data-aos="zoom-in">
            <h2 class="cta-title">Ready for a Great Coffee?</h2>
            <p class="cta-text">
                Come and experience a different coffee experience. We look forward to seeing you!
            </p>
            <a href="{{ route('menu.index') }}" class="btn-cta-white">
                <i class="bi bi-cup-hot-fill"></i>
                View Our Menu
            </a>
        </div>
    </div>
</section>

@endsection
