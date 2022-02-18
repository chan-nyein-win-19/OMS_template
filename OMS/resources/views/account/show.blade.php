@extends('layouts.app')

@section('title','account information')

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

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center"  style="font-size:20px;">{{ __('Account Information') }}</div>
                    <div class="card-body">
                        <form method="POST" action=""> 
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
                                    <input type="text" class="form-control" name="fname" value="{{ $user->fname }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('LastName') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lname" value="{{ $user->lname }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="role" value="{{ $user->role }}" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center" >            
                                <a class="btn btn-primary" style="width:70px" href="{{url('/accounts/'.$user->id.'/edit')}}">{{ __('Edit') }}</a>
				 				&nbsp;&nbsp;
					            <a class="btn btn-danger" href="{{url('/successlogin')}}"> {{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

