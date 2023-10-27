<?php

namespace App\Http\Controllers;

use App\Models\puestos;
use Illuminate\Http\Request;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('puestos.addPuestos');
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
    public function show(puestos $puestos)
    {
        return view('puestos.viewPuestos');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(puestos $puestos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, puestos $puestos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(puestos $puestos)
    {
        //
    }
}
