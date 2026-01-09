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

    /* ========== MENU NAV ========== */
    .menu-sticky {
        position: sticky;
        top: 80px;
        z-index: 100;
        background: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: var(--shadow-sm);
    }

    .menu-nav {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 16px 0;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .menu-nav::-webkit-scrollbar {
        display: none;
    }

    .menu-nav-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 20px;
        border-radius: var(--radius-full);
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-secondary);
        background: var(--cream-dark);
        white-space: nowrap;
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .menu-nav-link:hover {
        color: var(--accent);
        background: var(--accent-light);
    }

    .menu-nav-link.active {
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        color: white;
        box-shadow: var(--shadow-orange);
    }

    .back-top-btn {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 10px 16px;
        border-radius: var(--radius-full);
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--accent);
        background: transparent;
        border: 2px solid var(--accent);
        transition: all var(--transition-fast);
        text-decoration: none;
        margin-right: 16px;
        flex-shrink: 0;
    }

    .back-top-btn:hover {
        background: var(--accent);
        color: white;
    }

    /* ========== MENU SECTION ========== */
    .menu-content {
        background: var(--cream);
        padding: 60px 0 100px;
    }

    .category-section {
        margin-bottom: 80px;
        scroll-margin-top: 180px;
    }

    .category-section:last-child {
        margin-bottom: 0;
    }

    .category-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
    }

    .category-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        box-shadow: var(--shadow-orange);
        flex-shrink: 0;
    }

    .category-header h2 {
        font-size: 2rem;
        color: var(--text-primary);
        margin: 0;
    }

    .category-header p {
        color: var(--text-muted);
        margin: 4px 0 0;
        font-size: 0.95rem;
    }

    /* ========== MENU CARDS ========== */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .menu-item-card {
        background: white;
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all var(--transition-base);
        border: 1px solid transparent;
    }

    .menu-item-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: var(--orange-200);
    }

    .menu-item-image {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .menu-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--transition-slow);
    }

    .menu-item-card:hover .menu-item-image img {
        transform: scale(1.1);
    }

    .menu-item-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
        color: white;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: var(--radius-full);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .menu-item-content {
        padding: 20px;
    }

    .menu-item-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 6px;
    }

    .menu-item-desc {
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 12px;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .menu-item-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .menu-item-price {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--accent);
    }

    .menu-item-tag {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.8rem;
        color: var(--text-muted);
        background: var(--cream-dark);
        padding: 4px 10px;
        border-radius: var(--radius-full);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 1200px) {
        .menu-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .page-header {
            padding: 80px 0 60px;
        }

        .menu-grid {
            grid-template-columns: 1fr;
        }

        .category-header {
            flex-direction: column;
            text-align: center;
            gap: 16px;
        }

        .menu-nav-link {
            padding: 8px 16px;
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')

@php
$menuCategories = [
    [
        'id' => 'signature',
        'name' => 'Signature',
        'desc' => 'Our signature blends crafted exclusively for Kopi 1815',
        'icon' => 'bi-stars',
        'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80',
        'items' => [
            ['name' => 'Kopi 1815', 'desc' => 'Our house signature coffee blend', 'price' => '18k', 'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Karamelu', 'desc' => 'Coffee with sweet caramel touch', 'price' => '23k', 'image' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Double Booster', 'desc' => 'Double espresso energy boost', 'price' => '23k', 'image' => 'https://images.unsplash.com/photo-1510707577719-ae7c14805e3a?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Bischof Coffee', 'desc' => 'Unique blend of coffee and orange', 'price' => '25k', 'image' => 'https://images.unsplash.com/photo-1551030173-122aabc4489c?auto=format&fit=crop&w=400&q=80'],
        ]
    ],
    [
        'id' => 'coffee-based',
        'name' => 'Coffee Based',
        'desc' => 'Classic coffee drinks: espresso, latte, cappuccino',
        'icon' => 'bi-cup-hot',
        'image' => 'https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=800&q=80',
        'items' => [
            ['name' => 'Americano', 'desc' => 'Espresso with water, bold & clean', 'price' => '20k', 'image' => 'https://images.unsplash.com/photo-1532004491497-ba35c367d634?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Latte', 'desc' => 'Espresso with milk, creamy smooth', 'price' => '27k', 'image' => 'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Cappuccino', 'desc' => 'Espresso with thick milk foam', 'price' => '27k', 'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Espresso', 'desc' => 'Single shot pure coffee', 'price' => '15k', 'image' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Flat White', 'desc' => 'Velvety microfoam with espresso', 'price' => '28k', 'image' => 'https://images.unsplash.com/photo-1577968897966-3d4325b36b61?auto=format&fit=crop&w=400&q=80'],
        ]
    ],
    [
        'id' => 'non-coffee',
        'name' => 'Non Coffee',
        'desc' => 'Refreshing caffeine-free drinks for everyone',
        'icon' => 'bi-droplet',
        'image' => 'https://images.unsplash.com/photo-1544145945-f90425340c7e?auto=format&fit=crop&w=800&q=80',
        'items' => [
            ['name' => 'Chocolate', 'desc' => 'Rich & smooth hot chocolate', 'price' => '23k', 'image' => 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Matcha Latte', 'desc' => 'Creamy aromatic matcha', 'price' => '25k', 'image' => 'https://images.unsplash.com/photo-1515823064-d6e0c04616a7?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Lemon Tea', 'desc' => 'Refreshing tea with lemon', 'price' => '18k', 'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Lychee Tea', 'desc' => 'Tea with fresh lychee flavor', 'price' => '20k', 'image' => 'https://images.unsplash.com/photo-1558857563-b371033873b8?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Cookies & Cream', 'desc' => 'Sweet cookies and cream blend', 'price' => '25k', 'image' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?auto=format&fit=crop&w=400&q=80'],
        ]
    ],
    [
        'id' => 'food',
        'name' => 'Indonesian Cuisine',
        'desc' => 'Heartwarming local comfort food',
        'icon' => 'bi-egg-fried',
        'image' => 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?auto=format&fit=crop&w=800&q=80',
        'items' => [
            ['name' => 'Ayam Serundeng', 'desc' => 'Chicken with spiced coconut flakes', 'price' => '28k', 'image' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Ayam Bumbu Ireng', 'desc' => 'Chicken in black spice sauce', 'price' => '28k', 'image' => 'https://images.unsplash.com/photo-1527477396000-e27163b481c2?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Soto Betawi', 'desc' => 'Creamy beef soup Jakarta style', 'price' => '30k', 'image' => 'https://images.unsplash.com/photo-1547592166-23ac45744acd?auto=format&fit=crop&w=400&q=80'],
            ['name' => 'Soto Banjar', 'desc' => 'Clear chicken soup Banjar style', 'price' => '28k', 'image' => 'https://images.unsplash.com/photo-1617093727343-374698b1b08d?auto=format&fit=crop&w=400&q=80'],
        ]
    ],
];
@endphp

{{-- ==================== PAGE HEADER ==================== --}}
<section class="page-header">
    <div class="container">
        <div class="page-header-content" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-book"></i>
                Menu Book
            </span>
            <h1>Our Menu</h1>
            <p>Handcrafted drinks & comfort food untuk menemani harimu</p>
        </div>
    </div>
</section>

{{-- ==================== STICKY NAV ==================== --}}
<div class="menu-sticky">
    <div class="container">
        <nav class="menu-nav">
            <a href="#top" class="back-top-btn">
                <i class="bi bi-arrow-up"></i>
                Top
            </a>
            @foreach($menuCategories as $cat)
                <a href="#{{ $cat['id'] }}" class="menu-nav-link">
                    <i class="bi {{ $cat['icon'] }}"></i>
                    {{ $cat['name'] }}
                </a>
            @endforeach
        </nav>
    </div>
</div>

{{-- ==================== MENU CONTENT ==================== --}}
<section class="menu-content" id="top">
    <div class="container">
        @foreach($menuCategories as $cat)
        <div class="category-section" id="{{ $cat['id'] }}" data-aos="fade-up">
            <div class="category-header">
                <div class="category-icon">
                    <i class="bi {{ $cat['icon'] }}"></i>
                </div>
                <div>
                    <h2>{{ $cat['name'] }}</h2>
                    <p>{{ $cat['desc'] }}</p>
                </div>
            </div>

            <div class="menu-grid">
                @foreach($cat['items'] as $index => $item)
                <div class="menu-item-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="menu-item-image">
                        <img src="{{ $item['image'] ?? $cat['image'] }}" alt="{{ $item['name'] }}">
                        @if($index === 0)
                            <span class="menu-item-badge">Popular</span>
                        @endif
                    </div>
                    <div class="menu-item-content">
                        <h4 class="menu-item-name">{{ $item['name'] }}</h4>
                        <p class="menu-item-desc">{{ $item['desc'] }}</p>
                        <div class="menu-item-footer">
                            <span class="menu-item-price">Rp {{ $item['price'] }}</span>
                            <span class="menu-item-tag">
                                <i class="bi bi-check-circle"></i>
                                Available
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection

@section('page_js')
<script>
// Highlight active nav link on scroll
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.category-section');
    const navLinks = document.querySelectorAll('.menu-nav-link');

    function updateActiveLink() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= sectionTop - 250) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveLink);
    updateActiveLink();
});
</script>
@endsection
