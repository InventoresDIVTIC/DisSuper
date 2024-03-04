<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class JefaturaInmediataMiddleware
{
    public function handle($request, Closure $next)
    {
        $jefaturaRoles = [
            'jefatura inmediata',
            'Jefatura zonal de proceso',
            'Jefatura zonal de proceso de trabajo',
            'Superintendente de zona',
            'Subjerente de trabajo',
            'Gerente divisional',
            'Admin'
        ];
        $roles = Role::whereIn('name', $jefaturaRoles)->get();
        $user = Auth::user();

        if ($user && ($user->name === 'admin' || $user->roles->intersect($roles)->isNotEmpty())) {
            return $next($request);
        }

        // No es 'admin' ni tiene el rol de jefatura inmediata
        return redirect()->route('403')->with('error', 'Acceso no autorizado.');
    }
}
