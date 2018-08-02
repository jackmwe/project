@extends('main')

@section('title', "|$post->title")

@section('stylesheets')
    {!! Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	
			<h1> {{$post->title}}</h1>
			<p class="lead"> {{$post->body}} </p>
			<hr>
			<p> Posted In: {{ $post->category->name}}</p>

	
			<a href="{{route('posts.index')}}" class="btn btn-lg btn-block btn-info btn-h1-spacing"><< See All Posts Here</a>
	
		
		</div>
</div>

@endsection
