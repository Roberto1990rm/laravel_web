

<style>
    body {
        background-image: url("{{ asset('img/madera.jpeg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        background-color: #f1f1f1;
    }

    .navbar {
        background: linear-gradient(to left, #ffeb3b, #ffffff);
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        
    }

    .navbar-brand img {
        height: 3em;
        filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.4));
    }

    .navbar-nav .nav-link {
        font-weight: bold;
        color: #050505;
        font-size: 1em;
        transition: color 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
        color: #000;
    }

    .navbar-nav .nav-link:nth-child(3),
    .navbar-nav .nav-link:nth-child(4) {
        color: #fff;
        font-size: 0.8em;
    }

    .footer {
        background-color: #212121;
        color: #fff;
        padding: 1.5rem 0;
        font-size: 0.85em;
    }

    .footer .container {
        text-align: center;
    }

    .footer a {
        color: #fff;
        text-decoration: none;
        border-bottom: 1px dashed #fff;
    }

    .footer a:hover,
    .footer a:focus {
        border-bottom-style: solid;
    }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d0a3551360.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('/img/logo.webp') }}" alt="{{ config('app.name') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('breweries.index') }}">Cervecerías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beers.index') }}">Cervezas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.create') }}">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Quiénes somos</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Salir
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <article style="margin-top: 100px;">
        @yield('content')
    </article>

    <footer class="footer">
        <div class="container">
            Pié de página &copy; {{ date('Y') }}. Todos los derechos reservados. Diseñado por <a href="#" target="_blank">Roberto Ramírez</a>.
        </div>
    </footer>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
