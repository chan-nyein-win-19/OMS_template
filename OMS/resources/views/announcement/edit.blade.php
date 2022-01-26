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
    <!-- @if($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $value)
                <li>{{$value}}</li>
            @endforeach
        </ol>
    </div>
    @endif -->

   
                    
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Announcement Update Form</h5>
        	<br>

            <form action="{{ route('announcements.update',[$edit->id]) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="position-relative row form-group"><label for="title" class="col-sm-2 col-form-label">Title<span style="color: red">*</span></label>
                    <div class="col-sm-10">
                        <!-- <input name="title" id="title" placeholder="please enter title of the content" type="text" class="form-control" required="required" value="{{$edit->title}}"> -->
                        
                        
                        <input id="title" type="text" class="form-control" name="title" value="{{ $edit->title }}" placeholder="Please enter title of the Content"  >
                        
                         @error("title")
                    	 <span class="text-danger"> {{ $errors->first('title') }} </span>
                          @enderror 


                    </div>
                </div>
                <div class="position-relative row form-group"><label for="content" class="col-sm-2 col-form-label">Announcement<span style="color: red">*</span></label>
                    <!-- <div class="col-sm-10"><textarea name="content" id="content" class="form-control" required="required" rows="8" placeholder="Contents">{{$edit->content}}</textarea></div> -->

                    <div class="col-sm-10">
                     
                       <textarea name="content" id="content" class="form-control" rows="8" placeholder="Contents">{{$edit->content}}</textarea>
                     
                    <span class="text-danger"> {{ $errors->first('content') }} </span>
                	</div>
            	</div>
           
                
               
            	
                <div class="text-center">
                    <input type="Submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                    <a href="{{url('/')}}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection