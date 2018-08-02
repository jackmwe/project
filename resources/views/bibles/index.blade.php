@extends('layouts.app')

@section('title', ' |All Registered Members')


@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Registered Members</h1>
	</div>
	<div class="col-md-4">
		<a href="{{route('bibles.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Register Bible Study</a>
	</div>
	<hr>
	<div class="col-md-12">
		<hr>
	</div>
</div>

<div class="row">
	<dir class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Residence</th>
				<th>Year of Study</th>
				<th>Pastor?</th>
				<th>Registration Date</th>
				
			</thead>
			<tbody>
				@foreach($bibles as $bible)
					<tr>
						<th>{{$bible->id}}</th>
						<td>{{$bible->name}}</td> 
						<td>{{$bible->phone}}
					    <td>{{$bible->residence}} - {{$bible->hostel}}
					    <td>{{$bible->yos}}	
					    <td>{{$bible->bs_leader}}	
							
						</td>
						<td>{{date('M j, Y H:i', strtotime($bible->created_at))}}</td>
						<td><a href="{{route('bibles.show', $bible->id)}}" class="btn btn-default btn-sm">View</a> 
						<a href="{{route('bibles.edit', $bible->id)}}" class="btn btn-default btn-sm" >Edit</a></td>

					</tr>

				@endforeach
			</tbody>
			<table>	
				<div class="text-center">	
					{!!$bibles->links(); !!}
				</div>
			</table>
			
		</table>
	</dir>
</div>

@endsection 
<!--or use stop-->