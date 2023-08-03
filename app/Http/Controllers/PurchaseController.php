<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $purchase = Purchase::create($request->all());

        return response()->json($purchase, 201);
    }
}
