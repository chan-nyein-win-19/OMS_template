@extends('layouts.app')

@section('title','workingday')

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
            <h3 class="text-center mb-3">Working Day</h3>
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-4">
                    <form action="{{ route('workingDay.store') }}" method="post">
                    @csrf              
                        <div class="position-relative row form-group">
                            <label class="col-sm-3 col-form-label"> Month
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="month" id="month" value="{{ old('month') }}" autocomplete="off" 
                                    />
                                @error("month")
                                <span class="text-danger">{{ $errors->first('month') }}</span>
                                @enderror  
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label class="col-sm-3 col-form-label"> WorkingDays
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="workingDay" id="" value="{{old('workingDay')}}">
                                <span class="text-danger"> 
                                    @error('workingDay')
                                    {{ $errors->first('workingDay') }} 
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
            <table class="mb-0 table table-hover" id="workingDay">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Working Days</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>  
                    @foreach($list as $workingDay)
                    <tr>
                        <td>{{$workingDay->month}}</td>
                        <td>{{$workingDay->workingDay}}</td>
                        <td>
                            <a href="{{ route('workingDay.edit', $workingDay->id) }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"  data-toggle="tooltip" title="Edit">
                                <i class="fa fa-fw"></i>
                            </a>
                            <form method="POST" action="{{ route('workingDay.destroy',$workingDay->id) }}" id="form{{$workingDay->id}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" onclick=deleteRecord(this.id) class="mb-2 mr-2 btn-transition btn btn-outline-danger" 
                                    data-toggle="tooltip" title="Delete" id="{{ $workingDay->id }}">
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
            $('#workingDay').DataTable();

            setTimeout(() => {
                $('.alert-success').addClass('d-none');;
            }, 3000);
            setTimeout(() => {
            $('.alert-danger').addClass('d-none');;
        }, 3000);

        $('#month').datepicker({
     changeMonth: true,
     changeYear: true,
     dateFormat: 'MM yy',
       
     onClose: function() {
        var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
     },
       
     beforeShow: function() {
       if ((selDate = $(this).val()).length > 0) 
       {
          iYear = selDate.substring(selDate.length - 4, selDate.length);
          iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), $(this).datepicker('option', 'monthNames'));
          $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
           $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
       }
    }
  });
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