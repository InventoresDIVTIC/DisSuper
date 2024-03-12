<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class permisosNivel0
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $nivelUsuario = Auth::user()->roles[0]['nivel_permisos'];
        
        if ( $nivelUsuario == 0) {
            return $next($request);
        }

        // No es Admin
        return redirect()->route('403')->with('error', 'Acceso no autorizado.');
    }
}
