<?php

namespace Tests\Feature;

use App\Actions\Inventory\InventoryCreateAction;
use App\Data\InventoryData;
use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\InventoryConfigurationTrait;

class InventoryCreateTest extends TestCase
{
    use RefreshDatabase, WithFaker, InventoryConfigurationTrait;

    public Inventory $inventory;

    public function setUp(): void
    {
        parent::setUp();
        $this->inventory = $this->inventory()->first();
    }

    /**
     * Test the store method of InventoryController.
     *
     * @return void
     */
    public function test_store_method()
    {
        $this->inventory->name = 'new name';
        $request = InventoryRequest::create(route('inventory.store'), 'POST', $this->inventory->toArray());
        $inventoryData = InventoryData::from($request->toArray());
        $response = app(InventoryCreateAction::class)($inventoryData);

        $this->assertIsObject($response);
        $this->assertEquals($inventoryData->name, $response->name);
    }
}
