<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin') - Kopi 1815</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    :root {
      --sidebar-width: 260px;
      --header-height: 60px;
      --coffee-dark: #1a1410;
      --coffee-brown: #8b5e3c;
      --coffee-cream: #f8f5f1;
      --coffee-accent: #c9a24d;
      --coffee-light: #f3efe9;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--coffee-cream);
      min-height: 100vh;
    }

    /* ========== SIDEBAR ========== */
    .admin-sidebar {
      position: fixed;
      left: 0;
      top: 0;
      width: var(--sidebar-width);
      height: 100vh;
      background: var(--coffee-dark);
      display: flex;
      flex-direction: column;
      z-index: 1000;
    }

    .sidebar-brand {
      padding: 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-brand a {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: white;
      font-size: 1.5rem;
      font-weight: 700;
    }

    .sidebar-brand i {
      font-size: 1.75rem;
      color: var(--coffee-accent);
    }

    .sidebar-brand .accent {
      color: var(--coffee-accent);
    }

    .sidebar-nav {
      flex: 1;
      padding: 20px 0;
      overflow-y: auto;
    }

    .nav-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .nav-section {
      padding: 20px 20px 10px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: rgba(255, 255, 255, 0.4);
    }

    .nav-item .nav-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px 20px;
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      font-size: 0.95rem;
      font-weight: 500;
      transition: all 0.2s ease;
      border-left: 3px solid transparent;
    }

    .nav-item .nav-link:hover {
      background: rgba(255, 255, 255, 0.08);
      color: white;
    }

    .nav-item .nav-link.active {
      background: rgba(201, 162, 77, 0.15);
      color: var(--coffee-accent);
      border-left-color: var(--coffee-accent);
    }

    .nav-item .nav-link i {
      font-size: 1.25rem;
      width: 24px;
      text-align: center;
    }

    .sidebar-footer {
      padding: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-back-site {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      padding: 10px;
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      font-size: 0.9rem;
      transition: all 0.2s ease;
    }

    .btn-back-site:hover {
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }

    /* ========== MAIN CONTENT ========== */
    .admin-main {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
    }

    .admin-header {
      height: var(--header-height);
      background: white;
      border-bottom: 1px solid #e5e5e5;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 24px;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .admin-header h1 {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--coffee-dark);
      margin: 0;
    }

    .admin-content {
      padding: 24px;
    }

    /* ========== CARDS ========== */
    .stat-card {
      background: white;
      border-radius: 12px;
      padding: 24px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
      transition: all 0.2s ease;
    }

    .stat-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    .stat-card .stat-icon {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 16px;
    }

    .stat-card .stat-icon.bg-orange {
      background: rgba(249, 115, 22, 0.15);
      color: #f97316;
    }

    .stat-card .stat-icon.bg-green {
      background: rgba(34, 197, 94, 0.15);
      color: #22c55e;
    }

    .stat-card .stat-icon.bg-blue {
      background: rgba(59, 130, 246, 0.15);
      color: #3b82f6;
    }

    .stat-card .stat-icon.bg-purple {
      background: rgba(168, 85, 247, 0.15);
      color: #a855f7;
    }

    .stat-card .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: var(--coffee-dark);
      margin-bottom: 4px;
    }

    .stat-card .stat-label {
      font-size: 0.9rem;
      color: #6b7280;
    }

    /* ========== TABLE ========== */
    .admin-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
      overflow: hidden;
    }

    .admin-card-header {
      padding: 16px 20px;
      border-bottom: 1px solid #e5e5e5;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .admin-card-header h3 {
      font-size: 1rem;
      font-weight: 600;
      margin: 0;
    }

    .admin-card-body {
      padding: 20px;
    }

    .table thead th {
      background: var(--coffee-light);
      font-weight: 600;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: var(--coffee-brown);
      border: none;
    }

    .table tbody td {
      vertical-align: middle;
      color: #374151;
    }

    .btn-warning {
      background: var(--coffee-accent) !important;
      border: none !important;
      color: white !important;
    }

    .btn-warning:hover {
      background: #b8933f !important;
    }

    .alert-success {
      background: #d1fae5;
      color: #065f46;
      border: none;
      border-radius: 8px;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991.98px) {
      .admin-sidebar {
        transform: translateX(-100%);
      }

      .admin-main {
        margin-left: 0;
      }
    }
  </style>

  @yield('page_css')
</head>

<body>
  @include('layouts.admin.sidebar')

  <div class="admin-main">
    <header class="admin-header">
      <h1>@yield('page_title', 'Dashboard')</h1>
      <div class="header-actions">
        @yield('header_actions')
      </div>
    </header>

    <main class="admin-content">
      @if(session('success'))
        <div class="alert alert-success mb-4">
          <i class="bi bi-check-circle me-2"></i>
          {{ session('success') }}
        </div>
      @endif

      @yield('content')
    </main>
  </div>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  @yield('page_js')
</body>

</html>