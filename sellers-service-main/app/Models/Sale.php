<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'net_amount',
        'gross_amount',
        'tax_rate',
        'product_total_cost',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sales';

    public function contact(): HasOne
    {
        return $this->hasOne(
            related: Contact::class,
            foreignKey: 'id',
            localKey: 'contact_id',
        );
    }
}
