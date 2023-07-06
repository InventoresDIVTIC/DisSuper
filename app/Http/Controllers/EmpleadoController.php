<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleado = Empleado::all();
        
        return view('index',compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.agregar');
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
            
        ]);

        $empleado = new Empleado();
        $empleado->RPE_Empleado = $request->RPE_Empleado;
        $empleado->nombre_Empleado = $request->nombre_Empleado;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
       

        $empleado->save();

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show',compact('empleado')); 
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
{
    $request->validate([
        'RPE_Empleado' => ['required','numeric', 'digits:8', 'unique:empleados,RPE_Empleado,'.$empleado->id],
        'nombre_Empleado' => ['required'],
        'fecha_ingreso' => ['required'],
    ]);

    $empleado->RPE_Empleado = $request->RPE_Empleado;
    $empleado->nombre_Empleado = $request->nombre_Empleado;
    $empleado->fecha_ingreso = $request->fecha_ingreso;

    $empleado->save();

    return redirect('/empleado');
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
