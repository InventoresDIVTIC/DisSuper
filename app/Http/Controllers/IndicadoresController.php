<?php

namespace App\Http\Controllers;

use App\Models\Indicadores;
use Illuminate\Http\Request;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('indicadores.viewIndicadores');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('indicadores.addIndicadores');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Indicadores $indicadores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indicadores $indicadores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indicadores $indicadores)
    {
        //
    }
}
