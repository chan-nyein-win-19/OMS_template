@extends('layouts.app')

@section('title','Other Asset Detail')

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
	
	@if(session('info'))
		<div class="alert alert-success">{{session('info')}}</div>
	@endif
  <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Other Purchase Update Form</h5>
    	<br>
        <form action="{{ route('otherAsset.update',[$purchasedetail->id]) }}" method="post" >
        @csrf
        @method('PUT')  
          <div class="position-relative row form-group">
            <label for="date" class="col-sm-2 col-form-label">Item Code<span style="color: red">*</span></label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="itemCode" value=""/>
              </div>
          </div> 
          <div class="position-relative row form-group">
          <label for="conditon" class="col-sm-2 col-form-label">Condition<span style="color: red">*</span></label>
            <div class="col-sm-10">
              @if(!$errors->first('condition') )
                <textarea type="textarea" class="form-control" rows="3" name="condition" placeholder="Condition" >{{ old('condition')? old('condition'): $purchasedetail->condition }}</textarea>
              @endif
              @if($errors->first('condition') )
                <textarea type="textarea" class="form-control" rows="3" name="condition" placeholder="Condition" >{{ old('condition')}}</textarea>
                <span class="text-danger"> {{ $errors->first('condition') }} </span>
              @endif
            </div>
        </div> 
        <div class="position-relative row form-group">
          <label for="price" class="col-sm-2 col-form-label">Price <span style="color: red">*</span></label>
            <div class="col-sm-10">
              @if(!$errors->first('currentPrice') )
                <input type="text" class="form-control" name="currentPrice" value="{{ old('currentPrice')? old('currentPrice') : $purchasedetail->currentPrice }}" placeholder="Please enter Price" />
              @endif
              @if($errors->first('currentPrice') )
                <input type="text" class="form-control" name="currentPrice" value="{{ old('currentPrice') }}" placeholder="Please enter Price" />
                <span class="text-danger"> {{ $errors->first('currentPrice') }} </span>
              @endif
            </div>
        </div>
        <div class="position-relative row form-group"><label for="content" class="col-sm-2 col-form-label">Category<span style="color: red">*</span></label>
          <div class="col-sm-10">
            <select class="category form-control" name="category" disabled="disabled">
                <option selected disabled>Choose Category </option>
                @foreach($category as $categories)
                    <option value="{{$categories->id}}" {{ $purchasedetail->purchase->categoryid == $categories->id ? 'selected' : ''}}>{{$categories->name}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="position-relative row form-group"><label for="subcategory" class="col-sm-2 col-form-label">Sub Category<span style="color: red">*</span></label>
            <div class="col-sm-10">
               <select class="subcategory form-control" name="subcategory" disabled="disabled">
                    @foreach($subcategory as $subcategories)
                        <option value="{{$subcategories->id}}" {{ $purchasedetail->purchase->subcategoryid == $subcategories->id ? 'selected' : ''}}>{{$subcategories->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="position-relative row form-group"><label for="content" class="col-sm-2 col-form-label">Brand<span style="color: red">*</span></label>
            <div class="col-sm-10">
               <select class="form-control" name="brand" disabled="disabled">
               <option selected disabled>Choose Brand </option>
                @foreach($brand as $brands)
                  <option value="{{$brands->id}}" {{$purchasedetail->purchase->brandid == $brands->id ? 'selected' : ''}}>{{$brands->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="text-center">
            <input type="Submit" class="mb-2 mr-2 btn btn-primary" value="Update" name="submit">
            <a href="{{ url('/otherpurchase') }}" class="mb-2 mr-2 btn btn-danger">Cancel</a>
        </div>
    </form>
    </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('/storage/OMS/login/jquery.min.js') }}"></script>

<script src="{{ asset('/storage/OMS/login/bootstrap.min.js') }}"></script>

<script type="text/javascript">
	
	 $(document).ready(()=>{
    @if($errors->first('condition')) 
      $("textarea[name='condition']").focus();
    @elseif($errors->first('currentPrice')) 
      $("input[name='currentPrice']").focus();
		@endif
     });
</script>

@endsection