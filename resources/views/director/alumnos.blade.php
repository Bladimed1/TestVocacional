<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padrón de Estudiantes - UTH</title>

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
            <i class="bi bi-people-fill me-2"></i> Directorio General
        </span>
    </nav>

    <div class="container pb-5">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
            <div>
                <h6 class="text-secondary fw-bold mb-1">ADMINISTRACIÓN GENERAL</h6>
                <h2 class="fw-bolder text-dark mb-0">Padrón de Estudiantes</h2>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('director.cargar.alumnos') }}"
                    class="btn btn-verde-uth fw-bold px-4 shadow-sm text-white d-flex align-items-center gap-2">
                    <i class="bi bi-cloud-arrow-up-fill fs-5"></i> Cargar Alumnos
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">

            <div
                class="card-header bg-white border-bottom py-3 px-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="d-flex gap-2">
                    <select id="filtroGrupo"
                        class="form-select form-select-sm bg-light border-0 fw-semibold text-secondary"
                        style="width: auto;">
                        <option value="Todos" selected>Todos los Grupos</option>
                        <option value="A">Grupo A</option>
                        <option value="B">Grupo B</option>
                        <option value="C">Grupo C</option>
                    </select>
                </div>

                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" id="buscadorMatricula" class="form-control bg-light border-start-0" placeholder="Buscar por Matrícula...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4 py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">MATRÍCULA</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">NOMBRE DEL ESTUDIANTE</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">GRUPO</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">CORREO</th>
                            <th scope="col" class="py-3 text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">ESTATUS</th>
                            <th scope="col" class="pe-4 py-3 text-end text-secondary"
                                style="font-size: 0.85rem; letter-spacing: 0.5px;">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($listaAlumnos as $alumno)
                            <tr class="align-middle transition-colors hover-bg-light fila-alumno"
                                data-grupo="{{ $alumno->grupo }}" data-matricula="{{ $alumno->matricula }}">
                                <td class="ps-4 fw-bold text-secondary">{{ $alumno->matricula }}</td>
                                <td class="fw-medium text-dark">{{ $alumno->nombre. " ". $alumno->apellidoPaterno. " "
                                . $alumno->apellidoMaterno }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2 py-1">{{ $alumno->grupo }}</span>
                                </td>
                                <td class="text-muted">{{ $alumno->correo }}</td>
                                
                                <td>
                                    @if($alumno->estatus)
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">
                                            Activo
                                        </span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                                            Inactivo
                                        </span>
                                    @endif
                                </td>

                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-1">
                                        <button class="btn btn-sm btn-light border text-secondary shadow-sm" title="Ver perfil">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                        <form action="{{ route('director.alumnos.estatus', $alumno->matricula) }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-light border shadow-sm {{ $alumno->estatus ? 'text-danger' : 'text-success' }}" title="{{ $alumno->estatus ? 'Dar de baja' : 'Activar alumno' }}">
                                                <i class="bi {{ $alumno->estatus ? 'bi-person-fill-slash' : 'bi-person-fill-check' }}"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-center text-muted opacity-75">
                                        <i class="bi bi-database-exclamation mb-3 text-success opacity-50"
                                            style="font-size: 3.5rem;"></i>
                                        <h5 class="fw-bold text-dark">Padrón Vacío</h5>
                                        <p class="mb-0">Aún no hay estudiantes registrados en la plataforma.<br>Utiliza el
                                            botón <strong>"Cargar Alumnos"</strong> para sincronizar la base de datos.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/alumnos.js') }}"></script>

</body>

</html>