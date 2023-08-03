<?php

namespace App\Http\Controllers;

use App\Actions\Inventory\InventoryCreateAction;
use App\Actions\Inventory\InventoryListAction;
use App\Actions\Inventory\InventoryUpdateAction;
use App\Data\InventoryData;
use App\Http\Requests\InventoryRequest;
use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InventoryController extends Controller
{
    public function index(): ResourceCollection
    {
        return InventoryResource::collection(
            app(InventoryListAction::class)()
        );
    }

    public function store(InventoryRequest $request): JsonResource
    {
        return InventoryResource::make(
            app(InventoryCreateAction::class)(
                InventoryData::from($request->validated())
            )
        );
    }

    public function update(InventoryRequest $request, Inventory $inventory): JsonResource
    {
        return InventoryResource::make(
            app(InventoryUpdateAction::class)(
                InventoryData::from($request->validated()),
                $inventory->id
            )
        );
    }

    public function destroy(Inventory $inventory): JsonResponse
    {
        $inventory->delete();

        return response()->json(null, 204);
    }

    public function calculate(): JsonResponse
    {
        return response()->json(['total_cost' => Inventory::calculateTotalCost()]);
    }
}
