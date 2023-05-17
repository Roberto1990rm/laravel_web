@extends('layouts.app')

@section('title', 'Bienvenido al portal de cervecerías')

@section('content')

<h1>Bienvenido al portal de cervecerías</h1>

<br>
Hola
@isset($nombre)
{{$nombre}}
@endisset

<br>
Me han dicho que estás en el curso
@isset($curso)
{{ $curso }}
@endisset
<br>
Estas son nuestras cervecerías favoritas:
<br>
<ul>
    @isset($breweries)
    @foreach ($breweries as $brewery)
    <li>{{ $brewery->nombre }} ({{ $brewery->poblacion }})</li>
    @endforeach
    @endisset
</ul>

<br>&nbsp;<br>
<img src="{{ asset('img/vaso.jpg') }}" class="container-fluid" style="height: 800px; width: 500px;"><br><br>

@endsection
