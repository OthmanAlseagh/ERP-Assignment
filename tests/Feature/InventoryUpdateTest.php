<?php

namespace Tests\Feature;

use App\Actions\Inventory\InventoryUpdateAction;
use App\Data\InventoryData;
use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\InventoryConfigurationTrait;

class InventoryUpdateTest extends TestCase
{
    use RefreshDatabase, WithFaker, InventoryConfigurationTrait;

    public Inventory $inventory;

    public function setUp(): void
    {
        parent::setUp();

        $this->inventory = $this->inventory()->first();
    }

    /**
     * Test the update method of InventoryController.
     *
     * @return void
     */
    public function test_update_method()
    {
        $inventoryData = InventoryData::from([
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->randomFloat(2, 1, 1000),
        ]);
        $request = InventoryRequest::create(route('inventory.update', $this->inventory->id), 'PUT', $inventoryData->toArray());
        $response = app(InventoryUpdateAction::class)($inventoryData, $this->inventory->id);
        $this->assertEquals($response->name, $inventoryData->name);
    }
}
