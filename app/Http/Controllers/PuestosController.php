<?php

namespace App\Http\Controllers;
use App\Models\Puestos;
use App\Models\User;
use Illuminate\Http\Request;

class PuestosController extends Controller
{
    public function index()
    {
        return view('puestos.viewPuestos');
    }

    public function add()
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
    public function show(Puestos $puestos)
    {
        //
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
    public function update(Request $request, Puestos $puestos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puestos $puestos)
    {
        //
    }
}
