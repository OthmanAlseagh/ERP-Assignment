<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class InventoryData extends Data
{
    public function __construct(
        public string $name,
        public string $description,
        public int $quantity,
        public float $unitPrice
    ) {
    }
}
