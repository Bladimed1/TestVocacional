<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Vocacional - Estudiante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>

<body class="fondo-ondas bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 mb-4 d-flex align-items-center position-relative">
        <a href="{{ url('/estudiante') }}" class="text-decoration-none text-dark fw-bold transition-colors hover:text-success position-absolute" style="left: 1.5rem; z-index: 10;">
            <i class="bi bi-arrow-left me-2"></i> Volver al Inicio
        </a>
        <span class="fw-bold text-success mx-auto fs-5">
            <i class="bi bi-journal-text me-2"></i> Bienvenido al Test Vocacional
        </span>
    </nav>

    <div class="container pb-5" style="max-width: 800px;">

        <div class="alert alert-warning border-warning border-opacity-50 shadow-sm rounded-4 mb-4 d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill fs-3 text-warning me-3"></i>
            <div>
                <h5 class="alert-heading fw-bold mb-1">Instrucciones Importantes</h5>
                <p class="mb-0 text-dark">Por favor, lee cuidadosamente cada enunciado. <strong>Todas las preguntas son obligatorias <span class="text-danger">*</span></strong>. No podrás enviar tu evaluación si dejas alguna sin responder.</p>
            </div>
        </div>

        <form action="{{ route('estudiante.resultados') }}" method="post" class="needs-validation">
            @csrf

            @foreach ($categoriaEscala as $categoria)
                <div class="mb-5">
                    <h3 class="fw-bolder text-dark mb-4 border-bottom pb-2">{{ $categoria['nombre'] }}</h3>
                    
                    @foreach ($categoria['preguntas'] as $pregunta)
                        <div class="card border-0 shadow-sm rounded-4 mb-3">
                            <div class="card-body p-4">
                                <p class="fw-medium text-dark mb-3 fs-5">
                                    {{ $pregunta['texto'] }} <span class="text-danger fw-bold">*</span>
                                </p>
                                
                                <div class="d-flex justify-content-between gap-2" role="group">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="flex-fill">
                                            <input type="radio" class="btn-check" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" id="preg_{{$pregunta['id']}}_val_{{$i}}" value="{{ $i }}" required>
                                            <label class="btn btn-outline-success w-100 rounded-3 py-2 fw-bold" for="preg_{{$pregunta['id']}}_val_{{$i}}">
                                                {{ $i }}
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                                <div class="d-flex justify-content-between text-muted mt-2" style="font-size: 0.8rem;">
                                    <span>Nada interesado</span>
                                    <span>Muy interesado</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="mb-5">
                <h3 class="fw-bolder text-dark mb-4 border-bottom pb-2">{{ $categoriaFinal['nombre'] }}</h3>
                
                @foreach ($categoriaFinal['preguntas'] as $pregunta)
                    <div class="card border-0 shadow-sm rounded-4 mb-3">
                        <div class="card-body p-4">
                            <p class="fw-medium text-dark mb-3 fs-5">
                                {{ $pregunta['texto'] }} <span class="text-danger fw-bold">*</span>
                            </p>
                            
                            <div class="d-flex gap-3">
                                <div class="flex-fill">
                                    <input type="radio" class="btn-check" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" id="preg_{{$pregunta['id']}}_si" value="20" required>
                                    <label class="btn btn-outline-success w-100 rounded-3 py-2 fw-bold" for="preg_{{$pregunta['id']}}_si">
                                        <i class="bi bi-check-circle me-1"></i> Sí
                                    </label>
                                </div>
                                <div class="flex-fill">
                                    <input type="radio" class="btn-check" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" id="preg_{{$pregunta['id']}}_no" value="0" required>
                                    <label class="btn btn-outline-danger w-100 rounded-3 py-2 fw-bold" for="preg_{{$pregunta['id']}}_no">
                                        <i class="bi bi-x-circle me-1"></i> No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5 mb-5">
                <button type="submit" class="btn btn-success btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                    <i class="bi bi-send-fill me-2"></i> Enviar Evaluación
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>