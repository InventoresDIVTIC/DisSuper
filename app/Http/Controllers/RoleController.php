<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $empleados = $user->empleados;
        $roles = Role::whereNotIn('id', [1])->get();
        return view('roles.visualizarRol', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('NombreNuevoRol');
        $role->nivel_permisos = $request->input('Npermisos');
        $role->save();

        return redirect()->route('roles.index')->with('Exito', 'Role creado con Exito.');
        
    }

    public function edit(Role $role)
    {
       //
    }

    public function update(Request $request, Role $role)
    {
       //
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role eliminado con Exito');
    }
}