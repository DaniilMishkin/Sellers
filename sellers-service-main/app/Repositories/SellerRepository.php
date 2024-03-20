<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;

class SellerRepository implements SellerRepositoryInterface
{
    public function getById(int $id): Seller
    {
        return Seller::whereId($id)->firstOrFail();
    }

    public function createFromCSVLine(array $csvLine): Seller
    {
        $seller = Seller::firstOrNew([
            'id' => $csvLine['seller_id'],
        ]);
        $seller->firstname = $csvLine['seller_firstname'];
        $seller->lastname = $csvLine['seller_lastname'];
        $seller->date_joined = $csvLine['date_joined'];
        $seller->country = $csvLine['country'];
        $seller->save();

        return $seller;
    }
}