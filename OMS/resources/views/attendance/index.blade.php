@extends('layouts.app')

 

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/attendance/attendancelist.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">

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
                                                <th>Action</th>
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

                                                <td>

                                                <a type="button" class="btn btn1 btn-outline-warning mb-1" href="{{url('/edit/'.$item->id)}}" data-toggle="tooltip" title="Edit"><i class="fa fa-fw"></i></a>

                                                <form action="/attendance/{{ $item->id }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn2 btn-outline-danger show_confirm" data-toggle="tooltip" title="Delete"><i class="fa fa-fw"></i></button>
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
    <script src="{{ asset('/storage/OMS/sweetalert/sweetalert.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready( function () {
        $('#table').DataTable();
        } );
    </script>

<script type="text/javascript">
 
 $('.show_confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Are you sure you want to delete this record?`,
          text: "If you delete this, it will be gone forever.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });

</script>
    @endsection

   