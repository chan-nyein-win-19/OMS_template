@extends('layouts.app')

@section('title','Leave Records')

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
                <form action="post" class="">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">   
                                <select name="category" id="category" class="form-control mr-3">
                                    <option value="" selected disabled>Category</option>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control mr-3" placeholder>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <textarea name="description" id="description" rows="3" class="form-control mr-3" placeholder="Enter Your Description."></textarea>
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
    <table class="mb-0 table table-hover" id="subCategory">
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
                
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>  
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Description</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                
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
<script src="{{ asset('/storage/OMS/bootbox/bootbox.locale.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#subCategory').DataTable();
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