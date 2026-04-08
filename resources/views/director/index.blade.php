<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Director - UTH</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <style>
        /* Pequeño ajuste para que las pestañas usen el verde de la UTH al estar activas */
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: var(--verde-uth, #008A4B);
            color: white !important;
        }
        .nav-pills .nav-link {
            color: #008A4B;
        }
    </style>
</head>
<body class="fondo-ondas position-relative bg-light">

    <img src="{{ asset('img/brujula-bg.png') }}" class="bg-brujula" alt="">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 position-relative z-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('img/uth-logo.png') }}" alt="Logo UTH" height="100">
                <div class="vr mx-2 text-secondary" style="width: 2px;"></div>
                <h1 class="h5 mb-0 fw-bold text-dark d-none d-md-block">Plataforma de Orientación Vocacional - UTH</h1>
            </div>
            
            <div class="dropdown">
                <button class="btn btn-light bg-white border-0 dropdown-toggle d-flex align-items-center gap-3" type="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('img/perfil.png') }}" class="rounded-circle border border-2 border-secondary" style="width: 45px; height: 45px; object-fit: cover;" alt="Directora">
                    
                    <div class="text-start d-none d-sm-block">
                        <span class="fw-bold text-dark d-block" style="font-size: 0.95rem;">Nombre del director</span>
                        <span class="text-secondary d-block" style="font-size: 0.8rem; letter-spacing: 1px;">DIRECTOR DE CARRERA</span>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                    <li><a class="dropdown-item py-2 fw-semibold" href="#"><i class="bi bi-person-fill me-2"></i> Perfil</a></li>
                    <li><a class="dropdown-item py-2 fw-semibold" href="#"><i class="bi bi-gear-fill me-2"></i> Configuraciones</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item py-2 fw-semibold text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-5 position-relative z-2">
        
        <div class="row justify-content-center mb-4 gap-4">
            <div class="col-md-8 col-lg-8"> <div class="card tarjeta-admin shadow-sm p-3">
                    <div class="card-body">
                        <h2 class="fw-bolder texto-destacado h3 mb-2">¡Analice Tendencias Académicas!</h2>
                        <p class="text-dark fw-medium mb-4">Visualice métricas clave y gestione el padrón total de estudiantes.</p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-wrap gap-3">
                                <a href="{{ route('director.estadisticas') }}" class="btn btn-verde-uth fw-bold px-4 py-2 d-inline-flex align-items-center gap-2 rounded-3 text-decoration-none">
                                    <i class="bi bi-bar-chart-fill"></i> ESTADÍSTICAS
                                </a>
                                
                                <a href="{{ route('director.alumnos') }}" class="btn btn-outline-success fw-bold px-4 py-2 d-inline-flex align-items-center gap-2 rounded-3 text-decoration-none">
                                    <i class="bi bi-people-fill"></i> TODOS LOS ALUMNOS
                                </a>
                            </div>
                            
                            <i class="bi bi-graph-up-arrow text-success fs-1 opacity-50 d-none d-md-block"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card bg-white border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-2 text-center">
                        <h3 class="fw-bold text-dark mb-3">Resultados Específicos por Grupo</h3>
                        
                        <ul class="nav nav-pills justify-content-center gap-2" id="gruposTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold px-4 rounded-pill shadow-sm" id="tab-3a" data-bs-toggle="pill" data-bs-target="#content-3a" type="button" role="tab">Grupo 3A</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold px-4 rounded-pill shadow-sm" id="tab-3b" data-bs-toggle="pill" data-bs-target="#content-3b" type="button" role="tab">Grupo 3B</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold px-4 rounded-pill shadow-sm" id="tab-3c" data-bs-toggle="pill" data-bs-target="#content-3c" type="button" role="tab">Grupo 3C</button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body p-4 bg-light text-center border-top">
                        <div class="tab-content" id="gruposTabContent">
                            
                            <div class="tab-pane fade show active" id="content-3a" role="tabpanel">
                                <i class="bi bi-people-fill text-success opacity-50 mb-2 d-block" style="font-size: 2.5rem;"></i>
                                <p class="text-secondary fw-semibold mb-4">Gestione y evalúe la compatibilidad vocacional de los alumnos del <strong class="text-dark">Grupo 3A</strong>.</p>
                                <a href="{{ route('director.grupo', '3A') }}" class="btn btn-outline-success fw-bold px-4 py-2 rounded-3">
                                    VER ALUMNOS DEL 3A <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>

                            <div class="tab-pane fade" id="content-3b" role="tabpanel">
                                <i class="bi bi-people-fill text-success opacity-50 mb-2 d-block" style="font-size: 2.5rem;"></i>
                                <p class="text-secondary fw-semibold mb-4">Gestione y evalúe la compatibilidad vocacional de los alumnos del <strong class="text-dark">Grupo 3B</strong>.</p>
                                <a href="{{ route('director.grupo', '3B') }}" class="btn btn-outline-success fw-bold px-4 py-2 rounded-3">
                                    VER ALUMNOS DEL 3B <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>

                            <div class="tab-pane fade" id="content-3c" role="tabpanel">
                                <i class="bi bi-people-fill text-success opacity-50 mb-2 d-block" style="font-size: 2.5rem;"></i>
                                <p class="text-secondary fw-semibold mb-4">Gestione y evalúe la compatibilidad vocacional de los alumnos del <strong class="text-dark">Grupo 3C</strong>.</p>
                                <a href="{{ route('director.grupo', '3C') }}" class="btn btn-outline-success fw-bold px-4 py-2 rounded-3">
                                    VER ALUMNOS DEL 3C <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-5">
            <h3 class="fw-bold text-dark text-uppercase" style="letter-spacing: 1px;">Visualice Gráficos Detallados Por Especialidad</h3>
        </div>

        <div class="row g-4 mb-5">
            
            <div class="col-lg-4">
                <div class="card tarjeta-especialidad shadow-sm">
                    <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                        <i class="bi bi-mortarboard-fill icono-flotante-top"></i>
                        <h5 class="fw-bold fs-6 text-uppercase mb-0">Estadísticas por Especialidad:</h5>
                        <p class="fw-bold text-dark mb-0">Desarrollo y Gestión de Software.</p>
                    </div>
                    <div class="card-body text-center p-4">
                        <img src="{{ asset('img/grafica-ejemplo-1.png') }}" class="img-fluid mb-3" alt="Gráfica Software">
                        <div class="d-flex justify-content-center gap-3 fs-3 text-success">
                            <i class="bi bi-database"></i>
                            <i class="bi bi-code-slash"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card tarjeta-especialidad shadow-sm">
                    <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                        <i class="bi bi-mortarboard-fill icono-flotante-top"></i>
                        <h5 class="fw-bold fs-6 text-uppercase mb-0">Estadísticas por Especialidad:</h5>
                        <p class="fw-bold text-dark mb-0">Entornos Virtuales y Negocios Digitales.</p>
                    </div>
                    <div class="card-body text-center p-4">
                        <img src="{{ asset('img/grafica-ejemplo-2.png') }}" class="img-fluid mb-3" alt="Gráfica Entornos">
                        <div class="d-flex justify-content-center gap-3 fs-3 text-success">
                            <i class="bi bi-headset-vr"></i>
                            <i class="bi bi-box"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card tarjeta-especialidad shadow-sm">
                    <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                        <i class="bi bi-server icono-flotante-top"></i>
                        <h5 class="fw-bold fs-6 text-uppercase mb-0">Estadísticas por Especialidad:</h5>
                        <p class="fw-bold text-dark mb-0">Redes Inteligentes y Ciberseguridad.</p>
                    </div>
                    <div class="card-body text-center p-4">
                        <img src="{{ asset('img/grafica-ejemplo-3.png') }}" class="img-fluid mb-3" alt="Gráfica Redes">
                        <div class="d-flex justify-content-center gap-3 fs-3 text-success">
                            <i class="bi bi-lock-fill"></i>
                            <i class="bi bi-diagram-3"></i>
                            <i class="bi bi-globe"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer class="text-center py-4 mt-5">
        <div class="footer-linea mb-3"></div>
        <p class="text-secondary fw-semibold mb-0">© 2026 Plataforma de Orientación Vocacional - UTH</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>