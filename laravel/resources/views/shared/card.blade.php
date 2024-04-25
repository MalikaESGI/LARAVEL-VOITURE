<head><meta name="csrf-token" content="{{ csrf_token() }}">
</head>
 
<div class="card" style="width: 18rem;">
  <span class="favorite-btn" data-id="{{$voiture->id}}" onclick="toggleFavorite({{$voiture->id}})">&#x2665;</span> <!-- Bouton de favoris -->
  <img src="{{$voiture->image}}" class="card-img-top" alt="voiture" style="width:auto;height:200px;">
  <div class="card-body">
    <h5 class="card-title">{{$voiture->marque}}, {{$voiture->model}}</h5>
    <p class="card-text">Prix par jour: <strong>{{$voiture->prix_location_journalier}}€</strong></p>
     @if($voiture->reserver === true)
       La voiture est résérver
     @else
    <a href="{{ route('reservation.create', ['voiture_id' => $voiture->id]) }}" class="bg-black text-white px-4 py-2 rounded-md hover:bg-opacity-80 transition duration-300 text-decoration-none"><span class="animate-pulse">Réserver</span></a>
    @endif
  </div>
</div>

<style>


 .favorite-btn {
    font-size: 30px; 
    cursor: pointer; 
    position:absolute;
  }
  .favorite-btn.favorited {
    color: red; /* Indique que la voiture est dans les favoris */
}

</style>




<script>
function toggleFavorite(voitureId) {
    fetch('/favorites/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ voiture_id: voitureId })
    })
    .then(response => response.json())
    .then(data => {
        const favoriteBtn = document.querySelector(`.favorite-btn[data-id="${voitureId}"]`);
        if (data.status === 'added') {
            favoriteBtn.classList.add('favorited');
            favoriteBtn.innerHTML = '&#x2764;'; // Filled heart
        } else {
            favoriteBtn.classList.remove('favorited');
            favoriteBtn.innerHTML = '&#x2665;'; // Empty heart
        }
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Erreur lors de la modification des favoris.');
    });
}
</script>

