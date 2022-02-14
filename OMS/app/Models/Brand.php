<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public function purchase(){
        return $this->belongsTo(Purchase::class,'purchaseId');
    }
}
