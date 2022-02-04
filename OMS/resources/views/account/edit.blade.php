@extends('layouts.app')

@section("content")
    
        @if(session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
        @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center"  style="font-size:20px;">{{ __('Account Update Form') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/accounts/'.$user->id)}}"> 
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Employee ID') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="employeeid" value="{{ $user->employeeid }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('FirstName') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fname" value="{{ old('fname') ? old('fname') : $user->fname }}" autofocus>
                                    @error('fname')
                                        <span class="text-danger">
                                            The first name field is required.
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('LastName') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lname" value="{{ old('lname') ? old('lname') : $user->lname }}">
                                    @error('lname')
                                        <span class="text-danger">
                                            The last name field is required.
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : $user->username }}" >
                                    @error('username')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" >
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            
                                <div class="text-center">
                                    <input type="submit" name="Update" value="Update" class="btn btn-primary" style="font-size: 14px;">
                                
                                        &nbsp;&nbsp;
                                    <a class="btn btn-danger" style="font-size: 14px;" href="{{url('/successlogin')}}"> {{ __('Cancel') }}</a>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

