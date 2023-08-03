<?php

namespace Tests\Traits;

use App\Models\Inventory;
use Illuminate\Support\Collection;

trait InventoryConfigurationTrait
{
    public function inventory(int $count = 1): Collection|Inventory
    {
        return Inventory::factory()->count($count)->create();
    }
}
