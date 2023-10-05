<?php

namespace App\Http\Controllers;

use App\Models\Contrato; // Importa el modelo Contrato
use App\Models\Empleado;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::all(); 

        return view('contratos.verContratos', ['contratos' => $contratos]);
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
        // Validación de los datos del formulario
        $request->validate([
            'nombreNuevoContrato' => 'required|string|max:255', // Puedes ajustar las reglas de validación según tus necesidades
        ]);

        // Crear un nuevo contrato
        $contrato = new Contrato();
        $contrato->name = $request->input('nombreNuevoContrato');
        $contrato->save();

        return redirect()->route('contratos.index')->with('success', 'Contrato agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
            // Verificar si se encontró el contrato (ya tienes el contrato como parámetro)

        if (!$contrato) {
            return redirect()->back()->with('error', 'El contrato no existe.');
        }

        // Eliminar el contrato
        $contrato->delete();

        // Redirigir de regreso con un mensaje de éxito
        return redirect()->route('contratos.index')->with('success', 'Contrato eliminado correctamente.');
    }
}
