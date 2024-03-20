<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface SellerServiceInterface
{
    public function getSeller(Request $request): JsonResponse;

    public function getSellerContacts(Request $request): JsonResponse;

    public function getSellerSales(Request $request): JsonResponse;

    public function getSales(Request $request): JsonResponse;
}