<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengaduan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar dengan sticky-top dan desain yang lebih keren -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-lg">
        <div class="container-fluid">
            <!-- Logo / Nama Aplikasi -->
            <a class="navbar-brand fw-bold text-light" href="#">Manajemen Pengaduan</a>

            <!-- Button untuk menu di layar kecil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light px-3 py-2 rounded-3 hover-effect" aria-current="page"
                            href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3 py-2 rounded-3 hover-effect" href="/pengaduan">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light px-3 py-2 rounded-3 hover-effect" href="/kontak">Kontak</a>
                    </li>

                    <!-- Menu Login / Logout -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-light px-3 py-2 rounded-3 hover-effect" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-light hover-effect">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light px-3 py-2 rounded-3 hover-effect" href="/login">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Skrip Khusus Halaman -->
    @yield('scripts')

    <!-- Bootstrap JS (untuk navbar responsive dan komponen lainnya) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS (untuk efek scroll navbar) -->
    <script>
        window.onscroll = function() {
            var navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
    </script>
</body>

</html>
