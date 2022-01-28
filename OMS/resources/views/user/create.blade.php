@extends('layouts.app')

@section("content")
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif


<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Account Create Form') }}</div>

                <div class="card-body">
                    <form method="POST" action=" {{ route('users.store') }}" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-form-label text-md-end">{{ __('FirstName') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname"
                                    value="{{ old('fname') }}" autocomplete="fname" autofocus>

                                @if($errors->has('fname'))
                                <span class='text-danger'>The firstname is required
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname"
                                    value="{{ old('lname') }}" autocomplete="lname">

                                @if($errors->has('lname'))
                                <span class='text-danger'>The lastname is required
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username"
                                    value="{{ old('username') }}" autocomplete="username">

                                @if($errors->has('username'))
                                <span class='text-danger'>
                                    {{$errors->first('username')}}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}">

                                @if($errors->has('email'))
                                <span class='text-danger'>
                                    {{$errors->first('email')}}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                    value="{{ old('password') }}">

                                @if($errors->has('password'))
                                <span class='text-danger'>
                                    {{$errors->first('password')}}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="employeeid"
                                class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input id="employeeid" type="text"
                                    class="form-control @error('employeeid') is-invalid @enderror" name="employeeid"
                                    value="{{ old('employeeid') }}">

                                @if($errors->has('employeeid'))
                                <span class='text-danger'>
                                    {{$errors->first('employeeid')}}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" type="role" name="role" value="{{ old('role') }}">

                                    <option value="">{{ __('Please select role') }}</option>
                                    <option value="Leader">{{ __('Leader') }}</option>
                                    <option value="Sensei">{{ __('Sensei') }}</option>
                                    <option value="Employee">{{ __('Employee') }}</option>

                                </select>

                                @if($errors->has('role'))
                                <span class='text-danger'>
                                    {{$errors->first('role')}}
                                </span>
                                @endif
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