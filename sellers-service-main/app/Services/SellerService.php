<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\ContactsCollection;
use App\Http\Resources\SalesCollection;
use App\Http\Resources\SellerResource;
use App\Repositories\Contracts\ContactsRepositoryInterface;
use App\Repositories\Contracts\SalesRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Services\Contracts\SellerServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerService implements SellerServiceInterface
{
    public function __construct(
        private readonly SalesRepositoryInterface $salesRepository,
        private readonly SellerRepositoryInterface $sellerRepository,
        private readonly ContactsRepositoryInterface $contactsRepository
    ) {
    }

    public function getSeller(Request $request): JsonResponse
    {
        $id = (int)$request->route('sellerId');
        $seller = $this->sellerRepository->getById($id);

        return new JsonResponse(
            data: new SellerResource($seller),
            status: Response::HTTP_OK,
        );
    }

    public function getSellerContacts(Request $request): JsonResponse
    {
        $id = (int)$request->route('sellerId');
        $contacts = $this->contactsRepository->getBySellerId($id);

        return new JsonResponse(
            data: new ContactsCollection($contacts),
            status: Response::HTTP_OK,
        );
    }

    public function getSellerSales(Request $request): JsonResponse
    {
        $id = (int)$request->route('sellerId');
        $sales = $this->salesRepository->getSalesBySellerId($id);

        return new JsonResponse(
            data: new ContactsCollection($sales),
            status: Response::HTTP_OK,
        );
    }

    public function getSales(Request $request): JsonResponse
    {
        $year = (int)$request->route('year');
        $sales = $this->salesRepository->getSalesByYear($year);
        $stats = $this->salesRepository->getStatsByYear($year);

        $data = new SalesCollection($sales);
        $data->addStats($stats);

        return new JsonResponse(
            data: $data,
            status: Response::HTTP_OK,
        );
    }
}