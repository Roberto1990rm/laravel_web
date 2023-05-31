@extends('layouts.app')

@section('title', 'Listado de cervezas')

@section('content')

<style>
    .card-img-top {
        height: 600px;
        object-fit: cover;
        border: none;
        opacity: 0.90;
    }
    
    .card {
        border: none;
        box-shadow: none;
        opacity: 0.95;
        background: linear-gradient(45deg, yellow, orange);
    }
    
    .place {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    
    .place img {
        width: 20px;
        height: 20px;
        margin-right: 3px;
    }
    
    .place img:last-child {
        margin-right: 0;
    }

    .place {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 2px;
        margin-bottom: 2px;
        overflow: hidden;
    }

    .description-box {
        max-height: 100px; /* Establece la altura máxima de la caja de descripción */
        overflow-y: auto; /* Habilita el scroll vertical si el contenido excede la altura máxima */
        background: transparent; /* Establece el fondo invisible */
    }
</style>

<h1 class="custom-heading">Aquí vienen las cervezas</h1>

<div class="d-flex row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 m-3" style="height: 100%;">
    @foreach ($beers as $beer)
    <div class="col-sm-4">
        <div class="card h-100">
            <img src="{{ $beer->imagen ? url('storage/' . $beer->imagen) : asset('img/default-beer.jpg') }}" class="card-img-top" alt="{{ $beer->nombre }}">
            <div class="card-body">
                <h5 class="card-title mb-2" style="color:brown";><b>{{ $beer->nombre }}</b></h5>
                <p class="card-text mb-2"><i>{{ $beer->marca }}</i></p>
                <div class="description-box">
                    <p class="card-text">{{ $beer->descripcion }}</p>
                </div>
            </div>
            <div class="card-footer d-flex flex-column align-items-center justify-content-center">
                <div class="place mt-2 mb-2 ms-2 me-2 text-center">
                    @php
                        $beerCount = 10;
                        $vol = $beer->vol;
                        $wholeLogos = floor($vol); // Número de logos enteros
                        $partialLogo = $vol - $wholeLogos; // Porción del último logo
                    @endphp
                    
                    @for ($i = 1; $i <= $beerCount; $i++)
                        @if ($i <= $wholeLogos)
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 20px; height: 20px; margin-right: 3px;">
                        @elseif ($i == $wholeLogos + 1 && $partialLogo > 0) 
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 20px; height: 20px; margin-right: 0; clip-path: inset({{ 20 - $partialLogo * 20 }}px 0 0 0);">
                        @else 
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 20px; height: 20px; margin-right: 3px; opacity: 0.4;">
                        @endif
                    @endfor
                </div>
                
            </div>
            <div class="card-footer d-flex flex-column align-items-center justify-content-center">
                <b>{{ $beer->vol }}°</b>
                <a href="{{ route('beers.show', $beer) }}" class="btn btn-primary mt-4">Ver más</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">

{{ $beers->links() }}

</div>
<div class="text-center mb-5 p-5">
    @auth
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('beers.create') }}" class="btn btn-primary btn-sm mb-3">Añadir Cerveza</a>
    @endauth
    @guest
        Solo los usuarios registrados pueden añadir cerveza
    @endguest
    <a class="nav-link" href="{{ route('beers.index') }}" style="color: #138906; margin-right: 5px; text-decoration: none;"><i class="fas fa-home" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i><b>Inicio</b></a>
</div>

@endsection
