<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::all();
        return view('category.index',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator(request()->all(),[
            'name' => 'required|unique:categories|string',
            'description' => 'required',
        ]);
        if($validator->fails()) {
           return back()->withErrors($validator);
        }

        $category = new Category;
        $category->name = request()->name;
        $category->description = request()->description;
        $category->save();
        return redirect('categories')->with('info','Category has been added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Category::find($id);
        return view('category.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $validator = validator(request()->all(),[
            'name' => 'required|unique:categories,name,'.$category->id.'|string',
            'description' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
       
        $category->name = request()->name;
        $category->description = request()->description;
        $category->save();
        return redirect('categories')->with('success','Category has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $isSubcategoryExists=subCategory::where('categoryId',$category->id)->get();
        if(sizeof($isSubcategoryExists)>0){
            return back()->with('alert','The category you are about to delete already linked with other subcategories!');
        }
        $delete = $category::find($category->id);
        $delete->delete();
        return back()->with('info','Category has been deleted successfully');
    }
}
