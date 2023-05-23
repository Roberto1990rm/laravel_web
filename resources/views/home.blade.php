@extends('layouts.app')

@section('title', 'Bienvenido al portal de cervecerías')

@section('content')

<style>
    .home-container {
        position: relative;
        overflow: hidden;
    }

    .background-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
        margin-bottom: 30px;
    }

    .rounded-image {
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        width: 100%;
    }

    .enter-icon {
        color: #FFFFFF;
        font-size: 30px;
    }

    body, html {
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .full-width {
        width: 100vw;
        height: 100vh;
    }

    .custom-heading {
        text-decoration: none;
    }

    .fixed-icon {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 999;
        font-size: 24px;
        color: #FFFFFF;
        cursor: pointer;
    }

    .fixed-icon:hover {
        color: #FF0000;
    }
</style>

<div class="home-container">
    <a href="{{ route('breweries.index') }}">
        <video autoplay muted loop class="background-video full-width">
            <source src="{{ asset('videos/cerveVaso.mp4') }}" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>
    </a>

    <h1 class="custom-heading"><b>Bienvenido al portal de cervecerías</b></h1>
    <ul>
        @isset($breweries)
        @foreach ($breweries as $brewery)
        <li>{{ $brewery->nombre }} ({{ $brewery->poblacion }})</li>
        @endforeach
        @endisset
    </ul>

    <div class="d-flex justify-content-center align-items-center position-relative">
    <a href={{ route('breweries.index') }}>
        <img src="{{ asset('img/bar12.gif') }}" class="container-fluid rounded-image" style="opacity: 0.8; filter: alpha(opacity=50);">
    </a>
</div>


    <div class="enter-button mt-5 d-flex justify-content-center align-items-center" style="margin-bottom: 30px;">
        <a href="{{ route('breweries.index') }}" style="color: #FFFFFF; margin-right: 10px;">
            <i class="enter-icon fas fa-sign-in-alt"></i>
        </a>
    </div>

   
</div>

<script>
    const audioToggle = document.getElementById('audio-toggle');
    const backgroundVideo = document.querySelector('.background-video');
    const backgroundAudio = document.querySelector('audio');

    audioToggle.addEventListener('click', function() {
        if (backgroundVideo.muted) {
            backgroundVideo.muted = false;
            backgroundAudio.muted = false;
            audioToggle.classList.remove('fa-volume-off');
            audioToggle.classList.add('fa-volume-up');
        } else {
            backgroundVideo.muted = true;
            backgroundAudio.muted = true;
            audioToggle.classList.remove('fa-volume-up');
            audioToggle.classList.add('fa-volume-off');
        }
    });
</script>

@endsection
