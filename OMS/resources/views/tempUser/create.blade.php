@extends('layouts.app')

@section('title','SalaryPayment')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/JQuery/jquery-ui.min.css')  }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    @if(session('alert'))
        <div class="alert alert-danger">
            {{session('alert')}}
        </div>
    @endif
    <div class="container-fluid">
        <h3 class="text-center mb-3">User Create</h3>
        <div class="card p-5 pt-4">
            <form action="">
                <div class="position-relative row form-group">
                    <label class="form-label"> Basic Salary
                        <span style="color: red">*</span>
                    </label>           
                        <input type="text" class="form-control" value="300000" readonly/>
                </div>
                <div class="row">
                    <div class="col-md-4">Hello</div>
                    <div class="col-md-4">Hello</div>
                    <div class="col-md-4">Hello</div>
                </div>
               
            </form>
        </div>
        
    </div>
    
@endsection

@section('script')
    
@endsection