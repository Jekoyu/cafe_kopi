@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
  {{-- Statistics Cards --}}
  <div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
      <div class="stat-card">
        <div class="stat-icon bg-orange">
          <i class="bi bi-cup-hot"></i>
        </div>
        <div class="stat-value">{{ $stats['total_menus'] }}</div>
        <div class="stat-label">Total Menu</div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3">
      <div class="stat-card">
        <div class="stat-icon bg-blue">
          <i class="bi bi-tags"></i>
        </div>
        <div class="stat-value">{{ $stats['total_categories'] }}</div>
        <div class="stat-label">Categories</div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3">
      <div class="stat-card">
        <div class="stat-icon bg-green">
          <i class="bi bi-check-circle"></i>
        </div>
        <div class="stat-value">{{ $stats['available_menus'] }}</div>
        <div class="stat-label">Available</div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3">
      <div class="stat-card">
        <div class="stat-icon bg-purple">
          <i class="bi bi-x-circle"></i>
        </div>
        <div class="stat-value">{{ $stats['unavailable_menus'] }}</div>
        <div class="stat-label">Sold Out</div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    {{-- Recent Menus --}}
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="admin-card-header">
          <h3>Recent Menu Items</h3>
          <a href="{{ route('menu.create') }}" class="btn btn-sm btn-warning">
            <i class="bi bi-plus"></i> Add Menu
          </a>
        </div>
        <div class="admin-card-body p-0">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentMenus as $menu)
                <tr>
                  <td class="fw-semibold">{{ $menu->name }}</td>
                  <td>
                    <span class="badge bg-secondary">{{ $menu->category->name ?? '-' }}</span>
                  </td>
                  <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                  <td>
                    @if($menu->is_available)
                      <span class="badge bg-success">Available</span>
                    @else
                      <span class="badge bg-danger">Sold Out</span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">
                    No menu items yet. <a href="{{ route('menu.create') }}">Add one</a>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Categories Overview --}}
    <div class="col-lg-4">
      <div class="admin-card">
        <div class="admin-card-header">
          <h3>Categories</h3>
          <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-plus"></i>
          </a>
        </div>
        <div class="admin-card-body">
          @forelse($categories as $category)
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <div class="fw-semibold">{{ $category->name }}</div>
                <small class="text-muted">{{ $category->menus_count }} items</small>
              </div>
              <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-pencil"></i>
              </a>
            </div>
          @empty
            <p class="text-muted text-center mb-0">No categories yet.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection