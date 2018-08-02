@extends('main')

@section('title', "|$post->title")

@section('stylesheets')
    {!! Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
	
			<h1> {{$post->title}}</h1>
			<h5>Published: {{date('M j, Y', strtotime($post->created_at))}}</h5>
			<p class="lead"> {{$post->body}} </p>
			<hr>
			<p> Posted In <b><u>{{$post->category->name}}</u></b></p>
			<a href="{{route('posts.index')}}" class="btn btn-lg btn-block btn-info btn-h1-spacing"><< See All Posts Here</a>
		</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
			  <dt>Created at</dt>
			  <dd>{{date('M j, Y H:i', strtotime($post->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
			  <dt>Posted By</dt>
			  <dd>{{$post->name}}</dd>
			</dl>
			@if(auth()->user()->isAdmin())
			<dl class="dl-horizontal">
			  <dt>Phone Number</dt>
			  <dd>{{$post->phone}}</dd>
			</dl>

			<hr>
			<div class="row">
				<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit','Edit', array($post->id), array('class'=>'btn btn-primary btn-block'))!!}
					
				</div>
				<div class="col-sm-6">
					{!!Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE'])!!}

					
					{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

					{!!Form::close()!!}
				</div>


			</div>
			@endif

		</div>
	</div>
			
	
</div>		
	
</div>

@endsection
