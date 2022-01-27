@extends('layouts.app')

@section("content")

    <div class="container">
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
                            <label for="employeeid" class="col-md-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input id="employeeid" type="text" class="form-control @error('employeeid') is-invalid @enderror" name="employeeid" value="{{ $user->employeeid }}" disabled>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('FirstName') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') ? old('fname') : $user->fname }}" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('LastName') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') ? old('lname') : $user->lname  }}">

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ? old('username') : $user->username  }}" >

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->email }}" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <!-- <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""  >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                        <hr>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="submit" name="Update" value="Update" class="btn btn-primary">
                           
				 				&nbsp;&nbsp;
                             <!-- <input type="reset" name="cancel" class="btn btn-danger" value="Cancel"/> -->
                             <a class="btn btn-danger" href="{{url('/successlogin')}}"> {{ __('Cancel') }}</a>
                            </div>
                            
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

