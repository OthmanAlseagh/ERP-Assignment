<?php

namespace App\Actions\Purchase;

use App\Data\PurchaseData;
use App\Models\Purchase;

class PurchaseCreateAction
{
    public function __invoke(PurchaseData $data): Purchase
    {
        return Purchase::create($data->toArray());
    }
}
