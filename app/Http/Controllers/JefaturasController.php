<?php

namespace App\Http\Controllers;

use App\Models\Jefaturas;
use Illuminate\Http\Request;
use App\Models\User;

class JefaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jefaturas = User::whereHas('roles', function ($query) {
            $query->where('name', 'like', '%jefatura%');
        })->get();
    
        return view('Jefaturas.viewJefaturas', compact('jefaturas'));
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
    public function show(Jefaturas $jefaturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jefaturas $jefaturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jefaturas $jefaturas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jefaturas $jefaturas)
    {
        //
    }
}
