@extends('layouts.app')

@section('content')

<link href="{{ asset('/storage/OMS/attendance/attendanceform.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">

<div class="container pt-80 mb-100 text-center ">
    <div class="row">
        <div class="main-card mb-3 card ">
            <div class="card-body">
                <div class="col-12 pt-4 mb-5">
                    <h3 class="sub-title">PC Update Form</h3>
                </div>
                <form method="post" action="{{ route('pc.update', [$edit->id]) }}"  class="container">
                    
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Brand<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control" name="brand" readonly>
                                @foreach($brand as $value)
                                <option value="{{$value->id}}" @if($value->id==$edit->brandid) selected @endif>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpu" class="col-sm-4 col-form-label" >CPU<span style="color:red">*</span></label>
                        <div class="col-sm-6">                        
                            <input type="text" class="form-control"  name="cpu" value="{{ old('cpu') ? old('cpu') : $edit->cpu }}">
                            @error("cpu")
                                <span class="text-danger float-left">{{$errors->first('cpu')}}</span>
                            @enderror  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ram" class="col-sm-4 col-form-label" >RAM<span style="color:red">*</span></label>
                        <div class="col-sm-6">    
                            <input type="text" class="form-control" name="ram" value="{{ old('ram') ? old('ram') : $edit->ram }}">
                            @error("ram")
                                <span class="text-danger float-left">{{$errors->first('ram')}}</span>
                            @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="storage" class="col-sm-4 col-form-label">Storage<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="storage" value="{{ old('storage')? old('storage') : $edit->storage}}">
                            @error("storage")
                                <span class="text-danger float-left">{{$errors->first('storage')}}</span>
                            @enderror 
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="itemcode" class="col-sm-4 col-form-label" >Item Code<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="itemcode" value="{{ old('itemcode')? old('itemcode') : $edit->itemcode}}" readonly>
                            @error("itemcode")
                                <span class="text-danger float-left">{{$errors->first('itemcode')}}</span>
                            @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="model" class="col-sm-4 col-form-label" >Model<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="model" value="{{ old('model')? old('model') : $edit->model}}">
                            @error("model")
                                <span class="text-danger float-left">{{$errors->first('model')}}</span>
                            @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="condition" class="col-sm-4 col-form-label" >Conditon<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="condition" value="{{ old('condition') ? old('condition') : $edit->condition }}">
                            @error("condition")
                                <span class="text-danger float-left">{{$errors->first('condition')}}</span>
                            @enderror 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="currentprice" class="col-sm-4 col-form-label" >Current Price<span style="color:red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="currentprice" value="{{ old('currentprice') ? old('currentprice') : $edit->currentprice}}">
                            @error("currentprice")
                                <span class="text-danger float-left">{{$errors->first('currentprice')}}</span>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="purchase" value="{{ $edit->purchaseid }}">

                    <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-danger" id="cancel" >Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')  
<script>
    function totalPrice()
    {
        var x = parseInt(document.getElementById("priceperunit").value);
        var y = parseInt(document.getElementById("quantity").value);
        var result = parseInt(x*y);
        document.getElementById("totalprice").value=result;
    }
</script>
@endsection