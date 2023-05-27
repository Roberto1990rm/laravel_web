@extends('layouts.app')

@section('title', 'Nueva cervecería')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-sm-6">
        <h2 class="pt-3 pb-3">Nueva cervecería</h2>

        @isset($errors)
        @foreach ($errors->all () as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
        @endisset

        <form method="POST" action="{{ route('breweries.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required/>
                <div class="invalid-feedback">
                    El nombre es obligatorio.
                </div>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
                <div class="invalid-feedback">
                    La descripción es obligatoria.
                </div>
            </div>
            <div class="mb-3">
                <label for="poblacion" class="form-label">Localidad</label>
                <input type="text" class="form-control" id="poblacion" name="poblacion" value="{{ old('poblacion') }}" required/>
                <div class="invalid-feedback">
                    La localidad es obligatoria.
                </div>
            </div>
            <div class="mb-3">
                <label for="calle" class="form-label">Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" value="{{ old('calle') }}" required/>
                <div class="invalid-feedback">
                    La calle es obligatoria.
                </div>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitud</label>
                <input type="decimal" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}" required/>
                <div class="invalid-feedback">
                    La longitud es obligatoria.
                </div>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitud</label>
                <input type="decimal" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}" required/>
                <div class="invalid-feedback">
                    La latitud es obligatoria.
                </div>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>

            <div class="row mb-3">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-warning mx-auto">Enviar</button>
                </div>
            </div>

            <div class="row mb-5">
                <div style="display: flex; justify-content: center;">
                    <div class="text-center">
                        <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-circle" style="background-color: #7f9ebf; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
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
