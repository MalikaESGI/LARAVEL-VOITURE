<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}


        <title>@yield('titre')| NomSite</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          
         {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}

  </head>

<body>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Nom Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('voiture.index')}}">Voitures</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            trouver apres
          </a>
          <ul class="dropdown-menu ">
          @if(!empty(auth()->user()))
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="{{route('favorites.show')}}">Favories</a></li>
             <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Déconnexion</button>
            </form>
          @else
           <li><a class="dropdown-item" href="/login">Connexion</a></li>
            <li><a class="dropdown-item" href="/register">Inscription</a></li>
          @endif 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
 @yield('content')
</body>
</html>