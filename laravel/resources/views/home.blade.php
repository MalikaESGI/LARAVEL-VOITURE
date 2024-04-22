@extends('base')

@section('content')

<style>
  .carousel-item img {
    height: 600px; 
    object-fit: cover; 
  }
</style>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://photo-voiture.motorlegend.com/hd/bmw-m2-f87-coupe-cs-3-0-450-ch-126517.jpg" class="d-block w-100" alt="img 1">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
    <img src="https://www.10wallpaper.com/wallpaper/1366x768/1607/2017_Mercedes-AMG_GTR_Luxury_Auto_HD_Wallpaper_05_1366x768.jpg" class="d-block w-100 " alt="img 2">
</div>
    <div class="carousel-item">
      <img src="https://www.motoringresearch.com/wp-content/uploads/2022/10/2_SPECTRE-UNVEILED-%E2%80%93-THE-FIRST-FULLY-ELECTRIC-ROLLS-ROYCE_FRONT-3_4-1.jpg" class="d-block w-100" alt="img 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container">

<h2>Nos dernières voitures<h2>
<div class="row">
@if(isset($voitures))
    @foreach ($voitures as $voiture)
        <div class="col">
            @include('shared.card')
        </div>
    @endforeach
@else
    <p>Aucune voiture disponible</p>
@endif
</div>
</div>
@endsection