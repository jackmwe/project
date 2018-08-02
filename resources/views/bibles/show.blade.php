
@extends('main')

@section('title', ' |View Registration')

@section('stylesheets')
    {!! Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 ">
	
			<h1 align="center" style="background-color:gray";> {{$bible->name}} - {{$bible->regNo}}</h1>
		<div class="col-md-6">
			<h1>Mobile Phone</h1>
	
			<p class="lead"> {{$bible->phone}} </p>
			
		</div>
	<div class="col-md-4">
			<h1>Residence</h1>

			<p class="lead">{{$bible->residence}} {{$bible->hostel}} </p>
	</div>
			
		</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
			  <dt>Registered at</dt>
			  <dd>{{date('M j, Y H:i', strtotime($bible->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
			  <dt>Last Update</dt>
			  <dd>{{date('M j, Y H:i', strtotime($bible->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('bibles.edit','Edit', array($bible->id), array('class'=>'btn btn-primary btn-block btn-lg'))!!}
					{!! Html::linkRoute('posts.show','Back to Site', null, array('class'=>'btn btn-info btn-block'))!!}
					
				</div>
				<div class="col-sm-6">
					@if(auth()->user()->isAdmin())
					{!!Form::open(['route'=>['bibles.destroy', $bible->id], 'method'=>'DELETE'])!!}

					
					{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
					@endif

					{!!Form::close()!!}
				</div>

			</div>
			@if(auth()->user()->isAdmin())
			<hr>

			{!! Html::linkRoute('bibles.index','All Registered Members',null, array('class'=>'btn btn-info btn-block'))!!}
			@endif
		</div>
	</div>
</div>
@endsection

