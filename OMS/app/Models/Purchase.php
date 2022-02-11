<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function subCategory()
    {
        return $this->hasMany(subCategory::class);
    }

    

}
