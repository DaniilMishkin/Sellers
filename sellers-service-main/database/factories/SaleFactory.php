<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contact_id' => Contact::factory(),
            'net_amount' => $this->faker->randomFloat(),
            'gross_amount' => $this->faker->randomFloat(),
            'tax_rate' => $this->faker->randomFloat(),
            'product_total_cost' => $this->faker->randomFloat(),
        ];
    }
}
