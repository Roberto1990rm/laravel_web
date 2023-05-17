@extends('layouts.app')

@section('content')

<h1>Quiénes somos</h1>

<div class="d-flex justify-content-center">
  <x-card name="Cervelab" map="s" urlImg="$urlImg">
    <x-slot name="place">
      Somos un agregador de las mejores cervecerías de España
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Teléfono: 666 555 444</li>
        <li class="list-group-item">Mail: cervelab@gmail.com</li>
        <li class="list-group-item">Whatsapp</li>
      </ul>
    </x-slot>
  </x-card>
</div>

@endsection
