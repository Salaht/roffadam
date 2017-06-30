@extends('layouts.admin')

@section('content')
  
<h1>Admin panel</h1>
<br>
<h2>Statistics:</h2>
<hr>

<div class="row statistic-wrapper">
	 <div class="col-sm-3"><div class="statistic">Total Users:<h1 class="total">{{$user_count}}</h1></div></div>
	 <div class="col-sm-3"><div class="statistic">Total Artists:<h1 class="total">{{$artist_count}}</h1></div></div>
	 <div class="col-sm-3"><div class="statistic">Total Posts:<h1 class="total">{{$post_count}}</h1></div></div>
	 <div class="col-sm-3"><div class="statistic">Total Comments:<h1 class="total">{{$comment_count}}</h1></div></div>
</div>
 


@endsection
