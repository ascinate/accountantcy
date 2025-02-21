<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table = 'purchase_details';

    public $timestamps = false;

    protected $fillable = [
        'PurchaseID',
        'ProductID',
        'Quantity',
        'UnitPrice',
        'TotalPrice',
    ];
}
