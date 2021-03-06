<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class,'categoryid');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brandid');
    }

    public function subCategory()
    {
        return $this->belongsTo(subCategory::class,'subcategoryid');
    }
}
