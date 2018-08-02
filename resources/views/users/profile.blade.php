@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><b>My Profile (<i>{{ Auth::user()->name }}</i>)</b></div>

        <div class="panel-body">
            <div class="col-md-4 col-md-offset-1">
             <dl class="dl-horizontal">
              <dt>Registration Number</dt>
              <dd>{{ strtoupper(Auth::user()->regNo) }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Phone Number</dt>
              <dd>{{ Auth::user()->phone }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Email</dt>
              <dd>{{ Auth::user()->email }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Gender</dt>
              <dd>{{ strtoupper(Auth::user()->gender) }}</dd>
            </dl>
        
         </div>
         <div class="col-md-4 col-md-offset-1">
            <dl class="dl-horizontal">
              <dt>Yeaar of Study</dt>
              <dd>{{ Auth::user()->yos }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Yeaar of Admission</dt>
              <dd>{{ Auth::user()->yoa }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Ministry</dt>
              <dd>{{ strtoupper(Auth::user()->ministry) }}</dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Evangelistic Team</dt>
              <dd>{{ strtoupper(Auth::user()->et) }}</dd>
            </dl>
        
         </div>

     </div>
    </div>
</div>
</div>

</div>
 
@endsection
