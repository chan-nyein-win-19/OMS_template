@extends('layouts.app')

@section('title','Office Management System')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/template/style.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title mt-3" style="font-size: 17px;">{{$list->title}}</h4>
                <h6>{{$list->created_at}}</h6>
                <div class="card-subtitle mb-2 text-muted">
                    {{-- by <b>{{Auth::user()->username}}</b><br> --}}
                <p> {{ $list->created_at->diffForHumans() }}</p>
                </div>
                <p class="card-text mt-3" style="font-size: 16px;">{{$list->content}}</p>
                <div class="row mt-4">
                    <div class="col-md-1">
                        <a class="btn btn-primary" href="#">
                            Update</a>&nbsp;
                    </div>
                   <div class="col-md-1">
                    <form method="POST" action="">
                        @csrf
                        <a class="btn btn-danger show_confirm" data-toggle="tooltip" href="#" onclick="click();">
                            Delete</a>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/sweetalert/sweetalert.min.js') }}"></script>

    <script type="text/javascript">    
        $('.show_confirm').click( function(event) {            
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this announcement?`,
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