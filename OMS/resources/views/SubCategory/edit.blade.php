@extends('layouts.app')

@section('title','SubCategory Update')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="text-center mb-5">SubCategory Update Form</h3>
    <div class="card">
        <form action="{{route('subCategory.update',['subCategory'=>$subCategory])}}" method="post" class="p-5">
            @csrf
            @method('PUT')
            <div class="form-group">
                <select name="category" class="form-control mr-3">
                    <option value="" disabled>Category</option>
                        @foreach($category as $item)
                            <option value="{{$item->id}}" 
                                @if($subCategory->categoryId==$item->id)
                                    selected
                                @endif>{{$item->name}}
                            </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="itemcode" class="form-control mr-3" placeholder="Prefix" value="{{ old('itemcode')? old('itemcode') : $subCategory->itemcode }}"> 
                    @error('itemcode')
                        <div class="row">
                            <div class="col-sm-10">
                                <span class="text-danger">*{{$message}}</span><br>
                            </div>
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control mr-3" placeholder="SubCategory Name" value="{{ old('name')? old('name') : $subCategory->name }}"> 
                    @error('name')
                        <div class="row">
                            <div class="col-sm-10">
                                <span class="text-danger">*{{$message}}</span><br>
                            </div>
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <textarea name="description" rows="3" class="form-control mr-3"
                    placeholder="Enter Your Description.">{{ old('description') ? old('description'): $subCategory->description }}</textarea>
                    @error('description')
                        <div class="row">
                            <div class="col-sm-10">
                                <span class="text-danger">*{{$message}}</span><br>
                            </div>
                        </div>
                    @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')

@endsection