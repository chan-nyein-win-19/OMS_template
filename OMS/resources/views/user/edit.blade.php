@extends('layouts.app')

@section("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Update Form') }}</div>

                <div class="card-body">


                    <form method="POST" action=" {{ route('users.update',[$edit->id]) }}" novalidate>
                        <!-- <form method="POST" action=""> -->
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="fname" class="col-md-4 col-form-label text-md-end">{{ __('FirstName') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror"
                                    name="fname" value="{{ old('fname') ? old('fname') : $edit->fname}}" autocomplete="fname" autofocus>

                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"
                                    name="lname" value="{{ old('lname') ? old('lname') : $edit->lname}}" autocomplete="lname">

                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{old('username') ? old('username') : $edit->username}}">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{old('email') ? old('email') : $edit->email}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{old('password') ? old('password') :  $edit->password}}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="employeeid"
                                class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input id="employeeid" type="text"
                                    class="form-control @error('employeeid') is-invalid @enderror" name="employeeid"
                                    value="{{old('employeeid') ? old('employeeid') :  $edit->employeeid}}">

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
                                <select class="form-control" type="role" name="role" value="">
                                <option value="{{old('role') ? old('role') :  $edit->role}}">{{$edit->role}}</option>
                                    
                                    <option value="Leader">{{ __('Leader') }}</option>
                                    <option value="Sensei">{{ __('Sensei') }}</option>
                                    <option value="Employee">{{ __('Employee') }}</option>

                                </select>


                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>

                                <button type="reset" class="btn btn-danger">
                                <a href="{{ url('/users') }}" >  {{ __('Cancel') }}
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