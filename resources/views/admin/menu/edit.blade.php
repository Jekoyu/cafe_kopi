@extends('layouts.admin')

@section('title', 'Edit Menu')
@section('page_title', 'Edit Menu')

@section('content')
  <div class="admin-card" style="max-width: 800px;">
    <div class="admin-card-body">
      @if ($errors->any())
        <div class="alert alert-danger mb-4">
          <div class="fw-bold mb-2">Ada error:</div>
          <ul class="mb-0">
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('menu.update', $menu) }}">
        @csrf
        @method('PUT')

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="category_id" class="form-select" required>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $menu->category_id) == $cat->id ? 'selected' : '' }}>
                  {{ $cat->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Nama Menu</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Harga (Rp)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $menu->price) }}" required
              min="0">
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Image URL (optional)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $menu->image) }}"
              placeholder="https://...">
          </div>

          <div class="col-12">
            <label class="form-label fw-semibold">Deskripsi (optional)</label>
            <textarea name="description" class="form-control"
              rows="3">{{ old('description', $menu->description) }}</textarea>
          </div>
        </div>

        <div class="mt-4 d-flex gap-2">
          <button type="submit" class="btn btn-warning">
            <i class="bi bi-save me-1"></i> Update
          </button>
          <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
      </form>

      {{-- Delete form terpisah di luar form update --}}
      <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="mt-3"
        onsubmit="return confirm('Hapus menu ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">
          <i class="bi bi-trash me-1"></i> Hapus Menu
        </button>
      </form>
    </div>
  </div>
@endsection