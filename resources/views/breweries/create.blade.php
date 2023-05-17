@extends('layouts.app')

@section('title', 'Nueva cervecería')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-sm-6">
        <h2>Nueva cervecería</h2>

        <form method="POST" action="{{ route('contact.store') }}" class="needs-validation" novalidate>
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
                    <label for="Longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control" id="Longitude" name="Longitude" required/>
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
            <button type="submit" class="btn btn-warning">Enviar</button>
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




CMBIAR INFO CREATE