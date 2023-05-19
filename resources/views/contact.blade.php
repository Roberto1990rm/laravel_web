@extends('layouts.app')

@section('title', 'Contacta con nosotros')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-sm-6">
        <h2 class="mt-3">Contacta con nosotros</h2>

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
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-warning mx-auto">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="text-center mt-2 mb-5">
    <a href="{{ route('home') }}" class="btn btn-primary rounded-pill" style="background: linear-gradient(to right, #5bd11792, #82a24b); color: #FFFFFF; padding: 10px 20px;">
      <i class="fas fa-home"></i>
    </a>
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
