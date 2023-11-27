@extends('layouts.app')

@section('title', $beer->marca)

@section('content')

<style>
    .custom-card1 {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        border: none;
        background: linear-gradient(to bottom right, #FFE900, #FFED86, #FFF); /* Degradado diagonal hasta el blanco */
    }

    .custom-card1 .card-img-top {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        margin-bottom: 0;
    }

    .custom-card1 .card-title {
        color: #301010;
        text-decoration: none;
        text-shadow: 0 2px 4px rgba(255, 255, 255, 0.987);
        padding-top: 10px;
    }

    .custom-card1 .place {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 5px;
    }

    .custom-card1 .place img {
        width: 30px;
        height: 30px;
        margin-right: 5px;
        opacity: 0.4;
    }

    .custom-card1 .description-box {
        background-color: #F8F8E0;
        border: 1px solid #CCC;
        border-radius: 5px;
        height: 100px;
        overflow-y: auto;
        padding: 5px;
        margin: 10px 0;
    }

    .custom-card1 .description-box p {
        text-align: justify;
    }

    .custom-card1 .card-text h6 {
        margin: 0;
    }

    .custom-card1 .card-text i {
        display: block;
    }

    .custom-card1 .btn-primary {
        background-color: #e13816;
        color: #FFFFFF;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        opacity: 0.7;
    }

    .custom-card1 .btn-danger {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        opacity: 0.7;
    }

    /* Ajuste para modo móvil */
    @media screen and (max-width: 767px) {
        .custom-card1 .place {
            flex-wrap: wrap; /* Hace que los logos se envuelvan en varias líneas */
            max-height: 50px; /* Limita la altura de la sección de los logos */
            overflow: hidden;
        }

        .custom-card1 .place img {
            margin-bottom: 5px; /* Añade un espacio entre los logos envueltos en varias líneas */
        }
    }
</style>

<div class="row d-flex justify-content-center mb-4 p-0">
    <div class="col-sm-8">
        <h1 class="custom-heading">Detalle de cerveza</h1>
        <div class="card" style="border-radius: 10px; margin-bottom: 80px; background: linear-gradient(135deg, #F5EFD6, #fff200); border: none;">
            <div class="card-body text-center" style="padding: 0;">
                @if ($beer->imagen)
                    <img src="{{ url('storage/' . $beer->imagen) }}" class="card-img-top rounded" alt="{{ $beer->nombre }}">
                @else
                    <img src="{{ asset('..public/img/bar.jpg') }}" class="card-img-top rounded" alt="{{ $beer->nombre }}">
                @endif
                <h5 class="card-title"><b>{{ $beer->nombre }}</b></h5>
                <p class="card-text"><i><h6>{{ $beer->marca }}</h6></i></p>

                
                <div class="mt-2">
                    <h6 class="card-title">{{ $beer->precio }} <b><i>Euros</b></i><br> (orientativo)</h6>
                    <table class="mt-2 mx-auto">
                        @php
                            $exchangeCount = count($exchange);
                            $exchangeHalf = ceil($exchangeCount / 2);
                            $exchangeKeys = array_keys($exchange);
                            $exchangeValues = array_values($exchange);
                        @endphp
                        <tr>
                            <td>
                                <table>
                                    @for ($i = 0; $i < $exchangeHalf; $i++)
                                        <tr>
                                            <td class="text-right">{{ $exchangeValues[$i] }}</td>
                                            <td class="text-center"><b>{{ $exchangeKeys[$i] }}</b></td>
                                        </tr>
                                    @endfor
                                </table>
                            </td>
                            <td>
                                <table>
                                    @for ($i = $exchangeHalf; $i < $exchangeCount; $i++)
                                        <tr>
                                            <td class="text-right">{{ $exchangeValues[$i] }}</td>
                                            <td class="text-center"><b>{{ $exchangeKeys[$i] }}</b></td>
                                        </tr>
                                    @endfor
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="place mt-2 mb-2 ms-2 me-2 text-center">
                    @php
                        $beerCount = 10;
                        $vol = $beer->vol;
                        $wholeLogos = floor($vol); // Número de logos enteros
                        $partialLogo = $vol - $wholeLogos; // Porción del último logo
                    @endphp
                    
                    @for ($i = 1; $i <= $beerCount; $i++)
                        @if ($i <= $wholeLogos)
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 5px; opacity: 1;">
                        @elseif ($i == $wholeLogos + 1 && $partialLogo > 0)
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 5px; clip-path: inset({{ 30 - $partialLogo * 30 }}px 0 0 0); opacity: 1;">
                        @else
                            <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 5px; opacity: 0.4;">
                        @endif
                    @endfor
                </div>
                <h6 class="card-title"><b>{{ $beer->vol }}°</b></h6>
                <div class="description-box">
                    <p class="card-text">{{ $beer->descripcion }}</p>
                </div>
                
                <div class="mt-3 text-center">
                    <h5 class="font-weight-bold"><b>Disponible en:</b></h5>
                    <ul style="list-style-type: none;">
                        @foreach ($beer->breweries as $brewery)
                            <li>
                                <i class="fas fa-beer"></i>
                                <a href="{{ route('breweries.show', ['id' => $brewery->id]) }}">{{ $brewery->nombre }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="d-flex justify-content-center mb-1">
                    @auth
                        <a href="{{ route('beers.edit', ['id' => $beer->id]) }}" class="btn btn-primary rounded-circle me-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('beers.destroy', ['id' => $beer->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-circle">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    @endauth
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('beers.index') }}" class="btn btn-primary rounded-circle ms-3" style="background-color: #2196F3; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
