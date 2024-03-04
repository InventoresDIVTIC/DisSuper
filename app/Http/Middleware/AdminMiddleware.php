<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $adminRole = Role::where('name', 'Admin')->first(); // Asegúrate de usar el nombre correcto del rol 'Admin'
        $user = Auth::user();

        if ($user && $user->roles->contains($adminRole)) {
            return $next($request);
        }

        // No es Admin
        return redirect()->route('403')->with('error', 'Acceso no autorizado.');
    }
}