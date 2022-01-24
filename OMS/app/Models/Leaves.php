<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'leaderid');
    }



    public function employee(){
        return $this->belongsTo(User::class,'employeeId');
    }
}
