<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titre') | NomSite</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Header Styles */
        header {
            background-color: #1a1a1a;
            animation: fadeInDown 1s ease;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar {
            background-color: #1a1a1a !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease;
            font-weight: 600;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #f8f9fa !important;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        /* Animation for Navbar */
        .nav-item {
            opacity: 0;
            animation: slideIn 1s forwards;
            animation-delay: 0.3s;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer Styles */
        footer {
            background-color: #333333;
            color: #ffffff;
        }

    </style>

</head>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container mx-auto">
            <a class="navbar-brand text-white text-2xl font-bold" href="#">U'CARS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto space-x-4">
                    <li class="nav-item">
                        <a class="nav-link active text-white hover:text-gray-300" aria-current="page" href="{{route('home.index')}}">Revenir sur le site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover:text-gray-300" href="{{route('admin.user.index')}}">Gestion des Utilisateur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover:text-gray-300" href="{{route('admin.voiture.index')}}">Gestion des Voitures</a>
                    </li>
                         <li class="nav-item">
                        <a class="nav-link text-white hover:text-gray-300" href="{{route('admin.category.index')}}">Gestion des Catégories</a>
                    </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link text-white hover:text-gray-300">Déconnexion</button>
                            </form>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="container mt-5">
 
 @if(session('success'))

 <div class="alert alert-success">

{{session('success')}}

 </div>
 @endif

@if($errors->any())

<div class="alert alert-danger">
<ul class="my-0">
@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
    
@endforeach


</ul>
</div>
@endif

 @yield('content')

 </div>


</html>