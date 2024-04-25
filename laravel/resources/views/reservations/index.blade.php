
@extends('base') 

@section('content')

<div class="container">
<h1 class="mt-5 mb-5">Liste des Réservations</h1>
<table class="table mb-5">
    <thead>
        <tr>
           
            <th>Voiture</th>
            <th>Date de Début</th>
            <th>Date de Fin</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->voiture->model }}</td> 
                <td>{{ $reservation->date_de_debut }}</td>
                <td>{{ $reservation->date_de_fin }}</td>
                <td>{{ $reservation->prix }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
