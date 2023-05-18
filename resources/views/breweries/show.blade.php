@extends('layouts.app')

@section('title', $brewery->nombre)

@section('content')

    <br>

    <h1 class="custom-heading">Detalle de cervecería</h1>

    <div class="row d-flex justify-content-center w-100 m-0">
        <div class="col-sm-6">
            <div class="card mb-4" style="width: 100%; border-radius: 10px; background-color: #F5EFD6;">
                <img src="{{ asset('img/bar.jpg') }}" class="card-img-top" alt="{{ $brewery->nombre }}" style="padding: 5px; border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $brewery->nombre }}</h5>
                    <p class="card-text">{{ $brewery->poblacion }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="map-container" style="padding-bottom: 50px;">
        <div id="map" style="height: 300px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);"></div>
    </div>

    <div class="text-center">
        <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-pill mb-5" style="background-color: #7FBF7F; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding: 10px 20px;">Volver</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $brewery->latitude }}, {{ $brewery->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([{{ $brewery->latitude }}, {{ $brewery->longitude }}]).addTo(map);
    </script>
@endsection
