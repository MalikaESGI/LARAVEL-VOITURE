@extends('base')

@section('title', 'Toutes nos voitures')


@section('content')


<div class="bg-light p-5 mb-5 text-center">
<form action="" method="get"  class="container d-flex gap-2">
<input type="number" placeholder="Budget max" class="form-control" name="prix_location_journalier" value="{{ $input['prix_location_journalier'] ?? ''}}">
<input type="number" placeholder="Nombre de Place" class="form-control" name="nombre_de_place" value="{{ $input['nombre_de_place'] ?? ''}}">
<input  placeholder="Marque" class="form-control" name="marque" value="{{ $input['marque'] ?? ''}}">
<input  placeholder="Modèl" class="form-control" name="model" value="{{ $input['model'] ?? ''}}">
<button class="btn btn-primary btn-sm flex-grow-0">
 Rechercher
</button>

</form>

</div>
<div class="container">
<div class="row">

@forelse ($voitures as  $voiture)
    <div class="col-3 mb-5">
    @include('shared.card')
    </div>
    @empty
     <div class="col text-center fw-bold">
      Aucune Voiture Trouvée
    </div>


@endforelse

</div>
<div class=" my-4">
{{$voitures->links()}}
</div>

</div>

@endsection