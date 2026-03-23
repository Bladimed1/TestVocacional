<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login - Test Vocacional</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
   <!-- <link rel="stylesheet" href="{{ asset('assets/login.css') }}"> -->
</head>

<body>

    <h1>Test vocacional de especialidad</h1>
    <h2>Iniciar sesión</h2>

    <div class="login-card">
        <h3>Iniciar sesión con Google</h3>

        <div id="g_id_onload"
             data-client_id="935792453890-qhfu7en8ch5ugidi3s9763cv3fl0dqo9.apps.googleusercontent.com"
             data-callback="loginConGoogle">
        </div>

        <div class="g_id_signin"></div>
    </div>

    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <script>
    function loginConGoogle(response) {
        // Obtenemos el token de seguridad que pusimos en el <head>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // 3. Apuntamos a la ruta de Laravel en lugar del archivo PHP suelto
        fetch("/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken // Enviamos el token para que Laravel nos deje pasar
            },
            body: JSON.stringify({
                token: response.credential
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.ok) {
                // 4. Redirigimos a tu nueva ruta protegida de Laravel (ejemplo: /inicio o /dashboard)
                window.location.href = "/welcome"; 
            } else {
                alert("Error al iniciar sesión: " + (data.error || "Token inválido"));
            }
        })
        .catch(error => {
            console.error("Hubo un problema con la petición:", error);
            alert("Error de conexión con el servidor.");
        });
    }
    </script>

</body>
</html>