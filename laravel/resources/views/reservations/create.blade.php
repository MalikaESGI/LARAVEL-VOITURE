@extends('base')

@section('content')
<h1>@yield('titre')</h1>
<body class="bg-gray-100">

    <section class="min-h-screen flex items-center justify-center bg-white bg-opacity-75" style="background-image: url('https://source.unsplash.com/1600x900/?car'); background-size: cover; background-position: center;">
        <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-md " style="--bs-bg-opacity: 0.8;">
<form action="{{ route('reservation.store') }}" method="post">
    @csrf
    <input type="hidden" name="voiture_id" value="{{ $voitures->id }}">
   
    <div class="mb-4">
        <div class="col">
            <label for="date_de_debut">Date de début:</label>
            <input class="form-control" type="date" name="date_de_debut" required>
        </div>
        <div class="col">
            <label for="date_de_fin">Date de fin:</label>
            <input class="form-control" type="date" name="date_de_fin" required>
        </div>
    </div>

    <button class="animate-pulse bg-black text-white px-4 py-2 rounded-md hover:bg-opacity-80 transition duration-300 text-decoration-none"><span class="animate-pulse" type="submit">Réserver</button>
    
</form>
</div>
</div>
</section>
@endsection
