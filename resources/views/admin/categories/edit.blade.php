@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page_title', 'Edit Category')

@section('content')
  <div class="admin-card" style="max-width: 600px;">
    <div class="admin-card-body">
      @if ($errors->any())
        <div class="alert alert-danger mb-4">
          <ul class="mb-0">
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Kategori</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-warning">
            <i class="bi bi-save me-1"></i> Update
          </button>
          <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
      </form>

      {{-- Delete form terpisah di luar form update --}}
      <form action="{{ route('categories.destroy', $category) }}" method="POST" class="mt-3"
        onsubmit="return confirm('Hapus kategori ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">
          <i class="bi bi-trash me-1"></i> Hapus Kategori
        </button>
      </form>
    </div>
  </div>
@endsection