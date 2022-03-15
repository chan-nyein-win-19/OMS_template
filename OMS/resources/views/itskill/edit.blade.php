@extends('layouts.app')

@section('title','IT Skills update')

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
            <h2 class="text-center mb-3">IT Skills Update Form</h2>
            @if(session('info'))
                <div class="alert alert-success">{{session('info')}}</div>
            @endif
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('itskill.update',$edit->id) }}" method="post">
                    @csrf  
                    @method("PUT")            
                        <div class="position-relative row form-group pt-3">
                            <label class="col-sm-3 col-form-label"> Name
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name')? old('name') : $edit->name}}" autocomplete="off" 
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
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="{{ url('/itskill')}}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>            
            </div>            
            <div class="col-md-2 col-sm-1"></div>
        </div>
    </div>
@endsection

@section("script")
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script>
        $(document).ready(()=>{
            let type = "{{ old('type') ? old('type') : $edit->type }}";
            $('[name="type"]').val(type);
        });
    </script>
@endsection