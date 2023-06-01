@extends('layouts.app')

@section('title', 'Listado de cervecerías')

@section('content')

<style>
    .custom-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        border-radius: 0px;
        height: 100%;
        border: none; /* Elimina el borde de la card */
        background: linear-gradient(to bottom right, #FFE900, #FFED86, #FFF); /* Degradado diagonal hasta el blanco */
    }

    .custom-card .card-img-top {
        border-radius: 0;
        margin: 0;
        padding: 0;
        height: 200px; /* Altura fija de la imagen */
        object-fit: cover; /* Ajusta la imagen al contenedor */
    }

    .custom-card .card-title {
        color: #FF0000;
        text-decoration: none;
        text-shadow: 0 2px 4px rgba(228, 222, 222, 0.987);
        padding-top: 10px;
    }

    .custom-card .description-box {
        background-color: transparent;
        border: none;
        height: 100px;
        overflow: auto;
        padding: 0px;
        margin: 0px 0;
    }

    .custom-card .description-box p {
        color: #000;
        text-align: justify;
        margin: 0;
    }

    .custom-card .btn-primary {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        border: 2px solid #0056b3;
        background: linear-gradient(to bottom, #0099ff, #0056b3);
        color: #FFF;
        padding: 5px 10px;
        font-size: 85%;
        opacity: 0.8;
    }

    /* Estilos para tarjetas en modo móvil */
    @media (max-width: 575.98px) {
        .custom-card {
            height: auto;
        }

        .custom-card .card-img-top {
            height: 250px;
        }
    }

    /* Estilos para el contenedor principal */
    .main-container {
        max-width: 100%;
        padding: 0;
        margin: 0;
    }

    /* Estilos para el bloque del mapa */
    .map-container {
        margin-bottom: 30px;
    }

    /* Estilos para el bloque del encabezado */
    .custom-heading {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    /* Estilos para el bloque de las tarjetas */
    .card-container {
        margin-bottom: 30px;
    }

    /* Estilos para el bloque de la barra de navegación */
    .navbar-container {
        margin-bottom: 30px;
    }
</style>

<div class="navbar-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Navbar content -->
    </nav>
</div>

<div class="main-container">
    <div class="map-container">
        <div id="map" style="width: 100%; height: 300px; border-radius: 10px;"></div>
    </div>

    <h1 class="custom-heading">Listado de cervecerías</h1>

    <div class="card-container row">
        <div class="col-12">
            <div class="row">
                @foreach ($breweries as $brewery)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="custom-card card">
                        <div class="card-body text-center">
                            @if ($brewery->imagen && Storage::disk('public')->exists($brewery->imagen))
                                    <img src="{{ url('storage/' . $brewery->imagen) }}" class="card-img-top rounded-0" alt="{{ $brewery->nombre }}">
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" class="card-img-top rounded-0" alt="{{ $brewery->nombre }}">
                                @endif

                            <h4 class="card-title"><b>{{ $brewery->nombre }}</b></h4>
                            <div class="description-box">
                                <p class="card-text">{{ $brewery->descripcion }}</p>
                            </div>
                            <p class="card-text"><i><h6><b>{{ $brewery->poblacion }}</b></h6></i></p>
                            
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('breweries.show', $brewery) }}" class="btn btn-primary mb-4">Ver más</a>
                            </div>
                            @if ($brewery->user)
                                    <p class="card-text" style="text-align: justify; margin: 0;"><b>Cervecería creada</b> por: {{ $brewery->user->name }}</p>
                                @else
                                    <p class="card-text" style="text-align: justify; margin: 0;"><b>Creado por:</b> CerveLab</p>
                                @endif
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">

                    {{ $breweries->links('pagination::bootstrap-4') }}

                    
                    </div>
            </div>
        </div>
    </div>

</div>

<div class="navbar-container text-center mb-5 p-5">
    @auth
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('breweries.create') }}" class="btn btn-primary btn-sm mb-3">Añadir Cervecerías</a>
    @endauth

    @auth
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('breweries.proposals') }}" class="btn btn-primary btn-sm mb-3">Ver mis cervecerías</a>
    @endauth

    @guest
    Solo los usuarios registrados pueden añadir cervecerías
    @endguest

    <a class="nav-link" href="{{ route('home') }}" style="color: #dbd40c; margin-right: 5px; text-decoration: none;">
        <i class="fas fa-home" style="text-shadow: 2px 2px 4px rgba(8, 0, 0, 0.5);"></i>
        <b>HOME</b>
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([40.4168, -3.7038], 6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    map.setZoom(5);

    var breweries = @json($breweries);

    breweries.forEach(function(brewery) {
        L.marker([brewery.latitude, brewery.longitude]).addTo(map)
            .bindPopup(brewery.nombre + ' - ' + brewery.poblacion);
    });
</script>
@endsection
