<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PurchaseData extends Data
{
    public function __construct(
        public int $inventoryId,
        public int $quantity,
        public float $unitCost
    ) {
    }
}
