<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'customerid',
        'warehouseid',
        'date',
        'tax',
        'discount',
        'shipping',
        'otherdetails',
    ];
}
