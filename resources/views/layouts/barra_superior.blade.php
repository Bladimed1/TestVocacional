<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Plataforma de Orientación Vocacional - UTH')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/barra_superior.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>

<body class="fondo-ondas position-relative bg-light">

    <img src="{{ asset('img/brujula-bg.png') }}" class="bg-brujula" alt="">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 position-relative z-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('img/uth-logo.png') }}" alt="Logo UTH" height="180">
                <div class="vr mx-2 text-secondary" style="width: 2px;"></div>
                <h1 class="h3 mb-0 fw-bold text-dark d-none d-md-block">Plataforma de Orientación Vocacional - UTH</h1>
            </div>
            
            @if(session()->has('email'))
            <div class="dropdown">
                <button class="btn btn-light bg-white border-0 dropdown-toggle d-flex align-items-center gap-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                    <i class="bi bi-person-circle text-secondary" style="font-size: 2.5rem;"></i>
                    
                    <div class="text-start d-none d-sm-block">
                        <span class="fw-bold text-dark d-block" style="font-size: 0.95rem;">{{ session('nombre') }}</span>
                        <span class="text-secondary d-block text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">USUARIO ACTIVO</span>
                    </div>
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item py-2 fw-semibold" href="/configuracion">
                            <i class="bi bi-gear-fill me-2"></i> Configuración
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item py-2 fw-semibold text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            @endif

        </div>
    </nav>
    <main class="container position-relative z-2 my-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="mt-auto py-4 text-center position-relative z-2">
        <div class="container text-center">
            <div class="footer-linea mb-3 mx-auto" style="max-width: 2000px;"></div>
            <p class="text-secondary fw-semibold mb-0 small">&copy; {{ date('Y') }} Plataforma de Orientación Vocacional - UTH</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>
</html>