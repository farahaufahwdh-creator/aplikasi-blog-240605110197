<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Blog Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Roboto, sans-serif; }
        .navbar-custom { background-color: #2C3E50; padding: 15px 0; }
        .navbar-brand-custom { font-size: 20px; font-weight: 600; color: #ffffff !important; text-decoration: none; }
        .navbar-sub { font-size: 12px; color: #adb5bd; margin-top: 2px; }
        .nav-link-custom { color: #ffffff !important; opacity: 0.8; font-size: 14px; text-decoration: none; }
        .nav-link-custom:hover { opacity: 1; }
        .card-custom { border: 0; shadow: 0 2px 4px rgba(0,0,0,.04); border-radius: 8px; margin-bottom: 25px; }
        .badge-category { background-color: #e8f5e9; color: #2e7d32; font-weight: 600; font-size: 11px; padding: 6px 12px; border-radius: 4px; text-decoration: none; }
        .btn-readmore { background-color: #4CAF50; color: white; font-size: 13px; font-weight: 500; padding: 8px 16px; border-radius: 4px; text-decoration: none; display: inline-block; }
        .btn-readmore:hover { background-color: #45a049; color: white; }
        .widget-title { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #333; margin-bottom: 15px; }
        .list-group-item-custom { border: 0; padding: 10px 0; font-size: 13px; display: flex; justify-content: space-between; align-items: center; background: transparent; text-decoration: none; color: #555; }
        .list-group-item-custom:hover { color: #2e7d32; }
        .footer { background-color: #ffffff; border-top: 1px solid #eee; padding: 20px 0; font-size: 12px; color: #777; margin-top: 50px; }
    </style>
</head>
<body>

<!-- Header Utama sesuai Lampiran 1 & 2 -->
<nav class="navbar-custom shadow-sm mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('publik.index') }}" class="navbar-brand-custom">Blog Kami</a>
            <div class="navbar-sub">Artikel terbaru seputar teknologi dan pemrograman</div>
        </div>
        <div class="d-flex gap-4">
            <a href="{{ route('publik.index') }}" class="nav-link-custom">Beranda</a>
            <a href="{{ route('publik.index') }}" class="nav-link-custom">Artikel</a>
            <a href="#widget-kategori" class="nav-link-custom">Kategori</a>
            <a href="#" class="nav-link-custom">Tentang</a>
        </div>
    </div>
</nav>

<!-- Konten Utama Dinamis -->
<div class="container">
    @yield('content')
</div>

<footer class="footer text-center">
    <div class="container">
        &copy; 2026 Blog Kami. Seluruh hak cipta dilindungi.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>