@extends('layouts.app')

@section('title','pc list')

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
        <h2>PC List</h2>
        <table class="mb-0 table table-hover" id="table">
            <thead>
                <tr class="text-center">
                    <th>Brand</th>
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>Storage</th>
                    <th>Item Code</th>
                    <th>Model</th>
                    <th>Condition</th>
                    <th>Current Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>               
                @foreach($pc as $item)
                    <tr class="text-center">
                        <td>{{ $item->brand->name}}</td>
                        <td>{{ $item-> cpu}}</td>
                        <td>{{ $item-> ram}}</td>
                        <td>{{ $item-> storage}}</td>
                        <td>{{ $item-> itemcode}}</td>
                        <td>{{ $item-> model}}</td>
                        <td>{{ $item-> condition}}</td>
                        <td>{{ $item-> currentprice}}</td>
                        <td>{{ $item->category->name}}</td>
                        <td>{{ $item->subCategory->name}}</td>
                        <td>
                            <a type="button" href="{{route('pc.edit', $item->id)}}" class="mb-2  btn-transition btn btn-outline-primary" data-toggle="tooltip" title="Edit">
                                <i class="fa fa-fw"></i>
                            </a>
                            <form action="/pc/{{ $item->id }}" method="POST" id="form{{ $item->id }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" onclick=deleteRecord(this.id) class="mb-2 btn-transition btn btn-outline-danger" data-toggle="tooltip" title="Delete" id="{{$item->id}}">
                                    <i class="fa fa-fw"></i>
                                </button>
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
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.locale.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table').DataTable();
        } );
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