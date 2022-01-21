@extends('layouts.loginprocess')
@section('title')
One Time Password Form
@endsection
@section('content')
    <h1 align="center">Office Management System</h1>
    <div class ="container box">
        <h3 align ="center">One Time Password Form</h3></br>

        <!-- @if(isset(Auth::user()->employeeid))
            <script>window.location="/adminlogin/successlogin";</script>
        @endif -->

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
        <form method="post" action="{{ url("/otp/checkOTP")}}">
        @csrf
            <input type="hidden" name="employeeid" value="{{ $employeeid }}">
            <div class="form-group">
                <label>OTP Password</label>
                <input type="number" name="otp" class="form-control"/>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="newPassword" class="form-control" id="pass1" onkeyup='checkpwd();'/>
            </div>
            <div class="form-group">
                <label>Comfirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="pass2" onkeyup='checkpwd();'/>
            </div>

            <div class="form-group">
                <span id="mess"></span>
            </div>

            <div class="form-group">
                <input type="submit" name="login" id="myBtn" class="btn btn-primary" value="Confirm"/>
                <input type="reset" name="cancel" class="btn btn-danger" value="Cancel"/>
            </div>
        </form>
    </div>
    <script>
        var checkpwd = function(){
            if(document.getElementById('pass1').value == document.getElementById('pass2').value)
            {
                document.getElementById('mess').innerHTML = 'Password is matching';
                document.getElementById('mess').style.color='green';
                document.getElementById("myBtn").disabled = false;
            }
            else{
                document.getElementById('mess').innerHTML = 'Password is not matching';
                document.getElementById('mess').style.color='red';
                document.getElementById("myBtn").disabled = true;
            }
        }
    </script>
@endsection