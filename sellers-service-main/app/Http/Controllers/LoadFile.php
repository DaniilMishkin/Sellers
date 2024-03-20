<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Contracts\LoadFileServiceInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoadFileRequest;

class LoadFile extends Controller
{
    public function __invoke(
        LoadFileRequest $request,
        LoadFileServiceInterface $service
    ): JsonResponse {
        return $service->loadFile($request);
    }
}