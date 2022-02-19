<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Pcpurchase;
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
        $pcpurchase=Pcpurchase::all();
        
        return view('pcpurchase.index',compact('pcpurchase'));
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
            'brand'=>'required',
            'cpu'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'model'=>'required',
            'condition'=>'required',
        ]);
        
        //pcpurchase
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
    
        $pcpurchase=new Pcpurchase();
        $pcpurchase->date=request()->date;
        $pcpurchase->priceperunit=request()->priceperunit;
        $pcpurchase->quantity=request()->quantity;
        $pcpurchase->totalprice=request()->totalprice;
        $pcpurchase->cpu=request()->cpu;
        $pcpurchase->ram=request()->ram;
        $pcpurchase->storage=request()->storage;
        $pcpurchase->model=request()->model;
        $pcpurchase->condition=request()->condition;
        $pcpurchase->brandid=request()->brand;
        $pcpurchase->save();
        
        //pc
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

        for($x=0;$x<$pcpurchase->quantity;$x++){
            $code=$code+1;
            $itemcode="PC-".$code;
        $pc=new Pc();
        $pc->cpu=request()->cpu;
        $pc->ram=request()->ram;
        $pc->storage=request()->storage;
        $pc->model=request()->model;
        $pc->itemcode=$itemcode;
        $pc->condition=request()->condition;
        $pc->currentprice=request()->priceperunit;
        $pc->purchaseid=$pcpurchase->id;
        $pc->brandid=request()->brand;
        $pc->status='available';
        $pc->save();
    }
        return redirect('pcpurchase')->with('success','PC Purchase has been added successfully!!');
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
        $edit=Pcpurchase::find($id);
        $brand = Brand::all();
        return view('pcpurchase.edit',compact(['edit','brand']));
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
        //
        $validator = validator(request()->all(),[
            'date'=>'required',
            'priceperunit'=>'required|integer|min:1',
            'quantity'=>'required|integer|min:1',
            'totalprice'=>'required|integer|min:1',
            'brand'=>'required',
            'cpu'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'model'=>'required',
            'condition'=>'required',
            'priceperunit'=>'required|integer',
        ]);
        
        //pcpurchase
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
       
        $pcpurchase=Pcpurchase::find($id);
        $pcpurchase->date=request()->date;
        $pcpurchase->priceperunit=request()->priceperunit;
        $pcpurchase->quantity=request()->quantity;
        $pcpurchase->totalprice=request()->totalprice;
        $pcpurchase->cpu=request()->cpu;
        $pcpurchase->ram=request()->ram;
        $pcpurchase->storage=request()->storage;
        $pcpurchase->model=request()->model;
        $pcpurchase->condition=request()->condition;
        $pcpurchase->brandid=request()->brand;
        $pcpurchase->save();
        return redirect("pcpurchase")->with('info','Pc Purchsae has been updated successfully!!');;
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
        $pc =Pc::where('purchaseId',$id)->delete();
        $pcpurchase = Pcpurchase::where('id',$id)->delete();
        return redirect('pcpurchase')->with('success','Successfully Deleted!!');
    }
}
