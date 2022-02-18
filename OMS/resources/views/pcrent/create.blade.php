@extends('layouts.app')

@section('content')


<link href="{{ asset('/storage/OMS/attendance/attendanceform.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">

<div class="container pt-80 mb-100 text-center ">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="main-card mb-3 card ">
            <div class="card-body">
                <div class="col-12 pt-4 mb-5">
                    <h3 class="sub-title">PC Rent Form</h3>
                </div>
                <form method="post"  action="{{ route('pcrent.store') }}" class="container">
                    @csrf
                    <div class="form-group row">
                        <label for="employeeid" class="col-sm-4 col-form-label" >EmployeeId<span style="color:red">*</span></label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" name="employeeid">
                            @error("employeeid")
                                <span class="text-danger float-left">{{$errors->first('employeeid')}}</span>
                            @enderror  
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="employeename" class="col-sm-4 col-form-label" >Employee Name<span style="color:red">*</span></label>
                        <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="employeename" >
                        @error("employeename")
                            <span class="text-danger float-left">{{$errors->first('employeename')}}</span>
                        @enderror  
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="pc" class="col-sm-4 col-form-label" >PC<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                        <select class="form-control" name="pc" readonly>
                            <option selected disabled>Choose PC</option>
                            @foreach($pc as $value)
                            <option value="{{$value['id']}}">{{$value['itemcode']}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger float-left">{{$errors->first('pc')}}</span>
                    </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="remark" class="col-sm-4 col-form-label" >Remark<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                        
                        <input type="text" class="form-control"  name="remark" value="">
                        @error("remark")
                            <span class="text-danger float-left">{{$errors->first('remark')}}</span>
                        @enderror  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="error" class="col-sm-4 col-form-label" >Error<span style="color:red">*</span></label>
                        <div class="col-sm-6">    
                        <input type="text" class="form-control" name="error" value="">
                        @error("error")
                            <span class="text-danger float-left">{{$errors->first('error')}}</span>
                        @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-danger" id="cancel" >Cancle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection