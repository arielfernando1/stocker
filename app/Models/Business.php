<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'ruc',
        'logo',
        'web',
    ];

    use HasFactory;
}
