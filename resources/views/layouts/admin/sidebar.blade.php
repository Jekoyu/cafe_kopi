{{-- Admin Sidebar --}}
<aside class="admin-sidebar">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">
      <i class="bi bi-cup-hot-fill"></i>
      <span>Kopi<span class="accent">1815</span></span>
    </a>
  </div>

  <nav class="sidebar-nav">
    <ul class="nav-list">
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}"
          class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="bi bi-speedometer2"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-section">Menu Management</li>

      <li class="nav-item">
        <a href="{{ route('menu.index') }}" class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}">
          <i class="bi bi-cup-hot"></i>
          <span>Menu</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('categories.index') }}"
          class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
          <i class="bi bi-tags"></i>
          <span>Categories</span>
        </a>
      </li>
    </ul>
  </nav>

  <div class="sidebar-footer">
    <div class="user-info">
      <i class="bi bi-person-circle"></i>
      <span>{{ Auth::user()->name ?? 'Admin' }}</span>
    </div>

    <a href="{{ route('home') }}" class="btn-back-site">
      <i class="bi bi-arrow-left"></i>
      Back to Site
    </a>

    <form action="{{ route('admin.logout') }}" method="POST" style="margin-top: 10px;">
      @csrf
      <button type="submit" class="btn-logout">
        <i class="bi bi-box-arrow-right"></i>
        Logout
      </button>
    </form>
  </div>
</aside>