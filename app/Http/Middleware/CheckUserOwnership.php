<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckUserOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->route('usuario'); // Obtener el ID del usuario del parámetro de la ruta
        $user = User::find($userId); // Buscar el usuario en la base de datos

        // Verificar si el usuario autenticado es el propietario del perfil 
        
        if ($user && $user->id === auth()->id() || Auth::user()->roles[0]['nivel_permisos'] === 0 || Auth::user()->roles[0]['nivel_permisos'] === 1 || Auth::user()->roles[0]['nivel_permisos'] === 2) {
            
            return $next($request);
        }else{
            // Redireccionar con un mensaje de acceso no autorizado si el usuario no es el propietario del perfil
            return redirect()->route('403')->with('error', 'Acceso no autorizado.'); 
        }

        // Redireccionar con un mensaje de acceso no autorizado si el usuario no es el propietario del perfil
        return view('/index');
    }
}