@extends('layouts.app')

@section('title', 'Listado de cervecerías')

@section('content')
    <br>
    <h1>Listado de cervecerías</h1>

    <div id="map" style="width: 100%; height: 400px; margin-bottom: 1cm;"></div>

    <div class="row">
        @foreach ($breweries as $brewery)
            <div class="col-sm-4">
                <div class="card mb-4">
                    <img src="{{ asset('img/bar.jpg') }}" class="card-img-top" alt="{{ $brewery->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $brewery->nombre }}</h5>
                        <p class="card-text">{{ $brewery->descripcion }}</p>
                        <p class="card-text">{{ $brewery->poblacion }}</p>
                        <a href="{{ route('breweries.show', $brewery->id) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <a href="{{ route('breweries.create') }}" class="btn btn-danger mb-5">Añadir Cervecería</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        @foreach ($breweries as $brewery)
            L.marker([{{ $brewery->latitude }}, {{ $brewery->longitude }}]).addTo(map)
                .bindPopup("{{ $brewery->nombre }} - {{ $brewery->poblacion }}");
        @endforeach
    </script>
@endsection
