@extends('layouts.app')

@section('title', 'Listado de cervezas')

@section('content')

<style>

    
    .card-img-top {
        height: 450px; /* Altura fija para todas las tarjetas */
        object-fit: cover; /* Ajuste de imagen dentro del contenedor */
    }
    
    .place {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 2px;
        margin-bottom: 2px;
    }

    .card:hover {
        transform: translateY(-5px);
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
        max-height: 100px;
        overflow-y: auto;
        background: transparent;
    }

    .card {
        width: 400px; /* Ancho fijo para todas las tarjetas */
        height: 800px; /* Alto fijo para todas las tarjetas */
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        opacity: 0.95;
        background: linear-gradient(45deg, yellow, orange);
        margin: 10px; /* Agregamos un margen para separar las tarjetas */
    }
   

    

    #beer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 60px;
    }

    @media (max-width: 768px) {
        .card {
            /* Ajustar el ancho de las tarjetas en dispositivos móviles si es necesario */
            width: 100%;
        }
    }

    #button-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    #loading-indicator {
        display: none;
        margin-top: 10px;
        text-align: center;
    }

    #home-button {
        margin-bottom: 20px;
    }

    /* Estilos para la última tarjeta de cerveza */
    .last-beer {
        background-color: lightblue;
    }
</style>


<h1 class="custom-heading">Aquí vienen las cervezas</h1>

<div id="beer-container">
    @foreach($beers as $beer)
        <div class="card  @if ($loop->last) last-beer @endif">
            <img src="{{ $beer->imagen ? url('storage/' . $beer->imagen) : ($beer->imagen_portada ? url('storage/' . $beer->imagen_portada) : asset('/img/default-beer.jpg')) }}" class="card-img-top" alt="{{ $beer->nombre }}">

            <div class="card-body">
                <h5 class="card-title mb-2" style="color:brown;"><b>{{ $beer->nombre }}</b></h5>
                <p class="card-text mb-2"><i>{{ $beer->marca }}</i></p>
                <div class="description-box">
                    <p class="card-text" style="max-height: 100px; overflow-y: auto;">{{ $beer->descripcion }}</p>
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
    @endforeach
</div>

<div id="button-container">
    <div id="loading-indicator" class="text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
@auth
    <div id="create-button" class="text-center">
        <a href="{{ route('beers.create') }}" class="btn btn-primary">Añadir cerveza</a>
    </div>
@endauth

@guest
    <div id="create-button" class="text-center">
        <p>Debes estar registrado para añadir cervezas.</p>
    </div>
@endguest
<div id="home-button" class="text-center" style="margin-bottom: 80px;margin-top: 20px;">
    <a href="/" class="btn btn-primary">
        <i class="bi bi-house" style="font-size: 1rem;"></i>
        Home
    </a>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var page = 1;
    var isLoading = false;
    var pageUrl = '{{ $beers->nextPageUrl() }}'; // Obtener la URL de la siguiente página

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() && !isLoading) {
            loadMoreBeers();
        }
    });

    function loadMoreBeers() {
        if (!pageUrl) {
            $("#loading-indicator").hide();
            $("#button-container").html('<p>No hay más cervezas disponibles.</p>');
            return;
        }

        isLoading = true;
        $("#loading-indicator").show();

        $.ajax({
            url: pageUrl,
            dataType: 'json',
            success: function (response) {
                if (response.view.trim() !== '') {
                    $("#beer-container").append(response.view);
                    pageUrl = response.nextPageUrl; // Actualiza la URL de la página siguiente
                } else {
                    $("#button-container").html('<p>No hay más cervezas disponibles.</p>');
                    $(window).off('scroll'); // Desactiva el evento de desplazamiento
                }
                isLoading = false;
                $("#loading-indicator").hide();
            },
            error: function () {
                isLoading = false;
                $("#loading-indicator").hide();
            }
        });
    }
</script>


@endsection
