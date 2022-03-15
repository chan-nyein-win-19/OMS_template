@extends('layouts.app')

@section('title','UserCreate')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/JQuery/jquery-ui.min.css')  }}">
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
    @if(session('alert'))
        <div class="alert alert-danger">
            {{session('alert')}}
        </div>
    @endif
    <div class="container-fluid">
        <h3 class="text-center mb-3">User Create</h3>
        <div class="card p-5 pt-4">
            <form action="">
                <div class="row">
                    <div class="col-md-6 pr-5 pl-5">
                        <div class="position-relative row form-group">
                            <label class="form-label"> EmployeeId
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Name
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Role
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="role">
                                <option value="">Please select role</option>
                                <option value="Admin">Admin</option>
                                <option value="MD">Managing Director</option>
                                <option value="Leader">Leader</option>
                                <option value="Sensei">Sensei</option>
                                <option value="Employee">Employee</option>
                            </select>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Email
                                <span style="color: red">*</span>
                            </label>           
                                <input type="email" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Password
                                <span style="color: red">*</span>
                            </label>           
                                <input type="password" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">NRC
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Gender
                                <span style="color: red">*<br></span>
                            </label> 
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male" >Male</label>
                            </div>
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female" >Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">MarriageStatus
                                <span style="color: red">*<br></span>
                            </label> 
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="marriageStatus" id="married" value="married">
                                <label class="form-check-label" for="male" >Married</label>
                            </div>
                            <div class="form-check form-check-inline" style="line-height:1;">
                                <input class="form-check-input" type="radio" name="marriageStatus" id="single" value="single">
                                <label class="form-check-label" for="female" >Single</label>
                            </div>
                        </div>
                            <div class="position-relative row form-group">
                                <label class="form-label">DOB
                                    <span style="color: red">*</span>
                                </label>           
                                    <input type="date" class="form-control"/>
                            </div>
                            
                        <div class="position-relative row form-group">
                            <label class="form-label">PhNo
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Travel Fees
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Address
                                <span style="color: red">*</span>
                            </label>           
                               <textarea  id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        
                    </div>
                    <div class="col-md-6 pr-5 pl-5">
                        <div class="position-relative row form-group">
                            <label class="form-label">Office
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select office</option>
                                <option value="Admin">Yangon</option>
                                <option value="MD">Mandalay</option>
                            </select>
                        </div>
                        
                        <div class="position-relative row form-group">
                            <label class="form-label">Batch
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">JoinDate
                                <span style="color: red">*</span>
                            </label>           
                                <input type="date" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">WorkExp(Year)
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Education
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Degree
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select Degree</option>
                                <option value="bechlor">Bechlor Degree</option>
                                <option value="master">Master Degree</option>
                            </select>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Band
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select Band</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">PBC
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select PBC</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                            </select>
                        </div>
                        
                        <div class="position-relative row form-group">
                            <label class="form-label">Japanese
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select Level</option>
                                <option value="1">JLPT n5</option>
                                <option value="2">JLPT n4</option>
                            </select>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">English
                                <span style="color: red">*</span>
                            </label>           
                            <select class="form-control" name="office">
                                <option value="">Please select Level</option>
                                <option value="1">IELTS 7</option>
                                <option value="2">IELTS 8</option>
                            </select>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">CasualLeaves
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">IT skills
                                <span style="color: red">*</span>
                            </label>           
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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
    
@endsection