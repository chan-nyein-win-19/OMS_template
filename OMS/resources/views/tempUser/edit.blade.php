@extends('layouts.app')

@section('title','UserCreate')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/autofillTagging/fm.tagator.jquery.css')  }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/autofillTagging/fm.tagator.jquery.min.css')  }}">
    <style>
		
		#wrapper {
	  padding: 15px;
      margin:100px auto;
      max-width:728px;
		}
		
	</style>
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="container-fluid">
        <h3 class="text-center mb-3">User Create</h3>
        <div class="card p-5 pt-4">
            <form action="{{ route('users.update',$edit->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 pr-5 pl-5">
                        <div class="position-relative row form-group">
                            <label class="form-label"> EmployeeId
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" name="employeeid" value="{{old('employeeid') ? old('employeeid') : $edit->employeeid}}"/>
                         @error('employeeid')
                            <span class="text-danger small">*{{$message}}</span><br>
                         @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Name
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" name="username" value="{{old('username') ? old('username') : $edit->username}}"/>
                             @error('username')
                                <span class="text-danger small">*{{$message}}</span><br>
                             @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Role
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="role">
                                <option value="">Please select role</option>
                                <option value="Admin" @if($edit->role=="Admin") selected @endif>Admin</option>
                                <option value="MD" @if($edit->role=="MD") selected @endif>Managing Director</option>
                                <option value="Leader" @if($edit->role=="Leader") selected @endif>Leader</option>
                                <option value="Sensei" @if($edit->role=="Sensei") selected @endif>Sensei</option>
                                <option value="Employee" @if($edit->role=="Employee") selected @endif>Employee</option>
                            </select>
                         @error('role')
                            <span class="text-danger small">*{{$message}}</span><br>
                         @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Email
                                <span style="color: red">*</span>
                            </label>           
                                <input type="email" class="form-control" name="email" value="{{old('email') ? old('email') : $edit->email}}"/>
                            @error('email')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">NRC
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" name="NRC" value="{{old('NRC') ? old('NRC') : $edit->NRC}}"/>
                            @error('NRC')
                                <span class="text-danger small">*{{$message}}</span><br>
                             @enderror
                         </div>
                        <div class="form-group">
                            <label class="form-label">Gender
                                <span style="color: red">*<br></span>
                            </label> 
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if($edit->gender=="male") checked @endif>
                                <label class="form-check-label" for="male" >Male</label>
                            </div>
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female"  @if($edit->gender=="female") checked @endif>
                                <label class="form-check-label" for="female" >Female</label>
                            </div>
                        </div>
                        @error('gender')
                        <div class="form-group">
                            <span class="text-danger small">*{{$message}}</span><br>
                        </div>
                            
                        @enderror
                        <div class="form-group">
                            <label class="form-label">MarriageStatus
                                <span style="color: red">*<br></span>
                            </label> 
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="marriageStatus" id="married" value="married" @if($edit->marriageStatus=="married") checked @endif>
                                <label class="form-check-label" for="male">Married</label>
                            </div>
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="marriageStatus" id="single" value="single"  @if($edit->marriageStatus=="single") checked @endif>
                                <label class="form-check-label" for="female" >Single</label>
                            </div>
                        </div>
                        @error('marriageStatus')
                        <div class="form-group">
                            <span class="text-danger small">*{{$message}}</span><br>
                        </div>
                        @enderror
                            <div class="position-relative row form-group">
                                <label class="form-label">DOB
                                    <span style="color: red">*</span>
                                </label>           
                                    <input type="date" class="form-control" name="DOB" value="{{old('DOB') ? old('DOB') : $edit->DOB}}"/>
                                @error('DOB')
                                    <span class="text-danger small">*{{$message}}</span><br>
                                @enderror
                            </div>
                            
                        <div class="position-relative row form-group">
                            <label class="form-label">PhNo
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" name="phNo" value="{{old('phNo') ? old('phNo') : $edit->phNo}}"/>
                            @error('phNo')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Travel Fees
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" name="travelFees" value="{{old('travelFees') ? old('travelFees') : $edit->travelFees}}"/>
                            @error('travelFees')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Address
                                <span style="color: red">*</span>
                            </label>           
                               <textarea  id="" cols="30" rows="5" class="form-control" name="address">{{old('address') ? old('address') : $edit->address}}</textarea>
                           @error('address')
                               <span class="text-danger small">*{{$message}}</span><br>
                           @enderror
                         </div>
                        
                    </div>
                    <div class="col-md-6 pr-5 pl-5">
                        <div class="position-relative row form-group">
                            <label class="form-label">Office
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select office</option>
                                <option value="Yangon"@if($edit->office=="Yangon") selected @endif>Yangon</option>
                                <option value="Mandalay"@if($edit->office=="Mandalay") selected @endif>Mandalay</option>
                            </select>
                        @error('office')
                            <span class="text-danger small">*{{$message}}</span><br>
                        @enderror
                        </div>
                        
                        <div class="position-relative row form-group">
                            <label class="form-label">Batch
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" name="batch" value="{{old('batch') ? old('batch') : $edit->batch}}"/>
                            @error('batch')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                         </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">JoinDate
                                <span style="color: red">*</span>
                            </label>           
                                <input type="date" class="form-control" name="joinDate" value="{{old('joinDate') ? old('joinDate') : $edit->joinDate}}"/>
                            @error('joinDate')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">WorkExp(Year)
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" name="workExp" value="{{old('workExp') ? old('workExp') : $edit->workExp}}"/>
                            @error('workExp')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Education
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" name="education" value="{{old('education') ? old('education') : $edit->education}}"/>
                            @error('education')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Degree
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="degree">
                                <option value="">Please select Degree</option>
                                @foreach($educationList as $education)
                                <option value="{{$education->id}}" @if($edit->educationId==$education->id) selected @endif>{{$education->eduLevel}}</option>
                                @endforeach
                            </select>
                        @error('degree')
                            <span class="text-danger small">*{{$message}}</span><br>
                        @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Band
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="band">
                                <option value="">Please select Band</option>
                                @foreach($bandList as $band)
                                <option value="{{$band->id}}" @if($edit->bandId==$band->id) selected @endif>{{$band->bandNo}}</option>
                                @endforeach
                            </select>
                        @error('band')
                            <span class="text-danger small">*{{$message}}</span><br>
                        @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">PBC
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="pbc">
                                <option value="">Please select PBC</option>
                                @foreach($pbcList as $pbc)
                                <option value="{{$pbc->id}}" @if($edit->PBCId==$pbc->id) selected @endif>{{$pbc->pbcNo}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="position-relative row form-group">
                            <label class="form-label">Japanese
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="japanese">
                                <option value="">Please select Level</option>
                                @foreach($japanList as $japanese)
                                <option value="{{$japanese->id}}"@if($edit->japaneseId==$japanese->id) selected @endif>{{$japanese->jpnLevel}}</option>
                                @endforeach
                            </select>
                        @error('japanese')
                            <span class="text-danger small">*{{$message}}</span><br>
                        @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">English
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="english">
                                <option value="">Please select Level</option>
                                @foreach($englishList as $english)
                                <option value="{{$english->id}}" @if($edit->englishId==$english->id) selected @endif>{{$english->engExamType}} {{$english->engLevel}}</option>
                                @endforeach
                            </select>
                        @error('english')
                            <span class="text-danger small">*{{$message}}</span><br>
                        @enderror
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">CasualLeaves
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" name="casualLeave" value="{{old('casualLeave') ? old('casualLeave') : $edit->casualLeave->payLeave}}"/>
                            @error('casualLeave')
                                <span class="text-danger small">*{{$message}}</span><br>
                            @enderror
                         </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">IT skills
                                <span style="color: red">*</span>
                            </label>    
                            <input id="itSkills" type="text" name="itSkills" class="tagator form-control" data-tagator-show-all-options-on-focus="true" value="{{old('itSkills') ? old('itSkills') : $edit->itSkills}}">       
                            
                        </div>
                        <div class="position-relative form-group mt-3">
                            <input type="submit" value="Save" class="btn btn-primary m-3">
                            <input type="submit" value="Cancel" class="btn btn-danger ">
                        </div>
                    </div>
                   
                </div>
               
            </form>
        </div>
        
    </div>
    
@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/autofillTagging/jquery.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/autofillTagging/fm.tagator.jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/tokeninput/bootstrap-tokenfield.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
       $(document).ready(function(){
           var itSkill=[];
           @foreach($itSkills as $itSkill)
            itSkill.push("{{$itSkill->name}}");
            @endforeach
        $('#itSkills').tagator('autocomplete', itSkill);

});
        </script>
@endsection