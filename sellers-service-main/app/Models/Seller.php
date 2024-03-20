<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Seller
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $date_joined
 * @property string $country
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereId($value)
 */
class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'date_joined',
        'country',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sellers';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function contacts(): HasMany
    {
        return $this->hasMany(
            related: Contact::class,
            foreignKey: 'seller_id',
            localKey: 'id'
        );
    }
}
