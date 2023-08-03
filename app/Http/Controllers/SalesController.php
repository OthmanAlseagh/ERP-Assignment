<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        $sale = Sale::create($request->all());

        return response()->json($sale, 201);
    }
}
