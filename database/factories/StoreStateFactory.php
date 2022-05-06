<?php

namespace Database\Factories;

use App\Models\Dev;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreState>
 */
class StoreStateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idUsers = User::all()->getQueueableIds();
        $idStates = State::all()->getQueueableIds();
        $idDevs = Dev::all()->getQueueableIds();
        return [
            'user_id' => $this->faker->randomElement($idUsers),
            'dev_id' => $this->faker->randomElement($idDevs),
            'state_id' => $this->faker->randomElement($idStates),
        ];
    }
}
