@extends('layouts.app')

@section('title','JPNAllowance update')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
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
            <h2 class="text-center mb-3">Japanese Allowance Update Form</h2>
            @if(session('info'))
                <div class="alert alert-success">{{session('info')}}</div>
            @endif
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('jpnAllowance.update', [$edit->id]) }}" method="post">
                        @csrf             
                        @method('PUT') 
                        <div class="position-relative row form-group mt-3">
                            <label class="col-sm-3 col-form-label"> Japanese Level
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-9">
                                
                                <input type="text" class="form-control" name="jpnLevel" value="{{ $edit->jpnLevel }}" readonly="readonly" />
                                
                               <!--  @if($errors->first('jpnLevel') ) 
                                    <input type="text" class="form-control" name="jpnLevel" value="{{ old('jpnLevel') }}" placeholder="Please Enter Japanese Level"/>
                                    <span class="text-danger"> {{ $errors->first('jpnLevel') }} </span>
                                @endif -->
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="col-sm-3 col-form-label"> Allowance
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-9">
                                @if(!$errors->first('jpnAllowance') ) 
                                    <input type="text" class="form-control" name="jpnAllowance" value="{{ old('jpnAllowance')? old('jpnAllowance') : $edit->jpnAllowance }}" placeholder="Please Enter Allowance"/>
                                @endif
                                @if($errors->first('jpnAllowance') ) 
                                    <input type="text" class="form-control" name="jpnAllowance" value="{{ old('jpnAllowance')}}" placeholder="Please Enter Allowance"/>
                                    <span class="text-danger"> {{ $errors->first('jpnAllowance') }} </span>
                                @endif
                                
                            </div>
                        </div> 
                        <div class="position-relative row form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-6">
                                <input type="submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                                <a href="{{ url('/jpnAllowance') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
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
    <script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(()=>{
            @if ($errors->first('jpnLevel'))
                $("input[name='jpnLevel']").focus();
            @elseif($errors->first('jpnAllowance')) 
                $("input[name='jpnAllowance']").focus();
            @endif
        });
    </script>
@endsection