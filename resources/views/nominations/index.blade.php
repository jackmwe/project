@extends('main')
@section('title',' | Leadership Nomination')
@section('content')
@if($check==null)
        <div class="row">
            <div class="col-md-12">
                <h1 align="center">Leadership Nomination</h1> <p align="center">Nominating as <i>{{Auth::user()->name}} -   {{Auth::user()->regNo}} {{date('Y-m-d')}} </i> </p>
                <hr>
                <form class="form-horizontal" method="POST" action="{{ route('nominations.store') }}">
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
                    <!-- <label name='chair'>Chairperson</label>
        <select class="form-control" name="chair">
            @foreach($users as $user)
            <option value="{{$user->name}}">{{$user->name}}</option>
            @endforeach
        </select>
 -->
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
    @else
    You have already nominated leaders
        <div class="col-md-12">
        <h4>Nominated Leaders</h4>
        <div class="table-responsive">
        
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th>#</th>
                   <th>Name</th>
                   <th>Position</th>
                    <th>Nominated At</th>
                    <th>Updated At</th>
                   </thead>
    <tbody>
    <tr>
    <td>1</td>
    <td>{{$nomination->chair}}</td>
    <td>Chairperson</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    
         <tr>
    <td>2</td>
    <td>{{$nomination->viceChair}}</td>
    <td>Vice Chairperson</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>

    <tr>
    <td>3</td>
    <td>{{$nomination->secretary}}</td>
    <td>Secretary</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    
         <tr>
    <td>4</td>
    <td>{{$nomination->viceSecretary}}</td>
    <td>Vice Secretary</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>

    <tr>
    <td>5</td>
    <td>{{$nomination->treasurer}}</td>
    <td>Treasurer</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    
         <tr>
    <td>6</td>
    <td>{{$nomination->prayerSecretary}}</td>
    <td>Prayer Secretary</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>

    <tr>
    <td>7</td>
    <td>{{$nomination->missionCordinator}}</td>
    <td>Missions Cordinator</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    
         <tr>
    <td>8</td>
    <td>{{$nomination->bsCordinator}}</td>
    <td>BS Cordinator</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>

    <tr>
    <td>9</td>
    <td>{{$nomination->musicDirector}}</td>
    <td>Music Director</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    
         <tr>
    <td>10</td>
    <td>{{$nomination->technicalCordinator}}</td>
    <td>Technical Cordinator</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    <tr>

    <td>11</td>
    <td>{{$nomination->librarian}}</td>
    <td>Librarian</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>
    
         <tr>
    <td>12</td>
    <td>{{$nomination->orgSecretary}}</td>
    <td>Organizing Secretary</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->created_at))}}</td>
    <td>{{date('M j, Y H:i', strtotime($nomination->updated_at))}}</td>
    </tr>   
    </tbody>
        
</table>

<div class="col-sm-12">
                    {!! Html::linkRoute('nominations.edit','Edit', array($nomination->id), array('class'=>'btn btn-primary btn-block btn-lg'))!!}
                    
                    
 </div>


      @endif
@endsection