@extends('layouts.loginprocess')
@section('title')
Forgot Password Form
@endsection
@section('content')
    <h1 class="text-center">Office Management System</h1>
    <div class ="container box">
        <h3 class="text-center">Forgot Password Form</h3></br>


        <script>
            $(document).ready(()=>{
                $('[name="email"]').focus();
            });
        </script>

        @if($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        
        <form method="post" action="{{ url('/forgotpwd/checkemail' )}}" novalidate>
        @csrf
            <div class="form-group">
                <label>Employee Email</label>
                <input type="email" name="email" class="form-control"/>
                @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        
            <div class="form-group">
                <input type="submit" name="send" class="btn btn-primary" value="Send"/>
                <input type="reset" name="cancel" class="btn btn-danger" value="Cancel"/>
            </div>
        </form>
    </div>
@endsection