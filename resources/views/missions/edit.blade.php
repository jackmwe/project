@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Apply For Mission </div>

                <div class="panel-body">
                {!! Form::model($mission, ['class'=>'form-horizontal','route'=>['missions.update', $mission->id], 'method'=>'PUT'])!!}
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
                            <input name="Name" type="text"  value="{{strtoupper($mission->Name) }}"style="width: 260px" />
                            </td> 
                            <td style="width: 50%">
                            <label for="phone"><b>Phone Number *</b></label><br />
                            <input name="phone" type="text" maxlength="50" value="{{$mission->phone }}"style="width: 260px" />
                            </td> 
                        </tr> 
                        <tr> 
                            <td colspan="2">
                            <label for="email"><b>Email *</b></label><br />
                            <input name="email" type="email" maxlength="100" value="{{$mission->email }}" style="width: 535px" />
                            </td> 
                        </tr> 
                        <tr> <td>
                            <label for="regNo"><b>Registration Number  *</b></label><br />
                            <input name="regNo" type="text" maxlength="50" value="{{strtoupper($mission->regNo) }}" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="yos"><b>Year of Study  *</b></label><br />
                            <input name="yos" type="text" maxlength="50" value="{{$mission->yos }}" style="width: 260px" /> 
                            </td>
                        </tr> 
                        <tr> 
                            <td colspan="2">
                            <label for="et"><b>Evangelistic Team *</b></label><br />
                            <input name="et" type="text" maxlength="100" value="{{ strtoupper($mission->et) }}" style="width: 535px" />
                            </td> 
                        </tr> 
                        <tr> 
                            <td>
                            <label for="pstName"><b>Name of Host Pastor  *</b></label><br />
                            <input name="pstName" type="text" maxlength="50" value="{{ strtoupper($mission->pstName) }}" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="pstPhone"><b>Pastor Phone Number  *</b></label><br />
                            <input name="pstPhone" type="text" maxlength="50" value="{{ $mission->pstPhone }}" style="width: 260px" />
                            </td> 
                            
                        </tr>
                        <tr> 
                           <td><br />
                            <label for="church"><b>Name of Host Church *</b></label><br />
                            <input name="church" type="text" maxlength="50" value="{{ strtoupper($mission->church) }}"style="width: 260px" />
                            </td>
                             <td>
                            <label for="missioners"><b>Number  of missioners the church </br/> can comfortably host *</b></label><br />
                            <input name="missioners" type="number" maxlength="50" value="{{ $mission->missioners }}" style="width: 260px" />
                            </td> 
                        </tr> 
                        <tr> 
                            <td>
                            <label for="county"><b>County  *</b></label><br />
                            <input name="county" type="text" maxlength="50" value="{{ strtoupper($mission->county) }}" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="area"><b>Area / Location / Hometown  *</b></label><br />
                            <input name="area" type="text" maxlength="50" value="{{ strtoupper($mission->area) }}" style="width: 260px" />
                            </td>    
                        </tr>
                        <tr> 
                            <td>
                            <label for="distance"><b>Approximate distance from Nakuru<br/>(in kilometers) *</b></label><br />
                            <input name="distance" type="text" maxlength="50" value="{{ $mission->distance }}" style="width: 260px" />
                            </td> 
                            <td>
                            <label for="fare"><b>Fare from Nakuru *</b></label><br />
                            <input name="fare" type="text" maxlength="50" value="{{ $mission->fare }}" style="width: 260px" />
                            </td>    
                        </tr>
                        <tr> 
                            <td colspan="2">
                            <label for="substations"><b>Substations <br/>Local churches which can act as substations.</b></label><br />
                            <textarea name="substations" rows="4" cols="40" style="width: 535px">
                            </textarea>
                            </td> 
                        </tr> 
                        <tr> 
                            <td colspan="2">
                            <label for="rate"><b>How frequent has the land been evangelised?</b></label><br />
                            <input name="rate" type="radio" value="{{$mission->rate}}" checked="checked" /> {{$mission->rate}} 
                            <input name="rate" type="radio" value="Very_Often" /> Very Often      
                            <input name="rate" type="radio" value="Often" /> Often      
                            <input name="rate" type="radio" value="Rarely" /> Rarely
                            <input name="rate" type="radio" value="Not_At_All" /> Not At All 
                            </td> 
                        </tr> 
                         <tr> 
                            <td colspan="2">
                            <label for="facilities"><b>Facilities Available in the ground</b></label><br />
                            <input name="facilities" type="checkbox" value="Electricity" checked="checked" /> Electricity      
                            <input name="facilities" type="checkbox" value="Water" checked="checked" /> Water      
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
                            <input name="submit" type="submit" value="Save Changes" />
                            </td> 
                        </tr>
                </table>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
  </div>
</div>
@endsection