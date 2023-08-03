<?php

namespace App\Actions\Sales;

use App\Data\SaleData;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesCreateAction
{
    public function __invoke(SaleData $data): Sale
    {
        try {
            DB::beginTransaction();

            $sale = Sale::create($data->toArray());

            $sale->inventory()->decrement('quantity', $sale->quantity);

            DB::commit();

            return $sale;

        } catch (\Throwable $e) {
            DB::rollback();

            throw $e;
        }
    }
}
