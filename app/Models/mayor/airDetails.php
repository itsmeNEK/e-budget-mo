<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class airDetails extends Model
{
    use HasFactory;

    public function air(){
        return $this->belongsTo(air::class);
    }
}
