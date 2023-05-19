@extends('layouts.app')

@section('title', 'Nueva cervecería')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-sm-6">
        <h2 class="pt-3 pb-3">Nueva cervecería</h2>

        <form method="POST" action="{{ route('breweries.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required/>
                <div class="invalid-feedback">
                    El nombre es obligatorio.
                </div>
            </div>
            <div class="mb-3">
            <div class="mb-3">
                <label for="description" class="form-label">Descripción.</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
                <div class="invalid-feedback">
                    La descripción es obligatoria.
                </div>
            </div>
                <div class="mb-3">
                    <label for="place" class="form-label">Localidad</label>
                    <input type="text" class="form-control" id="place" name="place" required/>
                    <div class="invalid-feedback">
                        La localidad  es obligatoria.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" required/>
                    <div class="invalid-feedback">
                        La longitud es es obligatoria.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitud</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" required/>
                    <div class="invalid-feedback">
                        La latitud es obligatoria.
                    </div>
                </div>
            </div>
            <div class="conteiner justify-content-center">
                <div class="row" style="display: flex; justify-content: center;">
                    <button type="submit" class="col-2 mb-5 btn btn-warning">Enviar</button>
                </div>
                <div class="row mb-5">
                    <div style="display: flex; justify-content: center;">
                        <a href="{{ route('home') }}" class="btn btn-primary rounded-circle" style="width: 60px; height: 60px; padding-top: 1px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); background: linear-gradient(to bottom, #FCD307, #FFDF00); color: #FFFFFF; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border: 2px solid #333; display: flex; align-items: center; justify-content: center; font-weight: bold; text-transform: uppercase; text-decoration: none;">
                            Home
                        </a> 
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




