<?php

namespace Tests\Feature;

use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\InventoryConfigurationTrait;

class InventoryIndexTest extends TestCase
{
    use RefreshDatabase, WithFaker, InventoryConfigurationTrait;

    public Inventory $inventory;

    public function setUp(): void
    {
        parent::setUp();
        $this->inventory = $this->inventory()->first();
    }

    /**
     * Test the index method of InventoryController.
     *
     * @return void
     */
    public function test_index_method()
    {
        $response = $this->get(route('inventory.index'));
        $response->assertOk()
            ->assertJsonFragment(['id' => $this->inventory->id]);
    }
}
