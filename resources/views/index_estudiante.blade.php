
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio - Plataforma de Orientación Vocacional UTH</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --uth-green: #009640;
            --uth-light-bg: #f8faf9;
        }

        body {
            background-color: var(--uth-light-bg);
            background-image: radial-gradient(circle at 10% 20%, rgba(0, 150, 64, 0.05) 0%, transparent 20%),
                              radial-gradient(circle at 90% 80%, rgba(0, 150, 64, 0.05) 0%, transparent 20%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        /* Header (Mismo que el login, más menú de usuario) */
        .navbar-uth {
            background: white;
            border-bottom: 4px solid #ddd;
            padding: 1rem 2rem;
        }
        .logo-uth { height: 150px; border-right: 2px solid #ccc; padding-right: 20px; margin-right: 20px; }

        /* Estilos de las tarjetas del menú (como en tu imagen) */
        .menu-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            padding: 2rem;
            margin-bottom: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
            color: inherit;
            display: block;
            border-left: 5px solid transparent;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,150,64,0.15);
            border-left: 5px solid var(--uth-green);
            color: inherit;
        }

        .menu-title {
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #212529;
        }

        .menu-description {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .btn-green-uth {
            background-color: var(--uth-green);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.85rem;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-green-uth:hover { background-color: #007d35; color: white; }

        /* Estilo del carrusel/imagen central */
        .image-container {
            border: 4px solid var(--uth-green);
            border-radius: 15px;
            overflow: hidden;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0,150,64,0.1);
        }
        .image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 400px;
        }

        .footer-line { height: 4px; background-color: var(--uth-green); margin-bottom: 10px; }
    </style>
</head>

<body>

    <header class="navbar-uth d-flex align-items-center justify-content-between mb-4 shadow-sm">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/uthLogo.png') }}" alt="Logo UTH" class="logo-uth">
            <h3 class="m-0 fw-bold" style="color: #333;">Plataforma de Orientación Vocacional - UTH</h3>
        </div>
        
        <div class="dropdown">
            <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2 fw-bold text-end lh-sm">
                    <?=session('nombre')?> <br>
                </span>
                <i class="bi bi-person-circle fs-2 text-secondary"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
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
    </header>

    <main class="container flex-grow-1 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <a href="/test/notas" class="menu-card position-relative">
                    <h2 class="menu-title">¡Empieza tu Test Vocacional!</h2>
                    <p class="menu-description">Comienza la evaluación de tus habilidades y preferencias profesionales.</p>
                    <span class="btn-green-uth">
                        <i class="bi bi-card-checklist fs-5"></i> Empezar Test Vocacional
                    </span>
                </a>

                <a href="/videos/especialidad" class="menu-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="menu-title">Información de Especialidades</h2>
                            <p class="menu-description mb-0">Explora y conoce tus opciones de TI.</p>
                        </div>
                        <span class="btn-green-uth">
                            <i class="bi bi-info-square fs-5"></i> Ver Información
                        </span>
                    </div>
                </a>

                <div class="image-container mx-auto" style="max-width: 600px;">
                    <img src="{{ asset('img/vrEstudiante.jpeg') }}" alt="Estudiantes usando VR" class="img-fluid">
                </div>

            </div>
        </div>
    </main>

    <footer class="mt-auto pb-4">
        <div class="container text-center">
            <div class="footer-line mx-auto w-75"></div>
            <p class="text-muted mb-0 small">&copy; {{ date('Y') }} Plataforma de Orientación Vocacional - UTH</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>