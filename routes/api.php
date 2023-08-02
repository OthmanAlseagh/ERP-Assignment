<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Inventory routes
Route::controller(InventoryController::class)
    ->prefix('inventories')
    ->whereNumber('inventory')
    ->group(function () {
        Route::get('', 'index')->name('inventory_index');
        Route::post('', 'store')->name('inventory_store');
        Route::put('{inventory}', 'update')->name('inventory_update');
        Route::delete('{inventory}', 'destroy')->name('inventory_destroy');
    });

// Sales routes
Route::post('/sales', [SalesController::class, 'store'])->name('sales_store');

// Purchase routes
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchase_store');

