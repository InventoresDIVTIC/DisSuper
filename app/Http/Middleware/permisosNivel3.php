<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class permisosNivel3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nivelUsuario = Auth::user()->roles[0]['nivel_permisos'];

        if ($nivelUsuario <= 3) {
            return $next($request);
        }
        return $next($request);
    }
}
