<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Indicadores;
use Illuminate\Http\Request;
use App\Models\Puestos;


class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indicador = Indicadores::all(); // Recupera todos los indicadores
        return view('indicadores.index', compact('indicador'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('indicadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'clave_indicador' => 'required|unique:indicadores,Clave_Indicador|max:5',
            'nombre_indicador' => 'required',
            'valorMin_Indicador' => 'required|numeric|min:0|max:100',
        ]);

        // Crear una nueva instancia del modelo Indicador
        $indicador = new Indicadores;
        $indicador->Clave_Indicador = $request->clave_indicador;
        $indicador->Nombre_Indicador = $request->nombre_indicador;
        $indicador->Valor_Aceptable = $request->valorMin_Indicador;

        // Guardar el indicador en la base de datos
        $indicador->save();

        // Redirigir a la vista de éxito o a donde desees
        return redirect()->route('indicadores.index')->with('success', 'Indicador registrado correctamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Indicadores $indicadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $indicador = Indicadores::find($id);
        return view('indicadores.edit', compact('indicador'));
    }

    public function update(Request $request, $id)
    {
        $indicador = Indicadores::find($id);

        $request->validate([
            'clave_indicador' => 'required|unique:indicadores,Clave_Indicador,'.$indicador->id.'|max:5',
            'nombre_indicador' => 'required',
            'valorMin_Indicador' => 'required|numeric|min:0|max:100',
        ]);

        $indicador->Clave_Indicador = $request->clave_indicador;
        $indicador->Nombre_Indicador = $request->nombre_indicador;
        $indicador->Valor_Aceptable = $request->valorMin_Indicador;

        $indicador->save();

        return redirect()->route('indicadores.index')->with('success', 'Indicador actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $indicadores = Indicadores::find($id);

        if (!$indicadores) {
            return redirect()->back()->with('error', 'El Indicador no existe.');
        }

        $indicadores->delete();

        return redirect()->route('indicadores.index')->with('success', 'Puesto eliminado correctamente.');
    }
}
