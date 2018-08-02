    {{-- \resources\views\users\edit.blade.php --}}
    @extends('layouts.app')
    @section('title', '| Update User')
    @section('content')
    <div class='col-lg-6 col-lg-offset-3'>
        <h1><i class='fa fa-user-plus'></i> Update {{$user->name}}</h1>
        <hr>
        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
        {{ csrf_field() }}
        <div class="form-group @if ($errors->has('name')) has-error @endif">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
          <div class="form-group @if ($errors->has('phone')) has-error @endif">
            {{ Form::label('phone', 'Phone Number') }}
            {{ Form::text('phone', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group @if ($errors->has('email')) has-error @endif">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>
        <h5><b>Assign Role</b></h5>
        <div class="form-group @if ($errors->has('roles')) has-error @endif">
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
        </div>
        <div class="form-group @if ($errors->has('password')) has-error @endif">
            {{ Form::label('password', 'Password') }}<br>
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        <div class="form-group @if ($errors->has('password')) has-error @endif">
            {{ Form::label('password', 'Confirm Password') }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
         <div class="form-group @if ($errors->has('regNo')) has-error @endif">
            {!! Form::label('regNo', 'Registration Number') !!}
            {!! Form::text('regNo', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group @if ($errors->has('yos')) has-error @endif">
            {!! Form::label('yos', 'Year of Study') !!}
            {{ Form::selectRange('yos', 1,5, null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group @if ($errors->has('yoa')) has-error @endif">
            {!! Form::label('yoa', 'Year of Admission') !!}
            {{ Form::selectRange('yoa', 2013,2018, null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group @if ($errors->has('gender')) has-error @endif">
            {!! Form::label('gender', 'Gender') !!}
            {{ Form::select('gender', ['male'=>'Male','female'=>'Female'], null, ['class' => 'form-control']) }}
        </div>
         <div class="form-group @if ($errors->has('et')) has-error @endif">
            {!! Form::label('et', 'Evangelistic Team') !!}
            {{ Form::select('et', 
            ['cet'=>'Central Evangelistic Team(CET)', 
            'net'=>'Nyanza Evangelistic Team(NET)', 
            'uet'=>'Utermost Evangelistic Team(UET)', 
            'weso' =>'Western Outreach(WESO)', 
            'mubet'=>'Mid-Eastern United Brethren Evangelistic Team(MUBET)', 
            'emuseta'=>'Emulatable University Students Evangelistic Team',
            'rivet'=>'Rift-Valley Evangelistic Team(RIVET)',
            'not_yet'=>'Not Yet in Evangelistic Team'], 
            null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group @if ($errors->has('ministry')) has-error @endif">
            {!! Form::label('ministry', 'Ministry') !!}
            {{ Form::select('ministry', [''=>'--Select Ministry--', 
            'pw'=>'Praise and Worship Ministry', 
            'it'=>'IT-Information Technology Ministry', 
            'ushering'=>'Ushering Ministry', 
            'outreach' =>'Outreach Ministry', 
            'ss'=>'Sunday School Ministry', 
            'choir' =>'Choir Ministry', 
            'library' =>'Library Ministry',
            'publicity' =>'Publicity Ministry',
            'catering' =>'Catering Ministry',
            'intercessory' =>'Intercessory Ministry',
            'ffm'=>'Faith Foundation Ministry',
            'editorial'=>'Editorial Ministry',
            'ebenezer'=>'Ebenezer Ministry', 
            'instrumentalist'=>'Instrumentalists Ministry',
            'not_yet'=>'Not Yet in Ministry Team'], 
            null, ['class' => 'form-control']) }}
        </div>

          <div class="form-group @if ($errors->has('in_session')) has-error @endif">
            {!! Form::label('in_session', 'In Session?') !!}
            {{ Form::select('in_session', ['Yes','No'], ['Yes', 'No'], ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Update User', array('class' => 'btn btn-primary btn-lg btn-block')) }}
        {{ Form::close() }}
    </div>
    
    @endsection