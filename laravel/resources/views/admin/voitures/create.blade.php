@extends('admin.admin')

@section('titre', $voiture->exists ? "Editer la voiture": "Créer une voiture")

@section('content')

<h1>@yield('titre')</h1>

<form class="vstack gap-2" action="{{ route($voiture->exists ? 'admin.voiture.update' : 'admin.voiture.store', ['voiture' => $voiture->id ?? null]) }}" method="post"  enctype="multipart/form-data">
    @csrf
    @if($voiture->exists)
        @method('PUT')
    @else
        @method('POST')
    @endif

    <div class="row">
        @include('shared.input', ['label' => 'Marque de la voiture', 'name'=> 'marque', 'value'=> $voiture->marque])
        @include('shared.input', ['label' => 'Modèle', 'name'=> 'model', 'value'=> $voiture->model])
        @include('shared.input', ['label' => 'Plaque d\'immatriculation', 'name'=> 'plaque_dimmatriculation', 'value'=> $voiture->plaque_dimmatriculation])
        @include('shared.input', ['label' => 'Nombre de places', 'name'=> 'nombre_de_place', 'value'=> $voiture->nombre_de_place])
        @include('shared.input', ['label' => 'Prix location journalier', 'name'=> 'prix_location_journalier', 'value'=> $voiture->prix_location_journalier])
        
        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Sélectionnez une catégorie</option>
                @foreach (\App\Models\category::all() as $categorie)
                    <option value="{{ $categorie->id }}" {{ $voiture->category_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>

               <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image')
        {{$message}}
        @enderror
        </div>
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
