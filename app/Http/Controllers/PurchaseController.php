<?php

namespace App\Http\Controllers;

use App\Actions\Purchase\PurchaseCreateAction;
use App\Data\PurchaseData;
use App\Http\Requests\PurchaseRequest;
use App\Http\Resources\PurchaseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseController extends Controller
{
    public function __invoke(PurchaseRequest $request): JsonResource
    {
        return PurchaseResource::make(
            app(PurchaseCreateAction::class)(
                PurchaseData::from($request->validated())
            )
        );
    }
}
