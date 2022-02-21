<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\subCategory;
use App\Models\Subbrand;
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
        $brand = Subbrand::all();
        $subcategory = subCategory::all();
        return view("brand.index", compact(['brand', 'subcategory']));
    }

    public function store(Request $request)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'description' => 'required',
            'subcategory' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $brandExists = Brand::where('name', request()->name)->first();
        if ($brandExists != null) {
            $subBrandExists = Subbrand::where([['subcategoryId', request()->subcategory], ['brandId', $brandExists->id]])->get();
            if (count($subBrandExists) <= 0) {
                $subBrand = new Subbrand;
                $subBrand->subcategoryId = request()->subcategory;
                $subBrand->brandId = $brandExists->id;
                $subBrand->description = request()->description;
                $subBrand->save();
                return back()->with('info', 'Brands Successfully Added...');
            } else {
                return back()->with('info', 'Brands already exists...');
            }
        } else {
            $brand = new Brand;
            $brand->name = request()->name;
            $brand->save();
            $newBrand = Brand::where('name', request()->name)->first();
            $subBrand = new Subbrand;
            $subBrand->subcategoryId = request()->subcategory;
            $subBrand->brandId = $newBrand->id;
            $subBrand->description = request()->description;
            $subBrand->save();
            return back()->with('info', 'Brands Successfully Added...');
        }
    
    }

    public function edit($id)
    {
        $edit = Brand::find($id);
        $category = Category::all();
        return view('brand.edit', compact('edit', 'category'));
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
        $validator = validator(request()->all(), [
            'name' => 'required|unique:brands,name,' . $brand->id . '|string',
            'description' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $brand = Brand::find($id);
        $brand->name = request()->name;
        $brand->description = request()->description;
        $brand->categoryId = request()->category;
        $brand->save();
        return redirect("brands")->with('info', 'Brand has been updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $delete = Subbrand::find($brand->id);
        $delete->delete();
        return back()->with('info', 'Brand Deleted');
    }
}
