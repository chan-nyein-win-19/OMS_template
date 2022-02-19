<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';

   public function subbrand()
    {
        return $this->belongsTo(Subbrand::class,'subcategoryid');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'categoryId');
    }
   
}
