@extends('layouts.app')

@section('title','PBC')

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
        <div class="row">
            <h3 class="text-center mb-3">PBC</h3>
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('pbc.store') }}" method="post">
                    @csrf              
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> PBC No.
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pbcno" value="{{ old('pbcno') }}" 
                                    placeholder="Please Enter PBC Number"/>
                                @error("pbcno")
                                <span class="text-danger">{{ $errors->first('pbcno') }}</span>
                                @enderror  
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> Allowance
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="allowance" value="{{ old('allowance') }}" 
                                    placeholder="Please Enter Basic Salary"/>
                                @error("allowance")
                                <span class="text-danger">{{ $errors->first('allowance') }}</span>
                                @enderror  
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
            <div class=" float-right">
                <a href="{{ url('/pbcchangeshistory') }}" class="mb-2 mr-2 btn btn-primary float-right">History</a>
            <div>
            <div class="col-md-2 col-sm-1"></div>
            </div>
            <br>
            <hr>
            <div class="row mt-3">
            <table class="mb-0 table table-hover" id="pbc">
                <thead>
                    <tr>
                        <th>PBC No.</th>
                        <th>Allowance</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>  
                    @foreach ($list as $item)              
                        <tr>
                            <td>{{ $item->pbcNo }}</td>
                            <td>{{ $item->allowance }}</td>
                            <td>
                                <a href="{{ route('pbc.edit', $item->id) }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"  data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-fw"></i>
                                </a>
                                <form method="POST" action="{{ route('pbc.destroy',['pbc'=>$item]) }}" id="form{{$item->id}}">
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
            $('#pbc').DataTable();

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