<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Inventory::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $item = Inventory::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        return response()->json($inventory);
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return response()->json(null, 204);
    }
}
