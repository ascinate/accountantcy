<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    public $timestamps = false;

    protected $fillable = [
        'ProductID',
        'Quantity',
        'TransactionType',
        'TransactionDate',
    ];
}
