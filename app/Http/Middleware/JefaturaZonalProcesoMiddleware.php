<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class JefaturaZonalProcesoMiddleware
{
    public function handle($request, Closure $next)
    {
        $jefaturaRoles = [
            'Jefatura zonal de proceso',
            'Jefatura zonal de proceso de trabajo',
            'Superintendente de zona',
            'Subjerente de trabajo',
            'Gerente divisional',
            'Admin'
        ];

        $roles = Role::whereIn('name', $jefaturaRoles)->get();
        $user = Auth::user();

        if ($user && $user->roles->intersect($roles)->isNotEmpty()) {
            return $next($request);
        }

        // No es uno de los roles de jefatura zonal de proceso
        return redirect()->route('403')->with('error', 'Acceso no autorizado.');
    }
}
