<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\EmpleadoUpdated;
use App\Models\Contrato;
use App\Models\Zona;
use App\Models\User;
use App\Models\Documentos;
use App\Models\Actividades;
use App\Models\Indicadores;
use Carbon\Carbon;
use App\Models\Puestos;

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

        $empleados = Empleado::with('documentos')->get();



        return view('index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        $zonas = Zona::all();
        $contratos = Contrato::all();                             
        return view('empleados.agregar', compact('contratos','zonas'));
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
            'id_zona' => ['required', 'exists:zonas,id'], // Valida que el ID de la zona exista en la tabla 'zonas'
        ]);

        $empleado = new Empleado();
        $empleado->RPE_Empleado = $request->RPE_Empleado;
        $empleado->nombre_Empleado = $request->nombre_Empleado;
        $empleado->fecha_ingreso = $request->fecha_ingreso;

        // Asociar el contrato seleccionado al empleado
        $empleado->contrato_id = $request->contrato_id;
    
        $empleado->save();

        // Asigna la zona seleccionada al empleado
        $zona = Zona::find($request->input('id_zona'));
        $empleado->zonas()->attach($zona);


        
        return redirect('/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
{   
    // Verificar si el objeto Empleado es nulo
    if (!$empleado) {
        // Si el objeto Empleado es nulo, redirige o muestra un mensaje de error
        return redirect()->route('empleados.index')->with('error', 'El empleado no fue encontrado.');
    }

    // Si el objeto Empleado no es nulo, continúa con el proceso
    $Id_Empleado = $empleado->id;
    $usuarios = User::all(); // Obtén todos los usuarios
    $zonas = Zona::all();
    $contratos = Contrato::all();
    $actividades = Actividades::all();
    $indicadores = Indicadores::all();
    $fechaActual = Carbon::now()->toDateString();
    // Obtener el último número de llamada de atención del empleado actual
    $ultimoNumeroLlamada = Documentos::where('Id_Empleado', $Id_Empleado)
                                    ->where('Tipo_Documento', 'LLAMADA DE ATENCION')
                                    ->max('N_Llamada');
    
    // Verificar si el último número de llamada es nulo
    
    
    // Obtener los documentos del empleado actual
    $documentos = Documentos::where('Id_Empleado', $Id_Empleado)->get();
    
    // Obtener los conteos de documentos por tipo para el empleado actual
    $contadorRendicionCuentas = $documentos->where('Tipo_Documento', 'RENDICION DE CUENTAS')->count();
    $contadorLlamadasAtencion = $documentos->where('Tipo_Documento', 'LLAMADA DE ATENCION')->count();
    $contadorActasAdministrativas = $documentos->where('Tipo_Documento', 'ACTA ADMINISTRATIVA')->count();

    return view('empleados.show', compact('empleado','indicadores','fechaActual', 'documentos', 'ultimoNumeroLlamada', 'contratos', 'zonas', 'actividades', 'usuarios', 'contadorRendicionCuentas', 'contadorLlamadasAtencion', 'contadorActasAdministrativas'));
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

        $request->validate([
            'nombre_Empleado' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
        ]);

        // Actualizar los campos con los nuevos valores del formulario
        $empleado->RPE_Empleado = $request->input('RPE_Empleado');
        $empleado->nombre_Empleado = $request->input('nombre_Empleado');

        // Actualizar el contrato
        $empleado->contrato()->associate($request->input('contrato'));

        $empleado->fecha_ingreso = $request->input('fecha_ingreso');

       
         // Obtener las zonas seleccionadas del formulario
        $zonaIds = $request->input('zonas', []);
        
        // Sincronizar las zonas del empleado con las seleccionadas
        $empleado->zonas()->sync($zonaIds);




        // Guardar los cambios en la base de datos
        $empleado->save();
        event(new EmpleadoUpdated($empleado));

       
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
 