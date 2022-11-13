<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetails extends Model
{
    use HasFactory;

    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    }
}
