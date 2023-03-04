@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ __('Detalles del prestamo') }}</h1>
        <hr>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ __('Nombre del libro: ') }}{{ $libro->Nombre }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ __('Código: ') }}{{ $libro->Cod_Libro }}</h6>
                <p class="card-text">{{ __('Prestador por: ') }}{{ $estudiante->Nombre }}</p>
                <p class="card-text">{{ __('Fecha de prestamo: ') }}{{ $prestamo->FechaPrestamo }}</p>
                <form action="{{route('prestamos.update', $prestamo)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">{{ __('Devolver libro') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
