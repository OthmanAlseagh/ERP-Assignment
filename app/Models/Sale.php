<?php

namespace App\Models;

use Database\Factories\SaleFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Inventory $inventory
 * @property int $quantity
 */
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'quantity',
    ];

    public static function newFactory(): Factory
    {
        return SaleFactory::new();
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
