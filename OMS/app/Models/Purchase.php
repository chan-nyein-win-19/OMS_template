<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'subcategoryid');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brandid');
    }
}
