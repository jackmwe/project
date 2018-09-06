
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Bible Study</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('missions.store') }}">
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
</div> -->
@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Apply For Mission  - {{strtoupper(Auth::user()->name) }}</div>

                <div class="panel-body">
                 <form  class="form-horizontal"action="{{ route('missions.store') }}" method="POST" onsubmit="return ValidateForm(this);">
                    {{ csrf_field() }}
                <script type="text/javascript">
                function ValidateForm(frm) {
                if (frm.Name.value == "") { alert('Applicant name is required.'); frm.Name.focus(); return false; }
                if (frm.phone.value == "") { alert('Applicant phone number is required.'); frm.phone.focus(); return false; }
                if (frm.email.value == "") { alert('Email address is required.'); frm.email.focus(); return false; }
                // if (frm.Email_Address.value.indexOf("@") < 1 || frm.Email_Address.value.indexOf(".") < 1) { alert('Please enter a valid email address.'); frm.Email_Address.focus(); return false; }
                if (frm.regNo.value == "") { alert('Registration number is required.'); frm.regNo.focus(); return false; }
                if (frm.yos.value == "") { alert('Please select Year of Study is required.'); frm.yos.focus(); return false; }
                if (frm.et.value == "") { alert('Please select you Evangelistic Team.'); frm.et.focus(); return false; }
                if (frm.pstName.value == "") { alert('Pastor name is required.'); frm.pstName.focus(); return false; }
                if (frm.pstPhone.value == "") { alert('Pastor phone number is required.'); frm.pstPhone.focus(); return false; }
                if (frm.church.value == "") { alert('Host Church is required.'); frm.church.focus(); return false; }
                if (frm.missioners.value == "") { alert('The number of missioners the church can accommodate and provide for is required.'); frm.missioners.focus(); return false; }
                if (frm.county.value == "") { alert('The church county is required.'); frm.county.focus(); return false; }
                if (frm.area.value == "") { alert('The church area is required.'); frm.area.focus(); return false; }
                if (frm.distance.value == "") { alert('Please provide the approximate distance from Nakuru.'); frm.distance.focus(); return false; }
                if (frm.fare.value == "") { alert('Please provide the approximate fare from Nakuru.'); frm.fare.focus(); return false; }

                if (frm.substations.value == "") { alert('Substations are required.'); frm.substations.focus(); return false; }
                // if (frm.rate.value == "") { alert('Rate to which the region has been evangelised is required.'); frm.rate.focus(); return false; }
                // if (frm.facilities.value == "") { alert('Facilities Available are required.'); frm.facilities.focus(); return false; }
                if (frm.description.value == "") { alert('List at least one challenge facing the ground.'); frm.description.focus(); return false; }
                
                
                return true; }
                </script>
                <table border="0" cellpadding="50" cellspacing="50" align="center">
                        <tr> 
                            <td style="width: 50%">
                            <label for="Name"><b>Name *</b></label><br />
                            <input name="Name" type="text"  value="{{strtoupper(Auth::user()->name) }}"style="width: 260px" />
                            </td> 
                            <td style="width: 50%">
                            <label for="phone"><b>Phone Number *</b></label><br />
                            <input name="phone" type="text" maxlength="50" value="{{Auth::user()->phone }}"style="width: 260px" />
                            </td> 
                        </tr> 
                        <tr> 
                            <td colspan="2">
                            <label for="email"><b>Email *</b></label><br />
                            <input name="email" type="email" maxlength="100" value="{{Auth::user()->email }}" style="width: 535px" />
                            </td> 
                        </tr> 
                        <tr> <td>
                            <label for="regNo"><b>Registration Number  *</b></label><br />
                            <input name="regNo" type="text" maxlength="50" value="{{strtoupper(Auth::user()->regNo) }}" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="yos"><b>Year of Study  *</b></label><br />
                            <select id="yos" type="text" class="form-control" name="yos" value="{{ Auth::user()->yos }}">
                                  <option value="{{ Auth::user()->yos }}">{{ Auth::user()->yos }}</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                            </td>
                        </tr> 
                        <tr> 
                            <td colspan="2">
                            <label for="et"><b>Evangelistic Team *</b></label><br />
                            {{ Form::select('et', [''=>'--Select Regional Team--', 
                                'cet'=>'Central Evangelistic Team(CET)', 
                                'net'=>'Nyanza Evangelistic Team(NET)', 
                                'uet'=>'Utermost Evangelistic Team(UET)', 
                                'weso' =>'Western Outreach(WESO)', 
                                'mubet'=>'Mid-Eastern United Brethren Evangelistic Team(MUBET)', 
                                'emuseta'=>'Emulatable University Students Evangelistic Team',
                                'rivet'=>'Rift-Valley Evangelistic Team(RIVET)',
                                'not_yet'=>'Not Yet in Evangelistic Team'], 
                                null, ['class' => 'form-control' , 'required'=>'', 'autofocus' =>'']) }}
                            </td> 
                        </tr> 
                        <tr> 
                            <td>
                            <label for="pstName"><b>Name of Host Pastor  *</b></label><br />
                            <input name="pstName" type="text" maxlength="50" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="pstPhone"><b>Pastor Phone Number  *</b></label><br />
                            <input name="pstPhone" type="text" maxlength="50" style="width: 260px" />
                            </td> 
                            
                        </tr>
                        <tr> 
                           <td><br />
                            <label for="church"><b>Name of Host Church *</b></label><br />
                            <input name="church" type="text" maxlength="50" style="width: 260px" />
                            </td>
                             <td>
                            <label for="missioners"><b>Number  of missioners the church </br/> can comfortably host *</b>  <i>(50 - 2500)</i></label><br />
                            <input name="missioners" type="Number" min="50" max="2500" maxlength="50" style="width: 260px" />
                            </td> 
                        </tr> 
                        <tr> 
                            <td>
                            <label for="county"><b>County  *</b></label><br />
                            <input name="county" type="text" maxlength="50" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="area"><b>Area / Location / Hometown  *</b></label><br />
                            <input name="area" type="text" maxlength="50" style="width: 260px" />
                            </td>    
                        </tr>
                        <tr> 
                            <td>
                            <label for="distance"><b>Approximate distance from Nakuru<br/>(in kilometers) *</b></label><br />
                            <input name="distance" type="number" maxlength="50" style="width: 260px" />
                            </td> 

                            <td>
                                
                            <label for="fare"><b>Fare from Nakuru * </b><br/> <i>Between 50 and 10000 </i></label><br />
                            <input name="fare" type="number" min="50" max="10000" maxlength="50" style="width: 260px" />
                            </td>    
                        </tr>
                        <tr> 
                            <td colspan="2">
                            <label for="substations"><b>Substations <br/>Local churches which can act as substations.</b></label><br />
                            <textarea name="substations" rows="7" cols="40" style="width: 535px"></textarea>
                            </td> 
                        </tr> 
                        <tr> 
                            <td colspan="2">
                            <label for="rate"><b>How frequent has the land been evangelised?</b></label><br />
                            <input name="rate" type="radio" value="Very_Often" checked="checked" /> Very Often      
                            <input name="rate" type="radio" value="Often" /> Often      
                            <input name="rate" type="radio" value="Rarely" /> Rarely
                            <input name="rate" type="radio" value="Not_At_All" /> Not At All 
                            </td> 
                        </tr> 
                         <tr> 
                            <td colspan="2">
                            <label for="facilities"><b>Facilities Available in the ground</b></label><br />
                            <input name="facilities" type="checkbox" value="Electricity" checked="checked" /> Electricity      
                            <input name="facilities" type="checkbox" value="Water" checked="checked"/> Water      
                            <input name="facilities" type="checkbox" value="Food" checked="checked"/> Food
                            </td> 
                        </tr>
                        <tr> 
                            <td colspan="2">
                            <label for="description"><b>Challenges Facing the Land / Any other Information </b></label><br />
                            <textarea name="description" rows="7" cols="40" style="width: 535px"></textarea>
                            </td> 
                        </tr> 
                        <tr> 
                            <td colspan="2" style="text-align: center;">
                            <!-- <div style="float: right"> <a href="https://www.100forms.com" id="lnk100" title="form to email">form to email</a></div>
                            <script src="https://www.100forms.com/js/FORMKEY:Z25YMXLUYR2Z/SEND:portalcu@eunccu.org" type="text/javascript"></script> -->
                            <input name="skip_submit" type="submit" value="Send Application" />
                            </td> 
                        </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection