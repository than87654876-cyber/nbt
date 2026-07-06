<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'FOODELICIOUS')</title>
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('client/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 14px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger" href="{{ route('trangchu') }}">FOODELICIOUS</a>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="footer bg-white py-3 border-top">
        <div class="container text-center text-muted small">
            © 2026 FOODELICIOUS. All rights reserved.
        </div>
    </footer>

    <script src="{{ asset('client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
