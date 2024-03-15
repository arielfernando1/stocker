<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id',
        'paid',
        'total',
    ];
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

}
