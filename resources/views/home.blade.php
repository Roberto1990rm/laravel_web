@extends('layouts.app')

@section('title', 'Bienvenido al portal de cervecerías')

@section('content')

<h1>Bienvenido al portal de cervecerías</h1>
<h3 class="yellowH2">Aquí encontrarás el mejor catálogo de cervecerías de España</h3>
<ul>
    @isset($breweries)
    @foreach ($breweries as $brewery)
    <li>{{ $brewery->nombre }} ({{ $brewery->poblacion }})</li>
    @endforeach
    @endisset
</ul>



<a href="{{ route('breweries') }}">
    <div class="d-flex justify-content-center align-items-center mb-2 position-relative">
        <img src="{{ asset('img/cervezas.webp') }}" class="container-fluid opacity-90" style="width: 100%;">
        <a href="{{ route('breweries') }}" class="btn btn-danger round-button" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%);">Ver Cervecerías</a>
      </div>
      
</a>
<br><br>

@endsection
