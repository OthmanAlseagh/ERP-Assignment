<?php

namespace App\Actions\Inventory;

use App\Data\InventoryData;
use App\Models\Inventory;

class InventoryCreateAction
{
    public function __invoke(InventoryData $data): Inventory
    {
        return Inventory::create($data->toArray());
    }
}
