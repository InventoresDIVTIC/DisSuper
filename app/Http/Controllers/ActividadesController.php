<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Indicadores;
use App\Models\Puestos;

use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $actividades = actividades::all();
        return view('actividades.index', compact('actividades'));
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
       
        // Valida los datos del formulario
        $request->validate([
            'nombre_actividad' => 'required', 
            'clave_actividad' => 'required',
        ]);
    
        // Crea una nueva actividad con los datos del formulario
        actividades::create([
            'name' => $request->nombre_actividad, 
            'clave' => $request->clave_actividad, 
        ]);
    
        // Redirecciona a la página deseada después de guardar la actividad
        return redirect()->route('actividades.index')->with('success', 'Actividad creada exitosamente');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $actividades = Actividades::find($id);

        if (!$actividades) {
            // Si no se encontró la actividad, redirige o muestra un mensaje de error
            return redirect()->route('actividades.index')->with('error', 'La actividad no fue encontrada.');
        }

        $indicadores = Indicadores::all();
        $indicadoresAsociados = $actividades->indicadores;

        return view('actividades.viewIndicadores', compact('indicadores', 'actividades', 'indicadoresAsociados'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(actividades $actividades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar la solicitud según tus necesidades
        $request->validate([
            'indicador' => 'required|exists:indicadores,id', // Asegura que el indicador exista
        ]);
    
        // Obtén la actividad por su ID
        $actividad = Actividades::find($id);
    
        // Verifica si el indicador ya está asociado a la actividad
        if ($actividad->indicadores->contains($request->indicador)) {
            return redirect()->route('actividades.show', $id)->with('error', 'El indicador ya está asociado a la actividad.');
        }
    
        // Agrega el indicador a la actividad si no existe
        $actividad->indicadores()->attach($request->indicador);
    
        return redirect()->route('actividades.show', $id)->with('success', 'Indicador agregado correctamente a la actividad.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $actividad = actividades::find($id);

        if (!$actividad) {
            return redirect()->back()->with('error', 'La actividad no existe.');
        }

        // Elimina las relaciones en la tabla actividades_puestos
        $actividad->puestos()->detach(); // Asumiendo que la relación se llama 'puestos'

        // Luego elimina la actividad
        $actividad->delete();

        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada correctamente.');
    }
    

    public function eliminarIndicador(Actividades $actividad, Indicadores $indicador)
    {
        // Verifica si la relación existe
        if (!$actividad->indicadores->contains($indicador)) {
            return redirect()->back()->with('success', 'La Relacion seleccionada no existe');
        }

        // Elimina la relación
        $actividad->indicadores()->detach($indicador);

        return redirect()->back()->with('success', 'Relación eliminada correctamente.');
    }
}
