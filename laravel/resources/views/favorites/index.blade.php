@extends('base')

@section('content')
<div class="container mb-5 mt-5 pb-5">
<h1 class="mb-5">Mes Voitures Favorites</h1>
 @if ($favorites->isEmpty())
        <p>Aucune voiture favorite.</p>
    @endif
    @foreach ($favorites as $favorite)
        <div class="card" style="width: 18rem;">
            <img src="{{ $favorite->voiture->image }}" class="card-img-top" alt="voiture">
            <div class="card-body">
                <h5 class="card-title">{{ $favorite->voiture->marque }}, {{ $favorite->voiture->model }}</h5>
                <p class="card-text">{{ $favorite->voiture->prix_location_journalier }}</p>
                {{-- <a href="#" class="btn btn-primary">Plus de détails</a> --}}
            </div>
        </div>
    @endforeach
</div>
@endsection
