<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherAssets extends Model
{
    use HasFactory;

    public function assetDetail(){
        return $this->belongsTo(Purchase::class,'assetId');
    }

    public function subCategory(){
        return $this->belongsTo(Purchase::class,'subCategoryId');
    }

    public function brand(){
        return $this->belongsTo(Purchase::class,'brandId');
    }


}

