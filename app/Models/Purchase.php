<?php

namespace App\Models;

use Database\Factories\PurchaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'quantity',
        'unit_cost'
    ];

    public static function newFactory(): Factory
    {
        return PurchaseFactory::new();
    }
}
