@extends('layouts.app')

@section('title', $beer->marca)

@section('content')

<h1 class="custom-heading">Aquí vienen las cervezas</h1>


<div class="row d-flex justify-content-center mb-4 p-0">
    <div class="col-sm-4">
        <div class="custom-card1 card mb-4 mt-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 10px;">
            <div class="card-body text-center">
                @if ($beer->imagen)
                    <img src="{{ url('storage/' . $beer->imagen) }}" class="card-img-top rounded" alt="{{ $beer->nombre }}" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                @else
                    <img src="{{ asset('storage/bar.jpg') }}" class="card-img-top rounded" alt="{{ $beer->nombre }}" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                @endif
                <h5 class="card-title" style="color: #301010; text-decoration: none; text-shadow: 0 2px 4px rgba(255, 255, 255, 0.987); padding-top: 10px;"><b>{{ $beer->nombre }}</b></h5>

                <h6 class="card-title" style="color: #535151; text-decoration: none; text-shadow: 0 2px 4px rgba(228, 222, 222, 0.987); padding-top: 10px;">
                    <b>{{ $beer->vol }}°</b>
                    <div class="place">
                        @php
                            $beerCount = 5;
                        @endphp
                    
                        @for ($i = 0; $i < $beerCount; $i++)
                            @if ($beer->vol >= ($i + 1) * 2)
                                <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 5px;">
                            @else
                                <img src="{{ asset('img/logo.webp') }}" alt="Logo" style="width: 30px; height: 30px; margin-right: 5px; opacity: 0.4;">
                            @endif
                        @endfor
                    </div>
                    
                </h6>
                
               




                <div class="description-box" style="background-color: #F8F8E0; border: 1px solid #CCC; border-radius: 5px; height: 100px; overflow-y: auto; padding: 5px; margin: 10px 0;">
                    <p class="card-text" style="text-align: justify;">{{ $beer->descripcion }}</p>
                </div>
                <p class="card-text"><i><h6>{{ $beer->marca }}</h6></i></p>
                <a href="{{ route('beers.edit', ['id' => $beer->id]) }}" class="btn btn-primary rounded-circle me-0" style="background-color: #e13816; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);opacity: 0.70;">
                    <i class="fas fa-edit"></i>
                </a>
                <form method="POST" action="{{ route('beers.destroy', $beer) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-circle me-0" onclick="return confirm('¿Estás seguro de eliminar esta cervecería?')" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); opacity: 0.70;">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>

               
                <a href="{{ route('beers.index') }}" class="btn btn-primary rounded-circle ms-3" style="background-color: #7f9ebf; color: #FFFFFF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            
        </div>
    </div>
</div>


@endsection
