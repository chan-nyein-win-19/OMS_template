@extends('layouts.loginprocess')

@section('title')
    One Time Password Form
@endsection

@section('content')

    <h1 class="text-center">Office Management System</h1>

    <div class="container box">
        <h3 class="text-center">One Time Password Form</h3></br>        

        @if(count($errors) == 4 || count($errors) == 1)
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $value)
            {{$value}}
            @endforeach
        </div>
        @endif
        @endif

        <form method="post" action="{{ url('/forgotpwd/checkemail/checkOTP') }}">
            @csrf
            @method('POST')
            <input type="hidden" name="employeeid" value="{{ $employeeid }}">
            <div class="form-group">
                <label>OTP Password</label>
                <input type="number" name="otp" class="form-control" autofocus />
                @error('otp')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="newPassword" class="form-control" id="pass1" onkeyup='checkpwd();' />
                @error('newPassword')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="pass2" onkeyup='checkpwd();' />
                @error('confirmPassword')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="form-group">
                <span id="mess"></span>
            </div>

            <div class="form-group">
                <input type="submit" name="login" id="myBtn" class="btn btn-primary" value="Confirm" />
                <input type="reset" name="cancel" class="btn btn-danger" value="Cancel" />
            </div>
        </form>
    </div>

    <script>
        var checkpwd = function() {
            if (document.getElementById('pass1').value == document.getElementById('pass2').value) {
                document.getElementById('mess').innerHTML = 'You\'re correct. Passwords are matched.';
                document.getElementById('mess').style.color = 'green';
                document.getElementById("myBtn").disabled = false;
            } else {
                document.getElementById('mess').innerHTML = 'Passwords don???t match. Try again.';
                document.getElementById('mess').style.color = 'red';
                document.getElementById("myBtn").disabled = true;
            }
        }
    </script>

@endsection