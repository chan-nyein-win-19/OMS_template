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
                <div class="card-header justify-content-center"  style="font-size:20px;">{{ __('Change Password') }}</div>

                <div class="card-body">
                    <form method="POST" action=""> 
                        @csrf

                        <div class="row mb-3">
                            <label for="employeeid" class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input id="employeeid" type="text" class="form-control @error('employeeid') is-invalid @enderror" name="employeeid" value="{{ $user->employeeid }}" disabled>

                            </div>
                        </div>

                     

                        <div class="row mb-3">
                            <label for="currentpassword" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="currentpassword" type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="currentpassword" value="" autocomplete="currentpassword" >

                                @error('currentpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" value=""  autocomplete="newpassword">

                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="confirmpassword" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="confirmpassword" type="password" class="form-control @error('confirmpassword') is-invalid @enderror" name="confirmpassword" value="" autocomplete="confirmpassword" >

                                @error('confirmpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="submit" name="update" value="Update" class="btn btn-primary">
                           
				 				&nbsp;&nbsp;
                             <input type="reset" name="cancel" class="btn btn-danger" value="Cancel"/>
                            </div>

                            

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection