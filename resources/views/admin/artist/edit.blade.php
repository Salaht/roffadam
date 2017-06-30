@extends('layouts.admin')

@section('content')

{!! Form::model($artist, array('action' => array('ArtistController@update', $artist->id), 'method' => 'PUT')) !!}
<div class="form-group col-sm-6">
  {!! Form::label('Name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('Name', 'Image:') !!}
  {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('Name', 'Biography:') !!}
  {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
  {{ Form::submit('Edit', array('class' => 'btn btn-warning')) }}
  <a href="{{route('posts.index')}}" class="btn btn-default">Go back</a>
</div>
{!! Form::close() !!}

@endsection
