<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d0a3551360.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("{{ asset('img/textura.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            background-color: #f1f1f1;
        }
        .navbar {
            background-image: url("{{ asset('img/burbujas.jpg') }}");
            background-repeat: repeat-x;
            border: 3px solid #cdd0cb;
            box-shadow: 0 4px 6px rgba(33, 34, 1, 0.878);
        }
        .card {
            background-image: url("{{ asset('img/burbujas.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<div class="container">
  <nav class="navbar navbar-expand-md navbar-light" >
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset ('/img/logo.webp') }}" alt="{{ ('APP_NAME') }}" style="height: 3em; filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.4));">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('breweries') }}" style="font-weight: bold; color: #050505; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 1em; filter: drop-shadow(2px 2px 2px rgba(248, 201, 10, 0.5));">
                        <span style="border-bottom: 2px solid #050505;">Cervecerías</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('breweries') }}" style="font-weight: bold; color: #050505; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 1em; filter: drop-shadow(2px 2px 2px rgba(248, 201, 10, 0.5));">
                    <span style="border-bottom: 2px solid #050505;">Cervezas</span>
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.create') }}" style="font-weight: bold; color: #f3480f; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 0.85em;">
                        <span style="border-bottom: 2px solid #f1bb0b;">Contacto</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}" style="font-weight: bold; color:  #f91505; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 0.85em;">
                        <span style="border-bottom: 2px solid #f71509;">Quiénes somos</span>
                    </a>
                </li>
                <li class="nav-item" style="margin-left:px;">
                    <a class="nav-link" href="{{ route('home') }}" style="color: #138906; margin-right: 5px;">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <article>
        @yield('content')
    </article>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<footer class="bg-secondary text-white py-2 fixed-bottom">
    <div class="container">
        Pié de página
    </div>
</footer>
</body>
</html>
