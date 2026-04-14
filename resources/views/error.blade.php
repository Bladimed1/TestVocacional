<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido - UTH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body class="fondo-ondas bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container px-4">
        <div class="card border-0 shadow-lg rounded-5 mx-auto text-center overflow-hidden" style="max-width: 550px;">
            
            <div class="bg-danger" style="height: 8px;"></div>
            
            <div class="card-body p-5">
                <div class="d-inline-block bg-danger bg-opacity-10 p-4 rounded-circle mb-4">
                    <i class="bi bi-person-fill-lock text-danger" style="font-size: 4rem; line-height: 1;"></i>
                </div>
                
                <h2 class="fw-bolder text-dark mb-3">Acceso Restringido</h2>
                <p class="text-secondary fs-5 mb-5 lh-base">
                    Tu estatus actual en el sistema es <strong class="text-danger">Inactivo</strong>. <br><br>
                    Por favor, acude a la dirección de la carrera en la universidad para regularizar tu situación.
                </p>
                
                <a href="{{ route('login') }}" class="btn btn-verde-uth btn-lg rounded-pill fw-bold px-5 shadow-sm transition-hover">
                    <i class="bi bi-box-arrow-in-left me-2"></i> Ir al Login
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>