<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;

    public function purchaseRequestDetails(){
        return $this->hasMany(PurchaseRequestDetails::class,'purchase_request_id');
    }
}
