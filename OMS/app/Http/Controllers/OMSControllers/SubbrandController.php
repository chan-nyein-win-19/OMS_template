<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Subbrand;
use App\Models\subCategory;
use Illuminate\Http\Request;

class SubbrandController extends Controller
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
     * @param  \App\Models\Subbrand  $subbrand
     * @return \Illuminate\Http\Response
     */
    public function show(Subbrand $subbrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subbrand  $subbrand
     * @return \Illuminate\Http\Response
     */
    public function edit(Subbrand $subbrand)
    {
        //
        $edit = Subbrand::find($subbrand->id);
        $subcategory = subCategory::all();
        return view("brand.edit",compact(['edit','subcategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subbrand  $subbrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subbrand $subbrand)
    {
        //
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'subcategory'=>'required',
         ]);
         $brandExists=Brand::where('name',request()->name)->first();
         if($brandExists!=null){
             if($brandExists->id==$subbrand->brandId && $request->subcategory==$subbrand->subcategoryId){
                 $subbrand->description=request()->description;
                 $subbrand->save();
                return redirect('brands')->with('info','Brands Successfully Updated...');
             }
            $subBrandExists=Subbrand::where([['subcategoryId',request()->subcategory],['brandId',$brandExists->id]])->get();
            if(count($subBrandExists)<=0){
                $subbrand->subcategoryId=$request->subcategory;
                $subbrand->brandId=$brandExists->id;
                $subbrand->description=request()->description;
                $subbrand->save();
                return redirect('brands')->with('info','Brands Successfully Updated...');
            }else{
                return back()->with('info','Brands already exists...');
            }
         }else{
            $brand=new Brand;
            $brand->name=request()->name;
            $brand->save();
            $newBrand=Brand::where('name',request()->name)->first();
                $subbrand->subcategoryId=request()->subcategory;
                $subbrand->brandId=$newBrand->id;
                $subbrand->description=request()->description;
                $subbrand->save();
                return redirect('brands')->with('info','Brands Successfully Updated...');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subbrand  $subbrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subbrand $subbrand)
    {
        //
        $delete = Subbrand::find($subbrand->id);
        $delete -> delete();
        return back()->with('info','Brand Deleted');
    }
}
