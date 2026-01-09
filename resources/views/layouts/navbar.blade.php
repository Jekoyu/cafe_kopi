<nav class="navbar navbar-expand-lg navbar-modern fixed-top">
    <div class="container">
        {{-- Brand --}}
        <a class="navbar-brand-modern" href="{{ route('home') }}">
            <span class="brand-icon">
                <i class="bi bi-cup-hot-fill"></i>
            </span>
            kopi<span class="accent">1815</span>
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler navbar-toggler-modern" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        {{-- Nav Links --}}
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->routeIs('menu.index') ? 'active' : '' }}" 
                       href="{{ route('menu.index') }}">
                        Menu
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->routeIs('about') ? 'active' : '' }}" 
                       href="{{ route('about') }}">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->routeIs('contact') ? 'active' : '' }}" 
                       href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a class="btn btn-nav-cta" href="{{ route('menu.index') }}">
                        <i class="bi bi-cup-hot me-1"></i>
                        View Menu
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
