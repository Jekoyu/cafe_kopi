<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kopi 1815 - Premium Indonesian Coffee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kopi 1815 - Experience the finest Indonesian coffee in Banjarmasin, Banjarbaru, and Yogyakarta">

    {{-- Google Fonts - Elegant Cafe Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ========================================
           MODERN COFFEE SHOP DESIGN SYSTEM
           Primary: Orange | Accent: Dark Brown
        ======================================== */
        :root {
            /* Primary Colors */
            --orange-50: #fff7ed;
            --orange-100: #ffedd5;
            --orange-200: #fed7aa;
            --orange-300: #fdba74;
            --orange-400: #fb923c;
            --orange-500: #f97316;
            --orange-600: #ea580c;
            --orange-700: #c2410c;
            --orange-800: #9a3412;
            --orange-900: #7c2d12;

            /* Neutral Colors */
            --cream: #fdfbf7;
            --cream-dark: #f5f0e8;
            --brown-50: #faf5f0;
            --brown-100: #f0e6d8;
            --brown-800: #3d2c22;
            --brown-900: #1f1610;

            /* Semantic */
            --bg-primary: var(--cream);
            --bg-secondary: #ffffff;
            --text-primary: var(--brown-900);
            --text-secondary: #6b5b4f;
            --text-muted: #9c8b7e;
            --accent: var(--orange-500);
            --accent-hover: var(--orange-600);
            --accent-light: var(--orange-100);

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --shadow-orange: 0 20px 40px -10px rgba(249, 115, 22, 0.35);

            /* Spacing */
            --section-padding: clamp(60px, 10vw, 120px);

            /* Transitions */
            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 500ms cubic-bezier(0.4, 0, 0.2, 1);

            /* Border Radius */
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-2xl: 32px;
            --radius-full: 9999px;
        }

        /* ========== RESET & BASE ========== */
        *, *::before, *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            padding-top: 80px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-weight: 600;
            line-height: 1.2;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color var(--transition-fast);
        }

        /* ========== NAVBAR ========== */
        .navbar-modern {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            padding: 16px 0;
            transition: all var(--transition-base);
        }

        .navbar-modern.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow-md);
            padding: 12px 0;
        }

        .navbar-brand-modern {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary) !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand-modern .accent {
            color: var(--accent);
        }

        .navbar-brand-modern .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .nav-link-modern {
            font-weight: 500;
            font-size: 0.95rem;
            color: var(--text-secondary) !important;
            padding: 8px 16px !important;
            border-radius: var(--radius-full);
            transition: all var(--transition-fast);
            position: relative;
        }

        .nav-link-modern:hover {
            color: var(--accent) !important;
            background: var(--accent-light);
        }

        .nav-link-modern.active {
            color: var(--accent) !important;
            font-weight: 600;
        }

        .btn-nav-cta {
            background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
            color: white !important;
            font-weight: 600;
            padding: 10px 24px !important;
            border-radius: var(--radius-full);
            border: none;
            box-shadow: var(--shadow-orange);
            transition: all var(--transition-base);
        }

        .btn-nav-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 25px 50px -10px rgba(249, 115, 22, 0.45);
            color: white !important;
        }

        /* Mobile Navbar */
        .navbar-toggler-modern {
            border: none;
            padding: 8px;
            background: var(--accent-light);
            border-radius: var(--radius-sm);
        }

        .navbar-toggler-modern:focus {
            box-shadow: none;
        }

        .navbar-toggler-modern .bi {
            font-size: 1.5rem;
            color: var(--accent);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: white;
                margin-top: 16px;
                padding: 20px;
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-xl);
            }

            .nav-link-modern {
                padding: 12px 16px !important;
            }

            .btn-nav-cta {
                width: 100%;
                text-align: center;
                margin-top: 12px;
            }
        }

        /* ========== BUTTONS ========== */
        .btn-primary-modern {
            background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
            color: white;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: var(--radius-full);
            border: none;
            box-shadow: var(--shadow-orange);
            transition: all var(--transition-base);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 30px 60px -15px rgba(249, 115, 22, 0.5);
            color: white;
        }

        .btn-outline-modern {
            background: transparent;
            color: var(--text-primary);
            font-weight: 600;
            padding: 14px 32px;
            border-radius: var(--radius-full);
            border: 2px solid var(--brown-800);
            transition: all var(--transition-base);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline-modern:hover {
            background: var(--brown-800);
            color: white;
            transform: translateY(-2px);
        }

        /* ========== SECTIONS ========== */
        .section-modern {
            padding: var(--section-padding) 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--accent-light);
            color: var(--orange-700);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: var(--radius-full);
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        .accent-line {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--orange-500), var(--orange-400));
            border-radius: var(--radius-full);
            margin: 20px auto 0;
        }

        /* ========== CARDS ========== */
        .card-modern {
            background: white;
            border-radius: var(--radius-xl);
            border: none;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            transition: all var(--transition-base);
        }

        .card-modern:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
        }

        /* ========== FOOTER ========== */
        .footer-modern {
            background: linear-gradient(180deg, var(--brown-900), #0f0a07);
            color: rgba(255, 255, 255, 0.8);
            padding: 80px 0 30px;
        }

        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 16px;
        }

        .footer-brand .accent {
            color: var(--orange-400);
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .footer-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 24px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.6);
            transition: all var(--transition-fast);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a:hover {
            color: var(--orange-400);
            transform: translateX(5px);
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            transition: all var(--transition-base);
        }

        .footer-social a:hover {
            background: var(--orange-500);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 60px;
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
        }

        /* ========== UTILITIES ========== */
        .text-gradient {
            background: linear-gradient(135deg, var(--orange-500), var(--orange-600));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .bg-cream { background: var(--cream); }
        .bg-cream-dark { background: var(--cream-dark); }
        .bg-white-soft { background: rgba(255, 255, 255, 0.7); }

        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            :root {
                --section-padding: 60px;
            }

            body {
                padding-top: 70px;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .section-subtitle {
                font-size: 1rem;
            }

            .btn-primary-modern,
            .btn-outline-modern {
                padding: 12px 24px;
                font-size: 0.95rem;
            }
        }

        /* ========== ANIMATIONS ========== */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.4); }
            50% { box-shadow: 0 0 0 20px rgba(249, 115, 22, 0); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* Scroll Progress Bar - Hidden */
        .scroll-progress {
            display: none;
        }
    </style>

    @yield('page_css')
</head>
<body>
    <div class="scroll-progress" id="scrollProgress"></div>

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- AOS Animation --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Navbar scroll effect
        const navbar = document.querySelector('.navbar-modern');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll progress bar
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('scrollProgress').style.width = scrolled + '%';
        });
    </script>

    @yield('page_js')
</body>
</html>
