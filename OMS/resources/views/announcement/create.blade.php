@extends('layouts.app')

@section('title','announcement list')

@section('style')
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
		<div class="alert alert-success">{{session('info')}}</div>
	@endif

	 
	
	<div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Announcement Form</h5>
        	<br>
            <form action="{{ route('announcements.store') }}" method="post" >
            @csrf              
                <div class="position-relative row form-group">
                	<label for="title" class="col-sm-2 col-form-label">Title<span style="color: red">*</span></label>
                    
                    <div class="col-sm-10">
                    	 <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Please enter title of the Content"  />
                    	 @error("title")
                    	 <span class="text-danger"> {{ $errors->first('title') }} </span>
                          @enderror  
                                <!-- <span class="invalid-feedback" role="alert">{{ $errors->first('title') }}</span>  -->
                       <!--  <input name="title" id="title" placeholder="please enter title of the content" type="text" class="form-control" required="required"> -->
                    </div>

                </div>
            
                <div class="position-relative row form-group"><label for="content" class="col-sm-2 col-form-label">Announcement<span style="color: red">*</span></label>
                    <div class="col-sm-10">
                       <!--  <textarea name="content" id="content" class="form-control" required="required" rows="8" placeholder="Contents">
                        </textarea> -->
                         <textarea id="content" type="textarea" class="form-control @error('content') @enderror" rows="8" name="content" placeholder="Contents" >{{ old('content') }}</textarea>
                         <span class="text-danger"> {{ $errors->first('content') }} </span>
                            <!--  <textarea id="content" type="textarea" class="form-control @error('content') is-invalid @enderror" rows="8" name="content" placeholder="Contents" >{{ old('content') }}</textarea> -->
                             <!-- @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                             @enderror -->
                             
                    </div>
                </div> 
                
                                    
                <div class="text-center">
                    <input type="Submit" class="mb-2 mr-2 btn btn-primary" value="Upload" name="submit">
                    <button class="mb-2 mr-2 btn btn-danger" type="reset">Clear</button>
                </div>
            </form>
        </div>
    </div>
@endsection