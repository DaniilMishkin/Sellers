<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'seller_id' => Seller::factory(),
            'full_name' => $this->faker->name(),
            'type' => $this->faker->randomElement(['Phone', 'E-Mail']),
            'region' => $this->faker->word(),
            'date' => $this->faker->date(),
            'product_type_offered_id' => $this->faker->randomNumber(),
            'product_type_offered' => $this->faker->word(),
        ];
    }
}
