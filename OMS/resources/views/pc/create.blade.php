@extends('layouts.app')

@section('title','pc purchase create')

@section('style')
    <link href="{{ asset('/storage/OMS/attendance/attendanceform.css') }}" rel="stylesheet">
    <link href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('/storage/OMS/css/style.css') }}" rel="stylesheet">
@endsection 

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container pt-80 mb-100 text-center ">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-12 pt-4 mb-3">
                    <h3 class="text-center">PC Purchase Form</h3>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="main-card mb-3 card ">
                    <div class="card-body">
                        <form method="post"  action="{{ route('pcpurchase.store') }}" class="container">
                        @csrf
                            <div class="form-group row mt-3">
                                <label for="date" class="col-sm-4 col-form-label" >Date</label>
                                <div class="col-sm-6">
                                    <div class="md-form">
                                        <input type="date" class="form-control" name="date">
                                        @error("date")
                                            <span class="text-danger float-left">{{$errors->first('date')}}</span>
                                        @enderror  
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priceperunit" class="col-sm-4 col-form-label" >Price Per Unit<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="priceperunit" id="priceperunit" onkeyup=totalPrice() >
                                    @error("priceperunit")
                                        <span class="text-danger float-left">{{$errors->first('priceperunit')}}</span>
                                    @enderror  
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="qty" class="col-sm-4 col-form-label" >Quantity<span style="color:red">*</span></label>
                                <div class="col-sm-6"> 
                                    <input type="text" class="form-control" name="quantity" id="quantity" onkeyup=totalPrice() >
                                    @error("quantity")
                                        <span class="text-danger float-left">{{$errors->first('quantity')}}</span>
                                    @enderror  
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="totalprice" class="col-sm-4 col-form-label" >Total Price<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="totalprice" id="totalprice" readonly>
                                    @error("totalprice")
                                        <span class="text-danger float-left">{{$errors->first('totalprice')}}</span>
                                    @enderror  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Brand<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="brand" readonly>
                                        <option selected disabled>Choose Brand</option>
                                        @foreach($brand as $value)
                                        <option value="{{$value->brand->id}}">{{$value->brand->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger float-left">{{$errors->first('brand')}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cpu" class="col-sm-4 col-form-label" >CPU<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control"  name="cpu" value="">
                                    @error("cpu")
                                        <span class="text-danger float-left">{{$errors->first('cpu')}}</span>
                                    @enderror  
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ram" class="col-sm-4 col-form-label" >RAM<span style="color:red">*</span></label>
                                <div class="col-sm-6">    
                                    <input type="text" class="form-control" name="ram" value="">
                                    @error("ram")
                                        <span class="text-danger float-left">{{$errors->first('ram')}}</span>
                                    @enderror 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="storage" class="col-sm-4 col-form-label" >Storage<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="storage" value="">
                                    @error("storage")
                                        <span class="text-danger float-left">{{$errors->first('storage')}}</span>
                                    @enderror 
                                </div>
                            </div>
                  
                            <div class="form-group row">
                                <label for="model" class="col-sm-4 col-form-label" >Model<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="model" value="">
                                    @error("model")
                                        <span class="text-danger float-left">{{$errors->first('model')}}</span>
                                    @enderror 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="condition" class="col-sm-4 col-form-label" >Conditon<span style="color:red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="condition" value="">
                                    @error("condition")
                                        <span class="text-danger float-left">{{$errors->first('condition')}}</span>
                                    @enderror 
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-6 mt-2">
                                    <button type="submit" class="btn btn-primary mr-2">Create</button>
                                    <button type="reset" class="btn btn-danger" id="cancel" >Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')  
    <script>
        function totalPrice(){
            var x = parseInt(document.getElementById("priceperunit").value);
            var y = parseInt(document.getElementById("quantity").value);
            var result = x*y;
            if(isNaN(result)) {
                document.getElementById("result").value=0;
            }else{
            document.getElementById("totalprice").value =result;
            }
        }
    </script>
@endsection