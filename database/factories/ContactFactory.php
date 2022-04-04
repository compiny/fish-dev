<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
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
        $idUsers = User::all()->getQueueableIds();
        $idCustomers = Customer::all()->getQueueableIds();
        $idTypeContact = [1, 2, 3];
        return [
            'typeContact' => $this->faker->randomElement($idTypeContact),
            'description' => $this->faker->text(),
            'valueContact' => $this->faker->text(10),
            'customer_id' => $this->faker->randomElement($idCustomers),
            'user_id' => $this->faker->randomElement($idUsers),
        ];
    }
}
