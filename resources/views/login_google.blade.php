<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plataforma de Orientación Vocacional - UTH</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --uth-green: #009640; /* Verde institucional aproximado */
            --uth-light-bg: #f8faf9;
        }

        body {
            background-color: var(--uth-light-bg);
            /* Simulación del fondo con ondas de la imagen */
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
        .logo-uth { height: 150px; border-right: 2px solid #ccc; padding-right: 15px; margin-right: 15px; }

        /* Tarjeta Principal */
        .main-card {
            border: 2px solid var(--uth-green);
            border-radius: 15px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            max-width: 500px;
            width: 90%;
        }

        .title-green {
            color: var(--uth-green);
            font-weight: 800;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        /* Caja interna de Login */
        .login-box {
            border: 2px solid #00964080;
            border-radius: 12px;
            padding: 2rem;
            margin-top: 1rem;
        }

        .btn-uth {
            background-color: var(--uth-green);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-uth:hover { background-color: #007d35; color: white; }

        /* Footer */
        .footer-line {
            height: 4px;
            background-color: var(--uth-green);
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <header class="navbar-uth d-flex align-items-center mb-auto shadow-sm">
        <img src="{{ asset('img/uthLogo.png') }}" alt="Logo UTH" class="logo-uth">
        <h3 class="m-0 fw-bold" style="color: #333;">Plataforma de Orientación Vocacional - UTH</h3>
    </header>

    <main class="container d-flex justify-content-center align-items-center flex-grow-1 my-5">
        <div class="main-card p-5 text-center">
            
            <h1 class="title-green display-6 mb-4">Test Vocacional <br> de Especialidad</h1>

            <div class="login-box">
                <h6 class="text-uppercase fw-bold mb-4" style="color: var(--uth-green); letter-spacing: 1px;">
                    Iniciar sesión con Google
                </h6>

                <div class="d-flex flex-column align-items-center gap-3">
                    <div id="g_id_onload"
                         data-client_id="935792453890-qhfu7en8ch5ugidi3s9763cv3fl0dqo9.apps.googleusercontent.com"
                         data-callback="loginConGoogle">
                    </div>

                    <div class="g_id_signin" data-type="standard" data-size="large" data-width="100%"></div>
                </div>
            </div>

        </div>
    </main>

    <footer class="mt-auto pb-4">
        <div class="container text-center">
            <div class="footer-line mx-auto w-75"></div>
            <p class="text-muted mb-0 small">&copy; 2026 Plataforma de Orientación Vocacional - UTH</p>
        </div>
    </footer>

    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        // Tu script de loginConGoogle se queda exactamente igual
        function loginConGoogle(response) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch("/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ token: response.credential })
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) { window.location.href = "/index_estudiante"; }
                else { alert("Error: " + (data.error || "Token inválido")); }
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
</body>
</html>