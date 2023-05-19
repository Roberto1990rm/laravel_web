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
                <hr style="border-color: #000000;">
                <div class="d-flex justify-content-center"> 
                    <a href="{{ route('breweries.show', $brewery) }}" class="btn btn-primary" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); border: 2px solid #333; background: linear-gradient(to bottom, #2F855A, #48BB78); color: #FFF;">Ver más</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center" style="margin-top: 20px; margin-bottom: 40px">
    <a href="{{ route('breweries.create') }}" class="btn btn-primary btn-lg" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); background: linear-gradient(to bottom right, #f8ec04, #83bc62); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border: 2px solid #333; border-radius: 8px; padding: 10px 20px;">
        Añadir<br> <i class="fas fa-plus"></i>
    </a>
  </div>
  
  

  <div class="text-center mt-2 mb-5">
    <a href="{{ route('home') }}" class="btn btn-primary rounded-pill mb-5" style="background: linear-gradient(to right, #667eea, #764ba2); color: #FFFFFF; padding: 10px 20px;">
      <i class="fas fa-home"></i>
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

    @foreach ($breweries as $brewery)
        L.marker([{{ $brewery->latitude }}, {{ $brewery->longitude }}]).addTo(map)
            .bindPopup("{{ $brewery->nombre }} - {{ $brewery->poblacion }}");
    @endforeach
</script>
@endsection
