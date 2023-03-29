@extends('layouts.app')

@section('content')
    @if ($libro->Disponible == true)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Prestar libro') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('prestamos.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="codigolibro"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Código Libro') }}</label>

                                <div class="col-md-6">
                                    <input id="codigolibro" type="text"
                                        class="form-control @error('codigolibro') is-invalid @enderror" name="codigolibro"
                                        value="{{ $libro->Cod_Libro }}" required autocomplete="codigolibro" disabled>

                                    <input type="text" name="codigo" value="{{ $libro->id }}" hidden>

                                    @error('codigolibro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $libro->Nombre }}" required autocomplete="name" disabled>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="estudiante"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Estudiante') }}</label>

                                <div class="col-md-6">
                                    <select id="estudiante" class="form-control @error('estudiante') is-invalid @enderror"
                                        name="estudiante" required>
                                        @foreach ($estudiantes as $estudiante)
                                            <option value="{{$estudiante->id}}">{{$estudiante->Cod_Estudiante}} - {{$estudiante->Nombre}}</option>
                                        @endforeach
                                    </select>

                                    @error('estudiante')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Prestar') }}
                                    </button>
                                    <a type="button" class="btn btn-secondary"
                                        href="{{ route('libros.index') }}">{{ __('Volver') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div>
        <h1 class="text-center">El libro no esta disponible</h1>
    </div>
    @endif

@endsection
