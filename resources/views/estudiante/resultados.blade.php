<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus Resultados - UTH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body class="fondo-ondas bg-light">
    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 mb-4">
        <span class="fw-bold text-success mx-auto fs-5">
            <i class="bi bi-award-fill me-2"></i> Resultados de tu Evaluación
        </span>
    </nav>

    <div class="container pb-5" style="max-width: 1000px;">
        <div class="text-center mb-5 mt-4">
            <h1 class="fw-bolder text-dark mb-2">¡Test Completado!</h1>
            <p class="text-muted fs-5">Aqui están tus resultados de manera visual.</p>
        </div>

        @php
            $maxScore = max($resultados);
        @endphp

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="fw-bold text-dark mb-4 border-bottom pb-3">
                            <i class="bi bi-bar-chart-line-fill text-success me-2"></i> Gráfica de Aptitudes
                        </h4>
                        <div id="graficaResultados" style="width: 100%; height: 350px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-white">
                    <div class="card-body p-4">
                        <h4 class="fw-bold text-dark mb-4 border-bottom pb-3">
                            <i class="bi bi-list-stars text-success me-2"></i> Desglose de Puntajes
                        </h4>
                        <div class="d-flex flex-column gap-3">
                            @foreach ($resultados as $especialidad => $resultado)
                                @if($resultado == $maxScore)
                                    <div class="p-3 rounded-4 bg-success bg-opacity-10 border border-success border-opacity-25 position-relative overflow-hidden">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 opacity-25">
                                            <i class="bi bi-trophy-fill text-success" style="font-size: 3rem;"></i>
                                        </div>
                                        <h6 class="text-success fw-bold mb-1 text-uppercase" style="font-size: 0.8rem;">Perfil Ideal Recomendado</h6>
                                        <h5 class="fw-bolder text-dark mb-0">{{ $especialidad }}</h5>
                                        <div class="mt-2 d-flex align-items-center gap-2">
                                            <span class="badge bg-success fs-6">{{ $resultado }} pts</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="p-3 rounded-4 bg-light border border-light">
                                        <h6 class="fw-bold text-secondary mb-1">{{ $especialidad }}</h6>
                                        <span class="badge bg-secondary bg-opacity-25 text-dark">{{ $resultado }} pts</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            @if ($intentos < 2)
            <a href="{{ route('estudiante.test') }}" class="btn btn-outline-success btn-lg px-5 rounded-pill fw-bold shadow-sm">
                <i class="bi bi-arrow-repeat me-2"></i> Volver a intentar
            </a>
            @endif
            <a href="{{ route('estudiante.index') }}" class="btn btn-outline-success btn-lg px-5 rounded-pill fw-bold shadow-sm">
                <i class="bi bi-house-door-fill me-2"></i> Volver a mi Perfil
            </a>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(dibujarGrafica);

        function dibujarGrafica() {
            var rawEspecialidades = {!! json_encode(array_keys($resultados)) !!};
            var rawPuntajes = {!! json_encode(array_values($resultados)) !!};
            
            var datosFormateados = [['Especialidad', 'Puntaje']];
            for (var i = 0; i < rawEspecialidades.length; i++) {
                datosFormateados.push([rawEspecialidades[i], Number(rawPuntajes[i])]);
            }

            var data = google.visualization.arrayToDataTable(datosFormateados);

            var options = {
                is3D: true,
                legend: { position: 'none' },
                colors: ['#008A4B', '#2563eb', '#f59e0b'],
                chartArea: { width: '85%', height: '75%' },
                vAxis: { minValue: 0, textStyle: { color: '#6c757d' } },
                hAxis: { textStyle: { color: '#495057', fontSize: 11 } },
                animation: { startup: true, duration: 1000, easing: 'out' }
            };

            var chart = new google.visualization.PieChart(document.getElementById('graficaResultados'));
            chart.draw(data, options);
        }
        
        window.addEventListener('resize', dibujarGrafica);
    </script>
</body>
</html>