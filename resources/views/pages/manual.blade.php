@extends('main')
@section('title',' | FAQs')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    @if (Auth::guest())
                    <h1>EUNCCU Official Portal</h1>
                    <p>Thank you for visiting this site. Get up-to-date information here </p>
                    <hr>
                    <h3>How to Register to the portal?</h3>
                    <p><a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register</a></p>
                    <h3>How Login to the portal?</h3>
                    <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a></p>
                    @endif
                    <h3>Which Modules are Implemented?</h3>


                </div>
            </div>
        </div>

@endsection
