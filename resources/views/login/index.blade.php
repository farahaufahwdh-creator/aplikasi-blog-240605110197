<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin-top: 100px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="login-container shadow p-4 bg-white rounded">
        <h3 class="text-center mb-4">Login Penulis</h3>

        @if ($errors->has('gagal'))
            <div class="alert alert-danger">
                {{ $errors->first('gagal') }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf <div class="mb-3">
                <label for="user_name" class="form-label">Username</label>
                <input type="text" name="user_name" id="user_name" class="form-label form-control" required placeholder="Masukkan username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>