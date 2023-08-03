<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        Route::get('', 'index')->name('inventory.index');
        Route::post('', 'store')->name('inventory.store');
        Route::put('{inventory}', 'update')->name('inventory.update');
        Route::delete('{inventory}', 'destroy')->name('inventory.destroy');
        Route::get('calculate', 'calculate')->name('inventory.calculate');
    });

// Sales routes
Route::post('/sales', SalesController::class)->name('sales.store');

// Purchase routes
Route::post('/purchases', PurchaseController::class)->name('purchase.store');
