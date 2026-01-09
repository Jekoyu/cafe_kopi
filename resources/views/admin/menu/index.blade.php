@extends('layouts.app')

@section('content')
  <style>
    :root {
      --coffee-dark: #2b2b2b;
      --coffee-brown: #8b5e3c;
      --coffee-cream: #f3efe9;
      --coffee-muted: #b6b2ac;
      --coffee-accent: #c9a24d;
    }

    body {
      background: var(--coffee-cream);
    }

    .card {
      background: #ffffff;
      border-radius: 14px;
    }

    .page-title {
      color: var(--coffee-dark);
      letter-spacing: .2px;
    }

    .btn-warning {
      background: var(--coffee-accent) !important;
      border: none !important;
    }

    .btn-warning:hover {
      background: #b8933f !important;
    }

    .table thead th {
      color: var(--coffee-brown);
      font-weight: 800;
      border-bottom: 2px solid rgba(201, 162, 77, .75);
    }

    .table tbody tr:hover {
      background: #faf7f2;
    }

    .text-muted {
      color: #7b7570 !important;
    }

    .btn-outline-primary {
      color: var(--coffee-brown);
      border-color: var(--coffee-brown);
    }

    .btn-outline-primary:hover {
      background: var(--coffee-brown);
      color: #fff;
    }

    .btn-outline-danger {
      color: #7a2e2e;
      border-color: #7a2e2e;
    }

    .btn-outline-danger:hover {
      background: #7a2e2e;
      color: #fff;
    }

    .alert-success {
      background: #e6f0e8;
      color: #2f5d3a;
      border: none;
    }

    .table td,
    .table th {
      vertical-align: middle;
    }

    .badge-available {
      background: #d1fae5;
      color: #059669;
    }

    .badge-unavailable {
      background: #fee2e2;
      color: #dc2626;
    }

    .menu-thumb {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
    }
  </style>

  <div class="container py-5" style="max-width:1100px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold mb-0 page-title">Menu Management</h3>

      <a href="{{ route('menu.create') }}" class="btn btn-warning text-white fw-semibold">
        <i class="bi bi-plus-circle"></i> Add Menu
      </a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th width="60">Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th width="100">Status</th>
              <th width="180">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($menus as $menu)
              <tr>
                <td>
                  <img src="{{ $menu->image ?? 'https://via.placeholder.com/50' }}" alt="{{ $menu->name }}"
                    class="menu-thumb">
                </td>
                <td>
                  <div class="fw-semibold">{{ $menu->name }}</div>
                  <small class="text-muted">{{ Str::limit($menu->description, 40) }}</small>
                </td>
                <td>
                  <span class="badge bg-secondary">{{ $menu->category->name ?? '-' }}</span>
                </td>
                <td class="fw-semibold">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                <td>
                  @if($menu->is_available)
                    <span class="badge badge-available">Available</span>
                  @else
                    <span class="badge badge-unavailable">Sold Out</span>
                  @endif
                </td>
                <td class="d-flex gap-2">
                  <a href="{{ route('menu.edit', $menu) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                  <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                    onsubmit="return confirm('Delete this menu?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">No menu items yet.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection