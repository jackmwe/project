@extends('main')

@section('title', "|$bible->name")

@section('stylesheets')
    {!! Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	
			<h1> {{$bible->name}}</h1>
			<p class="lead"> {{$bible->phone}} </p>

	
			<a href="{{route('bibles.index')}}" class="btn btn-lg btn-block btn-info btn-h1-spacing"><< See All Registered Members</a>
	
		
		</div>
</div>

@endsection
