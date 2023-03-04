<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Http\Controllers\Controller;
use App\Models\Estudiantes;
use App\Models\Libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $libro = Libros::find($request->id);
        $estudiantes = Estudiantes::all();
        return view('prestamos.create', compact('libro','estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prestamo = new Prestamo();
        $prestamo->Libro_id = $request->codigo;
        $prestamo->Estudiante_id = $request->estudiante;
        $prestamo->FechaPrestamo = now();
        $prestamo->save();
        Libros::where('id', '=', $request->codigo)
                ->update(['Disponible' => false]);
        return Redirect::route("libros.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $prestamos = Prestamo::where('Estudiante_id', '=', $request->prestamo)->get();
        $libros = Libros::all();
        $estudiantes = Estudiantes::all();
        return view('prestamos.prestamoestudiante', compact('prestamos','libros','estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Prestamo $prestamo)
    {
        Libros::where('id', '=', $prestamo->Libro_id)
                ->update(['Disponible' => true]);
        Prestamo::where('id','=',$prestamo->id)
                ->delete();
        return Redirect::route("libros.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
