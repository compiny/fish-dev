<?php

namespace Database\Factories;

use App\Models\Bundle;
use App\Models\Dev;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreBundle>
 */
class StoreBundleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idBundles = Bundle::all()->getQueueableIds();
        $idDevs = Dev::all()->getQueueableIds();
        return [
            'bundle_id' => $this->faker->randomElement($idBundles),
            'dev_id' => $this->faker->randomElement($idDevs),
        ];
    }
}
