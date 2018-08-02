
@extends('main')

@section('title', ' |Edit Post')

@section('content')

	{!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT'])!!}
	{!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
     <input name="name" type="hidden" value="{{ Auth::user()->name }}"/>
    <input name="phone" type="hidden" value="{{ Auth::user()->phone }}"/>
  <div class="col-md-8">
	{{Form::label('title', 'Title:')}}	
	{{Form::text('title', null, ["class"=>"form-control input-lg"])}}
    <br><br>
    {{form::label('category_id','Category:')}}
    {{Form::select('category_id', $categories, null, ["class"=>"form-control"])}}

    {{Form::label('body', 'Body:', ["class"=>"form-spacing-top"])}}	
	{{Form::textarea('body', null,["class"=>"form-control"])}}
 </div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
			  <dt>Created at</dt>
			  <dd>{{date('M j, Y H:i', strtotime($post->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
			  <dt>Last Update</dt>
			  <dd>{{date('M j, Y H:i', strtotime($post->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.show','Cancel', array($post->id), array('class'=>'btn btn-danger btn-block'))!!}
					
				</div>
				<div class="col-sm-6">
					{{Form::submit('Save Changes', ['class'=>'btn btn-primary btn-block'])}}
				</div>
			</div>

		</div>
	</div>
	<!--End Form-->
	{!!Form::close()!!}
</div>

@endsection
