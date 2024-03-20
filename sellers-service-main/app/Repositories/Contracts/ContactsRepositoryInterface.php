<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

interface ContactsRepositoryInterface
{
    public function getBySellerId(int $id): Collection;
    public function createFromCSVLine(array $csvLine, int $sellerId): Contact;
}