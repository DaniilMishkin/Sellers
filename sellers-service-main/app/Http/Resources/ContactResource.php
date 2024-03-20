<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Contact;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    public function __construct(private readonly Contact $contact)
    {
        parent::__construct($contact);
    }

    public function toArray($request): array
    {
        return [
            'data' => [
                'id' => $this->contact->id,
                'firstname' => $this->contact->full_name,
                'type' => $this->contact->type,
                'region' => $this->contact->region,
                'date' => $this->contact->date,
                'product_type_offered_id' => $this->contact->product_type_offered_id,
                'product_type_offered' => $this->contact->product_type_offered,
            ],
        ];
    }
}
