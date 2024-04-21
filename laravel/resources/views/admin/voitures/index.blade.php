@extends('admin.admin')


@section('content')

@section('titre', 'Toutes les voitures')

<div class="d-flex justify-content-between align-item-center">
<h1>@yield('titre')</h1>
<a class="btn btn-primary" href="{{route('admin.voiture.create')}}">Ajouter une voiture</a>

</div>

<table class="table table-striped">

<thead>
<tr>
<th>Marque</th>
<th>Model</th>
<th>Immatriculation</th>
<th>Nombre de place</th>
<th>Prix</th>

<th class="text-end">Action</th>

</tr>
</thead>

<tbody>
@foreach ($voitures as $voiture)
<tr>
<td>{{$voiture->marque}}</td>
<td>{{$voiture->model}}</td>
<td>{{$voiture->plaque_dimmatriculation}}</td>
<td>{{$voiture->nombre_de_place}}</td>
<td>{{$voiture->prix_location_journalier}}</td>

<td>
  <div class="d-flex gap-2 w-100 justify-content-end">
   <a href="{{ route('admin.voiture.edit', $voiture)}}"  class="btn btn-primary">Editer</a>

   <form id="deleteForm" action="{{ route('admin.voiture.destroy', $voiture) }}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" onclick="return confirmDelete()">Supprimer</button>
</form>

<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette voiture ? Cette action est irréversible.");
    }
</script>
  
  
  
  </div>


</td>


</tr>
    
@endforeach

</tbody>
</table>

{{ $voitures->links() }}

@endsection