<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'inventory' => InventoryResource::make($this->inventory),
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost,
        ];
    }
}
