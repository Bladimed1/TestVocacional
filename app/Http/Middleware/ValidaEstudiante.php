<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class ValidaEstudiante
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Rutas que NO deben pasar por el middleware
        if ($request->is('login') || 
            $request->is('authGoogle') || 
            $request->is('authGoogle/auth') ||
            $request->is('logout')) {
            return $next($request);
        }

        // Verificar sesión
        $email = session('email');
        $usuario = User::with('rol')->where('email', $email)->first();
        $rol = $usuario->rol->rol;
        if (!session()->has('email') || $rol === "director") {
            session()->flush();
            return redirect()->route('login');
        }

        return $next($request);
    }
}
