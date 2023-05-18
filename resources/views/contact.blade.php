@extends('layouts.app')

@section('title', 'Contacta con nosotros')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-sm-6">
        <h2>Contacta con nosotros</h2>

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
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required/>
                <div class="invalid-feedback">
                    El correo electrónico es obligatorio.
                </div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Dinos cómo podemos ayudarte.</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
                <div class="invalid-feedback">
                    El mensaje es obligatorio.
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="privacy" required>
                <label class="form-check-label" for="privacy">Acepto la política de privacidad</label>
                <div class="invalid-feedback">
                    Debes aceptar la política de privacidad.
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Enviar</button>
        </form>
    </div>
</div>
<div class="text-center">
    <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-pill mb-5" style="background-color: #7FBF7F; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding: 10px 20px;">Volver a cervecerías</a>
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
