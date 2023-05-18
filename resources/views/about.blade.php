@extends('layouts.app')

@section('content')

<h1 class="custom-heading">Quiénes somos</h1>

<div class="d-flex flex-column align-items-center">
  <x-card name="Cervelab" map="s" urlImg="$urlImg" style="width: 75%; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);">
    <x-slot name="place">
      Somos un agregador de las mejores cervecerías de España
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Teléfono: <a href="tel:666555444">666 555 444</a></li>
        <li class="list-group-item">Mail: <a href="mailto:cervelab@gmail.com">cervelab@gmail.com</a></li>
        <li class="list-group-item">Whatsapp: <a href="https://wa.me/666555444">666 555 444</a></li>
      </ul>
    </x-slot>
  </x-card>

  <div class="text-center mt-2 mb-5">
    <a href="{{ route('home') }}" class="btn btn-primary rounded-pill" style="background: linear-gradient(to right, #667eea, #764ba2); color: #FFFFFF; padding: 10px 20px;">Volver al inicio</a>
  </div>
</div>

@endsection
