<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbrand extends Model
{
    use HasFactory;
    protected $table='subbrand';

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brandId');
    }
}
