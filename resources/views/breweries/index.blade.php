@extends('layouts.app')

@section('title', 'Listado de cervecerías')

@section('content')
    
<h1 class="custom-heading">Listado de cervecerías</h1>

<div class="map-container" style="background: linear-gradient(135deg, #D2F7C7, #FDECEC); border-radius: 10px; box-shadow: 0 4px 6px rgba(57, 152, 79, 0.5); padding-bottom: 50px;">
    <div id="map" style="width: 100%; height: 300px; border-radius: 10px; margin-bottom: -50px;"></div>
</div>

<div class="row">
    @foreach ($breweries as $brewery)
    <div class="col-sm-4">
        <div class="custom-card card mb-4 mt-4">
            <img src="{{ asset('img/bar.jpg') }}" class="card-img-top" alt="{{ $brewery->nombre }}" style="padding: 5px;">
            <div class="card-body text-center">
                <h5 class="card-title" style="color: #FF0000;">{{ $brewery->nombre }}</h5>
                <p class="card-text">{{ $brewery->descripcion }}</p>
                <p class="card-text">{{ $brewery->poblacion }}</p>
                <hr style="border-color: #000000;">
                <div class="d-flex justify-content-center"> 
                    <a href="{{ route('breweries.show', $brewery) }}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center" style="margin-top: 15px;">
    <a href="{{ route('breweries.create') }}" class="btn btn-danger mb-5" style="box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);">Añadir Cervecería</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([40.4168, -3.7038], 6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    map.setZoom(5); 

    @foreach ($breweries as $brewery)
        L.marker([{{ $brewery->latitude }}, {{ $brewery->longitude }}]).addTo(map)
            .bindPopup("{{ $brewery->nombre }} - {{ $brewery->poblacion }}");
    @endforeach
</script>
@endsection
