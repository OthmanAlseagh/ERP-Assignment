<?php

namespace Tests\Unit;

use App\Http\Requests\InventoryRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\InventoryConfigurationTrait;

class InventoryCreateValidationTest extends TestCase
{
    use RefreshDatabase, WithFaker, InventoryConfigurationTrait;

    public function test_name_is_unique(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->inventory()->first()->name,
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_name_is_required(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_name_is_not_string(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => (int) 211,
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_description_is_not_string(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'description' => (int) 1223,
                'name' => $this->faker->name,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_description_is_required(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_quantity_is_not_int(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->name,
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_quantity_is_required(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'description' => $this->faker->sentence,
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_quantity_is_equal_zero(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'description' => $this->faker->sentence,
                'quantity' => 0,
                'unit_price' => $this->faker->randomFloat(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_unit_price_is_required(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->randomNumber(),
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_unit_price_equal_zero(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => 0,
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_unit_price_is_not_float(): void
    {
        $request = new InventoryRequest();

        $validator = validator(
            [
                'name' => $this->faker->name,
                'description' => $this->faker->sentence,
                'quantity' => $this->faker->randomNumber(),
                'unit_price' => $this->faker->name,
            ], $request->rules());

        $this->assertTrue($validator->fails());
    }
}
