@extends('layouts.app')

@section('title','SalaryPayment')

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
        <h3 class="text-center mb-3">Salary Payment</h3>
        <div class="card p-5 pt-4">
            <div class="row">
                <div class="col-md-4"><span class="">EmployeeId: <b> 202119</b></span></div>
                <div class="col-md-4"><span>Date:<b>January 2022</b></span></div>
                <div class="col-md-4 "><span>EmployeeName: <b>Aung Aung</b></span></div>
            </div>
            <hr>
            
            <form action="">
                <div class="row">
                    <div class="col-md-4 pr-5">
                        <h5 class="mb-3">Basic Salary</h5>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Basic Salary
                                <span style="color: red">*</span>
                            </label>           
                                <input type="text" class="form-control" value="300000" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> OT Hour
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value=""/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> OverTime
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> LateOverDetection
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> LeaveWithoutPay
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value=""readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> LeaveOverDetection
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> IncomeTax
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> SSC
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> CompanyTrip
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> StaffLoanReturn
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Total Basic Salary
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" value="" step="any" readonly/>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="col-md-4 pr-5">
                        <h5 class="mb-3">Allowance Salary</h5>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Band
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> PBC
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Education
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Japanese
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> English
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Skill
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> PerformanceResult
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Manager
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Transition
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any"/>
                        </div><div class="position-relative row form-group">
                            <label class="form-label"> Total Allowance
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-4 pr-5">
                        <h5 class="mb-3">Others</h5>
                        <div class="position-relative row form-group">
                            <label class="form-label"> ContinuedYear
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> AttendancePerfect
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> HomeAllownace
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> Bonus
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> BusinessTripAllowance
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> HometownAllownace
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> ManualAdjust
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any"/>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label"> ManualAdjustReason
                                <span style="color: red">*</span>
                            </label>           
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="form-label">Total Other Allownace
                                <span style="color: red">*</span>
                            </label>           
                                <input type="number" class="form-control" step="any" readonly/>
                        </div>
                        <hr>
                        <div class="text-right p-2">
                            <span>TotalSalary: <b>500000</b></span>
                        </div>
                        <div class="position-relative form-group mt-3 text-center">
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