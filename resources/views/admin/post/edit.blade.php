@extends('layouts.admin')

@section('content')

{!! Form::model($post, array('action' => array('PostController@update', $post->id), 'method' => 'PUT')) !!}
<div class="form-group col-sm-6">
  {!! Form::label('Name', 'Title:') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
  {!! Form::label('Name', 'Body:') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
  {!! Form::label('Name', 'Image:') !!}
  {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
		  <label for="sel1">Artist</label>
		  	<select name="artist" class="form-control" id="sel1">
		  	<option value=""></option>
			  	@foreach ($artists as $artist)
			  		@if ($artist->id == $post->artist_id)
			  			<option selected value="{{$artist->id}}">{{$artist->name}}</option>
			  		@else
			  			<option value="{{$artist->id}}">{{$artist->name}}</option>
			  		@endif
			  	@endforeach
		  	</select>
		</div>

<div class="form-group col-sm-12">

  {{ Form::submit('Edit', array('class' => 'btn btn btn-warning')) }}
  <a href="{{route('posts.index')}}" class="btn btn-default">Go back</a>
</div>
{!! Form::close() !!}




@endsection
