<?php

namespace App\Http\Controllers;

use App\Models\academico;
use Illuminate\Http\Request;

class AcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academico = Academico::all();
        
        return view('academicos.index',compact('academico'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicos.agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombrep' => ['required', 'string', 'max:40', 'min:1'],
            'fecha' => ['required', ],
            'observaciones' => ['required', 'string'],
            'no_acta' => ['required'],
        ]);

        $academico = new Academico();
        $academico->nombrep = $request->nombrep;
        $academico->fecha = $request->fecha;
        $academico->observaciones = $request->observaciones;
        $academico->no_acta = $request->no_acta;

        $academico->save();

        return redirect('/academico/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(academico $academico)
    {
        return view('academicos.show',compact('academico')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(academico $academico)
    {
        return view('academicos.editA',compact('academico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, academico $academico)
    {
        $request->validate([
            'nombrep' => ['required', 'string', 'max:60', 'min:1'],
            'fecha' => ['required'],
            'observaciones' => ['required', 'string', 'max:200'],
            'no_acta' => ['required','numeric'],
        ]);


        $academico->nombrep = $request->nombrep;
        $academico->fecha = $request->fecha;
        $academico->observaciones = $request->observaciones;

        $academico->save();

        return redirect('/academico');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(academico $academico)
    {
        $academico->delete();
        return redirect('/academico');
    }
}
