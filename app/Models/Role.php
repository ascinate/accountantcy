<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{

    use HasFactory;
    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'permissions',
    ];

    // protected $casts = [
    //     'permissions' => 'array', // Convert JSON permissions to an array
    // ];

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}

