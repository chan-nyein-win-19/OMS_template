<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'categoryId',
    //     'description'

    // ];
    protected $table='sub_categories';

    public function category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
    public function subbrand(){
        return $this->belongsTo(Subbrand::class,'subcategoryId');
    }
}
