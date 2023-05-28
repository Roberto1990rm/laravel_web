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

    .background-animation {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        animation: backgroundAnimation 10s ease infinite;
    }

    @keyframes backgroundAnimation {
        0% {
            background-color: #423636;
        }
        50% {
            background-color: #f6cd5c;
        }
        100% {
            background-color: #30280798;
        }
    }

    .rounded-image {
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        width: 100%;
        max-width: 300px; /* Ajusta el tamaño máximo de la imagen redonda */
        margin-bottom: 30px;
        animation: heartbeat 1.5s ease-in-out infinite; /* Agrega la animación heartbeat al gif */
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
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        animation: heartbeat 1.5s ease-in-out infinite;
    }

    @keyframes heartbeat {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
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

    /* Ajuste para tablet */
    @media screen and (min-width: 768px) and (max-width: 991px) {
        .rounded-image {
            max-width: 450px; /* Aumenta el tamaño máximo de la imagen redonda para tablet */
        }
    }

    /* Ajuste para modo móvil */
    @media screen and (max-width: 767px) {
        .rounded-image {
            max-width: 225px; /* Reduce el tamaño máximo de la imagen redonda para móvil */
        }
    }

    /* Ajuste para pantallas grandes */
    @media screen and (min-width: 1024px) {
        .rounded-image {
            max-width: 600px; /* Aumenta el tamaño máximo de la imagen redonda */
        }
    }


    @media screen and (min-width: 2500px) {
        .rounded-image {
            max-width: 740px; /* Aumenta el tamaño máximo de la imagen redonda */
        }
    }
</style>

<div class="home-container">
    <div class="background-animation"></div>

    <h1 class="custom-heading mt-5 mb-5" onclick="window.location.href='{{ route('beers.index') }}';">Late al ritmo de tus cervezas favoritas</h1>

    <a href="{{ route('breweries.index') }}">
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

    
</div>

@endsection
