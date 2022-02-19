<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Pc;
use App\Models\Brand;
use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;

class PcPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
     
        $category = Category::where('name','Electronic')->get();
        $subCategory = subCategory::where('name','PC')->get();

        return view('pc.create',compact([
            'brand','category','subCategory'
        ]));
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator(request()->all(),[
            'date'=>'required',
            'priceperunit'=>'required|integer|min:1',
            'quantity'=>'required|integer|min:1',
            'totalprice'=>'required|integer|min:1',
            'category'=>'required',
            'subcategory'=>'required',
            'brand'=>'required',
            'cpu'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'model'=>'required',
            'condition'=>'required',
            'currentprice'=>'required|integer',
        ]);
    
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
    
        $purchase=new Purchase();
        $purchase->date=request()->date;
        $purchase->priceperunit=request()->priceperunit;
        $purchase->quantity=request()->quantity;
        $purchase->totalprice=request()->totalprice;
        $purchase->condition=request()->condition;
        $purchase->categoryid=request()->category;
        $purchase->subcategoryid=request()->subcategory;
        $purchase->brandid=request()->brand;

        $purchase->save();
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $lastPC=Pc::join('purchases','purchases.id','=','pcs.purchaseid')
                    ->select('*')->latest('pcs.id')->first();
        $code=0;
        if($lastPC!=null){
        $lastItemCode=explode('-',$lastPC->itemcode);
        $code=$lastItemCode[1];
        }

        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $lastPC=Pc::join('purchases','purchases.id','=','pcs.purchaseid')
                    ->select('*')->latest('pcs.id')->first();
        $code=0;
        if($lastPC!=null){
        $lastItemCode=explode('-',$lastPC->itemcode);
        $code=$lastItemCode[1];
        }

        for($x=0;$x<$purchase->quantity;$x++){
            $code=$code+1;
            $itemcode="PC-".$code;
        $pc=new Pc();
        $pc->cpu=request()->cpu;
        $pc->ram=request()->ram;
        $pc->storage=request()->storage;
        $pc->model=request()->model;
        $pc->itemcode=$itemcode;
        $pc->condition=request()->condition;
        $pc->currentprice=request()->currentprice;
        $pc->purchaseid=$purchase->id;
        $pc->categoryid=request()->category;
        $pc->subcategoryid=request()->subcategory;
        $pc->brandid=request()->brand;
        $pc->status='available';
        $pc->save();
    }
        return back()->with('success','PC Purchase has been added successfully!!');
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
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
