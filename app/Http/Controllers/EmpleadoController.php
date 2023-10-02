<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contrato;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el usuario autenticado actualmente
        $user = Auth::user();

        // Obtener los empleados asociados al usuario autenticado
        $empleados = $user->empleados;


         // Obtener los empleados que no tienen usuarios relacionados
        $empleadosSinUsuario = Empleado::whereNotIn('id', function ($query) {
            $query->select('empleado_id')
                ->from('empleado_user'); 
        })->get();

        return view('index', compact('empleados', 'empleadosSinUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        $contratos = Contrato::all();
        return view('empleados.agregar', compact('contratos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'RPE_Empleado' => ['required', 'unique:empleados',],
            'nombre_Empleado' => ['required', ],
            'fecha_ingreso' => ['required', ],
            'contrato_id' => ['required', 'exists:contratos,id'], // Agrega la validación para el contrato//Modificaciones de Lalo
            
        ]);

        $empleado = new Empleado();
        $empleado->RPE_Empleado = $request->RPE_Empleado;
        $empleado->nombre_Empleado = $request->nombre_Empleado;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
        
       
       

        // Asociar el contrato seleccionado al empleado
        $empleado->contrato_id = $request->contrato_id;
        $empleado->save();
        // Asignar automáticamente el usuario autenticado al empleado creado
        $user = Auth::user();
        $empleado->users()->attach($user);
        
        return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    { 
        
        $contratos = Contrato::all();
        return view('empleados.show',compact('empleado','contratos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.editA',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
{ // Validar los datos del formulario
    // Validar los datos del formulario
    $request->validate([
        'RPE_Empleado' => 'required|max:5',
        'nombre_Empleado' => 'required|string|max:255',
        'contrato' => 'required|exists:contratos,id',
        'fecha_ingreso' => 'required|date',
    ]);

    // Actualizar los campos con los nuevos valores del formulario
    $empleado->RPE_Empleado = $request->input('RPE_Empleado');
    $empleado->nombre_Empleado = $request->input('nombre_Empleado');

    // Actualizar el contrato
    $empleado->contrato()->associate($request->input('contrato'));

    $empleado->fecha_ingreso = $request->input('fecha_ingreso');

    // Guardar los cambios en la base de datos
    $empleado->save();

    // Redirigir a una página de confirmación o de detalles del usuario
    return redirect()->route('empleado.show', $empleado->id)->with('success', 'Los cambios se han guardado correctamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect('/index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
 