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
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-3">Guardar cambios</button>
                            <a href="{{ route('breweries.index') }}" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
