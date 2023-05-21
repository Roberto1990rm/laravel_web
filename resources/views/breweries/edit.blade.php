@extends('layouts.app')

@section('title', 'Modificar cerveceria')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-sm-6">
            <h2 class="pt-3 pb-3">Modificar cervecería</h2>
            <form method="POST" action="{{ route('breweries.update', ['id' => $brewery->id]) }}" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="nombre" value="{{ old('nombre', $brewery->nombre) }}" required/>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="descripcion" required>{{ old('descripcion', $brewery->descripcion) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="place" class="form-label">Localidad</label>
                    <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="poblacion" value="{{ old('poblacion', $brewery->poblacion) }}" required/>
                    @error('place')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Calle</label>
                    <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="calle" value="{{ old('calle', $brewery->calle) }}" required/>
                    @error('street')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude', $brewery->longitude) }}" required/>
                    @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitud</label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude', $brewery->latitude) }}" required/>
                    @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success mx-auto">Guardar</button>
                    </div>
                </div>
            </form>

            <div class="row mb-5">
                <div style="display: flex; justify-content: center;">
                    <div class="text-center">
                        <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-circle" style="background-color: #7f9ebf; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
