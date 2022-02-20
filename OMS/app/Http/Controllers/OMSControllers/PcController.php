<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\PC;
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
        //
        $pc=Pc::all();
        return view('pc.index',compact('pc')
        );
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
     * @param  \App\Models\PC  $pC
     * @return \Illuminate\Http\Response
     */
    public function show(PC $pC)
    {
        //
        
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
        return view('pc.edit',compact(['edit','brand']));                
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
        //dd('update fun');
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
        $pc = Pc::where('id',$id)->delete();
        $pc->quantity = $pc->quantity-1;
        $pc->update();
        return redirect('pc');
    }
}
