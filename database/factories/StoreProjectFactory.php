<?php

namespace Database\Factories;

use App\Models\Bundle;
use App\Models\Customer;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreProject>
 */
class StoreProjectFactory extends Factory
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
        $idCustomers = Customer::all()->getQueueableIds();
        return [
            'user_id' => $this->faker->randomElement($idUsers),
            'project_id' => $this->faker->randomElement($idStates),
            'customer_id' => $this->faker->randomElement($idCustomers),
        ];
    }
}
