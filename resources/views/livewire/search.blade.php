@extends('layouts.app')

@php
    $containerClass = isset($proposalsPage) && $proposalsPage ? 'margin-top-100' : '';
@endphp

<div class="container {{ $containerClass }}">
    <div class="row">
        <div class="col-md-12">
            @if (!isset($hideSearchBar) || !$hideSearchBar)
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-center">Buscar cervecería</h1>
                    <input type="text" wire:model="searchQuery" placeholder="Buscar cervecería..." class="form-control">
                </div>
            @endif

            @if (!empty($searchQuery))
                <ul>
                    @foreach ($breweries as $brewery)
                        <li><a href="{{ route('breweries.show', $brewery) }}">{{ $brewery->nombre }}</a> - {{ $brewery->poblacion }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
                @foreach ($breweries as $brewery)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card custom-card">
                            @if ($brewery->imagen && Storage::disk('public')->exists($brewery->imagen))
                                <img src="{{ url('storage/' . $brewery->imagen) }}" class="card-img-top" alt="{{ $brewery->nombre }}">
                            @else
                                <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="{{ $brewery->nombre }}">
                            @endif

                            <div class="card-body">
                                <h4 class="card-title"><b>{{ $brewery->nombre }}</b></h4>
                                <p class="card-text">{{ $brewery->descripcion }}</p>
                                <p class="card-text"><small>{{ $brewery->poblacion }}</small></p>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('breweries.show', $brewery) }}" class="btn btn-primary">Ver más</a>
                                    @if ($brewery->user)
                                        <p class="card-text">Cervecería creada por: {{ $brewery->user->name }}</p>
                                    @else
                                        <p class="card-text">Creado por: CerveLab</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
