@extends('layouts.app')

@section('title', 'Bienvenido al portal de cervecerías')

@section('content')

<h1 class="custom-heading">Bienvenido al portal de cervecerías</h1>
<ul>
    @isset($breweries)
    @foreach ($breweries as $brewery)
    <li>{{ $brewery->nombre }} ({{ $brewery->poblacion }})</li>
    @endforeach
    @endisset
</ul>

<a href="{{ route('breweries') }}">
    <div class="d-flex justify-content-center align-items-center position-relative">
      <img src="{{ asset('img/bar.jpg') }}" class="container-fluid opacity-90 shadow rounded" style="width: 100%;">
      <a href="{{ route('breweries') }}" class="btn btn-danger round-button" style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background: radial-gradient(#cdb901, #c7066d); width: 75px; height: 75px; border-radius: 50%; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);">
        <span style="color: #FFFFFF; font-weight: bold; font-size: 15px;">Entrar</span>
      </a>
    </div>
  </a>
  
        
    </div>
</a>

<h3 class="yellowH2">Aquí encontrarás el mejor catálogo de cervecerías de España</h3>
<br><br>

@endsection
