@extends('layouts.app')

@section('title', $brewery->nombre)

@section('content')

    <br>

    <h1>Detalle de cervecería</h1>

    <div class="row d-flex justify-content-center w-100 m-0">
        <x-card name="{{ $brewery->nombre }}"
                place="{{ $brewery->poblacion }}"
                urlImg="{{ asset('img/bar.jpg') }}"
                urlBack="{{ route('breweries.index') }}">
        </x-card>
    </div>

    <div id="map" class="map-container"></div>

    <script>
        var map = L.map('map').setView([{{ $brewery->latitude }}, {{ $brewery->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([{{ $brewery->latitude }}, {{ $brewery->longitude }}]).addTo(map);
    </script>

@endsection