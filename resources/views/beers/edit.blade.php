@extends('layouts.app')

@section('title', 'Modificar cerveza')

@section('content')

    <div class="d-flex justify-content-center">

        <div class="col-sm-6">

            <h2 class="pt-3 pb-3">Modificar cerveza</h2>

            <form method="POST" action="{{ route('beers.update', ['id' => $beer->id]) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $beer->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="vol" class="form-label">vol</label>
                    <input type="decimal" class="form-control" id="vol" name="vol" value="{{ $beer->vol }}" required>
                </div>






                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $beer->descripcion }}</textarea>
                </div>



                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="poblacion" name="marca" value="{{ $beer->marca }}" required>
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
