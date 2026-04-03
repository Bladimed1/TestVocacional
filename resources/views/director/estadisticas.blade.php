<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas Generales - UTH</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body class="fondo-ondas bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3 mb-4">
        <a href="{{ route('director.index') }}" class="text-decoration-none text-dark fw-bold transition-colors hover:text-success">
            <i class="bi bi-arrow-left me-2"></i> Volver a la Página Principal
        </a>
        <span class="fw-bold text-success">
            <i class="bi bi-pie-chart-fill me-2"></i> Reporte de Tendencias
        </span>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h3 class="fw-bold text-center mb-1 text-dark">Distribución de Aspirantes</h3>
                    <p class="text-center text-secondary mb-4">Porcentaje de interés por carrera de TI</p>
                    
                    <div id="grafica_pastel_3d" style="width: 100%; height: 400px; display: flex; justify-content: center; align-items: center;">
                        <span class="text-muted"><i class="bi bi-arrow-clockwise"></i> Generando gráfico...</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-5">
                <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #008A4B 0%, #005f33 100%); color: white;">
                    <div class="card-body p-4 p-md-5 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-uppercase fw-semibold mb-1 opacity-75" style="letter-spacing: 1px;">
                                <i class="bi bi-stars me-1"></i> Especialidad con Mayor Demanda
                            </p>
                            <h2 class="fw-bolder mb-0" style="font-size: 2.2rem; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                {{ $especialidadTop }}
                            </h2>
                            <p class="mt-2 mb-0 fw-medium fs-5 opacity-90">
                                <i class="bi bi-people-fill me-1"></i> {{ $maxDemanda }} aspirantes detectados
                            </p>
                        </div>
                        <i class="bi bi-trophy-fill opacity-50 d-none d-sm-block" style="font-size: 6rem; transform: rotate(10deg);"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        // Cargar la librería corechart
        google.charts.load("current", {packages:["corechart"]});
        
        // Cuando termine de cargar, ejecuta la función principal
        google.charts.setOnLoadCallback(dibujarGrafica);

        function dibujarGrafica() {
            // Alimentamos Google Charts con tus datos del controlador de Laravel
            var data = google.visualization.arrayToDataTable([
                ['Especialidad', 'Número de Aspirantes'],
                ['Desarrollo de Software',  {{ $resultados['Software'] }}],
                ['Redes y Ciberseguridad',  {{ $resultados['Redes y Ciberseguridad'] }}],
                ['Entornos Virtuales',      {{ $resultados['Entornos Virtuales'] }}]
            ]);

            // Configuración visual (El toque de diseño)
            var options = {
                is3D: true, // Activa el efecto 3D
                backgroundColor: 'transparent',
                colors: ['#008A4B', '#2563eb', '#f59e0b'], // Verde UTH, Azul, Naranja
                chartArea: { width: '95%', height: '85%' },
                legend: { 
                    position: 'right', 
                    textStyle: { fontSize: 14, color: '#333' }
                },
                pieSliceText: 'percentage', // Muestra el % adentro de la rebanada
                pieSliceTextStyle: { fontSize: 16, bold: true }
            };

            // Apuntamos al contenedor HTML y dibujamos
            var chart = new google.visualization.PieChart(document.getElementById('grafica_pastel_3d'));
            chart.draw(data, options);

            // SQA PRO-TIP: Hacer la gráfica verdaderamente responsiva
            // Si el director cambia el tamaño de la ventana, la gráfica se ajusta sola
            window.addEventListener('resize', function() {
                chart.draw(data, options);
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>