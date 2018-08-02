@extends('layouts.app')

@section('title', ' |All Registered Members')


@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Registered Members</h1>
	</div>
	<div class="col-md-4">
		<a href="{{route('missions.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Register Bible Study</a>
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
				<th>Applicatnt</th>
				<th>Pastor</th>
				<th>Host Church</th>
				<th>Registration Date</th>
				
			</thead>
			<tbody>
				@foreach($missions as $mission)
					<tr>
						<th>{{$mission->id}}</th>
						<td>{{$mission->Name}} - {{$mission->phone}} - {{$mission->et}}</td>
						<td>{{$mission->pstName}} - {{$mission->pstPhone}}</td> 
						<td>
					    <td>{{$mission->church}}
							
						</td>
						<td>{{date('M j, Y H:i', strtotime($mission->created_at))}}</td>
						<td><a href="{{route('missions.show', $mission->id)}}" class="btn btn-default btn-sm">View</a> 
						<a href="{{route('missions.edit', $mission->id)}}" class="btn btn-default btn-sm" >Edit</a></td>

					</tr>

				@endforeach
			</tbody>
			<table>	
				<div class="text-center">	
					{!!$missions->links(); !!}
				</div>
			</table>
			
		</table>
	</dir>
</div>

@endsection 
<!--or use stop-->