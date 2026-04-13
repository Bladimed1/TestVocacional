<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seccion['titulo'] }} - UTH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body class="fondo-ondas bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 mb-4">
        <a href="{{ url('/estudiante') }}" class="text-decoration-none text-dark fw-bold">
            <i class="bi bi-arrow-left me-2"></i> Volver
        </a>
        <span class="fw-bold text-success mx-auto fs-5">
            <i class="bi bi-info-circle-fill me-2"></i> Información de Carrera
        </span>
    </nav>

    <div class="container pb-5" style="max-width: 900px;">
        
        <div class="text-center mb-5 mt-4">
            <div class="d-inline-block bg-success bg-opacity-10 p-3 rounded-circle mb-3">
                @if(str_contains($seccion['titulo'], 'Software'))
                    <i class="bi bi-code-slash fs-1 text-success"></i>
                @elseif(str_contains($seccion['titulo'], 'Redes'))
                    <i class="bi bi-diagram-3-fill fs-1 text-success"></i>
                @else
                    <i class="bi bi-unity fs-1 text-success"></i>
                @endif
            </div>
            <h1 class="fw-bolder text-dark mb-2">{{ $seccion['titulo'] }}</h1>
            <div class="mx-auto bg-success" style="width: 60px; height: 4px; border-radius: 2px;"></div>
        </div>

        <div class="bg-white p-4 p-md-5 rounded-5 shadow-sm border mb-5">
            
            <section class="mb-5">
                <h4 class="fw-bold text-dark d-flex align-items-center mb-3">
                    <i class="bi bi-megaphone-fill text-success me-3"></i> Introducción
                </h4>
                <p class="text-secondary lh-lg fs-5">
                    {{ $seccion['parrafos']['introduccion'] }}
                </p>
            </section>

            <section class="mb-5">
                <h4 class="fw-bold text-dark d-flex align-items-center mb-3">
                    <i class="bi bi-file-text-fill text-success me-3"></i> ¿De qué trata?
                </h4>
                <div class="p-4 bg-light rounded-4 border-start border-success border-4">
                    <p class="text-dark mb-0 lh-lg">
                        {{ $seccion['parrafos']['descripcion'] }}
                    </p>
                </div>
            </section>

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="h-100 p-4 border rounded-4 shadow-sm">
                        <h5 class="fw-bold text-dark mb-3">
                            <i class="bi bi-mortarboard-fill text-success me-2"></i> Formación
                        </h5>
                        <p class="text-muted small lh-base">
                            {{ $seccion['parrafos']['formacion'] }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-4 border rounded-4 shadow-sm">
                        <h5 class="fw-bold text-dark mb-3">
                            <i class="bi bi-person-check-fill text-success me-2"></i> Perfil del Alumno
                        </h5>
                        <p class="text-muted small lh-base">
                            {{ $seccion['parrafos']['perfil'] }}
                        </p>
                    </div>
                </div>
            </div>

            <section>
                <h4 class="fw-bold text-dark d-flex align-items-center mb-3">
                    <i class="bi bi-briefcase-fill text-success me-3"></i> Campo Laboral
                </h4>
                <p class="text-secondary lh-lg">
                    {{ $seccion['parrafos']['salidas_profesionales'] }}
                </p>
            </section>

        </div>

        <div class="text-center">
            <a href="{{ route('estudiante.test') }}" class="btn btn-success btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                <i class="bi bi-journal-check me-2"></i> ¡Realizar Test Ahora!
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>