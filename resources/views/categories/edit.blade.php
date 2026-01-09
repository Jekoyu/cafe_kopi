@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width:720px;">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h3 class="fw-bold mb-0">Edit Kategori</h3>
    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
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
      <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Kategori</label>
          <input type="text" name="name" class="form-control"
                 value="{{ old('name', $category->name) }}" required>
        </div>

        <button class="btn btn-warning text-white fw-semibold px-4">
          <i class="bi bi-save"></i> Update
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
