@extends('layouts.app')

@section('title','attendance update')

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
        <h3 class="sub-title">Employee Attendance Update Form</h3><br>
        <div class="row">
            <div class="main-card mb-3 card ">
                <div class="card-body">
                    <form method="post" action="{{url('/update/'.$edit['id'])}}" class="container">
                        @csrf
                        <br>
                        <div class="form-group row">
                            <label for="employeeId" class="col-sm-4 col-form-label">Employee ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="employeeID" value="{{$edit->userid}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attendanceDate" class="col-sm-4 col-form-label">Attendance Date</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" name="attendanceDate" value="{{$edit->date}}">
                                @if(session('errmsg'))
                                <span class="text-danger float-left"> {{session('errmsg')}} </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="checkIn" class="col-sm-4 col-form-label">Check in</label>
                            <div class="col-sm-6" id="timepicker1">
                                <input type="time" id="time1" class="form-control" name="checkIn" onchange=getTimeDifference() value="{{$edit->checkin}}">
                            </div>
                            @error("checkIn")
                            <span class="text-danger"> {{ $errors->first('checkIn') }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="checkOut" class="col-sm-4 col-form-label">Check Out</label>
                            <div class="col-sm-6" id="timepicker2">
                                <input type="time" id="time2" class="form-control time1" name="checkOut" onchange=getTimeDifference() value="{{$edit->checkout}}">
                            </div>
                            @error("checkOut")
                            <span class="text-danger"> {{ $errors->first('checkOut') }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="lunchTime" class="col-sm-4 col-form-label">Lunch Time</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lunchThime" name="lunchTime" value="01:00:00" place-holder="01:00" readonly>
                            </div>
                            @error("lunchTime")
                            <span class="text-danger"> {{ $errors->first('lunchTime') }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="workingHour" class="col-sm-4 col-form-label">Working Hour</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="workHour" name="workHour" readonly value="{{$edit->workinghour}}"><br>
                            </div>
                            @error("workHour")
                            <span class="text-danger float-left"> {{ $errors->first('workHour') }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="radio" class="col-form-label col-sm-4 pt-0">Leave Day</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="leaveDay" value="Yes" {{ $edit->leaveday == 'Yes' ? 'checked' : '' }} />
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="leaveDay" value="No" {{ $edit->leaveday == 'No' ? 'checked' : '' }} />
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="radio" class="col-form-label col-sm-4 pt-0">Half Day Leave</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="halfDayLeave" value="Yes" {{ $edit->halfdayleave == 'Yes' ? 'checked' : '' }} />
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="halfDayLeave" value="No" {{ $edit->halfdayleave == 'No' ? 'checked' : '' }} />
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="radio" class="col-form-label col-sm-4 pt-0">OT Time</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ottime" value="Yes" {{ $edit->ottime == 'Yes' ? 'checked' : '' }} />
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ottime" value="No" {{ $edit->ottime == 'No' ? 'checked' : '' }} />
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="radio" class="col-form-label col-sm-4 pt-0">Work From Home</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wfh" value="Yes" {{ $edit->workfromhome== 'Yes' ? 'checked' : '' }} />
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wfh" value="No" {{ $edit->workfromhome == 'No' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-6 mt-3">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>
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
    <script>
        function timeStringToMins(time) {
            time = time.split(':');
            time[0] = /m$/i.test(time[1]) && time[0] == 12 ? 0 : time[0];
            return time[0] * 60 + parseInt(time[1]) + (/pm$/i.test(time[1]) ? 720 : 0);
        }

        function getTimeDifference() {
            var time1 = document.getElementById("time1").value;
            var time2 = document.getElementById("time2").value;
            function z(n) {
                return (n < 10 ? '0' : '') + n;
            }

            // Get difference in minutes
            var diff = timeStringToMins(time2) - timeStringToMins(time1);
            if (timeStringToMins(time2) > 720) {
                diff = diff - 60;
            }

            // Format difference as hh:mm and return
            var timeDifference = z(diff / 60 | 0) + ':' + z(diff % 60);
            if (diff > 0) {
                document.getElementById("workHour").value = timeDifference;
            } else {
                document.getElementById("workHour").value = "";
            }

        }
    </script>

@endsection