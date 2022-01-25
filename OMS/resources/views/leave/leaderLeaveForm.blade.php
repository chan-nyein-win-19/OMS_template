@extends('layouts.app')

@section('title','Leader Leaves')

@section('style')
<link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
@endsection

@section('topbar')
@parent
@endsection

@section('sidebar')
@parent
@endsection
@section('content')
<div class="row mb-3">
    <h2 class="text-center mb-5">Leave Records</h2>
    @if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif
</div>
<div class="row">

    <div class="col-md-4 mb-3">

        <form action="{{url("/leader/leaveRecord/searchLeave")}}" class="form-inline" method="post">
            @csrf

            <div class="mr-3">
                <input type="hidden" name="filtering" value="{{$filtering}}">
                <input type="date" name="date" id="date" class="form-control" value="{{$today}}">
            </div>
            <div class="">
                <input type="submit" value="Search" class="btn btn-primary">
            </div>

        </form>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-2 mb-3">
        <select
            onchange="this.options[this.selectedIndex].value && (window.location= this.options[this.selectedIndex].value);"
            class="form-control" id="filterLeave">
            <option value="{{url("/leader/leaveRecord/filterLeave/all/$today")}}" @if($filtering=='all' )selected
                @endif>All</option>
            <option value="{{url("/leader/leaveRecord/filterLeave/Pending/$today")}}" @if($filtering=='Pending'
                )selected @endif>Pending</option>
            <option value="{{url("/leader/leaveRecord/filterLeave/Approved/$today")}}" @if($filtering=='Approved'
                )selected @endif>Approved</option>
            <option value="{{url("/leader/leaveRecord/filterLeave/Denied/$today")}}" @if($filtering=='Denied' )selected
                @endif>Denied</option>

        </select>
    </div>
</div>
<hr>

<div class="row mt-3">

    <table id="leaveRecord" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>EmployeeName</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($leaveRecords as $leaveRecord)
            <tr>

                <td>{{$leaveRecord->employee->fname}} {{$leaveRecord->employee->lname}} </td>
                <td>{{$leaveRecord->date}}</td>
                <td>{{$leaveRecord->time}}</td>
                <td>{{$leaveRecord->reason}}</td>
                <td>{{$leaveRecord->comment}}</td>

                <td><span @if($leaveRecord->status==="Pending")

                        style="background-color:yellow;"

                        @elseif($leaveRecord->status=="Approved")
                        style="background-color:lightgreen;"
                        @else
                        style="background-color:#fa8072;"
                        @endif >{{$leaveRecord->status}}</span>

                </td>
                @if($leaveRecord->status==="Pending")

                <td><a href="{{url("/leader/leaveStatus/$leaveRecord->id/approve/$today/$filtering")}}" type="button"
                        class="btn btn-success mb-2">Approve</a> <a
                        href="{{url("/leader/leaveStatus/$leaveRecord->id/deny/$today/$filtering")}}" type="button"
                        class="btn btn-danger mb-2">Deny</a></td>

                @elseif($leaveRecord->status=="Approved")
                <td><a href="{{url("/leader/leaveStatus/$leaveRecord->id/cancel/$today/$filtering")}}" type="button"
                        class="btn btn-success">Cancel</a></td>
                @else
                <td><a href="{{url("/leader/leaveStatus/$leaveRecord->id/cancel/$today/$filtering")}}" type="button"
                        class="btn btn-danger">Cancel</a></td>
                @endif


            </tr>
            @endforeach
        </tbody>



    </table>


</div>


@endsection

@section('script')

<script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
<script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
<!-- <script src="{{ asset('/storage/OMS/sweetalert/sweetalert.min.js') }}"></script> -->
<script>
$(document).ready(function() {
    $('#leaveRecord').DataTable();
});
</script>
@endsection