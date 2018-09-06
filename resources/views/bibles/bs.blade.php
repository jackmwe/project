@extends('main')

@section('title', ' |BS Registration')

@section('content')
@if($check==null)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Bible Study</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('bibles.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('regNo') ? ' has-error' : '' }}">
                            <label for="regNo" class="col-md-4 control-label">Registration Number</label>

                            @if(auth()->user()->isAdmin())
                            <div class="col-md-6">
                                <input id="regNo" type="text" class="form-control" name="regNo" value="{{ Auth::user()->regNo }}" required autofocus>

                                @if ($errors->has('regNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @else
                            <div class="col-md-6">
                                <input id="regNo" type="text" class="form-control" name="regNo" value="{{ Auth::user()->regNo }}" required autofocus readonly>

                                @if ($errors->has('regNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('yos') ? ' has-error' : '' }}">
                            <label for="yos" class="col-md-4 control-label">Year Of Study</label>

                            <div class="col-md-6">
                                <select id="yos" type="text" class="form-control" name="yos" value="{{ Auth::user()->yos }}" required autofocus >
                                  <option value="{{ Auth::user()->yos }}">{{ Auth::user()->yos }}</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>

                                @if ($errors->has('yos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('yos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('residence') ? ' has-error' : '' }}">
                            <label for="residence" class="col-md-4 control-label">Residential Area</label>

                            <div class="col-md-6">
                                <select id="residence" type="text" class="form-control" name="residence" value="{{ old('residence') }}" required autofocus>
                                  <option value="">--Select Residential Area--</option>
                                  <option value="tatton">Taton</option>
                                  <option value="up_school">Up School (CBD, New Hostels, Ruwenzori, Maringo, HolyWood, Buruburu, Riverview and Riverside)</option>
                                  <option value="gate">Gate</option>
                                  <option value="wright">Kwa Wright</option>
                                  <option value="njokerio">Njokerio</option>
                                  <option value="ahero">Ahero</option>
                                </select>
                                @if ($errors->has('residence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hostel') ? ' has-error' : '' }}">
                            <label for="hostel" class="col-md-4 control-label">Hostel</label>

                            <div class="col-md-6">
                                <input id="hostel" type="text" class="form-control" name="hostel" value="{{ old('hostel') }}" required autofocus placeholder="Hostel and Room. e.g Marsabit 17">

                                @if ($errors->has('hostel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hostel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('bs_leader') ? ' has-error' : '' }}">
                            <label for="bs_leader" class="col-md-4 control-label"><b>Do you volunteer to be a bible study group leader?</b></label>

                            <div class="col-md-6">
                               <select id="bs_leader" type="text" class="form-control" name="bs_leader" value="{{ old('bs_leader') }}" required autofocus>
                                 <option value=""></option>
                                 <option value="yes">Yes</option>
                                 <option value="no">No</option>    
                                </select>

                                @if ($errors->has('bs_leader'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bs_leader') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@else
You already registered for bible study
<div class="row">
        <div class="col-md-8 ">
    
            <h1 align="center" style="background-color:gray";> {{$bible->name}} - {{$bible->regNo}}</h1>
        <div class="col-md-6">
            <h1>Mobile Phone</h1>
    
            <p class="lead"> {{$bible->phone}} </p>
            
        </div>
    <div class="col-md-4">
            <h1>Residence</h1>

            <p class="lead">{{$bible->residence}} {{$bible->hostel}} </p>
    </div>
            
        </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
              <dt>Registered at</dt>
              <dd>{{date('M j, Y H:i', strtotime($bible->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Last Update</dt>
              <dd>{{date('M j, Y H:i', strtotime($bible->updated_at))}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('bibles.edit','Edit', array($bible->id), array('class'=>'btn btn-primary btn-block btn-lg'))!!}
                    {!! Html::linkRoute('posts.show','Back to Site', null, array('class'=>'btn btn-info btn-block'))!!}
                    
                </div>
                <div class="col-sm-6">
                    @if(auth()->user()->isAdmin())
                    {!!Form::open(['route'=>['bibles.destroy', $bible->id], 'method'=>'DELETE'])!!}

                    
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
                    @endif

                    {!!Form::close()!!}
                </div>

            </div>
            @if(auth()->user()->isAdmin())
            <hr>

            {!! Html::linkRoute('bibles.index','All Registered Members',null, array('class'=>'btn btn-info btn-block'))!!}
            @endif
        </div>
    </div>
</div>
@endif

@endsection