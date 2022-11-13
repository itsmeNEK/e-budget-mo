<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class air extends Model
{
    use HasFactory;

    public function airDetailss(){
        return $this->hasMany(airDetails::class);
    }
}
