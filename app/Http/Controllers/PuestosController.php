<?php

namespace App\Http\Controllers;

use App\Models\puestos;
use Illuminate\Http\Request;
use App\Models\Zona;
class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puestos = Puestos::all();
        return view('puestos.viewPuestos', compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // En el método "create", puedes cargar las zonas desde la base de datos
        $zonas = Zona::all(); // Asegúrate de importar el modelo Zona
        return view('puestos.addPuestos', compact('zonas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clave_puesto' => ['required', 'max:5'],
            'nombre_Puesto' => ['required'],
            'empresa_proceso' => ['required'],
            'area_responsabilidad' => ['required'],
            'rama_actividad' => ['required'],
            'especialidad' => ['required'],
            'zona_id' => ['required', 'exists:zonas,id'], // Asegura que la zona exista en la base de datos
        ]);

        // Crea un nuevo puesto con los datos del formulario
        Puestos::create([
            'clave_puesto' => $request->clave_puesto,
            'nombre' => $request->nombre_Puesto,
            'empresa_proceso' => $request->empresa_proceso,
            'area_responsabilidad' => $request->area_responsabilidad,
            'rama_actividad' => $request->rama_actividad,
            'especialidad' => $request->especialidad,
            'zona_id' => $request->zona_id,
        ]);

        return redirect()->route('puestos.index')->with('success', 'Puesto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(puestos $puestos)
    {
       
        return view('funciones_puestos.viewFuncionesPuestos');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(puestos $puestos)
    {
        $puesto = Puesto::find($id);
        return view('puestos.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, puestos $puestos)
    {
        $validatedData = $request->validate([
            'clave_puesto' => 'required',
            'nombre' => 'required',
            'empresa_proceso' => 'required',
            'area_responsabilidad' => 'required',
            'rama_actividad' => 'required',
            'especialidad' => 'required',
        ]);

        Puesto::whereId($id)->update($validatedData);

        return redirect()->route('puestos.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $puesto = Puestos::find($id);

        if (!$puesto) {
            return redirect()->back()->with('error', 'El puesto no existe.');
        }

        $puesto->delete();

        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado correctamente.');
    }
    

}
