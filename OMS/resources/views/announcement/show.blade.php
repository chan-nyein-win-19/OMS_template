@extends('layouts.app')

@section('title','announcement detail')

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
    <div class="container mt-3">
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title mt-3" style="font-size: 17px;">{{$ann->title}}</h4>
                <h6>{{$ann->created_at}}</h6>
                <div class="card-subtitle mb-2 text-muted">
                <p> {{ $ann->created_at->diffForHumans() }}</p>
                </div>
                <p class="card-text mt-3" style="font-size: 16px;">{{$ann->content}}</p>
                <div class="row mt-4">
                    <div class="col-md-1">
                        <a class="btn btn-outline-primary" href="{{ url('/successlogin')}}">
                            Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
