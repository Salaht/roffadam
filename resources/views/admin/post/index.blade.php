@extends('layouts.admin')

@section('content')
  
 <h1>Admin panel</h1>
          <form class="form-inline" action="{{action('PostController@admin_search')}}" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
            <button class="btn btn-primary m-10" type="submit">Search</button>
            <a href="/admin/posts/create" class="btn btn-success pull-right">Add Post</a>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
         </form>
  <hr>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>image</th>
        <th>body</th>
        <th>artist</th>
        <th>create</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
	@foreach($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td><a href="{{action('PagesController@showPost', $post->id)}}">{{ $post->title }}</a></td>
        <th><img style="max-width: 150px" src="{{ $post->image }}"></th>
        <td>{{ $post->body }}</td>
        <td>
            @if (isset($post->Artist->name))
                {{$post->Artist->name}}
            @endif
        </td>
        <td><a href="{{ action('PostController@edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
        <td>
          {!! Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'DELETE')) !!}
          {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
          {!! Form::close() !!}
        </td> 
      </tr>
	@endforeach
    </tbody>
  </table>
@endsection
