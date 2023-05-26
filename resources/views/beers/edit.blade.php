@extends('layouts.app')

@section('title', 'Modificar cerveza')

@section('content')

    <div class="d-flex justify-content-center">

        <div class="col-sm-6">

            <h2 class="pt-3 pb-3">Modificar cerveza</h2>

            <form method="POST" action="{{ route('beers.update', ['id' => $beer->id]) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('POST') 
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $beer->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $beer->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="poblacion" class="form-label">Población</label>
                    <input type="text" class="form-control" id="poblacion" name="poblacion" value="{{ $beer->marca }}" required>
                </div>

                <div class="mb-3">
                    <label for="calle" class="form-label">Calle</label>
                    <input type="text" class="form-control" id="calle" name="calle" value="{{ $beer->vol }}" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                <div class="m-5 d-flex justify-content-center">

                <button type="submit" class="btn btn-primary me-3">Guardar cambios</button>

                <a href="{{ route('beers.index') }}" class="btn btn-secondary">Volver al listado</a>

                </div>

            </form>
        </div>
    </div>

@endsection
