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
        @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
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
                    @if ( Auth::user()->role == 'Admin')
                        <div class="col-md-1">
                            <a class="btn btn-outline-primary" href="{{ route('announcements.edit', $item->id) }}">
                                Update
                            </a>
                        </div>
                        <div class="col-md-1">
                            <form method="POST" action="{{route('announcements.destroy',['announcement'=>$item])}}" id="form{{$item->id}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" onclick=deleteRecord(this.id) class="mb-2 mr-2 btn-transition btn btn-outline-danger" id="{{$item->id}}">
                                Delete
                                </button>
                            </form>
                        </div>
                        <div class="col-md-1">
                            <a class="btn btn-outline-info" href="{{route('announcements.show',['announcement'=>$item] )}}">
                                Detail
                            </a>
                        </div>
                    @else
                    <div class="col-md-1">
                            <a class="btn btn-outline-info" href="{{url('/announceDetails/'.$item->id)}}">
                                Detail
                            </a>
                    </div>
                    @endif
                        
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
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.all.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.locale.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>

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
                        let formToDelete = document.getElementById("form"+$id);
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