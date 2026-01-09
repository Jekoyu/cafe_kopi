@extends('layouts.app')

@section('content')
  <div class="container py-5" style="max-width:900px;">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h3 class="fw-bold mb-0">Tambah Menu</h3>
      <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <div class="fw-bold mb-2">Ada error:</div>
        <ul class="mb-0">
          @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
      </div>
    @endif

    @if($categories->count() === 0)
      <div class="alert alert-warning">
        Kategori masih kosong. Buat kategori dulu ya:
        <a href="{{ route('categories.create') }}" class="fw-semibold">Tambah Kategori</a>
      </div>
    @endif

    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
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
              <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                placeholder="Contoh: Kopi 1815" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Harga (Rp)</label>
              <input type="number" name="price" class="form-control" value="{{ old('price') }}"
                placeholder="Contoh: 23000" required min="0">
              <div class="form-text">Masukkan harga dalam rupiah tanpa titik/koma</div>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Image URL (optional)</label>
              <input type="text" name="image" class="form-control" value="{{ old('image') }}" placeholder="https://...">
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Deskripsi (optional)</label>
              <textarea name="description" class="form-control" rows="3"
                placeholder="Contoh: (Caramel/Bischof)">{{ old('description') }}</textarea>
            </div>
          </div>

          <div class="mt-4">
            <button class="btn btn-warning text-white fw-semibold px-4" {{ $categories->count() === 0 ? 'disabled' : '' }}>
              <i class="bi bi-save"></i> Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection