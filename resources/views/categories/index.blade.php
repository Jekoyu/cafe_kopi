@extends('layouts.app')

@section('content')
{{-- COFFEE THEME CSS (based on your photo) --}}
<style>
  :root{
    --coffee-dark: #2b2b2b;
    --coffee-brown: #8b5e3c;
    --coffee-cream: #f3efe9;
    --coffee-muted: #b6b2ac;
    --coffee-accent: #c9a24d;
  }

  /* Page background + typography feel */
  body{
    background: var(--coffee-cream);
  }

  /* Card style */
  .card{
    background: #ffffff;
    border-radius: 14px;
  }

  /* Title */
  .page-title{
    color: var(--coffee-dark);
    letter-spacing: .2px;
  }

  /* Primary button (Tambah Kategori) */
  .btn-warning{
    background: var(--coffee-accent) !important;
    border: none !important;
  }
  .btn-warning:hover{
    background: #b8933f !important;
  }

  /* Table header */
  .table thead th{
    color: var(--coffee-brown);
    font-weight: 800;
    border-bottom: 2px solid rgba(201,162,77,.75);
  }

  /* Table hover */
  .table tbody tr:hover{
    background: #faf7f2;
  }

  /* Text muted */
  .text-muted{
    color: #7b7570 !important;
  }

  /* Action buttons */
  .btn-outline-primary{
    color: var(--coffee-brown);
    border-color: var(--coffee-brown);
  }
  .btn-outline-primary:hover{
    background: var(--coffee-brown);
    color: #fff;
  }

  .btn-outline-danger{
    color: #7a2e2e;
    border-color: #7a2e2e;
  }
  .btn-outline-danger:hover{
    background: #7a2e2e;
    color: #fff;
  }

  /* Alert success */
  .alert-success{
    background: #e6f0e8;
    color: #2f5d3a;
    border: none;
  }

  /* Small UI polish */
  .table td, .table th{
    vertical-align: middle;
  }
</style>

<div class="container py-5" style="max-width:900px;">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 page-title">Category List</h3>

    <a href="{{ route('categories.create') }}" class="btn btn-warning text-white fw-semibold">
      <i class="bi bi-plus-circle"></i> Add Category
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
            <th>Name</th>
            <th>Slug</th>
            <th width="200">Action</th>
          </tr>
        </thead>
        <tbody>
        @forelse($categories as $cat)
          <tr>
            <td class="fw-semibold">{{ $cat->name }}</td>
            <td class="text-muted">{{ $cat->slug }}</td>
            <td class="d-flex gap-2">
              <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm btn-outline-primary">Edit</a>

              <form action="{{ route('categories.destroy', $cat) }}" method="POST"
                    onsubmit="return confirm('Delete this category?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center text-muted">No categories yet.</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
