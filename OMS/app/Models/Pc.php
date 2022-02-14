<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;

    public function purchase(){
        return $this->belongsTo(Purchase::class,'purchaseId');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brandid');
    }
    public function category(){
        return $this->belongsTo(Category::class,'categoryid');
    }
    public function subCategory(){
        return $this->belongsTo(Brand::class,'subcategoryid');
    }


   

  
}
