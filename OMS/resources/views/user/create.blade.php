@extends('layouts.app')

@section("content")

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Create Form') }}</div>

                <div class="card-body">
                    <form method="POST" action=" {{ route('user.store') }}" novalidate>
                    <!-- <form method="POST" action=""> -->
                        @csrf

                        <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-form-label text-md-end">{{ __('FirstName') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  required autocomplete="lname">

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" >

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="employeeid" class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input id="employeeid" type="text" class="form-control @error('employeeid') is-invalid @enderror" name="employeeid"  value="{{ old('employeeid') }}">

                                @error('employeeid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" type="role"  name="role" value="{{ old('role') }}" >
                               
                            <option>{{ __('Please select role') }}</option>
                                 <option value="Leader">{{ __('Leader') }}</option>
                                 <option value="Sensei">{{ __('Sensei') }}</option>
                                 <option value="Employee">{{ __('Employee') }}</option>
                                 
                            </select>

                                
                            </div>
                        </div>

                    

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                                <button type="reset" class="btn btn-danger">
                                    {{ __('Cancel') }}
                                </button>
                            </div>

                            

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  

@endsection