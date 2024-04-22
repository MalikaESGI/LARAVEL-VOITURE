<head><meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="card" style="width: 18rem;">
  <span class="favorite-btn" data-id="{{$voiture->id}}" onclick="toggleFavorite({{$voiture->id}})">&#x2665;</span> <!-- Bouton de favoris -->
  <img src="{{$voiture->image}}" class="card-img-top" alt="voiture" style="width:auto;height:200px;">
  <div class="card-body">
    <h5 class="card-title">{{$voiture->marque}}, {{$voiture->model}}</h5>
    <p class="card-text">{{$voiture->prix_location_journalier}}</p>
    <a href="#" class="btn btn-primary">Voir</a>
  </div>
</div>

<style>


 .favorite-btn {
    font-size: 30px; 
    cursor: pointer; 
    position:absolute;
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

