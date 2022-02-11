<?php

namespace App\Http\Controllers\OMSControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pc;
use App\Models\Others;

class AllAssetsController extends Controller
{
    //
    public function showAllAssets(){
        $pcList=Pc::all();
        $otherAssets=Others::all();
        return view('assets.allAssetList',compact(['pcList','otherAssets']));

    }
}
