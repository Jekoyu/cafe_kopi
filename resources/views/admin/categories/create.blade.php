@extends('layouts.admin')

@section('title', 'Add Category')
@section('page_title', 'Add Category')

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

      <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Kategori</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Signature"
            required>
        </div>

        <div class="d-flex gap-2">
          <button class="btn btn-warning">
            <i class="bi bi-save me-1"></i> Simpan
          </button>
          <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
@endsection