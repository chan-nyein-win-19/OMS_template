<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssetDetails;

class AssetDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assetdetail = AssetDetails::all();
        return view('assetdetail.index', compact('assetdetail'));
    }
}
