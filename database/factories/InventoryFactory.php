<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique(true, 5)->name,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomNumber(2),
            'unit_price' => $this->faker->randomFloat(2),
        ];
    }
}
