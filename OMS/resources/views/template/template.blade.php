@extends('layouts.app')

@section('title','I am template blade')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <h3 class="mb-3">Latest Announcement</h3>
        @foreach($list as $item)
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 16px;">{{$item->title}}</h4>
                <h6>{{$item->created_at}}</h6>
                <div class="card-subtitle mb-2 text-muted">
                    {{ $item->created_at->diffForHumans() }}
                </div>
                <p class="card-text" style="font-size: 15spx;">{{$item->content}}</p>
                <a class="card-link" href="{{route('announcements.show',['announcement'=>$item] )}}" style="text-decoration: underline">
                    View Detail &raquo;
                </a>
            </div>
        </div>
        @endforeach
        <div class="mt-3">
            {{ $list->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

@section('script')

@endsection