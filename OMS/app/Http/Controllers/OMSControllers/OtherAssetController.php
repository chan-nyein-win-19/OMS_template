<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use App\Models\OtherAssets;
use App\Models\AssetDetails;
use Illuminate\Http\Request;

class OtherAssetController extends Controller
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
     * @param  \App\Models\OtherAssets  $otherAssets
     * @return \Illuminate\Http\Response
     */
    public function show(OtherAssets $otherAssets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherAssets  $otherAssets
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ann=AssetDetails::find($id);
        
        $subcategory= subCategory::all();
        return view('otherasset.edit',compact('ann'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherAssets  $otherAssets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherAssets $otherAssets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherAssets  $otherAssets
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherAssets $otherAssets)
    {
        //
    }
}
