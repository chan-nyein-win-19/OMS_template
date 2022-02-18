<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\subCategory;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=  Brand::all();
        $subcategory = subCategory::all();
        return view("brand.index",compact(['brand','subcategory']));
    }
   
    public function store(Request $request)
    {
        $validate= $request->validate([
            'name' => 'required|unique:brands,name',
            'description' => 'required',
            'subcategory'=>'required',
        ]);
      
        $brand = new Brand;
        $brand->name=request()->name;
        $brand->description=request()->description;
        $brand->subcategoryId=request()->subcategory;
        $brand->save();
        return back()->with('info','Brands Successfully Added...');
    
    }
   
    public function edit($id)
    {
        $edit=Brand::find($id);
        $subcategory = subCategory::all();
        return view('brand.edit',compact('edit','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $validator= $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id.'|string',
            'description' => 'required',
            'subcategory'=>'required',
         ]);
       
        $brand = Brand::find($id);
        $brand->name=request()->name;
        $brand->description=request()->description;
        $brand->subcategoryId=request()->subcategory;
        $brand->save();
        return redirect("brands")->with('info','Brand has been updated successfully!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $delete = $brand::find($brand->id);
        $delete -> delete();
        return back()->with('info','Brand Deleted');
    }
}
