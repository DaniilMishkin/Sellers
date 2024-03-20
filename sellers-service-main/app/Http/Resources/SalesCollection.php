<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Sale;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SalesCollection extends ResourceCollection
{
    private Sale $stats;

    public function addStats(Sale $stats)
    {
        $this->stats = $stats;
    }

    public function toArray($request)
    {
        return [
            'data' => [
                'stats' => $this->stats,
                'sales' => $this->collection
            ],
        ];
    }
}