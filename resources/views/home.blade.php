@extends('layouts.app')

@section('title', 'Bienvenido al portal de cervecerías')

@section('content')

<style>
    .home-container {
        position: relative;
        overflow: hidden;
        height: 100vh; /* Ajusta la altura del contenedor a la altura de la ventana */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #FFFFFF;
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        z-index: -1;
    }

    .rounded-image {
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        width: 100%;
        max-width: 300px; /* Ajusta el tamaño máximo de la imagen redonda */
        margin-bottom: 30px;
    }

    .enter-icon {
        color: #FFFFFF;
        font-size: 30px;
    }

    body, html {
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .full-width {
        width: 100vw;
        height: 100vh;
    }

    .custom-heading {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .fixed-icon {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 999;
        font-size: 24px;
        color: #FFFFFF;
        cursor: pointer;
    }

    .fixed-icon:hover {
        color: #FF0000;
    }

    .enter-button {
        background-color: #FF0000;
        color: #FFFFFF;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .enter-button:hover {
        background-color: #CC0000;
    }

    .card-header {
        margin-top: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #000000; /* Cambia el color del texto a negro */
    }
</style>

<div class="home-container">
    <div class="background-image" style="background-image: url('{{ asset('img/madera3.jpeg') }}');"></div>

    <h1 class="custom-heading pb-4">Bienvenido al portal de cervecerías</h1>
    <ul>
        @isset($breweries)
        @foreach ($breweries as $brewery)
        <li>{{ $brewery->nombre }} ({{ $brewery->poblacion }})</li>
        @endforeach
        @endisset
    </ul>

    <a href={{ route('breweries.index') }}>
        <img src="{{ asset('img/bar12.gif') }}" class="rounded-image" style="opacity: 0.8; filter: alpha(opacity=50);">
    </a>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('Aquí encontrarás lo mejor de todas las variedades de cervezas') }}
    </div>

    <div class="enter-button mt-5">
        <a href="{{ route('breweries.index') }}" class="enter-button">Ingresar</a>
    </div>
</div>

@endsection
