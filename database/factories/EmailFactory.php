<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Email>
 */
class EmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ids = Customer::all()->getQueueableIds();
        return [
            'email' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
            'customer_id' => $this->faker->randomElement($ids),
        ];
    }
}
