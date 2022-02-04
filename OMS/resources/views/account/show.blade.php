@extends('layouts.app')

@section("content")
 
  
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header justify-content-center" style="font-size:20px;">{{ __('Account Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="row mb-3">
                            <label for="employeeid" class="col-md-4 col-4 col-form-label text-md-end " style="font-weight:bold;">{{ __('Employee ID :') }}</label>
                            <label class="col-md-6 col-6 col-form-label"> {{ $user->employeeid}}<label>
                            
                        </div>
							
                        <div class="row mb-3 ">
						 <label for="fname" class="col-md-4 col-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('FirstName :') }}</label>

                            <label class="col-md-6 col-6 col-form-label ">
                            {{ $user->fname}}
                            </label>
                        </div>


                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('LastName :') }}</label>

                            <label class="col-md-6 col-6 col-form-label">
                            {{ $user->lname }}
                            </label>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('Username :') }}</label>

                            <label class="col-md-6 col-6 col-form-label">
                            {{ $user->username }}
                            </label>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('E-Mail :') }}</label>

                            <label class="col-md-6 col-6 col-form-label ">
                            {{ $user->email}}
                            </label>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-4 col-form-label text-md-end" style="font-weight:bold;">{{ __('Role :') }}</label>

                            <label class="col-md-6 col-6 col-form-label">
                            {{ $user->role}}
                            </label>
                        </div>

                   		 <hr>

                            <div class="text-center" >            
                                <a class="mb-2 mr-2 btn btn-primary" style="font-size: 14px;" href="{{url('/accounts/'.$user->id.'/edit')}}">{{ __('Edit') }}</a>
				 				&nbsp;&nbsp;
					            <a class="mb-2 mr-2 btn btn-danger" style="font-size: 14px;" href="{{url('/successlogin')}}"> {{ __('Cancel') }}</a>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  

@endsection