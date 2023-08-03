<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:inventories,name'],
            'description' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'unit_price' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return false;
    }
}
