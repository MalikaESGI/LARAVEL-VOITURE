@extends('admin.admin')


@section('content')

@section('titre', 'Toutes les catégories')

<div class="d-flex justify-content-between align-item-center">
<h1>@yield('titre')</h1>
<a class="btn btn-primary" href="{{route('admin.category.create')}}">Ajouter une catégorie</a>

</div>

<table class="table table-striped">

<thead>
<tr>
<th>#ID</th>
<th>Nom</th>

<th class="text-end">Action</th>

</tr>
</thead>

<tbody>
@foreach ($categories as $category)
<tr>
<td>{{$category->id}}</td>
<td>{{$category->name}}</td>

<td>
  <div class="d-flex gap-2 w-100 justify-content-end">
   <a href="{{ route('admin.category.edit', $category)}}"  class="btn btn-primary">Editer</a>

   <form id="deleteForm" action="{{ route('admin.category.destroy', $category) }}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" onclick="return confirmDelete()">Supprimer</button>
</form>

<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.");
    }
</script>
  
  </div>


</td>


</tr>
    
@endforeach

</tbody>
</table>

{{ $categories->links() }}

@endsection