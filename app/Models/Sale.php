<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        'total',
    ];
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
