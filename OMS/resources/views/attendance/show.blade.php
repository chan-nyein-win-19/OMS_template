@extends('layouts.app')

@section('title','attendance show list')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/attendance/attendancelist.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')   
<div class="container">
    <h2>Attendance List</h2>            
    <table class="mb-0 table table-hover" id="table">
         <thead>
            <tr>
                <th>EmployeeId</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>WorkingHour</th>
                <th>OT Time</th>
                <th>LeaveDay</th>
                <th>Half Day</th>
                <th>Work From Home</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dailyattendance as $item)
            <tr>
                <td>{{ $item->userid }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->checkin }}</td>
                <td>{{ $item->checkout }}</td>
                <td>{{ $item->workinghour }}</td>
                <td>{{ $item->ottime }}</td>
                <td>{{ $item->leaveday }}</td>
                <td>{{ $item->halfdayleave }}</td>
                <td>{{ $item->workfromhome}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>               
</div>
@endsection

@section('script')   
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/sweetalert/sweetalert.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready( function () {
        $('#table').DataTable();
        } );
    </script>
@endsection