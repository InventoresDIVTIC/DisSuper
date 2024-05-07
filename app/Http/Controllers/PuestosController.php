<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\Actividades;
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
            'clave_puesto' => ['required', 'max:5','unique:puestos'],
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
    public function show($id)
    {
           $puestos = Puestos::find($id); // Encuentra el puesto por su ID
        
            if (!$puestos) {
                return abort(404); // Devuelve un error 404 si el puesto no se encuentra
            }
            
            $actividad = Actividades::all(); // Obtén todas las actividades
            $actividadesAsociadas = $puestos->actividades;
            
            return view('funciones_puestos.viewFuncionesPuestos', compact('puestos', 'actividad','actividadesAsociadas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puestos $puestos)
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
            'actividad' => 'required|exists:actividades,id', // Asegura que la actividad exista
        ]);

        // Obtén el puesto por su ID
        $puesto = Puestos::find($id);

        // Verifica si la actividad ya está asociada al puesto
        if ($puesto->actividades->contains($request->actividad)) {
            return redirect()->route('puestos.show', $id)->with('error', 'La función ya está asociada al puesto.');
        }

        // Agrega la actividad al puesto si no existe
        $puesto->actividades()->attach($request->actividad);

        return redirect()->route('puestos.show', $id)->with('success', 'Función agregada correctamente al puesto.');
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

    // Elimina la relación en la tabla pivot
    $puesto->actividades()->detach();

    // Luego elimina el puesto
    $puesto->delete();

    return redirect()->route('puestos.index')->with('success', 'Puesto eliminado correctamente.');
}

    public function detach($puesto, $actividad)
    {
        $puesto = Puestos::find($puesto);
        $actividad = Actividades::find($actividad);

        if (!$puesto || !$actividad) {
            return redirect()->back()->with('error', 'Puesto o actividad no encontrados.');
        }

        // Utiliza el método detach() para eliminar la relación en la tabla pivot
        $puesto->actividades()->detach($actividad);

        return redirect()->back()->with('success', 'Relación eliminada correctamente.');
    }
        

}
