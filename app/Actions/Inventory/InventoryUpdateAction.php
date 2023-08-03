<?php

namespace App\Actions\Inventory;

use App\Data\InventoryData;
use App\Models\Inventory;

class InventoryUpdateAction
{
    public function __invoke(InventoryData $data, int $inventoryId): Inventory
    {
        $inventory = Inventory::findOrFail($inventoryId);
        $inventory->update($data->toArray());

        return $inventory->refresh();
    }
}
