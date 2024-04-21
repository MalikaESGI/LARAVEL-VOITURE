<div class="card">
 <div class="card-body">
 <h5>
 <a href="{{route('bien.show', $bien)}}">{{$bien->titre}}</a>
 </h5>
 <p class="card-text">{{$bien->ville}}, {{$bien->pays}}</p>
  <div class="text-primary fw-bold">

  {{$bien->prix}} Par nuit

  </div>


 </div>


</div>