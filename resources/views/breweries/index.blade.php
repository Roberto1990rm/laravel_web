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
            <img src="{{ asset('img/bar.jpg') }}" class="card-img-top" alt="{{ $brewery->nombre }}" style="padding: 5px;">
            <div class="card-body text-center">
                <h5 class="card-title" style="color: #FF0000;">{{ $brewery->nombre }}</h5>
                <p class="card-text"><i>{{ $brewery->descripcion }}</i></p>
                <p class="card-text"><b>{{ $brewery->poblacion }}</b></p>
                <div class="d-flex flex-column align-items-center">
                    <a href="{{ route('breweries.show', $brewery) }}" class="btn btn-primary mb-2" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); border: 2px solid #ff7b00; background: linear-gradient(to bottom, #e06c14db, #bba448, #01230f); color: #FFF; padding: 5px 10px; font-size: 85%; opacity: 0.8;">Ver más</a>
                    <a href="{{ route('breweries.edit', ['id' => $brewery->id]) }}" class="btn btn-primary rounded-circle" style="background-color: #e13816; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);opacity: 0.70;">
                        <i class="fas fa-edit"></i>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center mb-5 p-5">
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('breweries.create') }}" class="btn btn-primary btn-sm mb-3" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); background: linear-gradient(to bottom right, #f7d304, #ffd000); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border: 2px solid #333; border-radius: 8px; padding: 6px 12px; line-height: 1; opacity: 0.75;">
            <span style="font-size: 14px; margin: 0 auto;">Añadir Cervecerías</span>
        </a>

        <a href="{{ route('home') }}" class="btn btn-primary rounded-pill" style="background: linear-gradient(to right, #66ea90, #4ba278); color: #FFFFFF; padding: 10px 20px; margin-bottom: 10px;">
            <i class="fas fa-home"></i>
        </a>
    </div>
</div>

</div>

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
