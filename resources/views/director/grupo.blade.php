<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados Grupo {{ $grupo }} - UTH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>

<body class="fondo-ondas bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 mb-4">
        <a href="{{ route('director.index') }}"
            class="text-decoration-none text-dark fw-bold transition-colors hover:text-success">
            <i class="bi bi-arrow-left me-2"></i> Volver al Dashboard
        </a>
        <span class="fw-bold text-success">
            <i class="bi bi-folder2-open me-2"></i> Gestión de Grupos
        </span>
    </nav>

    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
            <div>
                <h6 class="text-secondary fw-bold mb-1">EVALUACIÓN VOCACIONAL</h6>
                <h2 class="fw-bolder text-dark mb-0">Resultados del Grupo {{ $grupo }}</h2>
            </div>

        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">

            <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-dark">Directorio de Estudiantes</h5>
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" id="buscadorAlumnos" class="form-control bg-light border-start-0"
                        placeholder="Buscar por Matrícula...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tablaAlumnos">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4 py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">MATRÍCULA</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">NOMBRE DEL ESTUDIANTE</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">CORREO</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">ESTATUS</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">ESPECIALIDAD SUGERIDA</th>
                            <th scope="col" class="pe-4 py-3 text-end text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($estudiantes as $alumno)
                            <tr class="fila-alumno" data-matricula="{{ $alumno->matricula }}">
                                <td class="ps-4 fw-bold text-secondary">{{ $alumno->matricula }}</td>
                                <td class="fw-medium text-dark">{{ $alumno->nombre }} {{ $alumno->apellidoPaterno }}
                                    {{ $alumno->apellidoMaterno }}</td>
                                <td>{{ $alumno->email ?? 'Sin correo' }}</td>
                                <td>
                                    <span
                                        class="badge {{ $alumno->estatus ? 'bg-success' : 'bg-danger' }} bg-opacity-10 {{ $alumno->estatus ? 'text-success' : 'text-danger' }} border">
                                        {{ $alumno->estatus ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>
                                    @if($alumno->especialidad)
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1">
                                            <i class="bi bi-award-fill me-1"></i> {{ $alumno->especialidad->nombre }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border px-2 py-1">
                                            <i class="bi bi-clock-history me-1"></i> Pendiente
                                        </span>
                                    @endif
                                </td>
                                <td class="pe-4 text-end">
                                    <button class="btn btn-sm btn-light border" title="Ver detalle">
                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-center text-muted opacity-75">
                                        <i class="bi bi-server mb-3 text-success opacity-50" style="font-size: 3.5rem;"></i>
                                        <h5 class="fw-bold text-dark">Esperando sincronización de datos</h5>
                                        <p class="mb-0">La lista de estudiantes se poblará automáticamente una vez que el
                                            servicio JSON esté conectado a la base de datos.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white border-top py-3 d-flex justify-content-between align-items-center">
                <span class="text-muted" style="font-size: 0.9rem;">Total de estudiantes:
                    {{ count($estudiantes) }}</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/alumnos.js') }}"></script>
</body>

</html>