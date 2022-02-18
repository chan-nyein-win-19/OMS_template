@extends('layouts.app')

@section('title','AllAssetLists')

@section('style')
<link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
<style>
.tabbg {
    background-color: green;
}
</style>
@endsection

@section('topbar')
@parent
@endsection

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($activePC)active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#pcList" type="button"
                role="tab" aria-controls="home" aria-selected="true">PCs</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if(!$activePC)active @endif" id="profile-tab" data-bs-toggle="tab" data-bs-target="#otherList" type="button"
                role="tab" aria-controls="profile" aria-selected="false">OtherAssets</button>
        </li>
        
    </ul>
    <div class="tab-content clearfix mt-5">
        <div class="tab-pane fade show @if($activePC)active @endif" id="pcList" role="tabpanel" aria-labelledby="home-tab">
            <a href='{{url("/allAssetList/updatePcPrice")}}' type="button"
                class="btn btn-primary mb-3">Update Price</a>
            <table id="pcTable" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Itemcode</th>
                        <th>CPU</th>
                        <th>Model</th>
                        <th>Ram</th>
                        <th>Storage</th>
                        <th>PurchaseDate</th>
                        <th>PurchasePrice</th>
                        <th>CurrentPrice</th>
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
                        <td>{{$pc->purchase->date}}</td>
                        <td>{{$pc->purchase->priceperunit}}</td>
                        <td>{{$pc->currentprice}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade show @if(!$activePC)active @endif" id="otherList" role="tabpanel" aria-labelledby="home-tab">
            <a href='{{url("/allAssetList/updateOthersPrice")}}' type="button"
                class="btn btn-primary mb-3">Update Price</a>
            <table id="otherTable" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Itemcode</th>
                        <th>Condition</th>
                        <th>PurchaseDate</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>PurchasePrice</th>
                        <th>CurrentPrice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($otherAssets as $asset)
                    <tr>
                        <td>{{$asset->itemCode}}</td>
                        <td>{{$asset->condition}}</td>
                        <td>{{$asset->purchase->date}}</td>
                        <td>{{$asset->purchase->subCategory->category->name}}</td>
                        <td>{{$asset->purchase->subCategory->name}}</td>
                        <td>{{$asset->purchase->priceperunit}}</td>
                        <td>{{$asset->currentPrice}}</td>

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