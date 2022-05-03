<?php

namespace Database\Factories;

use App\Models\Bundle;
use App\Models\Customer;
use App\Models\Type;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dev>
 */
class DevFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idVendors = Vendor::all()->getQueueableIds();
        $idTypes = Type::all()->getQueueableIds();
        $idBundles = Bundle::all()->getQueueableIds();
        $idCustomers = Customer::all()->getQueueableIds();
        return [
            'n' => $this->faker->numberBetween(1, 9999),
            'sn' => $this->faker->macAddress(),
            'date' => $this->faker->dateTime,
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'troubles' => $this->faker->text(50),
            'vendor_id' => $this->faker->randomElement($idVendors),
            'type_id' => $this->faker->randomElement($idTypes),
            'customer_id' => $this->faker->randomElement($idCustomers),
            'final' => $this->faker->dateTime,
        ];
    }
}
