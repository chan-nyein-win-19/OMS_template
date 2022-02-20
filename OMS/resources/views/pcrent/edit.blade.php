@extends('layouts.app')

@section('content')


<link href="{{ asset('/storage/OMS/attendance/attendanceform.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">

<div class="container pt-80 mb-100 text-center ">
    <div class="row">
        <div class="main-card mb-3 card ">
            <div class="card-body">
                <div class="col-12 pt-4 mb-5">
                    <h3 class="sub-title">PC Rent Update Form</h3>
                </div>  
            <form action="{{ route('pcrent.update',[$edit->id]) }}" method="post" class="container" >
                @csrf
                @method('PUT')                   
                    <div class="form-group row">
                        <label for="employeeid" class="col-sm-4 col-form-label" >EmployeeId<span style="color:red">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="employeeid" name="employeeid" value="{{ old('employeeid') ? old('employeeid') : $edit->employeeId }}">
                            @error("employeeid")
                            <span class="text-danger float-left">{{$errors->first('employeeid')}}</span>
                            @enderror  
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="employeename" class="col-sm-4 col-form-label" >Employee Name<span style="color:red">*</span></label>
                        <div class="col-sm-6"> 
                        <input type="text" class="form-control" id="employeename" name="employeename" value="{{ old('employeename') ? old('employeename') : $edit->employeename }}"  readonly>
                        @error("employeename")
                            <span class="text-danger float-left">{{$errors->first('employeename')}}</span>
                        @enderror  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pc" class="col-sm-4 col-form-label" >Pc<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                        <select class="form-control" name="pc" readonly>
                            @foreach($pc as $value)
                            <option value="{{$value->id}}"{{ $edit->pcid == $value->id ? 'selected' : ''}}>{{$value->itemcode}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>      
                    <div class="form-group row">
                        <label for="remark" class="col-sm-4 col-form-label" >Remark<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control"  name="remark" value="{{ old('remark') ? old('remark') : $edit->remark }}">
                        @error("remark")
                            <span class="text-danger float-left">{{$errors->first('remark')}}</span>
                        @enderror  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="error" class="col-sm-4 col-form-label" >Error<span style="color:red">*</span></label>
                        <div class="col-sm-6">    
                        <input type="text" class="form-control" name="error" value="{{ old('error') ? old('error') : $edit->error }}">
                        @error("error")
                            <span class="text-danger float-left">{{$errors->first('error')}}</span>
                        @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" href="{{ url('/pcrent') }}" class="btn btn-danger" id="cancel" >Clear</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>
<script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>
<script type="text/javascript">
    $('#employeeid').on('keyup', function() {
        $empId=$(this).val();
        $empName=$('#employeename').val();
        $empIdCount = $empId.length;
        console.log($empIdCount);
        console.log($empName);
        if($empIdCount<6) {
            $('#employeename').val("");
             
        } else {
            $.ajax({
            type: 'get',
            url:'/employee/'+$empId,
            data:{'id':$empId},
            success:function(data) {
                console.log(data);
                for(var i=0; i<data.length; i++) {
                    document.getElementById('employeename').value=data[i].username;
                }            
            }
            });                   
        }
        
    });
</script>
@endsection