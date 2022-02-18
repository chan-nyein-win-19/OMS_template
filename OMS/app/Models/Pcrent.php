<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcrent extends Model
{
    use HasFactory;
    public function pc(){
        return $this->belongsTo(Pc::class,'pcid');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'id');
    }
}
