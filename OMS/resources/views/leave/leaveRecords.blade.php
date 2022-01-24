@extends('layouts.app')

@section('title','Leave Records')

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
    <h2 class="text-center">Leave Records</h2>
    @if(session('info'))
    <div class ="alert alert-success">
        {{session('info')}}
    </div>
    @endif
</div>
<div class="row">
    
    <div class="col-md-4">
   
            <form action="{{url("/leaveRecord/searchLeave")}}" class="form-inline" method="post" >
            @csrf
                
                <div class="mr-3">
                <input type="date" name="date" id="date" class="form-control" value="{{$today}}">
                </div>
                <div class="">
                <input type="submit" value="Search" class="btn btn-primary">
                </div>
                
            </form>
    </div>
    <div class="col-md-5"></div>
    <div class="col-md-3">
        @if(count($leaveRecords)!=0)
        <a href="{{url("/leaves/edit/$today")}}" type="button" class="btn btn-primary mr-2">Edit Leave</a>
        <a href="{{url("/leaveRequestForm/newLeave=true/$today")}}" type="button" class="btn btn-primary mr-2">AddNew</a>
        
        @endif
    </div>
</div>
<hr>

<div class="row mt-3">
<table id="leaveRecord" class="table table-striped" style="width:100%">
<thead>
    <tr>
    <th>Id</th>
    <th>Date</th>
    <th>Time</th>
    <th>Reason</th>
    <th>Comment</th>
    <th>Incharge</th>
    <th>Status</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    
@foreach($leaveRecords as $leaveRecord)
<tr>
   
    <td>{{auth()->user()->employeeid}}</td>
    <td>{{$leaveRecord->date}}</td>
    <td>{{$leaveRecord->time}}</td>
    <td>{{$leaveRecord->reason}}</td>
    <td>{{$leaveRecord->comment}}</td>
    <td>{{$leaveRecord->user->fname}} {{$leaveRecord->user->lname}} </td>
    
    <td><span @if($leaveRecord->status==="Pending")
       
        style="background-color:yellow;"
        
        @elseif($leaveRecord->status=="Approved")
        style="background-color:lightgreen;"
        @else
        style="background-color:#fa8072;"
        @endif   >{{$leaveRecord->status}}</span> 
     
    </td>
    <td><form action="{{route('leaves.destroy',['leaf'=>$leaveRecord])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form></td>
</tr>
@endforeach
</tbody>
   


</table>
   

</div>
 

@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
<script>
        $(document).ready(function() {
            $('#leaveRecord').DataTable();
        } );
</script>
@endsection