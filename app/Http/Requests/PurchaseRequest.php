<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function rules(): array
    {
        $inventory = Inventory::findOrFail($this->get('inventory_id'));

        return [
            'inventory_id' => ['required', 'int', 'exists:inventories,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'unit_cost' => ['required', 'numeric', 'min:0.1', "lte:{$inventory->quantity}"],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
