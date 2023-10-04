<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zonas = Zona::all(); // Obtén todas las zonas desde la base de datos
        $usuarios = User::whereNotIn('id', [1])->get();

        return view('zonas.show-zonas', compact('usuarios','zonas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validar los datos del formulario
           $request->validate([
            'nombre_zona' => 'required|string|max:255',
            'Encargado' => 'required|exists:users,id',
        ]);

        // Crear una nueva instancia de Zona y asignar los valores
        $zona = new Zona();

        // Resto del código sin cambios
        $zona->nombre_zona = $request->input('nombre_zona');
        $zona->Encargado = $request->input('Encargado');
        $zona->save();

        // Redirigir a la página anterior con un mensaje de éxito
        return redirect()->back()->with('success', 'Zona agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zonas $zonas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zonas $zonas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zonas $zonas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Buscar la zona por su ID
    $zona = Zona::find($id);

    // Verificar si se encontró la zona
    if (!$zona) {
        return redirect()->back()->with('error', 'La zona no existe.');
    }

    // Eliminar la zona
    $zona->delete();

    // Redirigir de regreso con un mensaje de éxito
    return redirect()->route('zonas.index')->with('success', 'Zona eliminada correctamente.');
}

}
