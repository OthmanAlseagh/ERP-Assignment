<?php

namespace Tests\Feature;

use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\InventoryConfigurationTrait;

class InventoryDeleteTest extends TestCase
{
    use RefreshDatabase, WithFaker, InventoryConfigurationTrait;

    public Inventory $inventory;

    public function setUp(): void
    {
        parent::setUp();
        $this->inventory = $this->inventory()->first();
    }

    /**
     * Test the destroy method of InventoryController.
     *
     * @return void
     */
    public function test_destroy_method()
    {
        $response = $this->deleteJson(route('inventory.destroy', $this->inventory));
        $response->assertNoContent();
        $this->assertDatabaseMissing('inventories', [$this->inventory->id]);
    }
}
