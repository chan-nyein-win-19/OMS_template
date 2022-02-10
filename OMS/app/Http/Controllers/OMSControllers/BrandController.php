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
   
    public function edit($id)
    {
        $edit=Brand::find($id);
        
        return view('brand.edit',compact('edit'));
    }
    
    public function update(Request $request, $id)
    {
        $brand=Brand::find($id);
        $validator= $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id,
            'description' => 'required',
         ]);

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
