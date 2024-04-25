@extends('base')

@section('title', 'Toutes nos voitures')

@section('content')

<div class="bg-gray-100 py-10">
    <div class="container mx-auto">
        <form action="" method="get" class="flex justify-center gap-4">
            <input type="number" placeholder="Budget max" class="border p-2 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" name="prix_location_journalier" value="{{ $input['prix_location_journalier'] ?? ''}}">
            <input type="number" placeholder="Nombre de Place" class="border p-2 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" name="nombre_de_place" value="{{ $input['nombre_de_place'] ?? ''}}">
            <input placeholder="Marque" class="border p-2 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" name="marque" value="{{ $input['marque'] ?? ''}}">
            <input placeholder="Modèle" class="border p-2 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200" name="model" value="{{ $input['model'] ?? ''}}">
            <button class="bg-black text-white px-4 py-2 rounded-md hover:bg-opacity-80 transition duration-300">
                <span class="animate-pulse">Rechercher</span>
            </button>
        </form>
    </div>
</div>

<div class="container mx-auto mt-10">
    <h2 class="text-4xl font-semibold mb-8 text-center">Découvrez Notre Sélection de Voitures</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse ($voitures as $voiture)
        {{-- <div class="rounded-md overflow-hidden shadow-lg"> --}}
            @include('shared.card')
        {{-- </div> --}}
        @empty
        <div class="col-span-full text-center font-bold">
            Aucune Voiture Trouvée
        </div>
        @endforelse
    </div>
    <div class="my-8">
        {{$voitures->links()}}
    </div>
</div>

<div class="bg-gray-200 py-10">
    <div class="container mx-auto">
        <h2 class="text-4xl font-semibold mb-8 text-center">Pourquoi Choisir U'CARS?</h2>
        <p class="text-lg text-gray-600 text-center">
           
Optez pour U'CARS : simplicité, qualité et choix. Notre large gamme de véhicules, notre processus de réservation facile et notre service clientèle exceptionnel garantissent une expérience sans tracas. Avec des tarifs compétitifs et des offres spéciales régulières, U'CARS est votre partenaire idéal pour une location de voiture réussie.
        </p>
    </div>
</div>

@endsection