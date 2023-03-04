@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ __('Libros') }}</h1>
        <hr>
    </div>
    <div class="d-flex justify-content-center">
        <form action="{{ route('libros.index') }}" method="get" class="d-flex">
            <label for="busqueda" class="col-form-label fs-5">{{ __('Filtro') }}</label>
            <input type="text" class="form-control mx-3" name="busqueda" value="{{ $busqueda }}" placeholder="Código o nombre">
            <input type="submit" class="btn btn-success" value="Buscar">
        </form>
        <form action="{{ route('libros.index') }}" method="get" class="d-flex">
            <input type="submit" class="btn btn-secondary mx-3" value="Limpiar">
        </form>
        <a type="button" class="btn btn-primary" href="{{ route('libros.create') }}">{{ __('Añadir') }}</a>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('Código') }}</th>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Disponible') }}</th>
                    <th>{{ __('Opciones') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->Cod_Libro }}</td>
                        <td>{{ $libro->Nombre }}</td>
                        @if ($libro->Disponible)
                            <td>{{ __('SI') }}</td>
                            <td><a type="button" class="btn btn-success" href="{{ route('prestamos.create', ["id" => $libro->id]) }}">{{ __('Prestar') }}</a></td>
                        @else
                            <td>{{ __('NO') }}</td>
                            <td><a type="button" class="btn btn-danger" href="{{ route('libros.show', $libro)}}">{{ __('Info. Prestamo') }}</a></td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
