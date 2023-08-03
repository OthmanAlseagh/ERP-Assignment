<?php

namespace App\Http\Controllers;

use App\Actions\Sales\SalesCreateAction;
use App\Data\SaleData;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesController extends Controller
{
    /**
     * @throws \Throwable
     */
    public function __invoke(SaleRequest $request): JsonResource
    {
        return SaleResource::make(
            app(SalesCreateAction::class)(
                SaleData::from($request->validated())
            )
        );
    }
}
