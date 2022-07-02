<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Customer;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idCustomers = Customer::all()->getQueueableIds();
        $idBanks = Bank::all()->getQueueableIds();
        return [
            'accountNum' => $this->faker->swiftBicNumber(),
            'name' => $this->faker->firstName(),
            'customer_id' => $this->faker->randomElement($idCustomers),
            'bank_id' => $this->faker->randomElement($idBanks),
        ];
    }
}
