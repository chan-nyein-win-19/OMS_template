<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = subCategory::all();
        $category = Category::all();
        return view("subCategory.index",compact(['subCategory','category']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'itemcode'=>'required|unique:sub_categories|string',
            'category' => 'required',
            'description' => 'required',
        ]);
       
        $subCategory = new SubCategory;
        $subCategory->name = $request->name;
        $subCategory->itemcode = $request->itemcode;
        $subCategory->categoryId = $request->category;
        $subCategory->description = $request->description;
        $subCategory->save();
        return redirect('/subCategory')->with('info','SubCategory has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory = SubCategory::all();
        return view("subCategory.index",compact("subCategory"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $category = Category::all();
        return view("subCategory.edit",compact(['subCategory','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);

        $validateData = $request->validate([
            'name' => 'required',
            'itemcode'=>'required|unique:sub_categories,itemcode,'.$subCategory->id.'|string',
            'category' => 'required',
            'description' => 'required',
        ]);
        
        $subCategory->name = $request->name;
        $subCategory->itemcode = $request->itemcode;
        $subCategory->categoryId = $request->category;
        $subCategory->description = $request->description;
        $subCategory->save();
        return redirect('/subCategory')->with('info','SubCategory has been successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect('/subCategory');
    }
}
