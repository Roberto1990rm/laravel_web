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

</head>
<body>
<div class="container">



  <nav class="navbar navbar-expand-md navbar-light" style="background: linear-gradient(135deg, #8BE68C, #43A047); border: 3px solid #76AD5F; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);">
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
                  <a class="nav-link active" aria-current="page" //*href="{{ route('breweries') }}" style="font-weight: bold; color: #050505; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 1em; filter: drop-shadow(2px 2px 2px rgba(248, 201, 10, 0.5));">
                    <span style="border-bottom: 2px solid #050505;">Cervezas</span>
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.create') }}" style="font-weight: bold; color: #faf9b3; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 0.85em;">
                        <span style="border-bottom: 2px solid #eaf10b;">Contacto</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}" style="font-weight: bold; color: #f3f5a1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); font-size: 0.85em;">
                        <span style="border-bottom: 2px solid #fff266;">Quiénes somos</span>
                    </a>
                </li>
                <li class="nav-item" style="margin-left:px;">
                    <a class="nav-link" href="{{ route('home') }}" style="color: #8BE68C; margin-right: 5px;">
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