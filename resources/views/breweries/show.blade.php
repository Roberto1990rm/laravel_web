@extends('layouts.app')

@section('title', $brewery->nombre)

@section('content')

    <br>

    <h1 class="custom-heading">Detalle de cervecería</h1>

    <div class="row d-flex justify-content-center w-100 m-0">
        <div class="col-sm-6">
            <div class="card mb-4" style="width: 100%; border-radius: 10px; background-color: #F5EFD6;">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/bar.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-muted">Imagen 1</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/margarita.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-muted">Imagen 2</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/restaurant.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-muted">Imagen 3</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/wines.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-muted">Imagen 4</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/margarita.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-muted">Imagen 5</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/restaurant.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-muted">Imagen 6</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </a>
                    
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: #FF0000; font-family: 'Impact', sans-serif;">{{ $brewery->nombre }}</h5>
                    <p class="card-text" style="text-align: justify;">{{ $brewery->descripcion }}</p>
                    <p class="card-text">
                        <span class="font-weight-bold"><strong>Calle:</strong></span>
                        <span style="text-decoration: underline; display: inline-block; margin-left: 5px; font-family: 'Comic Sans MS', cursive;">{{ $brewery->calle }}</span>
                    </p>
                    <p class="card-text">
                        <span class="font-weight-bold"><strong>{{ $brewery->poblacion }}</strong></span>
                        <span style="text-decoration: underline; display: inline-block; margin-left: 5px; font-family: 'Comic Sans MS', cursive;">{{ $brewery->ciudad }}</span>
                    </p>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('breweries.edit', ['id' => $brewery->id]) }}" class="btn btn-primary rounded-circle me-3" style="background-color: #e13816; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);opacity: 0.70;">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-circle" style="background-color: #7f9ebf; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-container" style="padding-bottom: 10px;">
        <div id="map" style="height: 300px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);"></div>
    </div>
    <div class="d-flex flex-column align-items-center mb-5" style="padding-bottom: 30px;">
        <a class="nav-link" href="{{ route('home') }}" style="color: #04c9d7; margin-right: 5px;">
            <i class="fas fa-home" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
        </a>
    </div>
    
    

    <style>
        .carousel-image {
            object-fit: cover;
            height: 300px;
            border-radius: 10px;
            padding: 5px;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $brewery->latitude }}, {{ $brewery->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([{{ $brewery->latitude }}, {{ $brewery->longitude }}]).addTo(map)
            .bindPopup("Calle: {{ $brewery->calle }}")
            .openPopup();
    </script>
@endsection
