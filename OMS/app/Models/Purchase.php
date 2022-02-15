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
    protected $guarded=[];

    // public function Category()
    // {
    //     return $this->hasMany(Category::class);
    // }

    // public function Brand()
    // {
    //     return $this->hasMany(Brand::class,'brandid');
    // }

    // public function subCategory()
    // {
    //     return $this->hasMany(subCategory::class,'subcategoryid');
    // }

    

}
