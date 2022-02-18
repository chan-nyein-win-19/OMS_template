<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssetDetails;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Purchase;

class OtherAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $list = AssetDetails::all();
        
        return view('otherassetdetail.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchasedetail = AssetDetails::find($id);
        $assetdetail = AssetDetails::where('purchaseId',$id)->get();
        $brand = Brand::all();
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('otherassetdetail.edit',compact('purchasedetail','assetdetail','brand','category','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'condition' => 'required',
            'currentPrice' => 'required',
         ]);
        $assetdetail = AssetDetails::find($id);
        $assetdetail->condition = request()->condition;
        $assetdetail->currentPrice = request()->currentPrice;
        $assetdetail->save();
        return redirect("otherAsset")->with('success',$assetdetail->itemcode.'Asset has been updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = AssetDetails::find($id);
        $purchase = Purchase::find($delete->purchaseId);
        $purchase->quantity = $purchase->quantity-1;
        $purchase->update();
        //dd($purchase->quantity);

        $delete -> delete();
        return redirect('otherAsset')->with('success','Successfully Deleted!!');
    }
}
