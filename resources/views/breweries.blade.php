@extends('layouts.app')

@section('title', 'Listado de cervecerías')

@section('content')


    <br>
   <h1>Listado de cervecerías</h1>

  <div class="row d-flex justify-content-between w-100 m-0">

@foreach ( $breweries as $brewery )

<div class="col-sm-4">
<div class="card my-3 w-100">
  <img src="{{ asset ('/img/bar.jpg') }}" class="card-img-top" alt="{{ $brewery["nombre"] }}">
  <div class="card-body">
    <h5 class="card-title">{{ $brewery["nombre"] }}</h5>
    <p class="card-text"{{ $brewery["nombre"] }}>
    <a href="{{ route('brewery', $brewery["id"]) }}" class="btn btn-primary">Ver más</a>
  </div>
</div>
</div>
@endforeach

  </div>


@endsection