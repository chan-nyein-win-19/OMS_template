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
        $pcList = Pc::all();
        $otherAssets = Others::all();
        $activePC = true;
        return view('assets.allAssetList',compact(['pcList','otherAssets','activePC']));

    }
    public function currentOthersPrice(){
        $assetLists=Others::all();
        foreach($assetLists as $assets){
            $currentPrice = $assets->currentprice;
            $todayDate = time();
            $purchasePrice = $assets->purchase->priceperunit;
            $purchaseDate = strtotime($assets->purchase->date);
            $yearDiff = floor(($todayDate-$purchaseDate)/(60*60*24*365.25));
            if($yearDiff>0){
                $currentPrice = $purchasePrice-(($purchasePrice)*(0.1*$yearDiff));
                if($currentPrice<=0){
                    $currentPrice = 0;
                }
                $assets->currentprice=$currentPrice;
                $assets->save();
            }
             

        }
        $pcList=Pc::all();
        $otherAssets = Others::all();
        $activePC = false;
        return view('assets.allAssetList',compact(['pcList','otherAssets','activePC']));
    }
    public function currentPcPrice(){
        $PCs=Pc::all();
        foreach($PCs as $Pc){
            $currentPrice = $Pc->currentprice;
            $todayDate = time();
            $purchasePrice = $Pc->purchase->priceperunit;
            $purchaseDate = strtotime($Pc->purchase->date);
            $yearDiff = floor(($todayDate-$purchaseDate)/(60*60*24*365.25));
            if($yearDiff>0){
                $currentPrice = $purchasePrice-(($purchasePrice)*(0.1*$yearDiff));
                if($currentPrice<=0){
                    $currentPrice = 0;
                }
                $Pc->currentprice = $currentPrice;
                $Pc->save();
            }
             

        }
        return redirect("/allAssetLists");
    }
}
