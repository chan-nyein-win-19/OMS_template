<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';

    protected $fillable = [
        'name',
        'categoryId',
        'description'

    ];


    public function category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
}
