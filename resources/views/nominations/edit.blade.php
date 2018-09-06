@extends('main')
@section('title',' | Leadership Nomination')
@section('content')

<div class="row">
            <div class="col-md-12">
                <h1 align="center">Leadership Nomination</h1> <p align="center">Nominating as <i>{{Auth::user()->name}} -   {{Auth::user()->regNo}} {{date('Y-m-d')}} </i> </p>
                <hr>
                {!! Form::model($nomination, ['class'=>'form-horizontal','route'=>['nominations.update', $nomination->id], 'method'=>'PUT'])!!}
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
                        <input id="chair" type="text" class="form-control" name="chair" value="{{ $nomination->chair }}" required autofocus>
                    </div>

                    <div class="form-group">
                       <label name="viceChair">Vice Chairperson</label>
                        <input name="viceChair" id="viceChair" value="{{ $nomination->viceChair }}"class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="secretary">Secretary</label>
                        <input name="secretary" id="secretary" value="{{ $nomination->secretary }}" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label name="viceSecretary">Vice Secretary</label>
                        <input name="viceSecretary" id="viceSecretary" value="{{ $nomination->viceSecretary }}" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                         <label name="treasurer">Treasurer</label>
                        <input name="treasurer" id="treasurer" value="{{ $nomination->treasurer }}"class="form-control" required autofocus>
                        
                    </div>

                    <div class="form-group">
                        <label name="prayerSecretary">Prayer Secretary</label>
                        <input name="prayerSecretary" id="prayerSecretary" value="{{ $nomination->prayerSecretary }}"class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="missionCordinator">Missions' Cordinator</label>
                        <input name="missionCordinator" id="missionCordinator" value="{{ $nomination->missionCordinator }}" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label name="bsCordinator">Bible Study Cordinator</label>
                        <input name="bsCordinator" id="bsCordinator" value="{{ $nomination->bsCordinator }}" class="form-control" required autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label name="musicDirector">Music Director</label>
                        <input name="musicDirector" id="musicDirector" value="{{ $nomination->musicDirector }}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="technicalCordinator">Technical Cordinator</label>
                        <input name="technicalCordinator" id="technicalCordinator" value="{{ $nomination->technicalCordinator }}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label name="librarian">Librarian</label>
                        <input name="librarian" id="librarian" value="{{ $nomination->librarian }}" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label name="orgSecretary">Organizing Secretary</label>
                        <input name="orgSecretary" id="orgSecretary" value="{{ $nomination->orgSecretary }}" class="form-control" required autofocus>
                    </div>
                </div>
                
                <div class="col-md-12" align="right">
                    <input type="submit" value="Update Nomination" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger bt-block">
                </div>
                </form>
        </div>
    </div>

    @endsection