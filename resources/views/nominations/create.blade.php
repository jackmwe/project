@extends('main')
@section('title',' | Leadership Nomination')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1 align="center">Leadership Nomination</h1> <p align="center">Nominating as <i>{{Auth::user()->name}} -   {{Auth::user()->regNo}} {{date('Y-m-d')}} </i> </p>
                <hr>
                <form action="{{url('nomination')}}", method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="email" id="email" type="hidden" value="{{ Auth::user()->email }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input name="regNo" id="regNo" type = "hidden" value="{{ Auth::user()->regNo }}" class="form-control" required>
                    </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label name="chair">Chairperson</label>
                        <input name="chair" id="chair" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                       <label name="viceChair">Vice Chairperson</label>
                        <input name="viceChair" id="viceChair" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="secretary">Secretary</label>
                        <input name="secretary" id="secretary" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label name="viceSecretary">Vice Secretary</label>
                        <input name="viceSecretary" id="viceSecretary" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                         <label name="treasurer">Treasurer</label>
                        <input name="treasurer" id="treasurer" class="form-control" required autofocus>
                        
                    </div>

                    <div class="form-group">
                        <label name="prayerSecretary">Prayer Secretary</label>
                        <input name="prayerSecretary" id="prayerSecretary" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="missionCordinator">Missions' Cordinator</label>
                        <input name="missionCordinator" id="missionCordinator" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label name="bsCordinator">Bible Study Cordinator</label>
                        <input name="bsCordinator" id="bsCordinator" class="form-control" required autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label name="musicDirector">Music Director</label>
                        <input name="musicDirector" id="musicDirector" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="technicalCordinator">Technical Cordinator</label>
                        <input name="technicalCordinator" id="technicalCordinator" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="librarian">Librarian</label>
                        <input name="librarian" id="librarian" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label name="orgSecretary">Organizing Secretary</label>
                        <input name="orgSecretary" id="orgSecretary" class="form-control" required autofocus>
                    </div>
                </div>
                
                <div class="col-md-12" align="right">
                    <input type="submit" value="Nominate Leaders" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger bt-block">
                </div>
                </form>
        </div>
    </div>
@endsection