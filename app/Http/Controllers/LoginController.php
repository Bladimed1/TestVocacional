<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Estudiante;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function authGoogle(Request $request)
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

        $user_google = $response->json();

        // 3. SEGURIDAD: Verificar que el token fue emitido para tu App
        if (!isset($user_google['aud']) || $user_google['aud'] !== '935792453890-qhfu7en8ch5ugidi3s9763cv3fl0dqo9.apps.googleusercontent.com') {
            return response()->json(['ok' => false, 'error' => 'Token no pertenece a esta app'], 401);
        }

        $dominioPermitido = 'uth.edu.mx';

        if (!isset($user_google['hd']) || $user_google['hd'] !== $dominioPermitido) {
            return response()->json([
                'ok' => false, 
                'error' => 'Acceso restringido a cuentas de ' . $dominioPermitido
            ], 403);
        }

        if (isset($user_google['email'])) {
            session([
                'email'  => $user_google['email'],
                'nombre' => $user_google['name'] ?? '',
                'google_id'  => $user_google['sub']

            ]);

            return response()->json(['ok' => true]);
            
        } 

        return response()->json(['ok' => false], 401);
    }

     public function auth () {
        $email = session ('email');
        $nombre_completo = session ('nombre');
        $google_id = session('google_id');


        $usuario = User::with('rol')->where('email', $email)->first();

        if ($usuario) {
            $rol = $usuario->rol->rol;
            
            switch ($rol) {
            case "director":
                return redirect()->route('director.index');
            case "estudiante":

                $estudiante = Estudiante::where('email', $email)->first();
                $estatus = $estudiante->estatus;

                if ($estatus == 1) {
                    return redirect()->route('estudiante.index');
                }
                
            default:
            session()->flush();
            return redirect()->route('error');
            }

        } else {
            $estudiante = Estudiante::where('email', $email)->first();
            $estatus = $estudiante->estatus;
            if ($estudiante && $estatus == 1) {

                $usuario = new User();
                $usuario->nombre_completo = $nombre_completo;
                $usuario->email = $email;
                $usuario->google_id = $google_id;
                $usuario->id_rol = 2;
                $usuario->save();

                /*DB::table('users')->insert([
                    'nombre_completo' => $nombre_completo,
                    'email' => $email,
                    'google_id' => $google_id,
                    'id_rol' => 2
                ]);*/

                return redirect()->route('estudiante.index');


            } else {
                session()->flush(); 
                return redirect()->route('error');
            }

        }

    }

    public function error() {
        return view('error');
    }
 
    public function logout () {
        session()->flush();
        return redirect()->route('login');
    }

}
