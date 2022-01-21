@extends('layouts.loginprocess')
@section('title')
Forgot Password Form
@endsection
@section('content')
    <h1 align="center">Office Management System</h1>
    <div class ="container box">
        <h3 align ="center">Forgot Password Form</h3></br>

        @if(isset(Auth::user()->email))
            <script>window.location="/forgotpwd/otpform";</script>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ url("/forgotpwd/checkemail")}}">
        @csrf
            <div class="form-group">
                <label>Employee Email</label>
                <input type="email" id="email" name="email" class="form-control"/>
            </div>
        
            <div class="form-group">
                <input type="submit" name="send" class="btn btn-primary" value="Send"/>
                <input type="reset" name="cancel" class="btn btn-danger" value="Cancel"/>
            </div>
        </form>
    </div>
@endsection