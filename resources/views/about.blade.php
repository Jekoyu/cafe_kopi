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

    /* ========== STORY SECTION ========== */
    .story-section {
        background: white;
    }

    .story-image {
        border-radius: var(--radius-2xl);
        box-shadow: var(--shadow-2xl);
        overflow: hidden;
    }

    .story-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--transition-slow);
    }

    .story-image:hover img {
        transform: scale(1.05);
    }

    .story-content {
        padding-left: 40px;
    }

    .story-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--accent-light);
        color: var(--orange-700);
        font-size: 0.85rem;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: var(--radius-full);
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .story-title {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: var(--text-primary);
    }

    .story-text {
        color: var(--text-secondary);
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 24px;
    }

    .story-quote {
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        color: white;
        padding: 24px 28px;
        border-radius: var(--radius-xl);
        font-size: 1.1rem;
        font-style: italic;
        position: relative;
        margin-top: 32px;
    }

    .story-quote::before {
        content: '"';
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        position: absolute;
        top: -10px;
        left: 20px;
        opacity: 0.3;
        line-height: 1;
    }

    /* ========== VALUES SECTION ========== */
    .values-section {
        background: var(--cream-dark);
    }

    .value-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 32px;
        box-shadow: var(--shadow-md);
        height: 100%;
        transition: all var(--transition-base);
        border: 1px solid transparent;
    }

    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: var(--orange-200);
    }

    .value-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        margin-bottom: 20px;
        box-shadow: var(--shadow-orange);
    }

    .value-card h4 {
        font-size: 1.25rem;
        margin-bottom: 12px;
        color: var(--text-primary);
    }

    .value-card p {
        color: var(--text-muted);
        margin: 0;
        line-height: 1.7;
    }

    /* ========== BRANCHES SECTION ========== */
    .branches-section {
        background: white;
    }

    .branch-card {
        position: relative;
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all var(--transition-base);
    }

    .branch-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-2xl);
    }

    .branch-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform var(--transition-slow);
    }

    .branch-card:hover img {
        transform: scale(1.1);
    }

    .branch-content {
        padding: 24px;
        background: white;
    }

    .branch-city {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--accent-light);
        color: var(--orange-700);
        font-size: 0.8rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: var(--radius-full);
        margin-bottom: 12px;
    }

    .branch-name {
        font-size: 1.25rem;
        margin-bottom: 8px;
        color: var(--text-primary);
    }

    .branch-address {
        color: var(--text-muted);
        font-size: 0.95rem;
        margin: 0;
        display: flex;
        align-items: flex-start;
        gap: 8px;
    }

    .branch-address i {
        color: var(--accent);
        margin-top: 3px;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
        .story-content {
            padding-left: 0;
            margin-top: 40px;
        }

        .story-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 767.98px) {
        .page-header {
            padding: 80px 0 60px;
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
                <i class="bi bi-info-circle"></i>
                About Us
            </span>
            <h1>Our Story & People</h1>
            <p>Passionate about Indonesian coffee — from farm to cup</p>
        </div>
    </div>
</section>

{{-- ==================== STORY SECTION ==================== --}}
<section class="section-modern story-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="story-image">
                    <img src="https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&fit=crop&w=1200&q=80" 
                         alt="Coffee Bar Kopi 1815">
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="story-content">
                    <span class="story-badge">
                        <i class="bi bi-book"></i>
                        Our Story
                    </span>

                    <h2 class="story-title">Coffee With Purpose</h2>

                    <p class="story-text">
                        Kopi 1815 was built on a simple belief: Indonesia produces 
                        some of the best coffee in the world. We work with local partners 
                        to celebrate those flavors and deliver them consistently.
                    </p>

                    <p class="story-text">
                        Our motto — <strong>"Yes, I Drink Indonesian Coffee"</strong> — 
                        reminds us that coffee is more than just a drink; it's 
                        culture, community, and shared moments.
                    </p>

                    <div class="story-quote">
                        We invite people who share the same passion to grow with us — 
                        a coffee experience that feels easy, simple, and enjoyable.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== VALUES SECTION ==================== --}}
<section class="section-modern values-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-heart"></i>
                Our Values
            </span>
            <h2 class="section-title">What We Believe In</h2>
            <p class="section-subtitle">
                The values that form the foundation of every cup of our coffee
            </p>
            <div class="accent-line"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h4>Quality First</h4>
                    <p>From bean selection to serving, we care about every detail</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Warm Service</h4>
                    <p>A friendly place to meet, work, or simply relax</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-globe-asia-australia"></i>
                    </div>
                    <h4>Local Pride</h4>
                    <p>Supporting local coffee farmers and elevating Indonesian flavors</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <h4>Slow Progress</h4>
                    <p>Believing that slow progress is still meaningful progress</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== BRANCHES SECTION ==================== --}}
<section class="section-modern branches-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-geo-alt"></i>
                Our Locations
            </span>
            <h2 class="section-title">Find Us Near You</h2>
            <p class="section-subtitle">
                Visit the nearest Kopi 1815 branch from your location
            </p>
            <div class="accent-line"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="branch-card">
                    <img src="{{ asset('kopi1815-banjarmasin.jpeg') }}" 
                         onerror="this.src='https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=800&q=80'"
                         alt="Kopi 1815 Banjarmasin">
                    <div class="branch-content">
                        <span class="branch-city">
                            <i class="bi bi-building"></i>
                            Banjarmasin
                        </span>
                        <h4 class="branch-name">Kopi 1815 Banjarmasin</h4>
                        <p class="branch-address">
                            <i class="bi bi-pin-map"></i>
                            Jl. Mahat Kasan No.158, Kuripan, Kec. Banjarmasin Timur
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="branch-card">
                    <img src="{{ asset('kopi1815-banjarbaru.jpeg') }}" 
                         onerror="this.src='https://images.unsplash.com/photo-1559925393-8be0ec4767c8?auto=format&fit=crop&w=800&q=80'"
                         alt="Kopi 1815 Banjarbaru">
                    <div class="branch-content">
                        <span class="branch-city">
                            <i class="bi bi-building"></i>
                            Banjarbaru
                        </span>
                        <h4 class="branch-name">Kopi 1815 Banjarbaru</h4>
                        <p class="branch-address">
                            <i class="bi bi-pin-map"></i>
                            Jl. Sarikaya No.34, Loktabat Selatan
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="branch-card">
                    <img src="{{ asset('kopi1815-yogyakarta.jpeg') }}" 
                         onerror="this.src='https://images.unsplash.com/photo-1453614512568-c4024d13c247?auto=format&fit=crop&w=800&q=80'"
                         alt="Kopi 1815 Yogyakarta">
                    <div class="branch-content">
                        <span class="branch-city">
                            <i class="bi bi-building"></i>
                            Yogyakarta
                        </span>
                        <h4 class="branch-name">Kopi 1815 Yogyakarta</h4>
                        <p class="branch-address">
                            <i class="bi bi-pin-map"></i>
                            Jl. Garuda No.26, Mrican, Caturtunggal
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
