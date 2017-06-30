@extends('layouts.master')

@section('content')
 <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{asset('images/rap-battle-league.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Artist Page</h1>
                        <hr class="small">
                        <span class="subheading">Get to know your artist</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <div class="container">
    <h1>Artist's from Holland</h1>
    <div class="row">
        <form class="form-inline" style="margin-top: 20px;" action="/artist/search" method="POST">
            <input class="form-control mr-sm-2" style="width: 500px;" type="text" placeholder="Search" name="search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <form class="form-inline" action="" method="POST">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Go back</button>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
         </form>
         </form>
    </div>
        
        

        <hr>
        <div class="row">
        <div class="col-sm-9" style="padding: 0px;">
            
            @foreach ($artists as $artist)
                <div class="col-sm-3" style="padding-left: 0px;">
                    <h4><a href="{{url('artist', [$artist->id])}}">{{$artist->name}}</a></h1>
                    <a href="{{url('artist', [$artist->id])}}"><img class="img-responsive" src="{{$artist->image}}"></a>
                    <p class="artist-text">{{$artist->biography}}</p><a class="read" href="{{url('artist', [$artist->id])}}">read more..</a>
                </div>
            @endforeach
        </div>
            
        </div>
    </div>

    <hr>

@endsection
