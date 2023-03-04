@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar estudiante') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('estudiantes.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="codigo" class="col-md-4 col-form-label text-md-end">{{ __('Código') }}</label>

                                <div class="col-md-6">
                                    <input id="codigo" type="text"
                                        class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                                        value="{{ old('codigo') }}" required autocomplete="codigo" autofocus>

                                    @error('codigo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar') }}
                                        </button>
                                        <a type="button" class="btn btn-secondary"
                                            href="{{ route('estudiantes.index') }}">{{ __('Volver') }}</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
