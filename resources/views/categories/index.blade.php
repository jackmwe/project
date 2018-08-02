@extends('main')

@section('title', ' |Categories')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Categories</h1>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<th>{{$category->id}}</th>
					<td>{{$category->name}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-3">
		<div class="well">
			{!!Form::open(['route'=>'category.store','method'=>'POST'])!!}
			<h2>New Category</h2>
				{{form::label('name','Name:')}}
    			{{form::text('name', null, array('class'=>'form-control'))}}

    			{{Form::submit('Add Category', ['class'=>'btn btn-success btn-block btn-h1-spacing','style'=>'margin-top: 20px;' ])}}

			{!! Form::close() !!}
		</div>
	</div>

</div>
@endsection