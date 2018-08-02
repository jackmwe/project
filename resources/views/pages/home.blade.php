@extends('main')
@section('title',' | Homepage')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @foreach($posts as $post)
                <div class="post">
                    <h3>{{$post->title}}</h3>

                    <p>{{substr($post->body, 0, 100)}} {{strlen($post->body)>100?" . . .":""}}</p>

                <p><a class="btn btn-primary" href="{{url('portal/'.$post->slug)}}" role="button">Read More</a></p>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
