@extends('layouts.admin')

@section('content')
	<h1>Add New Artist</h1>
	<div class="col-sm-8">
		<form action="{{ action('ArtistController@store') }}" method="POST">
			<div class="form-group">
				<label for="">Name:</label>
				<input name="name" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Image:</label>
				<input name="image" type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="">Biography:</label>
				<textarea name="biography" id="" class="form-control" cols="20" rows="10" required="required"></textarea>
			</div>
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			
			<button type="submit" class="btn btn-primary">Submit</button>
			 <a href="{{route('artists.index')}}" class="btn btn-default pull-right">Go back</a>
		</form>
	</div>
	
@endsection