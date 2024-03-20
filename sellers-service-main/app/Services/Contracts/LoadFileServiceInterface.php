<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoadFileRequest;

interface LoadFileServiceInterface
{
    public function loadFile(LoadFileRequest $request): JsonResponse;
}