<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function auth(Request $request)
    {
        $token = $request->input('token');

        if (!$token) {
            return response()->json(['ok' => false], 400); 
        }

        // 2. Usar el Facade HTTP de Laravel
        $response = Http::get("https://oauth2.googleapis.com/tokeninfo", [
            'id_token' => $token]);

        // Si la petición a Google falla (ej. token inválido o expirado)
        if ($response->failed()) {
            return response()->json(['ok' => false], 401); 
        }

        $info = $response->json();

        // 3. SEGURIDAD: Verificar que el token fue emitido para tu App
        if (!isset($info['aud']) || $info['aud'] !== '935792453890-qhfu7en8ch5ugidi3s9763cv3fl0dqo9.apps.googleusercontent.com') {
            return response()->json(['ok' => false, 'error' => 'Token no pertenece a esta app'], 401);
        }

        if (isset($info['email'])) {
            
            session([
                'email'  => $info['email'],
                'nombre' => $info['name'] ?? ''
            ]);

            return response()->json(['ok' => true]);
            
        } 

        return response()->json(['ok' => false], 401);
    }
}
