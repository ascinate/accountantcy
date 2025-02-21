<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'saledetails';

    public $timestamps = false;

    protected $fillable = [
        'SaleID',
        'ProductID',
        'Quantity',
        'UnitPrice',
        'GSTAmount',
        'TotalPrice',
    ];
}
