@extends('layouts.master')

@section('content')
<h1>Overzicht artists</h1>

<div class="row">
  @foreach($artists as $artist) 
  <div class="col-sm-2">
       <img class="card-img-top img-fluid" src="images/images.jpg" alt="Card image cap">
       <p>{{ $artist->name}}</p>
    </div>

  @endforeach
</div>

@endsection
