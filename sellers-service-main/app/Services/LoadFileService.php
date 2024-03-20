<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Contracts\ContactsRepositoryInterface;
use App\Repositories\Contracts\SalesRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Services\Contracts\LoadFileServiceInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoadFileRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class LoadFileService implements LoadFileServiceInterface
{
    private const CSV_COLUMNS = 16;

    public function __construct(
        private readonly SalesRepositoryInterface $salesRepository,
        private readonly SellerRepositoryInterface $sellerRepository,
        private readonly ContactsRepositoryInterface $contactsRepository
    ) {
    }

    /**
     * @throws Exception
     */
    public function loadFile(LoadFileRequest $request): JsonResponse
    {
        //
        $filePath = $request->file('file')->getRealPath();
        $file = fopen($filePath, 'r');

        $row = 0;
        $header = [];
        while (($rawLine = fgetcsv($file)) !== FALSE) {
            if (count($rawLine) != self::CSV_COLUMNS) {
                throw new Exception('Invalid CSV file');
            }

            if ($row !== 0) {
                $line = array_combine($header, $rawLine);

                $this->saveCsvLine(array_combine($header, $rawLine));
            } else {
                $header = $rawLine;
            }

            $row++;
        }
        fclose($file);

        return response()->json([
            'message' => 'CSV file has been processed',
        ]);
    }

    public function saveCsvLine($csvLine): void
    {
        DB::transaction(function () use ($csvLine) {
            $seller = $this->sellerRepository->createFromCSVLine($csvLine);

            $contact = $this->contactsRepository->createFromCSVLine($csvLine, (int)$seller->id);

            $this->salesRepository->createFromCSVLine($csvLine, $contact->id);
        });
    }
}