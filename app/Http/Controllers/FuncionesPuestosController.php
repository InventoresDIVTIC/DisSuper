<?php

namespace App\Http\Controllers;

use App\Models\FuncionesPuestos;
use Illuminate\Http\Request;

class FuncionesPuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('funciones_puestos.viewFuncionesPuestos');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FuncionesPuestos $funcionesPuestos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuncionesPuestos $funcionesPuestos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuncionesPuestos $funcionesPuestos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuncionesPuestos $funcionesPuestos)
    {
        //
    }
}
