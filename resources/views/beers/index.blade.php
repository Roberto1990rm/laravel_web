@extends('layouts.app')

@section('title', 'Listado de cervezas')

@section('content')

<h1 class="custom-heading">Aquí vienen las cervezas</h1>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 m-3">
    @foreach ($beers as $beer)
    <div class="col-sm-4">
        <div class="custom-card1 card h-100" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 10px;">
            <div class="card-body text-center pt-2">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    @if ($beer->imagen)
                        <img src="{{ url('storage/' . $beer->imagen) }}" class="vertical-img-top rounded img-fluid" alt="{{ $beer->nombre }}" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                    @else
                        <img src="{{ asset('img/default-beer.jpg') }}" class="vertical-img-top rounded" alt="{{ $beer->nombre }}" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                    @endif
                </div>
                <h5 class="card-title mb-2" style="color: #301010; text-decoration: none; text-shadow: 0 2px 4px rgba(255, 255, 255, 0.987);"><b>{{ $beer->nombre }}</b></h5>
                <p class="card-text mb-2"><i><h6>{{ $beer->marca }}</h6></i></p>
                <div class="description-box" style="background-color: #F8F8E0; border: 1px solid #CCC; border-radius: 5px; height: 100px; overflow-y: auto; padding: 5px; margin-bottom: 10px;">
                    <p class="card-text" style="text-align: justify;">{{ $beer->descripcion }}</p>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <div class="place mb-2">
                        @php
                            $beerCount = 10;
                        @endphp
                        @for ($i = 0; $i < $beerCount; $i++)
                            @if ($beer->vol >= ($i + 1) * 1)
                                <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 3px;">
                            @else
                                <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 3px; opacity: 0.4;">
                            @endif
                        @endfor
                    </div>
                    <h6 class="card-title" style="color: #535151; text-decoration: none; text-shadow: 0 2px 4px rgba(228, 222, 222, 0.987); padding-top: 10px;">
                        <b>{{ $beer->vol }}°</b>
                    </h6>
                    <a href="{{ route('beers.show', $beer) }}" class="btn btn-primary mt-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); border: 2px solid #ff7b00; background: linear-gradient(to bottom, #15fc04fd, #59b336, #28b361); color: #FFF; padding: 5px 10px; font-size: 85%; opacity: 0.8;">Ver más</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="text-center mb-5 p-5">
    @auth
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('beers.create') }}" class="btn btn-primary btn-sm mb-3" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); background: linear-gradient(to bottom right, #f7d304, #ffd000); box-shadow: 0 4px 8px #0000004d; border: none; border-radius: 8px; padding: 10px 20px; font-size: 14px; color: #fff; opacity: 0.9;">Añadir Cerveza</a>
        @endauth
        @guest
            Solo los usuarios registrados pueden añadir cerveza
        @endguest
        <a class="nav-link" href="{{ route('beers.index') }}" style="color: #138906; margin-right: 5px; text-decoration: none;"><i class="fas fa-home" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>Inicio</a>
    </div>
</div>

@endsection
