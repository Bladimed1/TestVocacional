@extends('layouts.barra_superior')

@section('title', 'Iniciar Sesión - Plataforma de Orientación Vocacional UTH')

@section('content')

<div class="d-flex justify-content-center align-items-center w-100" style="min-height: 65vh;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden text-center z-3" style="width: 100%; max-width: 550px;">
        <div class="bg-success" style="height: 5px;"></div>

        <div class="card-body p-4 p-sm-5">
            <div class="mb-4">
                <div class="d-inline-flex justify-content-center align-items-center bg-success bg-opacity-10 text-success rounded-circle shadow-sm" style="width: 80px; height: 80px;">
                    <i class="bi bi-person-bounding-box" style="font-size: 2.5rem;"></i>
                </div>
            </div>

            <h2 class="fw-bolder text-success mb-3 px-2">Bienvenido</h2>
            <p class="text-secondary mb-4 fw-medium px-4">Ingresa con tu correo institucional</p>

            <div class="p-4 p-sm-5 bg-light rounded-4 border border-secondary border-opacity-10 shadow-sm my-4 mx-2 mx-sm-3">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div id="g_id_onload"
                        data-client_id="935792453890-qhfu7en8ch5ugidi3s9763cv3fl0dqo9.apps.googleusercontent.com"
                        data-callback="loginConGoogle">
                    </div>
                    <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left" data-width="280"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-none d-xl-block position-fixed" style="top: 50%; left: 2vw; transform: translateY(-50%); width: 28vw; max-width: 450px; z-index: 1;">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="bg-success" style="height: 5px;"></div>
        <div class="card-body p-2">
            <img src="{{ asset('img/imagen-2-TIID.jpeg') }}" alt="Estudiantes TI" class="img-fluid rounded-3 w-100">
        </div>
    </div>
</div>

<div class="d-none d-xl-block position-fixed" style="top: 50%; right: 2vw; transform: translateY(-50%); width: 28vw; max-width: 450px; z-index: 1;">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="bg-success" style="height: 5px;"></div>
        <div class="card-body p-2">
            <img src="{{ asset('img/imagen-1-TIID.jpeg') }}" alt="Laboratorio TI" class="img-fluid rounded-3 w-100">
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
    function loginConGoogle(response) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch("/auth", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({
                    token: response.credential
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    window.location.href = "/estudiante";
                } else {
                    alert("Error: " + (data.error || "Token inválido"));
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>
@endpush