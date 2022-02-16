<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Pc;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Purchase;
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

        // $data = Pc::join('brands', 'brands.id', '=', 'pcs.brandid')
        //               ->join('categories', 'categories.id', '=', 'pcs.categoryid')
        //               ->join('sub_categories','sub_categories.id','=','pcs.subcategoryid')
        //               ->join('purchases','purchases.id','=','pcs.purchaseid')
        //       		->get(['brands.name', 'categories.name', 'sub_categories.name']);



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
        return view('pc.create');
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
        //
        $edit=Pc::find($id);
        $category=Category::all();
        $brand=Brand::all();
        $subCategory=subCategory::all();
        return view('pc.edit',compact(['edit','brand','category','subCategory']));
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
        //
        $validator=validator(request()->all(),[         
            'category'=>'required',
            'subcategory'=>'required',
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
        $pc->purchaseid=$purchase->id;
        $pc->categoryid=request()->category;
        $pc->subcategoryid=request()->subcategory;
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
        //
        $pc = Pc::where('id',$id)->delete();
        return redirect('pc');
    }
}
