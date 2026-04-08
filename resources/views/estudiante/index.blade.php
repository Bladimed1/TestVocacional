@extends('layouts.barra_superior')

@section('title', 'Inicio - Plataforma de Orientación Vocacional UTH')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <a href="/test/notas" class="menu-card position-relative">
                <h2 class="menu-title">¡Empieza tu Test Vocacional!</h2>
                <p class="menu-description">Comienza la evaluación de tus habilidades y preferencias profesionales.</p>
                <span class="btn-uth">
                    <i class="bi bi-card-checklist fs-5"></i> Empezar Test Vocacional
                </span>
            </a>

            <a href="/videos/especialidad" class="menu-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="menu-title">Información de Especialidades</h2>
                        <p class="menu-description mb-0">Explora y conoce tus opciones de TI.</p>
                    </div>
                    <span class="btn-uth">
                        <i class="bi bi-info-square fs-5"></i> Ver Información
                    </span>
                </div>
            </a>

            <div class="image-container mx-auto" style="max-width: 600px;">
                <img src="{{ asset('img/vrEstudiante.jpeg') }}" alt="Estudiantes usando VR" class="img-fluid">
            </div>

        </div>
    </div>
@endsection