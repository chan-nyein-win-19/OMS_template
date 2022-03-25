@extends('layouts.app')

@section('title','attendance list')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
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
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="container">
        <h3 class="text-center">Attendance List</h3>
      
        <table class="mb-0 table table-hover" id="table">
            <thead>
                <tr class="text-center">
                    <th>EmployeeId</th>
                    <th>Date</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>WorkingHour</th>
                    <th>Late Time</th>
                    <th>OT Time</th>
                    <th>LeaveDay</th>
                    <th>Half Day</th>
                    <th>Work From Home</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyAttendances as $item)
                <tr class="text-center">
                    <td>{{ $item->userid }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->checkin }}</td>
                    <td>{{ $item->checkout }}</td>
                    <td>{{ $item->workinghour }}</td>
                    <td>{{ $item->latetime }}</td>
                    <td>{{ $item->ottime }}</td>
                    <td>{{ $item->leaveday }}</td>
                    <td>{{ $item->halfdayleave }}</td>
                    <td>{{ $item->workfromhome}}</td>
                    <td>
                        <a type="button" href="{{route('attendance.edit', $item->id)}}"
                            class="mb-2  btn-transition btn btn-outline-primary" data-toggle="tooltip" title="Edit">
                            <i class="fa fa-fw"></i>
                        </a>
                        <form action="/attendance/{{ $item->id }}" method="POST" id="form{{ $item->id }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="button" onclick=deleteRecord(this.id)
                                class="mb-2 btn-transition btn btn-outline-danger" data-toggle="tooltip" title="Delete"
                                id="{{$item->id}}">
                                <i class="fa fa-fw"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12 mt-2">
            <a href="{{ url('/export') }}" class="mb-2 mr-2 btn btn-primary float-right">Export</a>
            <a href="{{ url('/attendance/create') }}" class="mb-2 mr-2 btn btn-primary float-right">Back</a>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.all.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
            setTimeout(() => {
                $('.alert-success').addClass('d-none');;
            }, 3000);
        });
    </script>

    <script type="text/javascript">
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

    <script>
        $(document).on('click', 'a.paginate_button', function(event) {
            $('[data-toggle="tooltip"]').tooltip();
    })
    </script>
   
@endsection