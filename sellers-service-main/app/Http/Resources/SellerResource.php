<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Seller;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    public function __construct(private readonly Seller $seller)
    {
        parent::__construct($seller);
    }

    public function toArray($request): array
    {
        return [
            'data' => [
                'id' => $this->seller->id,
                'firstname' => $this->seller->firstname,
                'lastname' => $this->seller->lastname,
                'date_joined' => $this->seller->date_joined,
                'country' => $this->seller->country,
            ],
        ];
    }
}
