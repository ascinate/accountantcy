<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array', // Convert JSON permissions to an array
    ];
}

