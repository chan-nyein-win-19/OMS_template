@extends('layouts.app')

@section('title','IT Skills')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/JQuery/jquery-ui.min.css')  }}">
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
        <div class="row">
            <h3 class="text-center mb-3">IT Skills</h3>
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-4">
                    <form action="{{ route('itskill.store') }}" method="post">
                    @csrf              
                        <div class="position-relative row form-group">
                            <label class="col-sm-3 col-form-label"> Name
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autocomplete="off" 
                                    />
                                @error("name")
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @enderror  
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label class="col-sm-3 col-form-label"> Type
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="type">
                                    <option selected disabled>Please select ITskill Type</option>
                                    <option value="Front-End">{{__('Front-End') }}</option>
                                    <option value="Back-End">{{__('Back-End') }}</option>
                                    <option value="Framework">{{__('Framework') }}</option>
                                    <option value="Database">{{__('Database') }}</option>
                                </select>
                                <span class="text-danger"> 
                                    @error('type')
                                    {{ $errors->first('type') }} 
                                    @enderror
                                </span>
                            </div>
                        </div> 
                        <div class="position-relative row form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-6" >
                                <button type="submit" class="btn btn-primary mr-2">Create</button>
                                <button type="reset" class="btn btn-danger" id="cancel">Cancel</button>
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
            <table class="mb-0 table table-hover" id="itskill">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>  
                    @foreach($list as $itskill)
                    <tr>
                        <td>{{$itskill->name}}</td>
                        <td>{{$itskill->type}}</td>
                        <td>
                            <a href="{{ route('itskill.edit', $itskill->id) }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"  data-toggle="tooltip" title="Edit">
                                <i class="fa fa-fw"></i>
                            </a>
                            <form method="POST" action="{{ route('itskill.destroy',$itskill->id) }}" id="form{{$itskill->id}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" onclick=deleteRecord(this.id) class="mb-2 mr-2 btn-transition btn btn-outline-danger" 
                                    data-toggle="tooltip" title="Delete" id="{{ $itskill->id }}">
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
    <script src="{{ asset('/storage/OMS/JQuery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript">    
        $(document).ready(function() {
            $('#itskill').DataTable();

            setTimeout(() => {
                $('.alert-success').addClass('d-none');;
            }, 3000);
            setTimeout(() => {
            $('.alert-danger').addClass('d-none');;
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