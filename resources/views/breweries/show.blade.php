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
                                <img src="{{ asset('img/default.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
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
                                <img src="{{ asset('img/default.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <p class="text-muted">Imagen 3</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/default.jpg') }}" class="d-block w-100 carousel-image" alt="{{ $brewery->nombre }}">
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
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title" style="color: #FF0000; font-family: 'Impact', sans-serif;">{{ $brewery->nombre }}</h5>
                        <div class="description-box" style="background-color: transparent; border: none; height: 100px; overflow-y: auto; padding: 0; margin: 10px 0;">
                            <p class="card-text" style="text-align: justify; margin: 0; word-spacing: -0.15em;">{{ $brewery->descripcion }}</p>
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
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <a href="{{ route('breweries.index') }}" class="btn btn-primary rounded-circle mt-2" style="background-color: #2196F3; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            @if ($brewery->user)
                                <div class="mt-3">
                                    <p class="card-text" style="text-align: justify; margin: 0;"><b>Cervecería creada</b> por: {{ $brewery->user->name }}</p>
                                </div>
                            @else
                                <div class="mt-3">
                                    <p class="card-text" style="text-align: justify; margin: 0;">Registro creado por administrador</p>
                                </div>
                            @endif
                        </div>
                        <div>
                            @auth
                                @if(Auth::user()->id == $brewery->user_id)
                                    <form method="POST" action="{{ route('breweries.destroy', $brewery) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle mb-2" onclick="return confirm('¿Estás seguro de eliminar esta cervecería?')" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('breweries.edit', ['id' => $brewery->id]) }}" class="btn btn-primary rounded-circle me-3" style="background-color: #e13816; color: #FFFFFF; box-shadow: 0 0 10px rgba(201, 27, 27, 0.2); opacity: 0.70;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
