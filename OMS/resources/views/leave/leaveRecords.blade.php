@extends('layouts.app')

@section('title','leave records')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
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
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif
    </div>
    <div class="row">

        <div class="col-md-4 text-center mb-3 col-sm-5">
            <div style="display:flex;align-item:center;justify-content:center;">
                <form action='{{url("/leaveRecord/searchLeave")}}' class="form-inline" method="post">
                    @csrf

                    <div class="mr-3 mb-3">
                        <input type="date" name="date" id="date" class="form-control" value="{{$today}}">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>

                </form>
            </div>

        </div>
        <div class="col-md-6 col-sm-3"></div>
        <div class="col-md-2 text-center mb-3 col-sm-4">
            @if(count($leaveRecords)!=0)
            <a href='{{url("/leaves/edit/$today")}}' type="button" class="btn btn-primary mr-2 mb-3">Edit Leave</a>
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
                            @endif >{{$leaveRecord->status}}</span>

                    </td>
                    <td>
                        <form action="{{route('leaves.destroy',['leaf'=>$leaveRecord])}}" method="post"
                            id="form{{$leaveRecord->id}}">
                            @csrf
                            @method('DELETE')

                            <button type="button" onclick=deleteRecord(this.id)
                                class="btn-transition btn btn-outline-danger" id="{{$leaveRecord->id}}"
                                data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw">???</i></button>


                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.all.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#leaveRecord').DataTable();
            setTimeout(() => {
                $('.alert-success').addClass('d-none');
            },3000);
        });

        function deleteRecord($id) {
            bootbox.confirm({
                message: "Do You Really want to delete it?This can't be undone.",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {
                    if (result) {
                        let formToDelete = document.getElementById("form" + $id);
                        formToDelete.submit();
                        bootbox.alert({
                            message: "Successfully Deleted!",
                            callback: function() {
                                console.log('This was logged in the callback!');
                            }
                        })
                    }
                }
            });
        }
    </script>
@endsection