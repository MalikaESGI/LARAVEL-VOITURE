@extends('admin.admin')

@section('titre', $voiture->exists ? "Editer la voiture": "Créer une voiture")

@section('content')

<h1>@yield('titre')</h1>

<form class="vstack gap-2" action="{{ route($voiture->exists ? 'admin.voiture.update': 'admin.voiture.store', ['voiture' => $voiture ]) }}" method="post">
 
 @csrf

@method($voiture->exists ? 'put': 'post')


<div class="row">
@include('shared.input', ['label' => 'Marque de la voiture', 'name'=> 'marque', 'value'=> $voiture->marque])
@include('shared.input', ['label' => 'Model', 'name'=> 'model', 'value'=> $voiture->model])
@include('shared.input', ['label' => 'plaque d\'immatriculation', 'name'=> 'plaque_dimmatriculation', 'value'=> $voiture->plaque_dimmatriculation])
@include('shared.input', ['label' => 'nombre de place', 'name'=> 'nombre_de_place', 'value'=> $voiture->nombre_de_place])
@include('shared.input', ['label' => 'Prix', 'name'=> 'prix_location_journalier', 'value'=> $voiture->prix_location_journalier])

</div>



<button class="btn btn-primary">

@if($voiture->exists)
Modifier
@else
Créer
@endif
</button>

</form>
@endsection