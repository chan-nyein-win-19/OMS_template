<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;

    public function purchase(){
        return $this->belongsTo(PcPurchase::class,'purchaseid');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brandid');
    }
   


   

  
}
