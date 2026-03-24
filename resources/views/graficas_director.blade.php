
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadísticas Generales - UTH</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --uth-green: #009640;
            --uth-light-bg: #f8faf9;
        }

        body {
            background-color: var(--uth-light-bg);
            background-image: radial-gradient(circle at 10% 20%, rgba(0, 150, 64, 0.05) 0%, transparent 20%),
                              radial-gradient(circle at 90% 80%, rgba(0, 150, 64, 0.05) 0%, transparent 20%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }

        /* Header */
        .navbar-uth {
            background: white;
            border-bottom: 4px solid #ddd;
            padding: 1rem 2rem;
        }
        .logo-uth { height: 80px; border-right: 2px solid #ccc; padding-right: 20px; margin-right: 20px; }

        /* Tarjeta de Resultados */
        .result-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 2px solid var(--uth-green);
            overflow: hidden;
        }

        .result-header {
            background-color: rgba(0, 150, 64, 0.05);
            border-bottom: 2px solid #eaeaea;
            padding: 1.5rem;
        }

        /* Cajas de Estadísticas */
        .stats-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .area-destacada {
            background-color: var(--uth-green);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,150,64,0.3);
            margin-bottom: 2rem;
        }

        /* Botones */
        .btn-green-uth {
            background-color: var(--uth-green);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
        }
        .btn-green-uth:hover { background-color: #007d35; color: white; }
        
        .footer-line { height: 4px; background-color: var(--uth-green); margin-bottom: 10px; }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Variables que vienen de hacer el COUNT() o SUM() en la tabla 'resultados'
            var data = google.visualization.arrayToDataTable([
                ['Especialidad', 'Cantidad de Alumnos'],
                ['Entornos Virtuales', {{ $total_entornos ?? 0 }}],
                ['Desarrollo de Software', {{ $total_desarrollo ?? 0 }}],
                ['Redes', {{ $total_redes ?? 0 }}]
            ]);

            var options = {
                title: 'Distribución de Elección Vocacional (General)',
                pieHole: 0.4,
                colors: ['#009640', '#007d35', '#28a745'], 
                chartArea: {width: '90%', height: '80%'},
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }

        window.addEventListener('resize', drawChart);
    </script>
</head>

<body>

    <header class="navbar-uth d-flex align-items-center justify-content-between mb-4 shadow-sm">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/uthLogo.png') }}" alt="Logo UTH" class="logo-uth">
            <h3 class="m-0 fw-bold" style="color: #333;">Plataforma de Orientación Vocacional - UTH</h3>
        </div>
        
        <div class="dropdown">
            <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                <span class="me-2 fw-bold text-end lh-sm">
                    {{ Auth::user()->name ?? 'Directora / Director' }} <br>
                    <small class="text-muted fw-normal">Perfil Administrativo</small>
                </span>
                <i class="bi bi-person-circle fs-2 text-secondary"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </header>

    <main class="container flex-grow-1 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="result-card">
                    
                    <div class="result-header text-center">
                        <h2 class="fw-bold text-dark mb-0">
                            <i class="bi bi-pie-chart-fill text-success me-2"></i> Estadísticas Generales de Especialidad
                        </h2>
                    </div>

                    <div class="row g-0 p-4 align-items-center">
                        <div class="col-md-7">
                            <div id="piechart" style="width: 100%; height: 400px;"></div>
                        </div>

                        <div class="col-md-5 p-4">
                            
                            <div class="stats-box">
                                <h5 class="text-muted text-uppercase fw-bold mb-2" style="font-size: 0.85rem;">Total de Evaluaciones</h5>
                                <h2 class="fw-bold mb-0 text-dark">
                                    <i class="bi bi-people-fill text-secondary me-2"></i> 
                                    {{ $total_evaluados ?? 0 }} 
                                </h2>
                                <small class="text-muted">Alumnos que han completado el test</small>
                            </div>

                            <div class="area-destacada">
                                <h6 class="text-uppercase fw-bold mb-2" style="letter-spacing: 1px; color: #d1fae5;">
                                    <i class="bi bi-trophy-fill me-1"></i> Especialidad con Mayor Demanda
                                </h6>
                                <h3 class="fw-bold mb-0">{{ $especialidad_top ?? 'Datos insuficientes' }}</h3>
                            </div>

                            <div class="d-flex flex-column gap-3">
                                <a href="{{ route('index_director') ?? '#' }}" class="btn-green-uth">
                                    <i class="bi bi-arrow-left-circle-fill me-2"></i> Regresar al Panel
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="mt-auto pb-4">
        <div class="container text-center">
            <div class="footer-line mx-auto w-75"></div>
            <p class="text-muted mb-0 small">&copy; {{ date('Y') }} Plataforma de Orientación Vocacional - UTH</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>