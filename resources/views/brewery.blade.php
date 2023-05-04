@extends('layouts.app')

@section('title', $brewery["nombre"] )

@section('content')

    <br>
   <h1>Detalle de cervecerías</h1>

  <div class="row d-flex justify-content-center w-100 m-0">
<div class="col-sm-6">
<div class="card my-3 w-100">
  <img src="{{ asset ('/img/bar.jpg') }}" class="card-img-top" alt="{{ $brewery["nombre"] }}">
  <div class="card-body">
    <h5 class="card-title">{{ $brewery["nombre"] }}</h5>
    <p class="card-title">{{ $brewery["poblacion"] }}</p>
    <a href="{{ route('breweries') }}" class="btn btn-primary">volver</a>
  </div>
</div>
</div>


  </div>

@endsection

//continuar desde añadir contacto y arreglar.
