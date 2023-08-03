<?php

namespace App\Models;

use Database\Factories\PurchaseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property Inventory $inventory
 * @property int $quantity
 * @property float $unit_cost
 */
class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'quantity',
        'unit_cost',
    ];

    protected $casts = [
        'unit_cost' => 'float',
    ];

    public static function newFactory(): Factory
    {
        return PurchaseFactory::new();
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
