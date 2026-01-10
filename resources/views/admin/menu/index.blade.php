@extends('layouts.admin')

@section('title', 'Menu Management')
@section('page_title', 'Menu Management')

@section('header_actions')
  <a href="{{ route('menu.create') }}" class="btn btn-warning">
    <i class="bi bi-plus-circle me-1"></i> Add Menu
  </a>
@endsection

@section('content')
  <div class="admin-card">
    <div class="admin-card-body p-0">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th width="60">Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th width="100">Status</th>
            <th width="150">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($menus as $menu)
            <tr>
              <td>
                <img src="{{ $menu->image ?? 'https://via.placeholder.com/50' }}" alt="{{ $menu->name }}"
                  style="width:50px;height:50px;object-fit:cover;border-radius:8px;">
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
                  <span class="badge bg-success">Available</span>
                @else
                  <span class="badge bg-danger">Sold Out</span>
                @endif
              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('menu.edit', $menu) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                    onsubmit="return confirm('Delete this menu?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted py-4">
                No menu items yet. <a href="{{ route('menu.create') }}">Add one</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection