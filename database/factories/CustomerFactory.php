<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ids = User::all()->getQueueableIds();
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'user_id' => $this->faker->randomElement($ids),
        ];
    }
}
