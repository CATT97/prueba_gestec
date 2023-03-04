@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ __('Estudiantes') }}</h1>
        <hr>
    </div>
    <div class="d-flex justify-content-center">
        {{-- <form action="{{ route('usuarios.index') }}" method="get" class="d-flex">
            <label for="busqueda" class="col-form-label fs-5">Filtro</label>
            <input type="text" class="form-control mx-3" name="busqueda" value="{{ $busqueda }}" placeholder="Nombre o Documento">
            <input type="submit" class="btn btn-success" value="Buscar">
        </form>
        <form action="{{ route('usuarios.index') }}" method="get" class="d-flex">
            <input type="submit" class="btn btn-secondary mx-3" value="Limpiar">
        </form> --}}
        <a type="button" class="btn btn-primary" href="{{ route('estudiantes.create') }}">{{ __('Añadir') }}</a>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('Código') }}</th>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Prestamos') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->Cod_Estudiante }}</td>
                        <td>{{ $estudiante->Nombre }}</td>
                        <td><a type="button" class="btn btn-primary" href="{{ route('prestamos.show', ["prestamo" => $estudiante->id]) }}">{{ __('Ver') }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
