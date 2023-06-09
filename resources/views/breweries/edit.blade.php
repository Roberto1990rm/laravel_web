@extends('layouts.app')

@section('title', 'Modificar cervecería')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center py-3">Modificar cervecería</h2>

                    <form method="POST" action="{{ route('breweries.update', ['id' => $brewery->id]) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $brewery->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $brewery->descripcion }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="poblacion" class="form-label">Población</label>
                            <input type="text" class="form-control" id="poblacion" name="poblacion" value="{{ $brewery->poblacion }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="calle" name="calle" value="{{ $brewery->calle }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitud</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $brewery->longitude }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitud</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $brewery->latitude }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label"><strong>Imagen de portada</strong></label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Imagen interior</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Imagen interior</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Imagen interior</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>

                        @if ($brewery->images)
                            <div class="mb-3">
                                <label for="existing-images" class="form-label">Imágenes actuales</label>
                                <div class="row">
                                    @foreach($brewery->images as $image)
                                        <div class="col-md-4">
                                            <div class="image-box">
                                                <img src="{{ url('storage/' . $image->img) }}" class="img-fluid rounded" style="width: 200px; height: 100px;" alt="{{ $brewery->nombre }}">
                                            </div>
                                            <div class="mt-2">
                                                <input type="checkbox" name="delete-images[]" value="{{ $image->id }}" id="delete-image-{{ $image->id }}">
                                                <label for="delete-image-{{ $image->id }}">Eliminar</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="cervezas" class="form-label">Cervezas relacionadas</label>
                            @foreach($beers as $beer)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cervezas[]" value="{{ $beer->id }}" id="beer-{{ $beer->id }}" {{ in_array($beer->id, $breweryBeers) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="beer-{{ $beer->id }}">{{ $beer->nombre }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-2">Guardar cambios</button>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('breweries.show', ['id' => $brewery->id]) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
