<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login - Kopi 1815 Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    :root {
      --coffee-dark: #1a1410;
      --coffee-accent: #c9a24d;
      --coffee-cream: #f8f5f1;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--coffee-dark) 0%, #2a1a10 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
      width: 100%;
      max-width: 400px;
      overflow: hidden;
    }

    .login-header {
      background: var(--coffee-dark);
      padding: 32px;
      text-align: center;
    }

    .login-header .brand {
      font-size: 1.75rem;
      font-weight: 700;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .login-header .brand i {
      font-size: 2rem;
      color: var(--coffee-accent);
    }

    .login-header .brand .accent {
      color: var(--coffee-accent);
    }

    .login-header p {
      color: rgba(255, 255, 255, 0.6);
      margin: 8px 0 0;
      font-size: 0.9rem;
    }

    .login-body {
      padding: 32px;
    }

    .form-label {
      font-weight: 600;
      color: #374151;
    }

    .form-control {
      padding: 12px 16px;
      border-radius: 8px;
      border: 1px solid #e5e7eb;
    }

    .form-control:focus {
      border-color: var(--coffee-accent);
      box-shadow: 0 0 0 3px rgba(201, 162, 77, 0.15);
    }

    .btn-login {
      background: var(--coffee-accent);
      border: none;
      color: #1a1410;
      font-weight: 600;
      padding: 12px;
      border-radius: 8px;
      width: 100%;
      transition: all 0.2s;
    }

    .btn-login:hover {
      background: #b8933f;
      color: #1a1410;
    }

    .alert-danger {
      background: #fef2f2;
      border: 1px solid #fecaca;
      color: #991b1b;
      border-radius: 8px;
    }

    .back-link {
      text-align: center;
      margin-top: 20px;
    }

    .back-link a {
      color: #6b7280;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .back-link a:hover {
      color: var(--coffee-accent);
    }
  </style>
</head>

<body>
  <div class="login-card">
    <div class="login-header">
      <div class="brand">
        <i class="bi bi-cup-hot-fill"></i>
        Kopi<span class="accent">1815</span>
      </div>
      <p>Admin Panel</p>
    </div>

    <div class="login-body">
      @if ($errors->any())
        <div class="alert alert-danger mb-4">
          @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}"
            placeholder="admin@kopi1815.com" required autofocus>
        </div>

        <div class="mb-4">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn btn-login">
          <i class="bi bi-box-arrow-in-right me-2"></i>
          Login
        </button>
      </form>

      <div class="back-link">
        <a href="{{ route('home') }}">
          <i class="bi bi-arrow-left me-1"></i>
          Back to Website
        </a>
      </div>
    </div>
  </div>
</body>

</html>