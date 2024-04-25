@extends('base')

@section('content')

<!-- Hero Section -->
<div class="relative py-24 px-6 bg-white" style="background-image: url('https://source.unsplash.com/1600x900/?car'); background-size: cover; background-position: center;">
  <div class="absolute inset-0 bg-black opacity-50"></div>
  <div class="container mx-auto text-center text-white relative z-10">
      <h1 class="text-5xl font-bold mb-4">Louez une voiture au meilleur prix</h1>
      <p class="text-lg mb-8">Des véhicules pour tous vos besoins</p>
      <a  href="{{ auth()->user() ?  route('voiture.index') : '/login'}}" class="bg-black text-white px-6 py-3 rounded-full font-semibold hover:bg-gray-800 transition">Réserver maintenant</a>
  </div>
</div>

<!-- Services Section -->
<section class="py-20 bg-gray-200">
  <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
      <!-- Service 1 -->
      <div class="bg-white shadow-lg rounded-lg p-8 text-center">
          <h2 class="text-2xl font-bold mb-4">Large choix de véhicules</h2>
          <p class="text-lg">Trouvez la voiture qui vous convient parmi notre large sélection de véhicules.</p>
      </div>
      
      <!-- Service 2 -->
      <div class="bg-white shadow-lg rounded-lg p-8 text-center">
          <h2 class="text-2xl font-bold mb-4">Tarifs compétitifs</h2>
          <p class="text-lg">Profitez de nos tarifs compétitifs pour tous vos besoins de location de voiture.</p>
      </div>

      <!-- Service 3 -->
      <div class="bg-white shadow-lg rounded-lg p-8 text-center">
          <h2 class="text-2xl font-bold mb-4">Service client 24/7</h2>
          <p class="text-lg">Notre équipe est à votre disposition 24/7 pour répondre à toutes vos questions.</p>
      </div>
  </div>
</section>

<!-- Latest Cars Section -->
<section class="py-20 bg-white">
  <div class="container mx-auto my-10">
    <h2 class="text-3xl font-semibold mb-6">Nos dernières voitures</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @if(isset($voitures))
        @foreach ($voitures as $voiture)
         
            @include('shared.card')
          
        @endforeach
      @else
        <p class="text-center">Aucune voiture disponible</p>
      @endif
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-100">
  <div class="container mx-auto">
    <h2 class="text-3xl font-semibold mb-6 text-center">Avis de nos clients</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      <!-- Testimonial 1 -->
      <div class="bg-white rounded-lg shadow-lg p-8">
        <p class="text-lg">"Excellent service et large choix de véhicules. Je recommande!"</p>
        <p class="text-gray-600 mt-4">- Jean Dupont</p>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white rounded-lg shadow-lg p-8">
        <p class="text-lg">"Rapide, efficace et tarifs compétitifs. Parfait pour mes déplacements professionnels."</p>
        <p class="text-gray-600 mt-4">- Marie Martin</p>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="py-24 bg-black text-white">
  <div class="container mx-auto text-center">
    <h2 class="text-4xl font-semibold mb-4">Vous êtes prêt à louer une voiture ?</h2>
    <p class="text-lg mb-8">Réservez dès maintenant et bénéficiez des meilleurs tarifs !</p>
   <a href="{{ auth()->user() ?  route('voiture.index') : '/login'}}" class="bg-white text-black px-8 py-4 rounded-full font-semibold hover:bg-gray-200 transition">Réserver maintenant </a>
  </div>
</section>  

@endsection