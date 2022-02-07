@extends('layouts.app')

@section('title','SubCategory')

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

<div class="container-fluid">
    <div class="row">
        <h3 class="text-center mb-3">Subcategory</h3>
        <div class="col-md-2 col-sm-1"></div>
        <div class="col-md-8 col-sm-10">

            <div class="card p-3">
                <form action='{{url("/subCategory")}}' method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <select name="category" id="category" class="form-control mr-3">
                                    <option value="" selected disabled>Category</option>
                                    @foreach($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                        <div class="row">
                                        <div class="col-sm-10">
                                        <span class="text-danger">*{{$message}}</span><br>
                                        </div>

                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control mr-3"
                                    placeholder="SubCategory Name">
                                    @error('name')
                                        <div class="row">
                                        <div class="col-sm-10">
                                        <span class="text-danger">*{{$message}}</span><br>
                                        </div>

                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <textarea name="description" id="description" rows="3" class="form-control mr-3"
                                    placeholder="Enter Your Description."></textarea>

                                    @error('description')
                                        <div class="row">
                                        <div class="col-sm-10">
                                        <span class="text-danger">*{{$message}}</span><br>
                                        </div>

                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary" style="float:right;">
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        <div class="col-md-2 col-sm-1"></div>
    </div>
    <br>
    <hr>
    <div class="row mt-3">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subCategory as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->category->name}}</td>
                    <td>{{$value->description}}</td>
                    <td>
                        <a href="{{route('subCategory.edit',['subCategory'=>$value])}}" class="mb-2 mr-2 btn-transition btn btn-outline-primary" data-toggle="tooltip" title='Edit'>
                                <i class="fa fa-fw"></i>
                        </a>
                        <form action="{{route('subCategory.destroy',['subCategory'=>$value])}}" method="post"
                        id="form{{$value->id}}">
                        @csrf
                        @method('DELETE')

                        <button type="button" onclick=deleteRecord(this.id)
                            class="btn-transition btn btn-outline-danger" id="{{$value->id}}"
                            data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-fw"></i></button>


                    </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            </tabel>

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
<script>
$(document).ready(function() {
    $('#example').DataTable();
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