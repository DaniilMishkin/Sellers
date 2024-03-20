<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property int $seller_id
 * @property string $full_name
 * @property string $type
 * @property string $region
 * @property string $date
 * @property int $product_type_offered_id
 * @property string $product_type_offered
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereSellerId($value)
 */
class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'full_name',
        'region',
        'date',
        'type',
        'product_type_offered_id',
        'product_type_offered',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    public function seller(): HasOne
    {
        return $this->hasOne(
            related: Seller::class,
            foreignKey: 'id',
            localKey: 'seller_id',
        );
    }

    public function sales(): HasMany
    {
        return $this->hasMany(
            related: Sale::class,
            foreignKey: 'contact_id',
            localKey: 'id'
        );
    }
}
