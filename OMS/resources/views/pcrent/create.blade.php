@extends('layouts.app')

@section('title','pc rent create')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/attendance/attendanceform.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="container pt-80 mb-100 text-center ">
        <div class="row">
            <div class="col-12 pt-2 mb-3">
                <h3 class="text-center">PC Rent Form</h3>
            </div>
            <div class="main-card mb-3 card ">
                <div class="card-body">
                    <form method="post"  action="{{ route('pcrent.store') }}" class="container">
                        @csrf
                        <div class="form-group row mt-3">
                            <label for="employeeid" class="col-sm-4 col-form-label" >EmployeeId<span style="color:red">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="employeeid" name="employeeid">
                                @error("employeeid")
                                    <span class="text-danger float-left">{{$errors->first('employeeid')}}</span>
                                @enderror  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employeename" class="col-sm-4 col-form-label" >Employee Name<span style="color:red">*</span></label>
                            <div class="col-sm-6"> 
                                <input type="text" class="form-control" id="employeename" name="employeename" readonly>
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
                                <button type="submit" class="btn btn-primary mr-2">Create</button>
                                <button type="reset" class="btn btn-danger" id="cancel" >Clear</button>
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
            $.ajax({
                type:'get',
                url:'/employee/'+$empId,
                data:{'id':$empId},
                success:function(data) {
                    for(var i=0; i<data.length; i++) {
                        document.getElementById('employeename').value=data[i].username;
                    }            
                }
            });
        });
    </script>
@endsection