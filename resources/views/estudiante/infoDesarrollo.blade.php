<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seccion['titulo'] ?? 'Información de Especialidad' }} - UTH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body class="fondo-ondas bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 mb-4">
        <a href="{{ url('/estudiante') }}" class="text-decoration-none text-dark fw-bold transition-hover">
            <i class="bi bi-arrow-left me-2"></i> Volver
        </a>
        <span class="fw-bold text-success mx-auto fs-5">
            <i class="bi bi-info-circle-fill me-2"></i> Información de Carrera
        </span>
    </nav>

    <div class="container pb-5" style="max-width: 900px;">
        
        <div class="text-center mb-5 mt-4">
            <div class="d-inline-block bg-success bg-opacity-10 p-3 rounded-circle mb-3">
                <i class="bi bi-mortarboard-fill fs-1 text-success"></i>
            </div>
            <h1 class="fw-bolder text-dark mb-2">{{ $seccion['titulo'] ?? 'Detalles de la Especialidad' }}</h1>
            <div class="mx-auto bg-success" style="width: 60px; height: 4px; border-radius: 2px;"></div>
        </div>

        <div class="bg-white p-4 p-md-5 rounded-5 shadow-sm border mb-5">
            
            <section class="mb-5">
                <h4 class="fw-bold text-dark d-flex align-items-center mb-4">
                    <i class="bi bi-file-text-fill text-success me-3"></i> ¿De qué trata?
                </h4>
                <div class="p-4 bg-light rounded-4 border-start border-success border-4">
                    <p class="text-secondary mb-0 lh-lg fs-5">
                        {{ $seccion['descripcion'] }}
                    </p>
                </div>
            </section>

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="h-100 p-4 border rounded-4 shadow-sm">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">
                            <i class="bi bi-person-gear text-success me-2"></i> Habilidades a desarrollar
                        </h5>
                        <ul class="list-unstyled mb-0">
                            @foreach ($seccion['habilidades'] as $habilidad)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-success mt-1 me-2"></i>
                                    <span class="text-muted lh-base">{{ $habilidad }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-4 border rounded-4 shadow-sm">
                        <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">
                            <i class="bi bi-briefcase-fill text-success me-2"></i> Campo Laboral
                        </h5>
                        <ul class="list-unstyled mb-0">
                            @foreach ($seccion['campo_laboral'] as $campo)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="bi bi-building-check text-success mt-1 me-2"></i>
                                    <span class="text-muted lh-base">{{ $campo }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <section>
                <h4 class="fw-bold text-dark d-flex align-items-center mb-4">
                    <i class="bi bi-cpu-fill text-success me-3"></i> Tecnologías Principales
                </h4>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($seccion['tecnologias'] as $tecnologia)
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-4 py-2 fs-6 rounded-pill shadow-sm">
                            <i class="bi bi-code-square me-1"></i> {{ $tecnologia }}
                        </span>
                    @endforeach
                </div>
            </section>

        </div>

        <div class="text-center">
            <a href="{{ route('estudiante.test') }}" class="btn btn-verde-uth btn-lg px-5 py-3 rounded-pill fw-bold shadow-sm transition-hover">
                <i class="bi bi-journal-check me-2"></i> ¡Comenzar Test Vocacional!
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>