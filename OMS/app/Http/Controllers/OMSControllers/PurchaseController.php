<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\AssetDetails;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Purchase::all();
        return view('purchase.index', compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        $subCategory = SubCategory::all();  
        $brand = Brand::all();
        return view('purchase.create',compact('category','subCategory','brand'));
    }
    public static function findCategory(Request $request){
        $data = SubCategory::select('name','id')->where ('categoryId',$request->id)->take(100)->get();

        return response()->json($data);
    }

    public static function findBrand(Request $request){
        $data = Brand::select('name','id')->where ('subcategoryId',$request->id)->take(100)->get();
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'priceperunit'=>'required',
            'quantity'=>'required',
            'totalprice'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'brand'=>'required',
            'condition'=>'required',
         ]);
        $purchase = new Purchase;
        $purchase->date = request()->date;
        $purchase->condition = request()->condition;
        $purchase->quantity = request()->quantity;
        $purchase->totalprice = request()->totalprice;
        $purchase->priceperunit = request()->priceperunit;
        $purchase->categoryid = request()->category;
        $purchase->subcategoryid = request()->subcategory;
        $purchase->brandid = request()->brand;
        $purchase->save();

        $lastAssets=AssetDetails::join('purchases','purchases.id','=','asset_details.purchaseId')
                    ->where('subcategoryid',request()->subcategory)->latest('asset_details.id')->first();
        
        $code=0;
        if($lastAssets!=null)
        {
            $lastItemCode=explode('-',$lastAssets->itemCode);
            $code=$lastItemCode[1];
        }
        $subCategory=SubCategory::where('id',request()->subcategory)->first();
        if($subCategory!=null)
        {
            $prefix=$subCategory->itemcode;
        }
        for($i = 0; $i<$purchase->quantity; $i++){
            $assetDetail = new AssetDetails;
            $code=$code+1;
            $itemCode=$prefix.'-'.$code;
            $assetDetail->itemCode=$itemCode;
            $assetDetail->condition = request()->condition;
            $assetDetail->currentPrice = request()->priceperunit;
            $assetDetail->purchaseId = $purchase->id;
            $assetDetail->save();
        }
        return redirect('otherpurchase')->with('success','purchase Successfully Added...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $purchasedetail = Purchase::find($id);
        $assetdetail = AssetDetails::where('purchaseId',$id)->get();
        $category = Category::all();
        $subcategory = SubCategory::where('categoryId',$purchasedetail->categoryid)->get();
        $brand = Brand::where('subcategoryId',$purchasedetail->subcategoryid)->get();
        return view('purchase.edit',compact('purchasedetail','assetdetail','brand','category','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validateData = $request->validate([
            'priceperunit'=>'required',
            'quantity'=>'required',
            'totalprice'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'brand'=>'required',
            'condition'=>'required',
         ]);
        $delete = AssetDetails::where('purchaseId',$id)->delete();
        Purchase::where('id',$id)->update([
            'date'=>$request->date,
            'condition'=>$request->condition,
            'quantity'=>$request->quantity,
            'totalprice'=>$request->totalprice,
            'priceperunit'=>$request->priceperunit,
            'categoryid'=>$request->category,
            'subcategoryid'=>$request->subcategory,
            'brandid'=>$request->brand,
        ]);
        $lastAssets=AssetDetails::join('purchases','purchases.id','=','asset_details.purchaseId')
                    ->where('subcategoryid',request()->subcategory)->latest('asset_details.id')->first();
        
        $code=0;
        if($lastAssets!=null)
        {
            $lastItemCode=explode('-',$lastAssets->itemCode);
            $code=$lastItemCode[1];
        }
        $subCategory=SubCategory::where('id',request()->subcategory)->first();
        if($subCategory!=null)
        {
            $prefix=$subCategory->itemcode;
        }

        for($i = 0; $i<$request->quantity; $i++){
            $assetDetail = new AssetDetails;
            $code=$code+1;
            $itemCode=$prefix.'-'.$code;
            $assetDetail->itemCode=$itemCode;
            $assetDetail->condition = request()->condition;
            $assetDetail->currentPrice = request()->priceperunit;
            $assetDetail->purchaseId = $id;
            $assetDetail->save();
        }
        return redirect('otherpurchase')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $assetDetail = AssetDetails::where('purchaseId',$id)->delete();
       $purchase = Purchase::where('id',$id)->delete();
       return redirect('otherpurchase')->with('success','Successfully Deleted!!');
    }
}
