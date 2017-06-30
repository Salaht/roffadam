@extends('layouts.admin')

@section('content')
	<h1>Add New Post</h1>
	<div class="col-sm-8">
		<form action="{{ action('PostController@store') }}" method="POST">
		<div class="form-group">
			<label for="">Title:</label>
			<input name="title" type="text" class="form-control" id="">
		</div>

		<div class="form-group">
			<label for="">Image:</label>
			<input name="image" type="text" class="form-control" id="">
		</div>

		<div class="form-group">
		  <label for="sel1">Artist</label>
		  	<select name="artist" class="form-control" id="sel1">
		  	<option value=""></option>
			  	@foreach ($artists as $artist)
			  		<option value="{{$artist->id}}">{{$artist->name}}</option>
			  	@endforeach
		  	</select>
		</div>

		<div class="form-group">
			<label for="">Body:</label>
			<textarea name="body" id="" class="form-control" cols="20" rows="10" required="required"></textarea>
		</div>
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		
		<button type="submit" class="btn btn-primary">Submit</button>
		 <a href="{{route('posts.index')}}" class="btn btn-default pull-right">Go back</a>
	</form>
	</div>
	
@endsection