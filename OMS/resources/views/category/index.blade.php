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
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center mb-3">Category</h2>
            <div class="col-md-1 col-sm-1"></div>
            <div class="col-md-10 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('categories.store') }}" method="post">
                    @csrf              
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> Name
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" 
                                    placeholder="Please Enter Category Name"/>
                                @error("name")
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @enderror  
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> Description
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="description" 
                                    placeholder="Please Enter Description">{{ old('description') }}</textarea>
                                <span class="text-danger"> 
                                    {{ $errors->first('description') }} 
                                </span>
                            </div>
                        </div> 
                        <div class="text-right">
                            <input type="submit" class="mb-2 mr-2 btn btn-primary" value="Upload" >
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>  
                    @foreach ($list as $item)              
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $item->id) }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"  data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-fw"></i>
                                </a>
                                <form method="POST" action="{{ route('categories.destroy',['category'=>$item]) }}" id="form{{$item->id}}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" onclick=deleteRecord(this.id) class="mb-2 mr-2 btn-transition btn btn-outline-danger" 
                                        data-toggle="tooltip" title="Delete" id="{{ $item->id }}">
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
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">    
        $(document).ready(function() {
            $('#category').DataTable();

            setTimeout(() => {
                $('.alert-success').addClass('d-none');;
            }, 3000);
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

    <script>
        $(document).on('click','a.paginate_button',function(event){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection