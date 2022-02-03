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
        <form method="post" action="" class="container">
            @csrf
            <div class="form-group row">
                <label for="cpu" class="col-sm-4 col-form-label" >Date</label>
                <div class="col-sm-6">
                <div class="md-form">
                    <input type="date" id="purchaseDate" class="form-control" name="purchaseDate">
 
                </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="priceperunit" class="col-sm-4 col-form-label" >Price Per Unit</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="priceperunit" name="priceperunit" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="qty" class="col-sm-4 col-form-label" >Quantity</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="qty" name="qty" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="totalPrice" class="col-sm-4 col-form-label" >Total Price</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label" >Category</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="category" name="category" value="" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="subcategory" class="col-sm-4 col-form-label" >Sub Category</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="subcategory" name="subcategory" value="">
                </div>
            </div>

            <div class="form-group row">
			<label class="col-sm-4 col-form-label">Brand</label>
            <div class="col-sm-6">
			    <select class="form-control" name="brand">
			
				    <option value=""></option>
			
			    </select>
            </div>
		    </div>

            <div class="form-group row">
                <label for="cpu" class="col-sm-4 col-form-label" >CPU</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="cpu" name="cpu" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="cpu" class="col-sm-4 col-form-label" >CPU</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="cpu" name="cpu" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="ram" class="col-sm-4 col-form-label" >RAM</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="cpu" name="cpu" value="">
                </div>
            </div>
        
          

            <div class="form-group row">
                <label for="storage" class="col-sm-4 col-form-label" >Storage</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="storage" name="storage" value="">
                </div>
            </div>
     
          

            <div class="form-group row">
                <label for="itemCode" class="col-sm-4 col-form-label" >Item Code</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="itemCode" name="itemCode" value="">
                </div>
            </div>
    
          

            <div class="form-group row">
                <label for="model" class="col-sm-4 col-form-label" >Model</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="model" name="model" value="">
                </div>
            </div>
            
          

            <div class="form-group row">
                <label for="condition" class="col-sm-4 col-form-label" >Conditon</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="condition" name="condition" value="">
                </div>
            </div>
        

            <div class="form-group row">
                <label for="currentPrice" class="col-sm-4 col-form-label" >Current Price</label>
                <div class="col-sm-6">
                
                <input type="text" class="form-control" id="currentprice" name="currentprice" value="">
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