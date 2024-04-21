<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titre') | Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
          <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

          <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
  
  
  </head>
       
    </head>
    <body>


 <div class="container mt-5">
 
 @if(session('success'))

 <div class="alert alert-success">

{{session('success')}}

 </div>
 @endif

@if($errors->any())

<div class="alert alert-danger">
<ul class="my-0">
@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
    
@endforeach


</ul>


</div>



@endif






 @yield('content')

 </div>



 

</body>
</html>