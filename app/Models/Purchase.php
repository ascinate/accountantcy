<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'date',
        'supplier_id',
        'warehouse_id',
        'tax',
        'discount',
        'shipping',
        'other_details',
    ];
}
