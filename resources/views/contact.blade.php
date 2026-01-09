@extends('layouts.app')

@section('page_css')
<style>
    /* ========== PAGE HEADER ========== */
    .page-header {
        background: linear-gradient(135deg, var(--brown-900) 0%, #2a1a10 100%);
        padding: 100px 0 80px;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: -10%;
        width: 50%;
        height: 100%;
        background: radial-gradient(circle, rgba(249, 115, 22, 0.15) 0%, transparent 70%);
    }

    .page-header-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .page-header .section-badge {
        background: rgba(249, 115, 22, 0.2);
        color: var(--orange-400);
    }

    .page-header h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        color: white;
        margin-bottom: 16px;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.125rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ========== CONTACT INFO ========== */
    .contact-info-section {
        background: white;
    }

    .contact-main-card {
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        border-radius: var(--radius-2xl);
        padding: 48px;
        color: white;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .contact-main-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 80%;
        height: 150%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    }

    .contact-main-card h3 {
        font-size: 2rem;
        margin-bottom: 24px;
        position: relative;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 24px;
        position: relative;
    }

    .contact-item:last-child {
        margin-bottom: 0;
    }

    .contact-item-icon {
        width: 52px;
        height: 52px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .contact-item-content h5 {
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        font-weight: 600;
        opacity: 0.8;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .contact-item-content a,
    .contact-item-content p {
        font-size: 1.1rem;
        margin: 0;
        color: white;
        transition: opacity var(--transition-fast);
    }

    .contact-item-content a:hover {
        opacity: 0.8;
    }

    /* ========== OFFICE CARDS ========== */
    .office-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 32px;
        box-shadow: var(--shadow-lg);
        height: 100%;
        transition: all var(--transition-base);
        border: 1px solid transparent;
    }

    .office-card:hover {
        transform: translateY(-5px);
        border-color: var(--orange-200);
        box-shadow: var(--shadow-xl);
    }

    .office-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--accent-light);
        color: var(--orange-700);
        font-size: 0.8rem;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: var(--radius-full);
        margin-bottom: 16px;
    }

    .office-card h4 {
        font-size: 1.25rem;
        margin-bottom: 12px;
        color: var(--text-primary);
    }

    .office-card p {
        color: var(--text-muted);
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    /* ========== SOCIAL NETWORK ========== */
    .social-section {
        background: var(--cream-dark);
    }

    .social-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 40px 32px;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: all var(--transition-base);
        height: 100%;
    }

    .social-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .social-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        border-radius: var(--radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: white;
        margin: 0 auto 24px;
        box-shadow: var(--shadow-orange);
    }

    .social-card h4 {
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .social-card .handle {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
    }

    .social-card .handle a {
        color: inherit;
        transition: color var(--transition-fast);
    }

    .social-card .handle a:hover {
        color: var(--accent);
    }

    /* ========== MAP SECTION ========== */
    .map-section {
        background: white;
        padding-bottom: 0;
    }

    .map-container {
        border-radius: var(--radius-2xl) var(--radius-2xl) 0 0;
        overflow: hidden;
        box-shadow: var(--shadow-xl);
    }

    .map-container iframe {
        width: 100%;
        height: 400px;
        border: none;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .contact-main-card {
            padding: 32px;
            margin-bottom: 24px;
        }
    }

    @media (max-width: 767.98px) {
        .page-header {
            padding: 80px 0 60px;
        }

        .social-icon {
            width: 64px;
            height: 64px;
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')

{{-- ==================== PAGE HEADER ==================== --}}
<section class="page-header">
    <div class="container">
        <div class="page-header-content" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-chat-heart"></i>
                Contact
            </span>
            <h1>Get In Touch</h1>
            <p>Have questions? Want to collaborate? We'd love to hear from you!</p>
        </div>
    </div>
</section>

{{-- ==================== CONTACT INFO ==================== --}}
<section class="section-modern contact-info-section">
    <div class="container">
        <div class="row g-4">
            {{-- Main Contact Card --}}
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-main-card">
                    <h3>Let's Talk Coffee</h3>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="contact-item-content">
                            <h5>Email</h5>
                            <a href="mailto:1815kopijogja@gmail.com">1815kopijogja@gmail.com</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="contact-item-content">
                            <h5>Phone / WhatsApp</h5>
                            <a href="tel:+6285186111106">+62 851 8611 1106</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <div class="contact-item-content">
                            <h5>Instagram</h5>
                            <a href="https://instagram.com/kopi.1815" target="_blank">@kopi.1815</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-item-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="contact-item-content">
                            <h5>Operating Hours</h5>
                            <p>10:00 AM - 10:00 PM (Everyday)</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Office Cards --}}
            <div class="col-lg-7" data-aos="fade-left">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="office-card">
                            <span class="office-badge">
                                <i class="bi bi-geo-alt"></i>
                                Yogyakarta
                            </span>
                            <h4>Kopi 1815 Yogyakarta</h4>
                            <p><i class="bi bi-pin-map me-2 text-warning"></i>Jl. Garuda No.26, Mrican</p>
                            <p><i class="bi bi-telephone me-2 text-warning"></i>+62 851 8611 1106</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="office-card">
                            <span class="office-badge">
                                <i class="bi bi-geo-alt"></i>
                                Banjarmasin
                            </span>
                            <h4>Kopi 1815 Banjarmasin</h4>
                            <p><i class="bi bi-pin-map me-2 text-warning"></i>Jl. Mahat Kasan No.158</p>
                            <p><i class="bi bi-telephone me-2 text-warning"></i>+62 xxx xxxx xxxx</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="office-card">
                            <span class="office-badge">
                                <i class="bi bi-geo-alt"></i>
                                Banjarbaru
                            </span>
                            <h4>Kopi 1815 Banjarbaru</h4>
                            <p><i class="bi bi-pin-map me-2 text-warning"></i>Jl. Sarikaya No.34</p>
                            <p><i class="bi bi-telephone me-2 text-warning"></i>+62 xxx xxxx xxxx</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="office-card" style="background: var(--accent-light); border: 2px dashed var(--orange-300);">
                            <span class="office-badge" style="background: white;">
                                <i class="bi bi-stars"></i>
                                Collab / Event
                            </span>
                            <h4>Want to Collaborate?</h4>
                            <p>Pop-up, community events, brand collab, or catering — let's build something cool together!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== SOCIAL NETWORK ==================== --}}
<section class="section-modern social-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-share"></i>
                Stay Connected
            </span>
            <h2 class="section-title">Follow & Connect</h2>
            <p class="section-subtitle">
                Follow our social media for the latest updates and interesting content
            </p>
            <div class="accent-line"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="social-card">
                    <div class="social-icon">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <h4>Instagram</h4>
                    <div class="handle">
                        <a href="https://instagram.com/kopi.1815" target="_blank">@kopi.1815</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="social-card">
                    <div class="social-icon">
                        <i class="bi bi-tiktok"></i>
                    </div>
                    <h4>TikTok</h4>
                    <div class="handle">
                        <a href="https://tiktok.com/@kopi_1815" target="_blank">@kopi_1815</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="social-card">
                    <div class="social-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h4>WhatsApp</h4>
                    <div class="handle">
                        <a href="https://wa.me/6285186111106" target="_blank">Chat Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
