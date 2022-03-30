@extends('layouts.app')

@section('title','PBC Changes History')

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
        <div class="row mt-3">
            <h3 class="text-center">PBC Changes History List</h3>
            <div class="col-sm-12 mt-2">
                <a href="{{ url('/pbc') }}" class="mb-2 mr-2 btn btn-primary float-right">Back</a>
            </div>
            <table class="mb-0 table table-hover" id="pbc">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>PBC Name</th>
                        <th>Old Allowance</th>
                        <th>New Allowance</th>
                        <th>Year</th>
                        <th>Update Date</th>
                        <th>Status</th>
                    </tr> 
                </thead>
                <tbody>  
                    @foreach ($list as $item)              
                        <tr>
                            <td>{{ $item->employeeName }}</td>
                            <td>{{ $item->pbcNo }}</td>
                            <td>{{ $item->oldAllowance }}</td>
                            <td>{{ $item->newAllowance }}</td>
                            <td>{{ $item->year }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{{ $item->status}}</td>
                        </tr>  
                    @endforeach                
                </tbody>
            </table>
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
            $('#pbc').DataTable();

            setTimeout(() => {
                $('.alert-success').addClass('d-none');;
            }, 3000);
            setTimeout(() => {
            $('.alert-danger').addClass('d-none');;
        }, 3000);
        });
    </script>
@endsection