@extends('layouts.app')

@section('title','workingday update')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
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
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center mb-3">Working Day Update Form</h2>
            @if(session('info'))
                <div class="alert alert-success">{{session('info')}}</div>
            @endif
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('workingDay.update',$edit->id) }}" method="post">
                    @csrf  
                    @method("PUT")            
                        <div class="position-relative row form-group pt-3">
                            <label class="col-sm-3 col-form-label"> Month
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="month" id="month" value="{{ old('month')? old('month') : $edit->month}}" autocomplete="off" 
                                    />
                                @error("month")
                                <span class="text-danger">{{ $errors->first('month') }}</span>
                                @enderror  
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label class="col-sm-3 col-form-label"> Working Days
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="workingDay" id="" value="{{ old('workingDay')? old('workingDay') : $edit->workingDay}}">
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
    </div>
@endsection

@section('script')

<script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
<script src="{{ asset('/storage/OMS/JQuery/jquery-ui.min.js') }}"></script>
<script>
     $(document).ready(function() {
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
</script>
@endsection