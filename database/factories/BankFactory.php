<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bik' => $this->faker->swiftBicNumber(),
            'name' => $this->faker->firstName(),
            'korr' => $this->faker->swiftBicNumber(),
            'adr' => $this->faker->address(),
            'city' => $this->faker->city(),
        ];
    }
}
