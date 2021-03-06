@extends('layouts.app')

@section('title','announcement update')

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
    <h3 class="text-center">Announcement Update Form</h3><br>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form action="{{ route('announcements.update',[$edit->id]) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="position-relative row form-group"><label for="title" class="col-sm-2 col-form-label">Title<span style="color: red">*</span></label>
                    <div class="col-sm-10">
                        @if(!$errors->first('title') ) 
                            <input type="text" class="form-control" name="title" value="{{ old('title')? old('title') : $edit->title }}" placeholder="Please enter title of the Content"/>
                        @endif
                        @if($errors->first('title'))
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Please enter title of the Content"/>
                            <span class="text-danger"> {{ $errors->first('title') }} </span>
                        @endif
                    </div>
                </div>
                <div class="position-relative row form-group"><label for="content" class="col-sm-2 col-form-label">Announcement<span style="color: red">*</span></label>
                    <div class="col-sm-10">
                        @if(!$errors->first('content') )
                            <textarea class="form-control" rows="8" name="content" placeholder="Contents" >{{ old('content')? old('content'):$edit->content }}</textarea>
                        @endif
                        @if($errors->first('content'))
                            <textarea class="form-control" rows="8" name="content" placeholder="Contents">{{ old('content') }}</textarea>
                            <span class="text-danger"> {{ $errors->first('content') }} </span>
                        @endif
                	</div>
            	</div>
                <div class="text-center">
                    <input type="Submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                    <a href="{{ url('/announcements') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(()=>{
            @if ($errors->first('title'))
                $("input[name='title']").focus();
            @elseif($errors->first('content')) 
                $("textarea[name='content']").focus();
            @endif
        });
    </script>
@endsection