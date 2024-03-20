<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Contracts\SellerServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetSales extends Controller
{
    public function __invoke(
        Request $request,
        SellerServiceInterface $service
    ): JsonResponse {
        return $service->getSales($request);
    }
}