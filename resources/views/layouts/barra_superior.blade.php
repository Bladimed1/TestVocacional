
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Plataforma de Orientación Vocacional - UTH')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/barra_superior.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>

<body>

    <header class="navbar-uth d-flex align-items-center justify-content-between shadow-sm">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/uthLogo.png') }}" alt="Logo UTH" class="logo-uth">
            <h3 class="m-0 fw-bold header-title">Plataforma de Orientación Vocacional - UTH</h3>
        </div>

        @if(session()->has('email'))
        <div class="dropdown">
            <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle gap-2"
               href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="fw-bold text-end lh-sm">
                    <?=session('nombre')?>
                </span>
                <i class="bi bi-person-circle fs-2 text-secondary"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="/configuracion">
                        <i class="bi bi-gear me-2"></i> Configuración
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                        </button>
                    </form>
                </li>

            </ul>
        </div>
        @endif

    </header>

    <main class="container flex-grow-1 my-4">
        @yield('content')
    </main>

    <footer class="mt-auto pb-4">
        <div class="container text-center">
            <div class="footer-line mx-auto w-75"></div>
            <p class="text-muted mb-0 small">&copy; {{ date('Y') }} Plataforma de Orientación Vocacional - UTH</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>
</html>