<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
    public function index()
    {
        $brand=  Brand::all();
        
        return view('brand.index',compact('brand'));
    }

    
    public function create()
    {
        
    }

    
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

     
    public function show(Brand $brand)
    {
        //
    }

    
    public function edit($id)
    {
        $edit=Brand::find($id);
        
        return view('brand.edit',compact('edit'));
    }

    
    
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

     
    public function destroy(Brand $brand)
    {
        $delete = $brand::find($brand->id);
        $delete -> delete();
        return back()->with('info','Brand Deleted');
    }
}
