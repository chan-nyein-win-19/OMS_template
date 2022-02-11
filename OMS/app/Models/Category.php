<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subCategory;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    
    public function subcategory(){
        return $this->hasMany(subCategory::class,'categoryId');
    }
}
