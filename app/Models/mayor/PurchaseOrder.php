<?php

namespace App\Models\mayor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function purchaseOrderDetails(){
        return $this->hasMany(purchaseOrderDetails::class);
    }
}
