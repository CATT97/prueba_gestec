<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Http\Controllers\Controller;
use App\Models\Estudiantes;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));
        $libros = Libros::where('Cod_Libro', 'like', '%' . $busqueda . '%')
            ->orWhere('Nombre', 'LIKE', '%' . $busqueda . '%')
            ->get();
        return view('libros.index', compact('libros','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Libros();
        $libro->Cod_Libro = $request->codigo;
        $libro->Nombre = $request->name;
        $libro->Disponible = true;
        $libro->save();
        return Redirect::route("libros.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Libros $libro)
    {
        $prestamo = Prestamo::where('Libro_id', '=', $libro->id)->latest('id')->get()[0];
        $estudiante = Estudiantes::find($prestamo->Estudiante_id);
        return view('prestamos.detallesprestamo', compact('libro', 'prestamo', 'estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libros $libros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libros $libros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libros $libros)
    {
        //
    }
}
