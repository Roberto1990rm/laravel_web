@extends('layouts.app')

@section('title', $brewery->nombre)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <h1 class="custom-heading">Detalle de cervecería</h1>
                <div class="card mb-4" style="border-radius: 10px; background: linear-gradient(135deg, #F5EFD6, #fff200); border: none;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                                <img src="{{ asset('img/cerveceriasin.jpeg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <p class="text-muted">Imagen 1</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/wines.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
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
                                <img src="{{ asset('img/wines.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <p class="text-muted">Imagen 5</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/wines.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
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
                        <div class="description-box" style="background-color: transparent; border: none; height: 100px; overflow-y: auto; padding: 0; margin: 10px 0;">
                            <p class="card-text" style="text-align: justify; margin: 0;">{{ $brewery->descripcion }}</p>
                        </div>
                        <p class="card-text">
                            <span class="font-weight-bold"><strong>Calle:</strong></span>
                            <span style="text-decoration: underline; display: inline-block; margin-left: 5px; font-family: 'Comic Sans MS', cursive;">{{ $brewery->calle }}</span>
                        </p>
                        <p class="card-text">
                            <span class="font-weight-bold"><strong>{{ $brewery->poblacion }}</strong></span>
                            <span style="text-decoration: underline; display: inline-block; margin-left: 5px; font-family: 'Comic Sans MS', cursive;">{{ $brewery->ciudad }}</span>
                        </p>
                    </div>
                    <div class="card-footer">
                        @auth
                            @if($brewery->author == Auth::user()->id)
                                <div class="d-flex justify-content-between mt-4">
                                    <div>
                                        <form method="POST" action="{{ route('breweries.destroy', $brewery) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-circle mb-2" onclick="return confirm('¿Estás seguro de eliminar esta cervecería?')" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('breweries.edit', ['id' => $brewery->id]) }}" class="btn btn-primary rounded-circle me-3" style="background-color: #e13816; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    @endif
                                    @endauth
                                    <div>
                                        <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-circle" style="background-color: #2196F3; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
