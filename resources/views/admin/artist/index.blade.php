@extends('layouts.admin')

@section('content')
  
 <h1>Admin panel</h1>


        <form class="form-inline" action="{{action('ArtistController@admin_search')}}" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
            <button class="btn btn-primary m-10" type="submit">Search</button>
            <a href="{{route('artists.create')}}" class="btn btn-success pull-right">Add Artist</a>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
         </form>
  <hr>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>image</th>
        <th>biography</th>
        <th>create</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
	@foreach($artists as $artist)
      <tr>
        <td>{{ $artist->id }}</td>
        <td><a href="{{action('PagesController@showArtist', $artist->id)}}">{{ $artist->name }}</a></td>
        <td><img style="max-height: 100px;" src="{{ $artist->image }}"></td>
        <td>{{ $artist->biography }}</td>
        <td><a href="{{ action('ArtistController@edit', $artist->id) }}" class="btn btn-warning">Edit</a></td>
        <td>
          {!! Form::open(array('route' => array('artists.destroy', $artist->id), 'method' => 'DELETE')) !!}
          {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
          {!! Form::close() !!}
        </td> 
      </tr>
	@endforeach
    </tbody>
  </table>
@endsection
