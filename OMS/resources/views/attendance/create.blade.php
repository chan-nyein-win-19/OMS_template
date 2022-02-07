@extends('layouts.app')

@section('style')
   
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container pt-80 mb-100 text-center ">
    <div class="row">
       
            @if($errors->any())
                <div class="alert alert-warning">
                    <ol>
                        @foreach($errors->all() as $value)
                        <li> {{$value}} </li>
                        @endforeach
                    </ol>
                </div>
            @endif

        <div class="main-card mb-3 card ">
            <div class="card-body">
                <div class="col-12 pt-4 mb-5">
                    <h3 class="sub-title">Employee Attendance Form</h3>
                </div>
                <form method="post" action="{{ route('attendance.store') }}" class="container">
                    @csrf
                    <div class="form-group row">
                        <label for="employeeId" class="col-sm-4 col-form-label" >Employee ID</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="employeeID" name="employeeID" value="{{Auth::user()->employeeid}}"  readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="attendanceDate" class="col-sm-4 col-form-label">Attendance Date</label>
                        <div class="col-sm-6">
                            <div class="md-form">
                                <input type="date" id="inputMDEx" class="form-control" name="attendanceDate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkIn" class="col-sm-4 col-form-label" >Check in</label>
                        <div class="col-sm-6" id="timepicker1">
                            <input type="time" id="time1" class="form-control" name="checkIn" onchange=getTimeDifference() value="00:00" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkOut" class="col-sm-4 col-form-label" >Check Out</label>
                        <div class="col-sm-6" id="timepicker2">
                            <input type="time" id="time2" class="form-control time1" name="checkOut" onchange=getTimeDifference() value="00:00" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lunchTime" class="col-sm-4 col-form-label">Lunch Time</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lunchThime" name="lunchTime" value="01:00:00" place-holder="01:00" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="workingHour" class="col-sm-4 col-form-label" >Working Hour</label>
                            <!-- <input type="time" id="input3" class="form-control" name="checkOut" > -->
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="workHour" name="workHour" readonly><br>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="radio" class="col-form-label col-sm-4 pt-0">Leave Day</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leaveDay" id="inlineRadio1" value="Yes" />  
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="leaveDay" id="inlineRadio2" value="No" checked/>
                                <label class="form-check-label" for="inlineRadio1">No</label>
                            </div>  
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="radio" class="col-form-label col-sm-4 pt-0">Half Day Leave</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="halfDayLeave" id="inlineRadio1" value="Yes" />  
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="halfDayLeave" id="inlineRadio2" value="No"checked />
                                <label class="form-check-label" for="inlineRadio1">No</label>
                            </div>  
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="radio" class="col-form-label col-sm-4 pt-0">OT Time</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ottime" id="inlineRadio1" value="Yes" />  
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ottime" id="inlineRadio2" value="No" checked/>
                                <label class="form-check-label" for="inlineRadio1">No</label>
                            </div>  
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="radio" class="col-form-label col-sm-4 pt-0">Work From Home</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="wfh" id="inlineRadio1" value="Yes" />  
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="wfh" id="inlineRadio2" value="No" checked/>
                                <label class="form-check-label" for="inlineRadio1">No</label>
                            </div>   
                        </div>   
                    </div>          
                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                            <div class="col-sm-6" >
                                <button type="submit" class="btn btn-primary" style="width:100px; height:50px;">Add</button>
                                <button type="reset" class="btn btn-danger" id="cancel" style="width:100px; height:50px;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')  
<script >
    function timeStringToMins(time) {
        time = time.split(':');
        time[0] = /m$/i.test(time[1]) && time[0] == 12? 0 : time[0];
        return time[0]*60 + parseInt(time[1]) + (/pm$/i.test(time[1])? 720 : 0);
        }
    
    function getTimeDifference() {
        var time1 = document.getElementById("time1").value;
        var time2 = document.getElementById("time2").value;
    // Small helper function to padd single digits
    function z(n){return (n<10?'0':'') + n;}
    // Get difference in minutes
        var diff = timeStringToMins(time2) - timeStringToMins(time1);
        if(timeStringToMins(time2)>720){
        diff=diff-60;
        }

    // Format difference as hh:mm and return
        var timeDifference=z(diff/60 | 0) + ':' + z(diff % 60);
        if(diff>0){
            document.getElementById("workHour").value=timeDifference;
        }else{
            document.getElementById("workHour").value="";
            }
        }
</script>
@endsection




