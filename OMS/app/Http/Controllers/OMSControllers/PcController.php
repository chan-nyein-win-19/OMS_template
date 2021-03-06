<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Pc;
use App\Models\Pcpurchase;
use App\Models\Subbrand;
use App\Models\subCategory;
use Illuminate\Http\Request;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pc=Pc::all();
        return view('pc.index',compact('pc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PC  $pC
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Pc::find($id);
        $subCategory = subCategory::where('name','PC')->first();
        $brand = Subbrand::where('subcategoryId',$subCategory->id)->get();
        $pc = Pc::where('purchaseid',$id)->get();
        return view('pc.edit',compact(['edit','brand', 'pc']));                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PC  $pC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=validator(request()->all(),[         
            'brand'=>'required',
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

        $pc = Pc::find($id);
        $pc->cpu=request()->cpu;
        $pc->ram=request()->ram;
        $pc->storage=request()->storage;
        $pc->model=request()->model;
        $pc->itemcode=request()->itemcode;
        $pc->condition=request()->condition;
        $pc->currentprice=request()->currentprice;
        $pc->brandid=request()->brand;
        $pc->save();
    
        return redirect("pc");       
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PC  $pC
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pc::find($id);
        $pcPurchase = Pcpurchase::find($delete->purchaseid);
        $pcPurchase->quantity = $pcPurchase->quantity-1;
        $pcPurchase->update();

        $delete->delete();
        return redirect('pc')->with('success','Successfully Deleted!!');
    }
}
