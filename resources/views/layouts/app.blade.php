<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}">

  </head>
<body>
<div class="container">
  <nav class="navbar navbar-expand-md navbar-light" style="background: linear-gradient(135deg, #D2F7C7, #FDECEC);"> 
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset ('/img/logo.webp') }}" alt="{{ ('APP_NAME') }}" style="height: 3em;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('breweries') }}">Cervecerías</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cervezas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route ('contact.create') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">Quiénes somos</a>
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