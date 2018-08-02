@extends('main')

@section('title', ' | Recent Posts')

@section('content')


<div class="col-md-2 col-md-offset-8">
		<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create new Post</a>
	</div>

<div class="col-md-12">
	<h1>Post</h1>
</div>
  @if(auth()->user()->isAdmin())
<div class="row">
	<dir class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Posted By</th>
				<th>Created At</th>
				
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<th>{{$post->id}}</th>
						<td>{{$post->title}}</td> 
						<!-- Truncating a string -->
						<td>{{substr($post->body, 0, 100)}}
							<!-- Add a ... at the truncated string -->
						{{strlen($post->body)>50?" . . .":""}}</td>
						<td>{{$post->name}} - {{$post->phone}} </td> 
						<td>{{date('M j, Y H:i', strtotime($post->created_at))}}</td>
						<td><a href="{{route('posts.show', $post->id)}}" class="btn btn-info btn-sm btn-block">View</a> 
						<a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning btn-sm btn-block" >Edit</a></td>

					</tr>

				@endforeach
			</tbody>
			<table>	
				<div class="text-center">	
					{!!$posts->links(); !!}
				</div>
			</table>
			
		</table>
	</dir>
</div>
@else

	@foreach($posts as $post)
	<div class="row">
	  <div class="col-md-8 col-md-offset-2">		
		<h2>{{$post->title}} - {{$post->name}}</h2> 
		<h5>Published: {{date('M j, Y', strtotime($post->created_at))}}</h5>
		<!-- Truncating a string -->
		<p>{{substr($post->body, 0, 100)}}
			<!-- Add a ... at the truncated string -->
		{{strlen($post->body)>100?" . . .":""}}
		<a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Read More</a></p>
	  <hr>
	</div>
	</div>
		
	@endforeach
	<div class="row">
	  <div class="col-md-12">
		<div class="text-center">	
					{!!$posts->links(); !!}
		</div>
	</div>
</div>
			
@endif

@endsection 
<!--or use stop-->
<!--or use stop-->