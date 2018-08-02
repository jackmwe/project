@extends('main')
@section('title',' | Welcome Page')
@section('content')
<link rel="stylesheet" href="{{asset('css/style.css')}}">

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Welcome to the official EUNCCU Portal</h1>
                    <p>Thank you for visiting this site. Get up-to-date information here </p>
                    <p><a class="btn btn-primary btn-lg" href="{{ url('manual') }}" role="button">Guide</a></p>


                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
        <div class="row">
             @if (Auth::guest())
                <div class="Post">
                    <h3>Membership Registration</h3>
                    <h4>Please note that you can not edit your registration numbers</h4>
                    <p><h1>Have account?<a href="{{ route('login') }}" role="button">Login</a></h1></p>
                    <p>Will allow anyone to register as a member of the union, Ministry to serve in and Regional Team they belong in</p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block"  role="button">Register Now</a>
                    <br>
                    

                    <hr>
                </div>
                @endif
            </div>

                <div class="Post">
                    <h3>Bible Study Registration</h3>

                    <p>Will allow registered union members to register for Bible Study for allocations. Please note that you can not edit your registration number</p>
                        <a href="{{ route('bibles.create') }}" class="btn btn-primary btn-lg btn-block"  role="button">Register for BS</a>
                        <hr>
                    </div>

                <div class="Post">
                    <h3>EUNCCU Leadership Nomination</h3>

                    <p>This will automate the nomination for new leaders during leadership transition......</p>
                    </div>

                <div class="Post">
                    <h3>EUNCCU Library</h3>

                    <p>This page will provide Christian media and document files like preaching, books and other resources......</p>
                    </div>

                <div class="Post">
                    <h3>Associates Registration</h3>

                    <p>Anyone wishing to join and participate in the union's activities and he or  she is not Egerton university student currently, will be able to register here as an associate.....</p>
                    </div>

                <div class="Post">
                    <h3>Mission Ground Application.</h3>

                    <p>The union goes to an annual mission to reach people with the gospel. The place of the mission is done through registered union members applying for the same. This portal will automate this......</p>

                </div>
                </div>
            </div>
          @endsection
