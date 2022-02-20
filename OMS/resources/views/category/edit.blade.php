@extends('layouts.app')

@section('title','Category')

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
            <h2 class="text-center mb-3">Category</h2>
            @if(session('info'))
                <div class="alert alert-success">{{session('info')}}</div>
            @endif
            <div class="col-md-1 col-sm-1"></div>
            <div class="col-md-10 col-sm-10">
                <div class="card p-3">
                    <form action="{{ route('categories.update', [$edit->id]) }}" method="post">
                        @csrf             
                        @method('PUT') 
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> Name
                                <span style="color: red">*</span>
                            </label>                        
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name')? old('name') : $edit->name }}" 
                                    placeholder="Please Enter Category Name"/>
                                @error("name")
                                <span class="text-danger"> {{ $errors->first('name') }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label class="col-sm-2 col-form-label"> Description
                                <span style="color: red">*</span>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="description" 
                                    placeholder="Please Enter Description">{{ old('description') ? old('description') : $edit->description }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @enderror  
                            </div>
                        </div> 
                        <div class="text-right">
                            <input type="submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                            <a href="{{ url('/categories') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection