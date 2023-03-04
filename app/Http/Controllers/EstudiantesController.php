<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiantes::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiantes();
        $estudiante->Cod_Estudiante = $request->codigo;
        $estudiante->Nombre = $request->name;
        $estudiante->save();
        return Redirect::route("estudiantes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
