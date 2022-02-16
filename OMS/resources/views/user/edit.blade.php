@extends('layouts.app')

@section('title','user account update')

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Account Update Form') }}</div>
                    <div class="card-body">
                        <form method="POST" action=" {{ route('users.update',[$edit->id]) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('FirstName') }}</label>
                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control" name="fname"
                                        value="{{ old('fname') ? old('fname') : $edit->fname}}" autocomplete="fname"
                                        autofocus>
                                    @if($errors->has('fname'))
                                        <span class='text-danger'>
                                            The firstname is required
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('LastName') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lname"
                                        value="{{ old('lname') ? old('lname') : $edit->lname}}" autocomplete="lname">
                                    @if($errors->has('lname'))
                                        <span class='text-danger'>
                                            The lastname is required
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username"
                                        value="{{old('username') ? old('username') : $edit->username}}">
                                    @if($errors->has('username'))
                                        <span class='text-danger'>
                                            {{$errors->first('username')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        value="{{old('email') ? old('email') : $edit->email}}">
                                    @if($errors->has('email'))
                                        <span class='text-danger'>
                                            {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="employeeid"
                                        value="{{old('employeeid') ? old('employeeid') :  $edit->employeeid}}">
                                    @if($errors->has('employeeid'))
                                        <span class='text-danger'>
                                            {{$errors->first('employeeid')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="role">
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
                                    <a href="{{url('/users')}}" class=" btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script>
        $(document).ready(()=>{
            let role = "{{ old('role') ? old('role') : $edit->role }}";
            $('[name="role"]').val(role);
        });
    </script>
@endsection