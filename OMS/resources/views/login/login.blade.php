@extends('layouts.loginprocess')

@section('title')
    Login Form
@endsection

@section('content')

    <h1 class="text-center">Office Management System</h1>
    <div class="container box">
        <h3 class="text-center">Login Form</h3></br>

        @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <form method="post" action="{{url('/checklogin')}}">
            @csrf
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="employeeid" class="form-control" autofocus />
                @error('employeeid')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" />
                @error('password')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary" value="Login" />
                <input type="reset" name="cancel" class="btn btn-danger" value="Cancel" />
            </div>
            <div class="form-group">
                <a href="{{ url('/forgotpwd')}}">Forgot your password?</a>
            </div>
        </form>
    </div>

@endsection