@extends('layouts.barra_superior')

@section('title', 'Inicio - Plataforma de Orientación Vocacional UTH')

@section('content')
<div class="row justify-content-center mb-5 gap-4">
    <div class="col-md-10">
        <div class="card tarjeta-admin border-0 shadow-lg p-2 rounded-4">
            <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between p-4 gap-4">
                <div class="text-center text-md-start">
                    <h2 class="fw-bolder texto-destacado h2 mb-3">¡Descubre tu futuro en TI!</h2>
                    <p class="text-dark fw-medium mb-4" style="font-size: 1.1rem;">
                        Realiza nuestro Test Vocacional. Analizaremos tus habilidades, lógica de programación y preferencias para sugerirte la especialidad ideal para ti.
                    </p>

                    <a href="{{ route('estudiante.test') }}" class="btn btn-verde-uth fw-bold px-4 py-3 rounded-pill d-inline-flex align-items-center gap-2 text-decoration-none shadow-sm transition-hover fs-5">
                        <i class="bi bi-ui-checks-grid"></i> COMENZAR TEST VOCACIONAL
                    </a>
                </div>
                <div class="d-none d-lg-block text-center pe-4">
                    <i class="bi bi-laptop text-success opacity-25" style="font-size: 10rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center mb-5 mt-5">
    <h3 class="fw-bold text-dark text-uppercase" style="letter-spacing: 1px;">Conoce tus opciones de Especialidad</h3>
    <p class="text-secondary">Explora las áreas en las que podrías desarrollarte profesionalmente.</p>
</div>

<div class="row g-4 mb-5">

    <div class="col-lg-4">
        <div class="card tarjeta-especialidad shadow-sm h-100">
            <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                <i class="bi bi-code-slash icono-flotante-top"></i>
                <h5 class="fw-bold fs-6 text-uppercase mb-0 mt-2 text-success">Especialidad en:</h5>
                <p class="fw-bolder text-dark mb-0 fs-5">Desarrollo y Gestión de Software</p>
            </div>
            <div class="card-body p-4 d-flex flex-column">
                <p class="text-secondary mb-4">Conviértete en un experto creando aplicaciones web, móviles y sistemas de escritorio dominando lenguajes de programación y bases de datos.</p>
                <a href="/videos/especialidad" class="btn btn-outline-success fw-bold mt-auto rounded-3">Leer más <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card tarjeta-especialidad shadow-sm h-100">
            <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                <i class="bi bi-headset-vr icono-flotante-top"></i>
                <h5 class="fw-bold fs-6 text-uppercase mb-0 mt-2 text-success">Especialidad en:</h5>
                <p class="fw-bolder text-dark mb-0 fs-5">Entornos Virtuales</p>
            </div>
            <div class="card-body p-4 d-flex flex-column">
                <p class="text-secondary mb-4">Aprende a diseñar experiencias inmersivas, modelado 3D, desarrollo de videojuegos y estrategias de negocios digitales vanguardistas.</p>
                <a href="/videos/especialidad" class="btn btn-outline-success fw-bold mt-auto rounded-3">Leer más <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card tarjeta-especialidad shadow-sm h-100">
            <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                <i class="bi bi-shield-lock-fill icono-flotante-top"></i>
                <h5 class="fw-bold fs-6 text-uppercase mb-0 mt-2 text-success">Especialidad en:</h5>
                <p class="fw-bolder text-dark mb-0 fs-5">Redes y Ciberseguridad</p>
            </div>
            <div class="card-body p-4 d-flex flex-column">
                <p class="text-secondary mb-4">Protege la información de las organizaciones, configura servidores y diseña infraestructuras de telecomunicaciones de alto nivel.</p>
                <a href="/videos/especialidad" class="btn btn-outline-success fw-bold mt-auto rounded-3">Leer más <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>

</div>
@endsection