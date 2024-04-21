@extends('admin.admin')

@section('titre', $category->exists ? "Editer la catégorie": "Créer une catégorie")

@section('content')

<h1>@yield('titre')</h1>

<form class="vstack gap-2" action="{{ route($category->exists ? 'admin.category.update': 'admin.category.store', ['category' => $category ]) }}" method="post">
 
 @csrf

@method($category->exists ? 'put': 'post')


<div class="row">
@include('shared.input', ['label' => 'Nom de la catégorie', 'name'=> 'name', 'value'=> $category->name])

</div>

<button class="btn btn-primary">

@if($category->exists)
Modifier
@else
Créer
@endif
</button>

</form>
@endsection