@extends('layouts.app')

@section('title', 'Nueva cerveza')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-sm-6">
        <h2 class="pt-3 pb-3">Nueva cerveza</h2>

        @isset($errors)
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
        @endisset

        <form method="POST" action="{{ route('beers.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
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
                <label for="marca" class="form-label">marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}" required/>
                <div class="invalid-feedback">
                    La marca es obligatoria.
                </div>
            </div>
            <div class="mb-3">
                <label for="vol" class="form-label">vol</label>
                <input type="decimal" class="form-control" id="vol" name="vol" value="{{ old('vol') }}" required/>
                <div class="invalid-feedback">
                    vol es obligatorio.
                </div>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio orientativo</label>
                <input type="decimal" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required/>
                <div class="invalid-feedback">
                    precio es obligatorio a modo orientativo.
                </div>
            </div>
            
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>


            <div class="mb-3 mt-3 row">
                <label for="breweries" class="form-label" style="color: #FFFFFF">Dónde beberla</label>
                @foreach ($breweries as $brewery )
                <div class="col-md-6 p-2" style="color: #FFFFFF">
                    {{ $brewery->nombre }}
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="breweries[]" value="{{ $brewery->id }}" role="switch" id="brewery_{{ $brewery->id }}">
                        <label class="form-check-label" for="brewery_{{ $brewery->id }}"> </label>
                      </div>
                </div>
                @endforeach

            </div>


            <div class="row mb-3">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-warning mx-auto">Enviar</button>
                </div>
            </div>

            <div class="row mb-5">
                <div style="display: flex; justify-content: center;">
                    <div class="text-center">
                        <a href="{{ route('beers.index') }}" class="btn btn-primary rounded-circle" style="background-color: #7f9ebf; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
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
