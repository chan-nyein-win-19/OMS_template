@extends('layouts.app')

@section("content")
    <div class="container">
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    
    @if(session('errormessage'))
        <div class="alert alert-danger">
            {{session('errormessage')}}
        </div>
    @endif
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center"  style="font-size:20px;">{{ __('Change Password') }}</div>
                    <div class="card-body">
                        <form method="POST" action=""> 
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Employee ID') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="employeeid" value="{{ $user->employeeid }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Current Password') }}</label>
                                <div class="col-md-6">
                                    <input id="currentpassword" type="password" class="form-control" name="currentpassword" value="" autocomplete="current-password">
                                    <input type="checkbox" onclick="myFunction()"> Show Password   <br>   
                                    @error('currentpassword')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('New Password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="newpassword" value="" >
                                    @error('newpassword')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end font-weight-bold">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirmpassword" value="" autocomplete="confirmpassword" >
                                    @error('confirmpassword')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary" style="font-size: 14px;">
                                        &nbsp;&nbsp;
                                    <input type="reset" name="cancel" class="btn btn-danger" value="Cancel" style="font-size: 14px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function myFunction() {
        var x = document.getElementById("currentpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>