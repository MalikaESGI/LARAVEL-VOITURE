@extends('admin.admin')


@section('content')

@section('titre', 'Toutes les résérvatiosn')

<div class="d-flex justify-content-between align-item-center">
<h1>@yield('titre')</h1>


</div>

<table class="table table-striped">

<thead>
<tr>
<th>#ID</th>
<th>Nom user</th>
<th>Date de Début</th>
<th>Date de Fin</th>

</tr>
</thead>

<tbody>
@foreach ($reservations as $reservation)
<tr>
<td>{{$reservation->id}}</td>
<td>{{$reservation->user->name}}</td>
<td>{{$reservation->date_de_debut}}</td>
<td>{{$reservation->date_de_fin}}</td>


</form>
 
</div>


</td>


</tr>
    
@endforeach

</tbody>
</table>

{{ $reservations->links() }}

@endsection