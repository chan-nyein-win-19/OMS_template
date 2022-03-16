@extends('layouts.app')

@section('title','pbc update')

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
            <h2 class="text-center mb-3">Pbc Update Form</h2>
            @if(session('info'))
                <div class="alert alert-success">{{session('info')}}</div>
            @endif
            <div class="col-md-2 col-sm-1"></div>
            <div class="col-md-8 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('pbc.update', [$edit->id]) }}" method="post">
                        @csrf             
                        @method('PUT') 
                        <div class="position-relative row form-group mt-3">
                            <label class="col-sm-2 col-form-label"> PBC No.
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pbcNo" value="{{ old('pbcNo')? old('pbcNo') : $edit->pbcNo }}" 
                                    placeholder="Please Enter Pbc Number"/>
                                @error("pbcNo")
                                <span class="text-danger"> {{ $errors->first('pbcNo') }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> Allowance
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="allowance" value="{{ old('allowance')? old('allowance') : $edit->allowance }}" 
                                    placeholder="Please Enter allowance"/>
                                @error("allowance")
                                <span class="text-danger"> {{ $errors->first('allowance') }} </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="position-relative row form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-6">
                                <input type="submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                                <a href="{{ url('/pbc') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
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

@endsection