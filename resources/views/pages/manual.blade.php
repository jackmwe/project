@extends('main')
@section('title',' | FAQs')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                   
                <div class="Post">
                    <p ><h1 style="text-align: center;">EGERTON UNIVERSITY NJORO CAMPUS CHRISTIAN UNION PORTAL</h1></p>
                    
                </div>
                
            </div> 
             <div class="Post">
                @if (Auth::guest())
                    <p><h1>Have account?<a href="{{ route('login') }}" role="button">Login</a></h1></p>
                    <div class="Post">
                    <h3>Membership Registration</h3>
                    <p>Will allow anyone to register as a member of the union, Ministry to serve in and Regional Team they belong in</p

                    <p>Registration of members is done by filling an online form. </p>
                    <h4>How to do Membership Registration</h4>
                    <ol>
                        <li>Click the link below or the Login/Register dropdown menu and select register</li>
                        <li>Fill in your details as prompted</li>
                        <ul><b>NOTE THAT</b>
                            <li>Only Egerton University Njoro Campus Students can register</li>
                            <li> You cannot register twice.</li>
                            <li>Registration Number is unique and cannot be edited upon registration</li>
                            <li>Use an existing email.</li>
                            <li>Password field must be <b>six characters or more</b></li>
                            <li>Password must be confirmes</li>
                            <li>All fields are mandatory</li>
                            <li>The email and password will be used for subsequent login</li>

                        </uli>
                    </ol>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-block"  role="button">Register Now</a>
                        <hr>
                    </div>
                    @endif

                <div class="Post">
                    <h3>Bible Study Registration</h3>

                    <p>Will allow registered union members to register for Bible Study for allocations. Please note that you can not edit your registration number</p>
                    <h4>How to do Bible Study Registration</h4>
                    <ol>
                        <li>Click the link below or Bible Study Menu</li>
                        <li>Fill in your details and residence</li>
                        <li>Select whether or not you want to be a bible pastor</li>
                        <li><b>NOTE THAT</b> You cannot register twice. But can edit by clickng the Bible Study menu item.</li>
                    </ol>
                        <a href="{{ route('bibles.bs') }}" class="btn btn-primary btn-lg btn-block"  role="button">Register for BS</a>
                        <hr>
                    </div>

                <div class="Post">
                    <h3>EUNCCU Leadership Nomination</h3>

                    <p>This will automate the nomination for new leaders during leadership transition......</p>
                    <h4>Nomination Process</h4>
                    <p>Nomination process is manned by the nomination college of the Egerton University Njoro Campus Christian Union. Members nominate leaders of their choice to the different positions in the union.</p>
                    <ol>
                        <li>Click the link below or the <b>Leadership Nomination</b> Menu Item</li>
                        <li>Enter the details. <b>All fields are mandatory</b></li>
                        <li>You can only nominate once per spiritual year. Editing is done by clicking the <b>Leadership Nomination</b> Menu Item</li>
                    </ol>
                    <a href="{{ url('/nominate-leader') }}" class="btn btn-primary btn-lg btn-block"  role="button">Nominate Leadership</a>
                    </div>

                <div class="Post">
                    <h3>EUNCCU Library</h3>

                    <p>This page will provide Christian media and document files like preaching, books and other resources......</p>
                    <h4>Click the button below or the EUNCCU Library menu item </h4>
                    <a href="{{ url('library') }}" class="btn btn-primary btn-lg btn-block"  role="button">EUNCCU Library</a>
                    </div>

                <div class="Post">
                    <h3>Associates Registration</h3>

                    <p>Anyone wishing to join and participate in the union's activities and he or  she is not Egerton university student currently, will be able to register here as an associate.....</p>
                    
                    </div>

                <div class="Post">
                    <h3>Mission Ground Application.</h3>

                    <p>The union goes to an annual mission to reach people with the gospel. The place of the mission is done through registered union members applying for the same.</p>
                    <a href="{{ route('missions.create') }}" class="btn btn-primary btn-lg btn-block"  role="button">Apply for Mission</a>

                </div>
             


                </div>
            </div>
        </div>

@endsection
