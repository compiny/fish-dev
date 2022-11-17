<?php

namespace Database\Factories;

use App\Models\Dev;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreService>
 */
class StoreServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idDevs = Dev::all()->getQueueableIds();
        $idServices = Service::all()->getQueueableIds();
        return [
            'dev_id' => $this->faker->randomElement($idDevs),
            'service_id' => $this->faker->randomElement($idServices),
            'qn' => $this->faker->randomFloat(0,1,1000),
            'price' => $this->faker->randomFloat(2,1,100000),
        ];
    }
}
