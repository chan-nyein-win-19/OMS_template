@extends('layouts.app')

@section('title','excel attendance create')

@section('style')   
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container pt-80 mb-100 text-center">
        <h3 class="sub-title">Employee Attendance Form</h3><br>
        <div class="row">
            <div class="main-card mb-3 card ">
                <div class="card-body">
                    <form method="post" action="{{ url('/importexcel') }}" class="container">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" />
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection