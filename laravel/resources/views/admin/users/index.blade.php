@extends('admin.admin')


@section('content')

@section('titre', 'Tous les utilisateurs')

<div class="d-flex justify-content-between align-item-center">
<h1>@yield('titre')</h1>
<a class="btn btn-primary" href="{{route('admin.user.create')}}">Ajouter un utilisateur</a>

</div>

<table class="table table-striped">

<thead>
<tr>
<th>Nom</th>
<th>Prénom</th>
<th>Email</th>
<th>Role</th>
<th>Date de Naissance</th>

<th class="text-end">Action</th>

</tr>
</thead>

<tbody>
@foreach ($users as $user)
<tr>
<td>{{$user->name}}</td>
<td>{{$user->surname}}</td>
<td>{{$user->email}}</td>
<td>{{$user->role}}</td>
<td>{{$user->birthday}}</td>

<td>
  <div class="d-flex gap-2 w-100 justify-content-end">
   <a href="{{ route('admin.user.edit', $user)}}"  class="btn btn-primary">Editer</a>

   <form id="deleteForm" action="{{ route('admin.user.destroy', $user) }}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" onclick="return confirmDelete()">Supprimer</button>
</form>

<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.");
    }
</script>
  
  </div>


</td>


</tr>
    
@endforeach

</tbody>
</table>

{{-- {{ $users->links() }} --}}

@endsection