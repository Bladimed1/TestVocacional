<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Director - UTH</title>
    
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

        /* Header (Igual que el del estudiante) */
        .navbar-uth {
            background: white;
            border-bottom: 4px solid #ddd;
            padding: 1rem 2rem;
        }
        .logo-uth { height: 80px; border-right: 2px solid #ccc; padding-right: 20px; margin-right: 20px; }

        /* Tarjetas del Dashboard */
        .dashboard-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            padding: 2rem;
            border: 1px solid #eaeaea;
            height: 100%;
        }

        .card-title {
            font-weight: 800;
            font-size: 1.3rem;
            color: #212529;
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-text {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        /* Botones Verdes */
        .btn-green-uth {
            background-color: var(--uth-green);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 0.9rem;
            text-transform: uppercase;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-green-uth:hover { background-color: #007d35; color: white; }

        /* Zona Drag & Drop (Carga de Matrícula) */
        .drag-drop-zone {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            color: #999;
            font-weight: 600;
            margin-top: 1rem;
            transition: 0.3s;
            background-color: #fafafa;
        }
        .drag-drop-zone:hover {
            border-color: var(--uth-green);
            background-color: #f0fdf4;
            color: var(--uth-green);
            cursor: pointer;
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
                    {{ Auth::user()->name ?? 'Directora / Director' }} <br>
                    <small class="text-muted fw-normal">Perfil Administrativo</small>
                </span>
                <i class="bi bi-person-circle fs-2 text-secondary"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Mi Perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Configuraciones</a></li>
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
    </header>

    <main class="container flex-grow-1 my-4">
        
        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-5">
                <div class="dashboard-card">
                    <h2 class="card-title">
                        Carga de Matrícula Institucional.
                        <i class="bi bi-database text-success fs-3"></i>
                    </h2>
                    <p class="card-text">Suba la lista de alumnos pre-registrados para validar acceso a los tests.</p>
                    
                    <button class="btn-green-uth mb-3">
                        <span>
                            <i class="bi bi-file-earmark-spreadsheet fs-5 me-2"></i> 
                            SUBIR BASE DE DATOS <br> <small class="fw-normal">(.XLSX / .CSV)</small>
                        </span>
                        <i class="bi bi-upload fs-4"></i>
                    </button>

                    <div class="drag-drop-zone">
                        Drag & Drop
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-flex flex-column gap-4">
                
                <div class="dashboard-card" style="flex: 1;">
                    <h2 class="card-title">
                        Estadísticas Generales
                        <i class="bi bi-bar-chart-fill text-success fs-3"></i>
                    </h2>
                    <p class="card-text">Visualice tendencias generales y métricas de interés de los alumnos evaluados.</p>
                    <a href="{{ route('graficas') }}" class="btn-green-uth">
                        <span><i class="bi bi-graph-up-arrow me-2"></i> VER ESTADÍSTICAS GENERALES</span>
                    </a>
                </div>

                <div class="dashboard-card" style="flex: 1;">
                    <h2 class="card-title text-uppercase">
                        Gestión de Especialidades
                        <i class="bi bi-sliders text-success fs-3"></i>
                    </h2>
                    <p class="card-text">Supervise, agregue o actualice el contenido informativo y videos de las carreras.</p>
                    <a href="#" class="btn btn-outline-success w-100 fw-bold">
                        <i class="bi bi-pencil-square me-2"></i> ADMINISTRAR ESPECIALIDADES
                    </a>
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