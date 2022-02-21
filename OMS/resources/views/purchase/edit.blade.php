@extends('layouts.app')

@section('title','Other Purchase Update Form')

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
<div class="container pt-80 mb-100 text-center ">
  <div class="row">
    <div class="col-sm-12">
      @if(session('info'))
          <div class="alert alert-success">{{session('info')}}</div>
      @endif
        <div class="main-card mb-3 card">
          <div class="card-body">
            <div class="col-12 pt-4 mb-5">
              <h3 class="sub-title">Other Purchase Update Form</h3>
            </div>
            <form action="{{ route('otherpurchase.update',[$purchasedetail->id]) }}" method="post" >
              @csrf
              @method('PUT')  
              <div class="form-group row">
                <label for="date" class="col-sm-4 col-form-label">Date<span style="color: red">*</span></label>
                  <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="{{ old('date') ? old('date') : $purchasedetail->date }}"/>
                    @error("date")
                        <span class="text-danger float-left">{{$errors->first('date')}}</span>
                    @enderror  
                  </div>
              </div> 
              <div class="form-group row">
                <label for="priceperunit" class="col-sm-4 col-form-label">Price Per Unit<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="priceperunit" id="priceperunit" value="{{ old('priceperunit')? old('priceperunit') : $purchasedetail->priceperunit }}" placeholder="Please enter Price Per Unit"  onkeyup="add(this)"/>
                  @error("priceperunit")
                    <span class="text-danger float-left"> {{ $errors->first('priceperunit') }} </span>
                  @enderror  
                </div>
              </div>
              <div class="form-group row">
                <label for="quantity" class="col-sm-4 col-form-label">Quantity<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input id="quantity" type="numeric" class="form-control" name="quantity" value="{{ old('quantity')? old('quantity') : $purchasedetail->quantity }}" placeholder="Please enter quantity" onkeyup="add(this)" />
                  @error("quantity")
                    <span class="text-danger float-left"> {{ $errors->first('quantity') }} </span>
                  @enderror  
                </div>
              </div>
              <div class="form-group row">
                <label for="totalprice" class="col-sm-4 col-form-label">Total Price<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <input id="totalprice" type="text" class="form-control" name="totalprice" value="{{ old('totalprice')? old('totalprice') : $purchasedetail->totalprice }}" onkeyup="add(this)" readonly/>
                  @error("totalprice")
                    <span class="text-danger float-left"> {{ $errors->first('totalprice') }} </span>
                  @enderror  
                </div>
              </div>
              <div class="form-group row"><label for="content" class="col-sm-4 col-form-label">Category<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <select class="category form-control" name="category">
                    <option selected disabled>Choose Category </option>
                      @foreach($category as $categories)
                        <option value="{{$categories->id}}" {{$purchasedetail->categoryid == $categories->id ? 'selected' : ''}}>{{$categories->name}}</option>
                      @endforeach
                  </select>
                  <span class="text-danger float-left"> {{ $errors->first('category') }} </span>
                </div>
              </div>
              <div class="form-group row"><label for="subcategory" class="col-sm-4 col-form-label">Sub Category<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <select class="subcategory form-control" name="subcategory">
                    @foreach($subcategory as $subcategories)
                      <option value="{{$subcategories->id}}" {{$purchasedetail->subcategoryid == $subcategories->id ? 'selected' : ''}}>{{$subcategories->name}}</option>
                    @endforeach
                  </select>
                  <span class="text-danger float-left"> {{ $errors->first('subcategory') }} </span>
                </div>
              </div>
              <div class="form-group row"><label for="content" class="col-sm-4 col-form-label">Brand<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <select class="brand form-control" name="brand">
                  @foreach($brand as $brands)
                  <option value="{{$brands->brandId}}" {{$purchasedetail->brandid == $brands->id ? 'selected' : ''}} selected>{{$brands->brand->name}}</option>
                  @endforeach
                  </select>
                  <span class="text-danger float-left"> {{ $errors->first('brand') }} </span>
                </div>
              </div>
              <div class="form-group row">
                <label for="conditon" class="col-sm-4 col-form-label">Condition<span style="color: red">*</span></label>
                <div class="col-sm-6">
                  <textarea id="totalPrice" type="textarea" class="form-control" rows="3" name="condition" placeholder="Condition" >{{ old('condition')? old('condition'): $purchasedetail->condition }}</textarea>
                  <span class="text-danger float-left"> {{ $errors->first('condition') }} </span>
                </div>
              </div> 
              <div class="text-center">
                <input type="Submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
                <a href="{{ url('/otherpurchase') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>  
</div>        
@endsection

@section('script')
  <script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>
  <script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>
  <script type="text/javascript">
    @if ($errors->first('priceperunit'))
			$("input[name='priceperunit']").focus();
		@elseif($errors->first('quantity')) 
      $("input[name='quantity']").focus();
    @elseif($errors->first('category')) 
      $("select[name='category']").focus();
     @elseif($errors->first('brand')) 
      $("select[name='brand']").focus();
    @elseif($errors->first('condition')) 
      $("textarea[name='condition']").focus();
		@endif
  </script>

  <script type="text/javascript">
    $(document).ready(function (){
      $(document).on('change','.category',function(){
        var cat_id=$(this).val();
        var div=$(this).parent().parent().parent();
        var op=" ";
        $.ajax({
          type: 'get',
          url:'/findCategory/'+cat_id,
          data:{'id':cat_id},
          success:function(data){
            op+='<option value="0" selected disabled>Choose Item </option>';
            
            for(var i=0;i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            div.find('.subcategory').html(" ");
            div.find('.subcategory').append(op);
          },
          error:function(error){
            console.log(error);
          }
        });
      });
      $(document).on('change','.subcategory',function(){
        var cat_id=$(this).val();
        var div=$(this).parent().parent().parent();
        var op=" ";
        $.ajax({
          type: 'get',
          url:'/findBrand/'+cat_id,
          data:{'id':cat_id},
          success:function(data){
            op+='<option value="0" selected disabled>Choose Brand</option>';
            
            for(var i=0;i<data.length;i++){
              op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            div.find('.brand').html(" ");
            div.find('.brand').append(op);
            //$('.brand').attr('disabled', false);
          },
          error:function(error){
            console.log(error);
          }
        });
      });
    });

    function add(e){
      var priceperunit = document.getElementById('priceperunit').value;
      var quantity = document.getElementById('quantity').value;
      document.getElementById('totalprice').value = priceperunit*quantity;
    }
  </script>
@endsection