@extends('layouts.master')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url({{$post->image}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{{$post->title}}</h1>
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
                <!-- Blog Post -->
                {{-- <h1>{{$post->title}}</h1> --}}
                <div class="text">
                    <p>{{$post->body}}</p>
                </div>
                
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else

            <form action="{{ url('post/'.$post->id.'/comment')}}" method="POST" role="form">
                <legend>Comment</legend>
                    <textarea name="text" id="input" class="form-control" rows="3" required="required"></textarea>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button type="submit" class="mg-top btn btn-primary">Submit</button>
            </form>
            @endif
            @foreach ($post->Comments as $comment)
                <div class="comment">
                    <p class="user-name">{{$comment->User->name}}</p>
                    <p class="comment-text">{{$comment->text}}</p>
                    <p class="post-meta">{{$comment->created_at}}</p>

                @isset(Auth::user()->Role->name)
                    @if(Auth::user()->Role->name == "admin")
                        {{-- delete form met de comment id --}}
                        {!! Form::open(array('route' => array('comment.delete', $comment->id), 'method' => 'DELETE')) !!}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {!! Form::close() !!}
                    @endif
                @endisset
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
