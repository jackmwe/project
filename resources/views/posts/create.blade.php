@extends('main')

@section('title', ' |New Post')

@section('content')

<div class="row">
	<div class = "col-md-8 col-md-offset-2">
	<h1> Create New Post from {{ Auth::user()->name }} </h1>
	<hr>

	{!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
     <input name="name" type="hidden" value="{{ Auth::user()->name }}"/>
    <input name="phone" type="hidden" value="{{ Auth::user()->phone }}"/>


    	{{form::label('title','Title::')}}
    	{{form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255', 'autofocus'=>''))}}


        {{form::label('category_id','Category:')}}
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

    	{{form::label('body','Body:')}}
    	{{form::textarea('body', null, array('class'=>'form-control', 'required'=>''))}}

    	{{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}
    {!! Form::close() !!}

	</div>
</div>


@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js')!!}
@endsection
