@extends('layouts.master')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url({{asset('images/rap-battle-league.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Roffadam</h1>
                    <hr class="small">
                    <span class="subheading">Feel the music</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

<div class="col-lg-4 pull-right">
   
    
</div>

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-8">
                <!-- Blog Post -->
                {{-- <h1 class="web-title">Latest Posts..</h1> --}}
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{url('post', [$post->id])}}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <img style="max-width: 100%" src="{{ $post->image}}">
                            <h3 class="post-subtitle">{{ $post->body }}</h3>
                        </a>
                        <p class="post-meta">Posted by <a href="#">{{ $post->User->name }}</a> on {{$post->created_at}} Artist: {{$post->Artist->name}}</p>
                    </div>
                    <hr>
                @endforeach 
            </div>
            <div class="col-md-4">
            <div class="search">
                <form class="form-inline" action="{{ action('PostController@search') }}" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <form class="form-inline" action="" method="POST">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Go back</button>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                </form>
            </form>
            </div>
            <hr>    
             <h2>Trending Artists</h2>
               <p style="margin-top: 10px;">
                   <ul class="trend-artist">
                   @foreach ($artists as $artist)
                       <li><a href="{{url('artist', [$artist->id])}}">{{$artist->name}}</a></li>
                   @endforeach
                       
                   </ul>

               </p>
               <hr> 
               <h2>About</h2>
               <p style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime sed perferendis veniam quasi, est suscipit dolores totam quam quisquam, omnis facere ipsa. Magnam doloremque praesen.. <a href="/about">Read more</a></p>       
            </div>
        </div>
        <!-- Pager -->
        <ul class="pager">
            <li class="next">
                <a href="#">Older Posts &rarr;</a>
            </li>
        </ul>
    </div>
</div>


<hr>
@endsection
