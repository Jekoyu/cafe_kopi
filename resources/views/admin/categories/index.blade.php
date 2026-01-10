@extends('layouts.admin')

@section('title', 'Categories')
@section('page_title', 'Category Management')

@section('header_actions')
  <a href="{{ route('categories.create') }}" class="btn btn-warning">
    <i class="bi bi-plus-circle me-1"></i> Add Category
  </a>
@endsection

@section('content')
  <div class="admin-card">
    <div class="admin-card-body p-0">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th width="80">Menus</th>
            <th width="150">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($categories as $category)
            <tr>
              <td class="fw-semibold">{{ $category->name }}</td>
              <td class="text-muted">{{ $category->slug }}</td>
              <td>{{ Str::limit($category->description, 50) }}</td>
              <td>
                <span class="badge bg-secondary">{{ $category->menus_count ?? $category->menus->count() }}</span>
              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <form action="{{ route('categories.destroy', $category) }}" method="POST"
                    onsubmit="return confirm('Delete this category?')">
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
              <td colspan="5" class="text-center text-muted py-4">
                No categories yet. <a href="{{ route('categories.create') }}">Add one</a>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection