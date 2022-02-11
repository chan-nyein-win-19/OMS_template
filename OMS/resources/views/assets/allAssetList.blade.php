@extends('layouts.app')

@section('title','Leave Records')

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
    <ul class="nav nav-pills">
        <li class="active mr-5"><a href="#pcList" data-toggle="tab">PCs</a></li>
        <li><a href="#otherList" data-toggle="tab">OtherAssets</a></li>
    </ul>
    <div class="tab-content mt-5">
        <div class="tab-pane active" id="pcList">
            <h1>Pc</h1>
            <table id="pcTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Itemcode</th>
                        <th>CPU</th>
                        <th>Model</th>
                        <th>Ram</th>
                        <th>Storage</th>
                        <th>Condition</th>
                        <th>PurchasePrice</th>
                        <th>PurchaseDate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pcList as $pc)
                    <tr>
                        <td>{{$pc->itemcode}}</td>
                        <td>{{$pc->cpu}}</td>
                        <td>{{$pc->model}}</td>
                        <td>{{$pc->ram}}</td>
                        <td>{{$pc->storage}}</td>
                        <td>{{$pc->condition}}</td>

                        <td>{{$pc->purchase->priceperunit}}</td>
                        <td>{{$pc->purchase->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="otherList">
            <h1>Other</h1>
            <table id="otherTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Itemcode</th>
                        <th>Condition</th>
                        <th>PurchasePrice</th>
                        <th>PurchaseDate</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Brand</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($otherAssets as $asset)
                    <tr>
                        <td>{{$asset->itemcode}}</td>
                        <td>{{$asset->condition}}</td>
                        <td>{{$asset->purchase->priceperunit}}</td>
                        <td>{{$asset->purchase->date}}</td>
                        <td>{{$asset->purchase->subcategory->category->name}}</td>
                        <td>{{$asset->purchase->subcategory->name}}</td>

                        <td>{{$asset->purchase->brand->name}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    @section('script')
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.all.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.locale.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#pcTable').DataTable();
    });
    $(document).ready(function() {
        $('#otherTable').DataTable();
    });
    </script>
    @endsection