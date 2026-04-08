@extends('layouts.barra_superior')

@section('title', 'Dashboard Director - UTH')

@push('styles')
<style>
    /* Ajuste de pestañas inyectado dinámicamente al layout maestro */
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: var(--verde-uth, #008A4B);
        color: white !important;
    }
    .nav-pills .nav-link {
        color: #008A4B;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center mb-4 gap-4">
    <div class="col-md-8 col-lg-8"> 
        <div class="card tarjeta-admin shadow-sm p-3">
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
        <div class="card tarjeta-especialidad shadow-sm h-100">
            <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                <i class="bi bi-mortarboard-fill icono-flotante-top"></i>
                <h5 class="fw-bold fs-6 text-uppercase mb-0 mt-2">Estadísticas por Especialidad:</h5>
                <p class="fw-bold text-dark mb-0 fs-6">Desarrollo y Gestión de Software.</p>
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
        <div class="card tarjeta-especialidad shadow-sm h-100">
            <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                <i class="bi bi-mortarboard-fill icono-flotante-top"></i>
                <h5 class="fw-bold fs-6 text-uppercase mb-0 mt-2">Estadísticas por Especialidad:</h5>
                <p class="fw-bold text-dark mb-0 fs-6">Entornos Virtuales y Negocios Digitales.</p>
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
        <div class="card tarjeta-especialidad shadow-sm h-100">
            <div class="card-header border-0 pb-0 bg-white rounded-top-4">
                <i class="bi bi-server icono-flotante-top"></i>
                <h5 class="fw-bold fs-6 text-uppercase mb-0 mt-2">Estadísticas por Especialidad:</h5>
                <p class="fw-bold text-dark mb-0 fs-6">Redes Inteligentes y Ciberseguridad.</p>
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
@endsection