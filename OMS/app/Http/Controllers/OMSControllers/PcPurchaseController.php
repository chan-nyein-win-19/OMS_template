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
     
        $category = Category::all();
        $subCategory = subCategory::all();

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
            'priceperunit'=>'required',
            'quantity'=>'required',
            'totalprice'=>'required',
            'cpu'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'itemcode'=>'required',
            'model'=>'required',
            'condition'=>'required',
            'currentprice'=>'required',
        ]);
    
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
    
        $purchase = new Purchase();
        $purchase->date = request()->date;
        $purchase->priceperunit = request()->priceperunit;
        $purchase->quantity = request()->quantity;
        $purchase->totalprice = request()->totalprice;
        $purchase->itemcode = request()->itemcode;
        $purchase->condition = request()->condition;
        $purchase->categoryid = request()->categoryid;
        $purchase->subcategoryid = request()->subcategoryid;
        $purchase->brandid = request()->brandid;

        $purchase->save();
        

        for($x=0;$x<$purchase->quantity;$x++){
        $pc = new Pc();
        $pc->cpu = request()->cpu;
        $pc->ram = request()->ram;
        $pc->storage = request()->storage;
        $pc->model = request()->model;
        $pc->itemcode = request()->itemcode;
        $pc->condition = request()->condition;
        $pc->currentprice = request()->currentprice;
        $pc->purchaseid = $purchase->id;
        $pc->categoryid = request()->categoryid;
        $pc->subcategoryid = request()->subcategoryid;
        $pc->brandid = request()->brandid;
        $pc->save();
    }
        return back();
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
