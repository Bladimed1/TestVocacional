@extends('layouts.barra_superior')

@section('title', 'Plataforma de Orientación Vocacional - UTH')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-grow-1 my-5">
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
    </div>
@endsection

@push('scripts')
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        function loginConGoogle(response) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch("/auth_g", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ token: response.credential })
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) { window.location.href = "/estudiante"; }
                else { alert("Error: " + (data.error || "Token inválido")); }
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
@endpush