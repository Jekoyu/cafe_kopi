@extends('layouts.admin')

@section('title', 'Add Menu')
@section('page_title', 'Add Menu')

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

      @if($categories->count() === 0)
        <div class="alert alert-warning">
          Kategori masih kosong.
          <a href="{{ route('categories.create') }}" class="fw-semibold">Tambah Kategori dulu</a>
        </div>
      @endif

      <form method="POST" action="{{ route('menu.store') }}">
        @csrf

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="category_id" class="form-select" required>
              <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Pilih kategori</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                  {{ $cat->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Nama Menu</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Kopi 1815"
              required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Harga (Rp)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="Contoh: 23000"
              required min="0">
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Image URL (optional)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image') }}" placeholder="https://...">
          </div>

          <div class="col-12">
            <label class="form-label fw-semibold">Deskripsi (optional)</label>
            <textarea name="description" class="form-control" rows="3"
              placeholder="Deskripsi menu">{{ old('description') }}</textarea>
          </div>
        </div>

        <div class="mt-4 d-flex gap-2">
          <button class="btn btn-warning" {{ $categories->count() === 0 ? 'disabled' : '' }}>
            <i class="bi bi-save me-1"></i> Simpan
          </button>
          <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
@endsection