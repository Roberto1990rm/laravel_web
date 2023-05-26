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
        <div class="custom-card card mb-4 mt-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 10px;">
            <div class="card-body text-center">
                @if ($brewery->imagen)
    <img src="{{ url('storage/' . $brewery->imagen) }}" class="card-img-top rounded" alt="{{ $brewery->nombre }}" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
@else
<img src="{{ asset('img/birras.jpeg') }}" class="card-img-top rounded" alt="{{ $beer->nombre }}" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
@endif


                <h4 class="card-title" style="color: #FF0000; text-decoration: none; text-shadow: 0 2px 4px rgba(228, 222, 222, 0.987); padding-top: 10px;"><b>{{ $brewery->nombre }}</b></h4>
                <div class="description-box" style="background-color: #F8F8E0; border: 1px solid #CCC; border-radius: 5px; height: 100px; overflow-y: auto; padding: 5px; margin: 10px 0;">
                    <p class="card-text" style="text-align: justify;">{{ $brewery->descripcion }}</p>
                </div>
                <p class="card-text"><i><h6>{{ $brewery->poblacion }}</h6></i></p>
                <div class="d-flex flex-column align-items-center">
                    <a href="{{ route('breweries.show', $brewery) }}" class="btn btn-primary mb-2" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); border: 2px solid #ff7b00; background: linear-gradient(to bottom, #15fc04fd, #59b336, #28b361); color: #FFF; padding: 5px 10px; font-size: 85%; opacity: 0.8;">Ver más</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center mb-5 p-5">
@auth
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('breweries.create') }}" class="btn btn-primary btn-sm mb-3" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); background: linear-gradient(to bottom right, #f7d304, #ffd000); box-shadow: 0 4px 8px #0000004d; border: none; border-radius: 8px; padding: 10px 20px; font-size: 14px; color: #fff; opacity: 0.9;">
            Añadir Cervecerías
        </a>
@endauth

@guest
Solo los usuarios registrados puede añadir cervecerías
@endguest
    

        <a class="nav-link" href="{{ route('home') }}" style="color: #138906; margin-right: 5px; text-decoration: none;">
            <i class="fas fa-home" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
            Inicio
        </a>
        
    </div>
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
