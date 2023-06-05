@extends('layouts.app')

@section('title', 'Listado de cervecerías')

@section('content')


<div class="main-container">
    <div class="map-container">
        <div id="map" style="width: 100%; height: 300px; border-radius: 10px;"></div>
    </div>

    <h1 class="custom-heading">Listado de cervecerías</h1>

    <div>
        @livewire('search')
    </div>

    <div class="navbar-container text-center mb-5 p-5">
        @auth
        <div class="d-flex flex-column align-items-center">
            <a href="{{ route('breweries.create') }}" class="btn btn-primary btn-sm mb-3">Añadir Cervecerías</a>
        </div>
        <div class="d-flex flex-column align-items-center">
            <a href="{{ route('breweries.proposals') }}" class="btn btn-primary btn-sm mb-3">Ver mis cervecerías</a>
        </div>
        @endauth

        @guest
        <p>Solo los usuarios registrados pueden añadir cervecerías</p>
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

</div>

@livewireScripts
@endsection
