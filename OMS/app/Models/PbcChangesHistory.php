<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbcChangesHistory extends Model
{
    use HasFactory;

    public function pbc(){
        return $this->belongsTo(Pbc::class,'pbcid');
    }

}
