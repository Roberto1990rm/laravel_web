@extends('layouts.app')

@section('title', 'Modificar cervecería')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-sm-6">
            <h2 class="pt-3 pb-3">Modificar cervecería</h2>
            <form method="POST" action="{{ route('breweries.update', ['id' => $brewery->id]) }}" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $brewery->nombre) }}" required/>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $brewery->descripcion) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="place" class="form-label">Localidad</label>
                    <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{ old('place', $brewery->localidad) }}" required/>
                    @error('place')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude', $brewery->longitud) }}" required/>
                    @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitud</label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude', $brewery->latitud) }}" required/>
                    @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success mx-auto">Enviar</button>
                    </div>
                </div>
            </form>

            <div class="row mb-5">
                <div style="display: flex; justify-content: center;">
                    <div class="text-center">
                        <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-pill mb-5" style="background-color: #7FBF7F; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding: 10px 20px;">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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
