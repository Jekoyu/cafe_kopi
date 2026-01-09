@extends('layouts.app')

@section('content')
  <div class="container py-5" style="max-width:900px;">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h3 class="fw-bold mb-0">Edit Menu</h3>
      <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <div class="fw-bold mb-2">Ada error:</div>
        <ul class="mb-0">
          @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
      </div>
    @endif

    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
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
            <button class="btn btn-warning text-white fw-semibold px-4">
              <i class="bi bi-save"></i> Update
            </button>

            <form action="{{ route('menu.destroy', $menu) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
              @csrf @method('DELETE')
              <button class="btn btn-outline-danger fw-semibold">
                <i class="bi bi-trash"></i> Hapus
              </button>
            </form>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection