<?php

namespace App\Actions\Inventory;

use App\Models\Inventory;
use Illuminate\Pagination\LengthAwarePaginator;

class InventoryListAction
{
    public function __invoke(): LengthAwarePaginator
    {
        return Inventory::paginate();
    }
}
