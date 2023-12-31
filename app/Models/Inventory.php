<?php

namespace App\Models;

use Database\Factories\InventoryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

/**
 * @property string $name
 * @property string $description
 * @property int $quantity
 * @property float $unit_price
 */
class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unit_price',
    ];

    protected $casts = [
        'unit_price' => 'float',
    ];

    public static function newFactory(): Factory
    {
        return InventoryFactory::new();
    }

    public static function calculateTotalCost(): float
    {
        return self::sum(DB::raw('quantity * unit_price'));
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
