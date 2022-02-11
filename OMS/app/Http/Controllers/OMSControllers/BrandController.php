<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        
        return view('brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'name' => 'required|unique:brands,name',
            'description' => 'required',
         ]);
       
        $brand = new Brand;
        $brand->name=request()->name;
        $brand->description=request()->description;
        $brand->save();
        return back()->with('info','Brands Successfully Added...');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Brand::find($id);
        
        return view('brand.edit',compact('edit'));
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
        $validator= $request->validate([
            'name' => 'required',
            'description' => 'required',
         ]);

        $brand = Brand::find($id);
        $brand->name=request()->name;
        $brand->description=request()->description;
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
