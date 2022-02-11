@extends('layouts.app')

@section('title','Category')

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
        <h2 class="text-center mb-3">Category</h2>
        @if(session('info'))
            <div class="alert alert-success">{{session('info')}}</div>
        @endif
        @if(session('catdel'))
            <div class="alert alert-success">{{session('catdel')}}</div>
        @endif
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
            
            <div class="card p-3">
                <form action="{{ route('categories.update', [$edit->id]) }}" method="post" id="cc">
                @csrf             
                @method('PUT') 
                    <div class="position-relative row form-group">
                        <label for="name" class="col-sm-2 col-form-label">
                            Name<span style="color: red">*</span>
                        </label>                        
                        <div class="col-sm-10">
                            @if( !$errors->first('name') )
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name')? old('name'):$edit->name }}" 
                                placeholder="Please enter name of the Category" />
                            @endif
                            @if( $errors->first('name') || $errors->first('description') )
                                @if($errors->first('name'))
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" 
                                    placeholder="Please enter name of the Category" />
                                <span class="text-danger"> {{ $errors->first('name') }} </span>
                                @endif
                            @endif
                        </div>
                    </div>
                
                    <div class="position-relative row form-group">
                        <label for="description" class="col-sm-2 col-form-label">
                            Description<span style="color: red">*</span>
                        </label>
                        <div class="col-sm-10">
                            @if( !$errors->first('description') )
                            <textarea id="description" type="textarea" class="form-control @error('description') @enderror" 
                                rows="3" name="description" placeholder="Description" >{{ old('description')? old('description'):$edit->description }}</textarea>
                            @endif
                            @if( $errors->first('name') || $errors->first('description') )
                                @if($errors->first('description'))
                                <textarea id="description" type="textarea" class="form-control @error('description') @enderror" rows="3" 
                                    name="description" placeholder="Description">{{ old('description') }}</textarea>
                                <span class="text-danger"> {{ $errors->first('description') }} </span>
                                @endif
                            @endif
                        </div>
                    </div> 

                    <div class="text-right">
                        <input type="submit" class="mb-2 mr-2 btn btn-primary" value="Submit" name="submit">
                    </div>
                
                </form>
            </div>            
        </div>
        <div class="col-md-1 col-sm-1"></div>
    </div>
    <br>
    <hr>
    <div class="row mt-3">
        <table class="mb-0 table table-hover" id="category">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr> 
            </thead>
            <tbody>  
                @foreach ($list as $item)              
                <tr>
                    <td> {{ $item->id }} </td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->description }} </td>
                    <td>
                        <form method="GET" action="{{ route('categories.edit', $item->id) }}">
                            @csrf
                            @method('PUT')                       
                            <button class="mb-2 mr-2 btn-transition btn btn-outline-warning"  data-toggle="tooltip" title="Edit">
                                <i class="fa fa-fw"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{route('categories.destroy',['category'=>$item])}}" 
                            id="form{{$item->id}}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="button" onclick=deleteCategory(this.id) class="mb-2 mr-2 btn-transition btn btn-outline-danger" 
                                data-toggle="tooltip" title="Delete" id="{{$item->id}}">
                                <i class="fa fa-fw"></i>
                            </button>
                        </form>
                    </td>
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
<script src="{{ asset('/storage/OMS/bootbox/bootbox.locale.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>

<script type="text/javascript">	
    $(document).ready(()=>{
        @if ($errors->first('name'))
            $("input[name='name']").focus();
        @elseif($errors->first('description')) 
            $("textarea[name='description']").focus();
        @endif
    });
</script>

<script type="text/javascript">
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#category')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
            .DataTable({
                bAutoWidth: false,
                "aoColumns": [
                    null,
                    null,
                    null,
                    null 

                ],
                "aaSorting": [], 

                select: {
                    style: 'multi'
                }
            });
    });
</script>

<script type="text/javascript">    
    $(document).ready(function() {
        $('#category').DataTable();
    });

    function deleteCategory($id) {
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