<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rpq extends Model
{
    use HasFactory;

    public function purchaseRequest(){
        return $this->belongsTo(PurchaseRequest::class,'pr_id');
    }
}
