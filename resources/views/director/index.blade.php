<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Director - UTH</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body class="fondo-ondas position-relative bg-light">

    <img src="{{ asset('img/brujula-bg.png') }}" class="bg-brujula" alt="">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 position-relative z-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('img/uth-logo.png') }}" alt="Logo UTH" height="50">
                <div class="vr mx-2 text-secondary" style="width: 2px;"></div>
                <h1 class="h5 mb-0 fw-bold text-dark d-none d-md-block">Plataforma de Orientación Vocacional - UTH</h1>
            </div>
            
            <div class="dropdown">
                <button class="btn btn-light bg-white border-0 dropdown-toggle d-flex align-items-center gap-3" type="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('img/dra-carmen.jpg') }}" class="rounded-circle border border-2 border-secondary" style="width: 45px; height: 45px; object-fit: cover;" alt="Directora">
                    
                    <div class="text-start d-none d-sm-block">
                        <span class="fw-bold text-dark d-block" style="font-size: 0.95rem;">Dra. Carmen Reyes Sandoval</span>
                        <span class="text-secondary d-block" style="font-size: 0.8rem; letter-spacing: 1px;">DIRECTORA DE CARRERA</span>
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
        
        <div class="row justify-content-center mb-5 gap-4">
            <div class="col-md-8 col-lg-7">
                <div class="card tarjeta-admin shadow-sm p-3">
                    <div class="card-body">
                        <h2 class="fw-bolder texto-destacado h3 mb-2">¡Analice Tendencias Académicas!</h2>
                        <p class="text-dark fw-medium mb-4">Visualice métricas clave y participación de los estudiantes.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-verde-uth fw-bold px-4 py-2 d-inline-flex align-items-center gap-2 rounded-3">
                                <i class="bi bi-bar-chart-fill"></i> VER ESTADÍSTICAS GENERALES
                            </button>
                            <i class="bi bi-graph-up-arrow text-success fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-7">
                <div class="card tarjeta-admin shadow-sm p-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bolder texto-destacado h3 mb-2 text-uppercase text-success">¡Gestión de Especialidades!</h2>
                            <p class="text-dark fw-medium mb-0">Supervise y actualice el contenido informativo de las trayectorias de TI.</p>
                        </div>
                        <i class="bi bi-gear-fill text-success" style="font-size: 3rem;"></i>
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