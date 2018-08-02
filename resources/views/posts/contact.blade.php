@extends('main')

@section('title', ' |New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css')!!}
@endsection

@section('content')

<div class="row">
	<div class = "col-md-8 col-md-offset-2">
	<h1> Create New Post </h1>
	<hr>
	{!! Form::open(array('route' => 'contacts.store')) !!}
    	{{form::label('title','Title:')}}
    	{{form::text('title', null, array('class'=>'form-control'))}}

    	{{form::label('body','Body:')}}
    	{{form::textarea('body', null, array('class'=>'form-control'))}}

    	{{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}
    {!! Form::close() !!}

	</div>
</div>


@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js')!!}
@endsection
