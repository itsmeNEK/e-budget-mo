<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequestDetails extends Model
{
    use HasFactory;

    public function purchaseRequest(){
        return $this->belongsTo(PurchaseRequest::class,'purchase_request_id');
    }
}
