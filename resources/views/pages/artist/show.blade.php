@extends('layouts.master')

@section('content')
<!-- Page Header -->

<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url({{asset('images/rap-battle-league.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Artist Page</h1>
                    <hr class="small">
                    <span class="subheading">Feel the music</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="row">
              <div class="col-md-8">
                <!-- Blog artist -->
                    <div class="row">
                        <div class="col-sm-6">
                        <h1>Artist: {{$artist->name}}</h1>
                        <img style="height: 300px;" src="{{$artist->image}}">
                    </div>
                    <div class="col-sm-6">
                        <p><b>Biography:</b><br> {{$artist->biography}}</p>
                    </div> 
                    </div>  
                    <hr>
                    <h1>Gerelateerde posts:</h1>
                    @foreach ($artist->Posts as $post)
                        <div class="col-sm-4">
                            <h1>{{$post->title}}</h1>
                            <p>{{$post->body}}</p>
                        </div> 
                    @endforeach
            </div>
        </div>
        <!-- Pager -->
    </div>
</div>
</div>

<hr>
@endsection
