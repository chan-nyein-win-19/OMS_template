@extends('layouts.app')

@section('content')


<link href="{{ asset('/storage/OMS/attendance/attendanceform.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
<div class="container pt-80 mb-100 text-center ">

    
    <div class="row">
        
        <div class="col-sm-12">
        @if($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach($errors->all() as $value)
                    <li> {{$value}} </li>
                    @endforeach
                </ol>
            </div>
        @endif

        <div class="main-card mb-3 card ">
        <div class="card-body">
        <div class="col-12 pt-4 mb-5">
            <h3 class="sub-title">PC Purchase Form</h3>
        </div>
        <form method="post"  action="{{ route('purchase.store') }}" class="container">
            @csrf
            <div class="form-group row">
                <label for="date" class="col-sm-4 col-form-label" >Date</label>
                <div class="col-sm-6">
                <div class="md-form">
                    <input type="date" class="form-control" name="date">
 
                </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="priceperunit" class="col-sm-4 col-form-label" >Price Per Unit</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="priceperunit" id="priceperunit" onchange=totalPrice() >
                </div>
            </div>

            <div class="form-group row">
                <label for="qty" class="col-sm-4 col-form-label" >Quantity</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="quantity" id="quantity" onchange=totalPrice() >
                </div>
            </div>

            <div class="form-group row">
                <label for="totalprice" class="col-sm-4 col-form-label" >Total Price</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="totalprice" id="totalprice">
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label" >Category</label>
                <div class="col-sm-6">
			    <select class="form-control" name="categoryid">
                    @foreach($category as $value)
				    <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
			    </select>
            </div>
            </div>

            <div class="form-group row">
                <label for="subcategory" class="col-sm-4 col-form-label" >Sub Category</label>
                <div class="col-sm-6">
			    <select class="form-control" name="subcategoryid">
                    @foreach($subCategory as $value)
				    <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
			    </select>
            </div>
            </div>

            <div class="form-group row">
			<label class="col-sm-4 col-form-label">Brand</label>
            <div class="col-sm-6">
			    <select class="form-control" name="brandid">
                    @foreach($brand as $value)
				    <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
			    </select>
            </div>
		    </div>

            <div class="form-group row">
                <label for="cpu" class="col-sm-4 col-form-label" >CPU</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control"  name="cpu" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="ram" class="col-sm-4 col-form-label" >RAM</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="ram" value="">
                </div>
            </div>
        
          

            <div class="form-group row">
                <label for="storage" class="col-sm-4 col-form-label" >Storage</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="storage" value="">
                </div>
            </div>
     
          

            <div class="form-group row">
                <label for="itemcode" class="col-sm-4 col-form-label" >Item Code</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="itemcode" value="">
                </div>
            </div>
    
          

            <div class="form-group row">
                <label for="model" class="col-sm-4 col-form-label" >Model</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="model" value="">
                </div>
            </div>
            
          

            <div class="form-group row">
                <label for="condition" class="col-sm-4 col-form-label" >Conditon</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="condition" value="">
                </div>
            </div>
        

            <div class="form-group row">
                <label for="currentprice" class="col-sm-4 col-form-label" >Current Price</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" name="currentprice" value="">
                </div>
            </div>
           
          
            
            <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-danger" id="cancel" >Cancle</button>
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
var result = parseInt(x*y);
document.getElementById("totalprice").value =result;
}
</script>

@endsection