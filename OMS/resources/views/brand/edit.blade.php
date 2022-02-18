@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Brand Update Form</h5>
            <br>
            <form action="{{ route('brands.update',[$edit->id]) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="position-relative row form-group">
                    <label class="col-sm-2 col-form-label">Name<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $edit->name }}" placeholder="Please Enter Brand Name"/>
                            @error("name")
                                <span class="text-danger"> {{ $errors->first('name') }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label class="col-sm-2 col-form-label">Description<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="description" placeholder="Please Enter Description" >{{ old('description') ? old('description') : $edit->description }}</textarea>
                            @error('description')
                                <span class="text-danger"> {{ $errors->first('description') }} </span>
                            @enderror    
                        </div>
                    </div> 
                <div class="text-center">
                    <input type="Submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                    <a href="{{ url('/brands') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>
@endsection