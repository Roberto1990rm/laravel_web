@extends('layouts.app')

@section('content')

<h1 class="custom-heading">Quiénes somos</h1>

<div class="d-flex flex-column align-items-center mt-5 pt-5">
  <x-card name="Cervelab" map="s" urlImg="$urlImg" style="width: 100%; max-width: 600px; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);">
    <x-slot name="place">
      Somos un agregador de las mejores cervecerías de España
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <i class="fas fa-phone" style="margin-right: 3px;"></i>
          <strong>Teléfono:</strong>
          <a href="tel:666555444">666 555 444</a>
        </li>
        <li class="list-group-item">
          <i class="fas fa-envelope" style="margin-right: 3px;"></i>
          <strong>Email:</strong>
          <a href="mailto:cervelab@gmail.com">cervelab@gmail.com</a>
        </li>
        <li class="list-group-item">
          <i class="fab fa-whatsapp" style="margin-right: 3px;"></i>
          <strong>Whatsapp:</strong>
          <a href="https://wa.me/666555444">666 555 444</a>
        </li>
      </ul>
    </x-slot>
  </x-card>

  <div class="text-center mt-1 mb-5">
    <a class="nav-link" href="{{ route('home') }}" style="color: #04c9d7; margin-right: 5px;">
      <i class="fas fa-home" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
    </a>
  </div>
  
</div>

@endsection
