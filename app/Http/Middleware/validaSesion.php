<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class validaSesion
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
            $request->is('auth/google') || 
            $request->is('auth/google/callback')) {
            return $next($request);
        }

        // Verificar sesión
        if (!session()->has('email')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
