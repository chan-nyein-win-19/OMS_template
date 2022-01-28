@extends('layouts.app')

@section('title','Office Management System')

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
<div class="container">
        @if(session('anndelete'))
            <div class="alert alert-success">
                {{session('anndelete')}}
            </div>
        @endif
        <h3 class="mb-4">Latest Announcement</h3>
        @foreach($list as $item)
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 16px;">{{$item->title}}</h4>
                <h6>{{$item->created_at}}</h6>
                <div class="card-subtitle mb-2 text-muted">
                    {{ $item->created_at->diffForHumans() }}
                </div>
                <p class="card-text" style="font-size: 15spx;">{{$item->content}}</p>
                <div class="row mt-4">
                    <div class="col-md-1">
                        <a class="btn btn-outline-primary" href="{{ route('announcements.edit', $item->id) }}">
                            Update</a>
                    </div>
                    <div class="col-md-1">
                        <form method="POST" action="{{ route('announcements.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger show_confirm" data-toggle="tooltip">
                                Delete
                            </button>
                        </form>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-outline-info" href="{{route('announcements.show',['announcement'=>$item] )}}">
                        Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-3">
            {{ $list->links('pagination::bootstrap-4') }}
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